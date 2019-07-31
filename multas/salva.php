<?php session_start();
require_once '../config/init.php';

// resgata os salarioes do formulário
$calc467 = isset($_POST['calc467']) ? $_POST['calc467'] : null;
$calc477 = isset($_POST['calc477']) ? $_POST['calc477'] : null;
$total467 = isset($_POST['total467']) ? $_POST['total467'] : null;
$total477 = isset($_POST['total477']) ? $_POST['total477'] : null;
$id = isset($_POST['idProcesso']) ? $_POST['idProcesso'] : null;


function moeda($get_salario) {
$source = array('.', ',');
$replace = array('', '.');
$salario = str_replace($source, $replace, $get_salario); //remove os pontos e substitui a virgula pelo ponto
return $salario; //retorna o salario formatado para gravar no banco
}



 
// validação (bem simples, mais uma vez)
if (empty($id))
{
    echo "Volte e preencha todos os campos";
    exit;
}
 
// a data vem no formato dd/mm/YYYY
// então precisamos converter para YYYY-mm-dd
// $isoDate = dateConvert($birthdate);


		$PDO = db_connect();
        $stmt = $PDO->prepare('SELECT * FROM multas WHERE idProcesso = :idProcesso AND idUsuario = :idUsuario');
        $stmt->bindValue(':idProcesso', $id);
        $stmt->bindValue(':idUsuario', $_SESSION['id']);
        $stmt->execute();
       	$a = $stmt->rowCount();
       	if($a==1){


// atualiza o banco
$sql = "UPDATE multas SET calc467 = :calc467, calc477 = :calc477, total467 = :total467, total477=:total477  WHERE idProcesso = :idProcesso AND idUsuario = :idUsuario";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':calc477', $calc477);
$stmt->bindParam(':calc467', $calc467);
$stmt->bindParam(':total477', $total477);
$stmt->bindParam(':total467', $total467);
$stmt->bindParam(':idProcesso', $id);
$stmt->bindParam(':idUsuario', $_SESSION['id']);

 
if ($stmt->execute())
{
   
    header('Location: ../opcoes.php?sucesso=1&idProcesso='.$id.'');
}
}
else if($a==0)
{ 
echo '<script> alert("ERRO");</script>';
}