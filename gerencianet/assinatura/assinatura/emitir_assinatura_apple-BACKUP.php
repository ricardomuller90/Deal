<?php
header('Content-Type: application/json');

require_once '../../../config/init.php';
require_once 'basic-logging.php';


function response($success = false, $errorMsg = '') {
	if($success) {
		echo json_encode([
			'success' => true
		]);
		exit;
	}
	echo json_encode([
		'success' => false,
		'error' => $errorMsg
	]);
	exit;
}

function validateReceipt($receipt, $isSandbox = true) {
    if ($isSandbox) {
        $endpoint = 'https://sandbox.itunes.apple.com/verifyReceipt';
		basicLog("Environment: Sandbox (use 'sandbox' URL argument to toggle)");
    }
    else {
        $endpoint = 'https://buy.itunes.apple.com/verifyReceipt';
		basicLog("Environment: Production (use 'sandbox' URL argument to toggle)");
    }
    $postData = json_encode(
        array('receipt-data' => $receipt)
    );
   
    $ch = curl_init($endpoint);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

    $response = curl_exec($ch);
    $errno    = curl_errno($ch);
    $errmsg   = curl_error($ch);
    curl_close($ch);
    if ($errno != 0) {
        throw new Exception($errmsg, $errno);
    }
    $data = json_decode($response);
    if (!is_object($data)) {
        throw new Exception('Resposta da apple invalida');
    }
    if (!isset($data->status) 
	|| $data->status != 0) {
		basicLog('Invalidated Receipt Status Code: '. $data->status);
        throw new Exception('Transacao Invalida');
    }
    return $data;
    /*return array(
        'quantity'       =>  $data->receipt->quantity,
        'product_id'     =>  $data->receipt->product_id,
        'transaction_id' =>  $data->receipt->transaction_id,
        'purchase_date'  =>  $data->receipt->purchase_date,
        'app_item_id'    =>  $data->receipt->app_item_id,
        'bid'            =>  $data->receipt->bid,
        'bvrs'           =>  $data->receipt->bvrs
    );*/
}


function criarConta($username, $pass) {
	global $PDO;
	$k = 30;
	$final_assinatura = date('Y-m-d', strtotime(date('Y-m-d').' +'.$k.' days'));
	$sql2 = "INSERT INTO contas (email, username, senha, final_assinatura, pagamento, tipo_assinatura) VALUES (:email, :username, :senha, :final_assinatura, :pagamento, :tipo_assinatura)";
	$pagamento = 'paid';
	$tipo_assinatura = 'apple';
	$stmt2 = $PDO->prepare($sql2);
	$stmt2->bindParam(':email', $username);
	$stmt2->bindParam(':username', $username);
	$hash = password_hash($pass, PASSWORD_DEFAULT);
	$hash = str_replace('$2y$', '$2a$', $hash);
	$stmt2->bindParam(':senha', $hash);
	$stmt2->bindParam(':final_assinatura', $final_assinatura);
	$stmt2->bindParam(':pagamento', $pagamento);
	$stmt2->bindParam(':tipo_assinatura', $tipo_assinatura);
	if (!$stmt2->execute()) {
		return false;
	}
	return true;
}


function DBUpdate($tabela, $itens, $query=null) {
	global $PDO;
  try {    
    if($query){
      $query = "WHERE ".$query;
    }
    $itens_str = "";
    $i = 0;
    foreach($itens as $c => $value) {
      $itens_str .= $c.' = :'.$c.',';
    }
    $itens_str = substr($itens_str, 0, -1);//delete last comma
    $sql ="UPDATE ".$tabela." SET ".$itens_str." ".$query;
    //echo $str."<br>";
    $p = $PDO->prepare($sql);
    foreach($itens as $c => $value) {
        $p->bindValue(":".$c, $value);
    }
    return $p->execute();
  } catch(Exception $e) {
    basicLog("DB Error update: ".$e->__toString());
    return false;
  }
}

function extenderConta($username, $termino_previsto) {
	$k = 30;
	if(strtotime($termino_previsto) > strtotime(date('Y-m-d')) ) {
		$final_assinatura = date('Y-m-d', strtotime($termino_previsto.' +'.$k.' days'));
	} else {
		$final_assinatura = date('Y-m-d', strtotime(date('Y-m-d').' +'.$k.' days'));
	}
	return DBUpdate('contas', [
		'final_assinatura' => $final_assinatura,
		'pagamento' => 'paid'
	], "username='$username'");
}

function processPost() {
	global $PDO;
	if($_SERVER['REQUEST_METHOD'] != "POST") {
		response(false, '');
	}
	$post = array();
	$fields = ['appStoreReceipt', 'username', 'pass'];
	foreach($fields as $f) {
		if(isset($_POST[$f])) {
			$post[$f] = $_POST[$f];
		} else {
			$post[$f] = '';
		}
	}
	if(empty($post['appStoreReceipt']) || empty($post['username']) || empty($post['pass'])) {
		response(false, 'Faltam campos para validação');
	}

	$receipt   = $post['appStoreReceipt'];
    $isSandbox = false;

    try {
        if(strpos($receipt,'{') !== false) {
			$receipt = base64_encode($receipt);
		}
        $info = validateReceipt($receipt, $isSandbox);
		//echo 'Success';
    } catch (Exception $ex) {
		response(false, $ex->getMessage());
    }
    //Se nao entrou no catch, vai seguir a execucao e a receita estara validada corretamente
    basicLog("Validated receipt:".print_r($info, true));
    try{
      $r = $PDO->query("SELECT id, final_assinatura, tipo_assinatura FROM contas WHERE username='".$post['username']."' OR email='".$post['username']."'")->fetchAll(\PDO::FETCH_ASSOC);
  	} catch(Exception $e) {
  		basicLog("Exception querying contas:".$e->__toString());
      $r = null;
  	}
    if(empty($r) || count($r) == 0) {
    	if(!criarConta($post['username'], $post['pass'])) {
    		response(false, "Transacao validada mas não foi possivel registrar. Tire print da tela e contate o suporte");
    	}
    	response(true);
    }
    //Conta ja existe, apenas extende a assinatura
    if($r[0]['tipo_assinatura'] !== 'apple') {
    	response(false, "Não é possível renovar pelo app, pois essa assinatura foi feita através do site.");
    }
    if(!extenderConta($post['username'], $r[0]['final_assinatura'])) {//atualiza o final_assinatura
    	response(false, "Transacao validada mas não foi possivel extender assinatura. Tire print da tela e contate o suporte");
    }
    response(true);
}

try {
	processPost();
} catch(Exception $e) {
	response(false, "Fatal: ".print_r($e, true));
}



?>