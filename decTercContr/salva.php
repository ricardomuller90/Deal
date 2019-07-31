<?php session_start();
require_once '../config/init.php';

// resgata os salarioes do formulário
$totalSemFgts = isset($_POST['totalSemFgts']) ? $_POST['totalSemFgts'] : null;
$fgtsEmultas = isset($_POST['fgtsEmultas']) ? $_POST['fgtsEmultas'] : null;
$qtd = isset($_POST['qtd']) ? $_POST['qtd'] : null;
$id = isset($_POST['idProcesso']) ? $_POST['idProcesso'] : null;


function moeda($get_salario) {
$source = array('.', ',');
$replace = array('', '.');
$salario = str_replace($source, $replace, $get_salario); //remove os pontos e substitui a virgula pelo ponto
return $salario; //retorna o salario formatado para gravar no banco
}



 
// validação (bem simples, mais uma vez)
if (empty($totalSemFgts) || empty($qtd)|| empty($id))
{
    echo "Volte e preencha todos os campos";
    exit;
}
 
// a data vem no formato dd/mm/YYYY
// então precisamos converter para YYYY-mm-dd
// $isoDate = dateConvert($birthdate);


		$PDO = db_connect();
        $stmt = $PDO->prepare('SELECT * FROM deciContr WHERE idProcesso = :idProcesso');
        $stmt->bindValue(':idProcesso', $id);
        $stmt->execute();
       	$a = $stmt->rowCount();
       	if($a==1){


// atualiza o banco
$sql = "UPDATE deciContr SET totalSemFgts = :totalSemFgts, qtd = :qtd, fgtsEmultas = :fgtsEmultas WHERE idProcesso = :idProcesso";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':totalSemFgts', $totalSemFgts);
$stmt->bindParam(':fgtsEmultas', $fgtsEmultas);
$stmt->bindParam(':qtd', $qtd);
$stmt->bindParam(':idProcesso', $id);


 
if ($stmt->execute())
{
   
    header('Location: ../opcoes.php?sucesso=1&idProcesso='.$id.'');
}
}
else if($a==0)
{


    // cadastra
$sql = "INSERT INTO deciContr (qtd, totalSemFgts, idProcesso) VALUES (:qtd, :totalSemFgts, :idProcesso)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':totalSemFgts', $totalSemFgts);
$stmt->bindParam(':qtd', $qtd);
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