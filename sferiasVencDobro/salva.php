<?php session_start();
require_once '../config/init.php';

// resgata os salarioes do formulário
$totalSemFgts = isset($_POST['totalSemFgts']) ? $_POST['totalSemFgts'] : null;
$qtd = isset($_POST['qtd']) ? $_POST['qtd'] : null;
$id = isset($_POST['idProcesso']) ? $_POST['idProcesso'] : null;


function moeda($get_salario) {
$source = array('.', ',');
$replace = array('', '.');
$salario = str_replace($source, $replace, $get_salario); //remove os pontos e substitui a virgula pelo ponto
return $salario; //retorna o salario formatado para gravar no banco
}



 

// a data vem no formato dd/mm/YYYY
// então precisamos converter para YYYY-mm-dd
// $isoDate = dateConvert($birthdate);


		$PDO = db_connect();
        $stmt = $PDO->prepare('SELECT * FROM feriasVencidasDobro WHERE idProcesso = :idProcesso AND idUsuario = :idUsuario');
        $stmt->bindValue(':idProcesso', $id);
        $stmt->bindValue(':idUsuario', $_SESSION['id']);
        $stmt->execute();
       	$a = $stmt->rowCount();
       	if($a==1){


// atualiza o banco
$sql = "UPDATE feriasVencidasDobro SET totalSemFgts = :totalSemFgts, qtd = :qtd WHERE idProcesso = :idProcesso AND idUsuario = :idUsuario";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':totalSemFgts', $totalSemFgts);
$stmt->bindParam(':qtd', $qtd);
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