<?php session_start();
require_once '../config/init.php';

// resgata os valores do formulário
$valor = isset($_POST['valor']) ? $_POST['valor'] : null;

function moeda($get_valor) {
$source = array('.', ',');
$replace = array('', '.');
$valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto
return $valor; //retorna o valor formatado para gravar no banco
}

$valor = moeda($valor);

$fgtsEmultas = isset($_POST['fgtsEmultas']) ? $_POST['fgtsEmultas'] : null;
$totalSemFgts = isset($_POST['totalSemFgts']) ? $_POST['totalSemFgts'] : null;
$numHoras = isset($_POST['numHoras']) ? $_POST['numHoras'] : null;
$mesesTrabalhados = isset($_POST['mesesTrabalhados']) ? $_POST['mesesTrabalhados'] : null;
$adicional = isset($_POST['adicional']) ? $_POST['adicional'] : null;
$numHorasPleit = isset($_POST['numHorasPleit']) ? $_POST['numHorasPleit'] : null;
$id = isset($_POST['idProcesso']) ? $_POST['idProcesso'] : null;


 
// validação (bem simples, mais uma vez)
if (empty($adicional) || empty($numHoras) || empty($valor)|| empty($numHorasPleit)|| empty($id))
{
    echo "Volte e preencha todos os campos";
    exit;
}
 
// a data vem no formato dd/mm/YYYY
// então precisamos converter para YYYY-mm-dd
// $isoDate = dateConvert($birthdate);


		$PDO = db_connect();
        $stmt = $PDO->prepare('SELECT * FROM hrIrreg WHERE idProcesso = :idProcesso');
        $stmt->bindValue(':idProcesso', $id);
        $stmt->execute();
       	$a = $stmt->rowCount();
       	if($a==1){


// atualiza o banco
$sql = "UPDATE hrIrreg SET valor = :valor, numHoras = :numHoras, adicional = :adicional, numHorasPleit = :numHorasPleit, mesesTrabalhados = :mesesTrabalhados, fgtsEmultas = :fgtsEmultas, totalSemFgts = :totalSemFgts WHERE idProcesso = :idProcesso";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':valor', $valor);
$stmt->bindParam(':fgtsEmultas', $fgtsEmultas);
$stmt->bindParam(':totalSemFgts', $totalSemFgts);
$stmt->bindParam(':numHoras', $numHoras);
$stmt->bindParam(':adicional', $adicional);
$stmt->bindParam(':numHorasPleit', $numHorasPleit);
$stmt->bindParam(':mesesTrabalhados', $mesesTrabalhados);
$stmt->bindParam(':idProcesso', $id);


 
if ($stmt->execute())
{
   
    header('Location: ../opcoes.php?sucesso=1&idProcesso='.$id.'');
}
}
else if($a==0)
{ 
    // cadastra
$sql = "INSERT INTO hrIrreg (valor, numHoras, adicional, numHorasPleit, mesesTrabalhados, idProcesso, fgtsEmultas, totalSemFgts) VALUES (:valor, :numHoras, :adicional, :numHorasPleit, :mesesTrabalhados, :idProcesso, :fgtsEmultas, :totalSemFgts)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':valor', $valor);
$stmt->bindParam(':numHoras', $numHoras);
$stmt->bindParam(':fgtsEmultas', $fgtsEmultas);
$stmt->bindParam(':totalSemFgts', $totalSemFgts);
$stmt->bindParam(':adicional', $adicional);
$stmt->bindParam(':numHorasPleit', $numHorasPleit);
$stmt->bindParam(':mesesTrabalhados', $mesesTrabalhados);
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