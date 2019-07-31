<?php session_start();
require_once '../config/init.php';

// resgata os valores do formulário
$totalSemFgts = isset($_POST['totalSemFgts']) ? $_POST['totalSemFgts'] : null;

$fgtsEmultas = isset($_POST['fgtsEmultas']) ? $_POST['fgtsEmultas'] : null;
$calcular = isset($_POST['calcular']) ? $_POST['calcular'] : null;

function moeda($get_valor) {
$source = array('.', ',');
$replace = array('', '.');
$valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto
return $valor; //retorna o valor formatado para gravar no banco
}

$id = isset($_POST['idProcesso']) ? $_POST['idProcesso'] : null;


 
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
        $stmt = $PDO->prepare('SELECT * FROM decProp WHERE idProcesso = :idProcesso AND idUsuario = :idUsuario');
        $stmt->bindValue(':idProcesso', $id);
        $stmt->bindValue(':idUsuario', $_SESSION['id']);
        $stmt->execute();
       	$a = $stmt->rowCount();
       	if($a==1){


// atualiza o banco
$sql = "UPDATE decProp SET  totalSemFgts = :totalSemFgts, fgtsEmultas = :fgtsEmultas, calcular = :calcular WHERE idProcesso = :idProcesso AND idUsuario = :idUsuario";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':totalSemFgts', $totalSemFgts);
$stmt->bindParam(':fgtsEmultas', $fgtsEmultas);
$stmt->bindParam(':calcular', $calcular);
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