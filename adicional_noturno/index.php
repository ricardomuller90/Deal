<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
  header('Location: ../index.html');
  exit();
}


require_once '../config/init.php';

require_once '../include/query_processo.php';


    $PDO = db_connect(); 

    $stmt = $PDO->prepare('SELECT * FROM processo WHERE idProcesso = :idProcesso');
    $stmt->bindValue(':idProcesso', $_GET['idProcesso']);
    $stmt->execute();
    $valores = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($valores as $row){
    $aumMed = $row['aumMed'];

    if($aumMed == 1){
        header('Location: an-com-aum-med.php?idProcesso='.$_GET['idProcesso'].'');
        
    }else if($aumMed == 0){
        header('Location: an-sem-aum-med.php?idProcesso='.$_GET['idProcesso'].'');
        
    }
    

}
?>