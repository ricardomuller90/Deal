<?php session_start();
require_once 'config/init.php';

$id = isset($_GET['idProcesso']) ? $_GET['idProcesso'] : null;
$idUsuario = $_SESSION['id'];


if (empty($id))
{
    echo "Volte e preencha todos os campos";
    exit;
}
 
		$PDO = db_connect();
        $stmt = $PDO->prepare('DELETE FROM processo WHERE idProcesso = :idProcesso AND idUsuario = :idUsuario');
        $stmt->bindValue(':idProcesso', $id);
        $stmt->bindValue(':idUsuario', $idUsuario);
      
     
 
if ($stmt->execute())
{
   
    header('Location: consulta_processo.php');
}

else
{ 
echo '<script> alert("ERRO");</script>';
}