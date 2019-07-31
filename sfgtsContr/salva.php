<?php session_start();
require_once '../config/init.php';

// resgata os salarioes do formulário
$total = isset($_POST['total']) ? $_POST['total'] : null;
$valorMultaFgts = isset($_POST['valorMultaFgts']) ? $_POST['valorMultaFgts'] : null;
$calcular = isset($_POST['calcular']) ? $_POST['calcular'] : null;

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
        $stmt = $PDO->prepare('SELECT * FROM fgtsContr WHERE idProcesso = :idProcesso');
        $stmt->bindValue(':idProcesso', $id);

        $stmt->execute();
       	$a = $stmt->rowCount();
       	if($a==1){


// atualiza o banco
$sql = "UPDATE fgtsContr SET total = :total, calcular = :calcular, valorMultaFgts = :valorMultaFgts WHERE idProcesso = :idProcesso ";
$stmt = $PDO->prepare($sql);

$stmt->bindParam(':valorMultaFgts', $valorMultaFgts);
$stmt->bindParam(':total', $total);
$stmt->bindParam(':idProcesso', $id);
$stmt->bindParam(':calcular', $calcular);


 
if ($stmt->execute())
{
   
    header('Location: ../opcoes.php?sucesso=1&idProcesso='.$id.'');
}
}
else if($a==0)
{ 
echo '<script> alert("ERRO");</script>';
}