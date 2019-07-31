<?php session_start();
require_once '../config/init.php';

// resgata os salarioes do formulário
$total = isset($_POST['total']) ? $_POST['total'] : null;
$id = isset($_POST['idProcesso']) ? $_POST['idProcesso'] : null;


function moeda($get_salario) {
$source = array('.', ',');
$replace = array('', '.');
$salario = str_replace($source, $replace, $get_salario); //remove os pontos e substitui a virgula pelo ponto
return $salario; //retorna o salario formatado para gravar no banco
}



 
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
        $stmt = $PDO->prepare('SELECT * FROM danMor WHERE idProcesso = :idProcesso');
        $stmt->bindValue(':idProcesso', $id);
        $stmt->execute();
       	$a = $stmt->rowCount();
       	if($a==1){


// atualiza o banco
$sql = "UPDATE danMor SET total = :total WHERE idProcesso = :idProcesso";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':total', $total);
$stmt->bindParam(':idProcesso', $id);


 
if ($stmt->execute())
{
   
    header('Location: ../opcoes.php?sucesso=1&idProcesso='.$id.'');
}
}
else if($a==0)
{


    // cadastra
$sql = "INSERT INTO danMor (total, idProcesso) VALUES (:total, :idProcesso)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':total', $total);
$stmt->bindParam(':idProcesso', $id);

 
if ($stmt->execute())
{
    
    header('Location: ../opcoes.php?sucesso=1&idProcesso='.$id.'');


}
}
else
{
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}