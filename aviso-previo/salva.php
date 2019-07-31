<?php 
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
  header('Location: ../index.html');
  exit();
}


require_once '../config/init.php';



// resgata os valores do formulário
$id = isset($_POST['idProcesso']) ? $_POST['idProcesso'] : null;
$calcular = isset($_POST['calcular']) ? $_POST['calcular'] : null;
$salario = isset($_POST['salario']) ? $_POST['salario'] : null;
$fgtsEmultas = isset($_POST['fgtsEmultas']) ? $_POST['fgtsEmultas'] : null;

$salario = str_replace('.', '', $salario);
$salario = str_replace(',', '.', $salario);
$totalSemFgts = isset($_POST['totalSemFgts']) ? $_POST['totalSemFgts'] : null;
 
// validação (bem simples, mais uma vez)
if (!isset($totalSemFgts)|| empty($id))
{
    echo "Volte e preencha todos os campos";
    exit;
}
 
// a data vem no formato dd/mm/YYYY
// então precisamos converter para YYYY-mm-dd
// $isoDate = dateConvert($birthdate);


		$PDO = db_connect();
        $stmt = $PDO->prepare('SELECT * FROM aviso_previo WHERE idProcesso = :idProcesso AND idUsuario = :idUsuario');
        $stmt->bindValue(':idProcesso', $id);
        $stmt->bindValue(':idUsuario', $_SESSION['id']);
        $stmt->execute();
       	$a = $stmt->rowCount();
       	if($a==1){


// atualiza o banco
$sql = "UPDATE aviso_previo SET totalSemFgts = :totalSemFgts, calcular = :calcular, fgtsEmultas = :fgtsEmultas   WHERE idProcesso = :idProcesso AND idUsuario = :idUsuario";
$stmt = $PDO->prepare($sql);

$stmt->bindParam(':calcular', $calcular);
$stmt->bindParam(':totalSemFgts', $totalSemFgts);
$stmt->bindParam(':idProcesso', $id);
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
