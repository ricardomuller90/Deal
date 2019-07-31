<?php session_start();

require_once '../config/init.php'; 

    $PDO = db_connect(); 

    $stmt = $PDO->prepare('SELECT * FROM processo WHERE idProcesso = :idProcesso');
    $stmt->bindValue(':idProcesso', $_GET['idProcesso']);
    $stmt->execute();
    $valores = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($valores as $row){
    $aumMed = $row['aumMed'];

    if($aumMed == 1){
        header('Location: he-com-aum-med.php?idProcesso='.$_GET['idProcesso'].'');
        
    }else if($aumMed == 0){
        header('Location: he-sem-aum-med.php?idProcesso='.$_GET['idProcesso'].'');
        
    }
    

}
?>