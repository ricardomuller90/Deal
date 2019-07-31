<?php session_start();
require_once '../config/init.php';

// resgata os salarioes do formulário

$totalSemFgts = isset($_POST['totalSemFgts']) ? $_POST['totalSemFgts'] : null;
$fgtsEmultas = isset($_POST['fgtsEmultas']) ? $_POST['fgtsEmultas'] : null;
$diasTrab = isset($_POST['diasTrab']) ? $_POST['diasTrab'] : 0;
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
        $stmt = $PDO->prepare('SELECT * FROM saldoSal WHERE idProcesso = :idProcesso AND idUsuario = :idUsuario');
        $stmt->bindValue(':idProcesso', $id);
        $stmt->bindValue(':idUsuario', $_SESSION['id']);
        $stmt->execute();
       	$a = $stmt->rowCount();
       	if($a==1){


// atualiza o banco
$sql = "UPDATE saldoSal SET diasTrab = :diasTrab, totalSemFgts = :totalSemFgts , fgtsEmultas = :fgtsEmultas WHERE idProcesso = :idProcesso AND idUsuario = :idUsuario";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':diasTrab', $diasTrab);

$stmt->bindParam(':idProcesso', $id);
$stmt->bindParam(':totalSemFgts', $totalSemFgts);
$stmt->bindParam(':fgtsEmultas', $fgtsEmultas);
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