<?php

function totalInsalub(){
    global $PDO;
    global $reflexos;
    $stmt = $PDO->prepare('SELECT * FROM insalubridade WHERE idProcesso=:idProcesso');
    $stmt->bindValue(':idProcesso', $_GET['idProcesso']);
    $stmt->execute();
    $valores = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($valores as $row){
    $salarioMin = $row['salarioMin'];
    $adicional = $row['adicional'];
    $mesesTrabalhados = $row['mesesTrabalhados'];
    $subtotal = $salarioMin * $adicional /100 * $mesesTrabalhados;
    $totalIns = $subtotal + ($subtotal * $reflexos) * 30 /100;
    return $totalIns;
}
}



?>