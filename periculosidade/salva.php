<?php session_start();
require_once '../config/init.php';

// resgata os valores do formulário
$totalSemFgts = isset($_POST['totalSemFgts']) ? $_POST['totalSemFgts'] : null;
$totalTudo = isset($_POST['totalTudo']) ? $_POST['totalTudo'] : null;
$fgtsEmultas = isset($_POST['fgtsEmultas']) ? $_POST['fgtsEmultas'] : null;

function moeda($get_valor) {
$source = array('.', ',');
$replace = array('', '.');
$valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto
return $valor; //retorna o valor formatado para gravar no banco
}

$salarioMin = isset($_POST['salarioMin']) ? $_POST['salarioMin'] : null;

$salarioMin = moeda($salarioMin);

$id = isset($_POST['idProcesso']) ? $_POST['idProcesso'] : null;


 

 
// a data vem no formato dd/mm/YYYY
// então precisamos converter para YYYY-mm-dd
// $isoDate = dateConvert($birthdate);


		$PDO = db_connect();
        $stmt = $PDO->prepare('SELECT * FROM periculosidade WHERE idProcesso = :idProcesso AND idUsuario = :idUsuario');
        $stmt->bindValue(':idProcesso', $id);
        $stmt->bindValue(':idUsuario', $_SESSION['id']);
        $stmt->execute();
       	$a = $stmt->rowCount();
       	if($a==1){


// atualiza o banco
$sql = "UPDATE periculosidade SET salarioMin = :salarioMin, totalSemFgts = :totalSemFgts, totalTudo = :totalTudo , fgtsEmultas = :fgtsEmultas WHERE idProcesso = :idProcesso AND idUsuario = :idUsuario";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':salarioMin', $salarioMin);
$stmt->bindParam(':fgtsEmultas', $fgtsEmultas);
$stmt->bindParam(':totalSemFgts', $totalSemFgts);
$stmt->bindParam(':totalTudo', $totalTudo);
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