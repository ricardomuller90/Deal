<?php session_start();
require_once '../config/init.php';

// resgata os valores do formulário
$valor = isset($_POST['valores']) ? $_POST['valores'] : null;
$total = isset($_POST['total']) ? $_POST['total'] : null;

$id = isset($_POST['idProcesso']) ? $_POST['idProcesso'] : null;


function moeda($get_valor) {
$source = array('.', ',');
$replace = array('', '.');
$valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto
return $valor; //retorna o valor formatado para gravar no banco
}

$valor = moeda($valor);

 
// validação (bem simples, mais uma vez)
if (empty($valor) ||  empty($id))
{
    echo "Volte e preencha todos os campos";
    exit;
}
 
// a data vem no formato dd/mm/YYYY
// então precisamos converter para YYYY-mm-dd
// $isoDate = dateConvert($birthdate);


		$PDO = db_connect();
        $stmt = $PDO->prepare('SELECT * FROM indDiv WHERE idProcesso = :idProcesso');
        $stmt->bindValue(':idProcesso', $id);
        $stmt->execute();
       	$a = $stmt->rowCount();
       	if($a==1){


// atualiza o banco
$sql = "UPDATE indDiv SET valor = :valor, total = :total WHERE idProcesso = :idProcesso";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':valor', $valor);
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
$sql = "INSERT INTO indDiv (valor, idProcesso, total) VALUES (:valor, :idProcesso, :total)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':valor', $valor);
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