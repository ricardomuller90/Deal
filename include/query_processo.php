<?php

     


    $stmt = $PDO->prepare('SELECT * FROM processo WHERE idProcesso = :idProcesso and idUsuario = :idUsuario');
    $stmt->bindValue(':idProcesso', $_GET['idProcesso']);
    $stmt->bindValue(':idUsuario', $_SESSION['id']);
    $stmt->execute();
    $valores = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($valores as $row){
    $fgts = $row['fgtsParc'];
    $multaFgts = $row['multaFgts'];
    $reflexos = $row['reflexos'];
    $mesesTrab = $row['mesesTrab'];


}
?>