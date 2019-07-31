<?php session_start();
require_once '../config/init.php';

// resgata os valores do formulário
$valor = isset($_POST['valor']) ? $_POST['valor'] : null;
$fgtsEmultas = isset($_POST['fgtsEmultas']) ? $_POST['fgtsEmultas'] : null;

function moeda($get_valor) {
$source = array('.', ',');
$replace = array('', '.');
$valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto
return $valor; //retorna o valor formatado para gravar no banco
}

$valor = moeda($valor);


$numHoras = isset($_POST['numHoras']) ? $_POST['numHoras'] : null;
$totalSemFgts = isset($_POST['totalSemFgts']) ? $_POST['totalSemFgts'] : null;
$mesesTrabalhados = isset($_POST['mesesTrabalhados']) ? $_POST['mesesTrabalhados'] : null;
$adicional = isset($_POST['adicional']) ? $_POST['adicional'] : null;
$numHorasPleit = isset($_POST['numHorasPleit']) ? $_POST['numHorasPleit'] : null;
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
        $stmt = $PDO->prepare('SELECT * FROM horas_exAum WHERE idProcesso = :idProcesso');
        $stmt->bindValue(':idProcesso', $id);
        $stmt->execute();
       	$a = $stmt->rowCount();
       	if($a==1){


// atualiza o banco
$sql = "UPDATE horas_exAum SET valor = :valor, numHoras = :numHoras, adicional = :adicional, numHorasPleit = :numHorasPleit, mesesTrabalhados = :mesesTrabalhados, totalSemFgts = :totalSemFgts, fgtsEmultas = :fgtsEmultas WHERE idProcesso = :idProcesso";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':valor', $valor);
$stmt->bindParam(':numHoras', $numHoras);
$stmt->bindParam(':fgtsEmultas', $fgtsEmultas);
$stmt->bindParam(':adicional', $adicional);
$stmt->bindParam(':numHorasPleit', $numHorasPleit);
$stmt->bindParam(':mesesTrabalhados', $mesesTrabalhados);
$stmt->bindParam(':totalSemFgts', $totalSemFgts);
$stmt->bindParam(':idProcesso', $id);


 
if ($stmt->execute())
{
   
    header('Location: ../opcoes.php?sucesso=1&idProcesso='.$id.'');
}
}
else if($a==0)
{ 
    // cadastra
$sql = "INSERT INTO horas_exAum (valor, numHoras, adicional, numHorasPleit, mesesTrabalhados,totalSemFgts, idProcesso, fgtsEmultas) VALUES (:valor, :numHoras, :adicional, :numHorasPleit, :mesesTrabalhados, :totalSemFgts, :idProcesso, :fgtsEmultas)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':valor', $valor);
$stmt->bindParam(':numHoras', $numHoras);
$stmt->bindParam(':fgtsEmultas', $fgtsEmultas);
$stmt->bindParam(':adicional', $adicional);
$stmt->bindParam(':numHorasPleit', $numHorasPleit);
$stmt->bindParam(':mesesTrabalhados', $mesesTrabalhados);
$stmt->bindParam(':totalSemFgts', $totalSemFgts);
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