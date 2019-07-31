<?php session_start();
require_once '../config/init.php';

// resgata os valores do formulário
$valor = isset($_POST['valor']) ? $_POST['valor'] : null;
$totalSemFgts = isset($_POST['totalSemFgts']) ? $_POST['totalSemFgts'] : null;
$fgtsEmultas = isset($_POST['fgtsEmultas']) ? $_POST['fgtsEmultas'] : null;
function moeda($get_valor) {
$source = array('.', ',');
$replace = array('', '.');
$valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto
return $valor; //retorna o valor formatado para gravar no banco
}

$valor = moeda($valor);


$numHoras = isset($_POST['numHoras']) ? $_POST['numHoras'] : null;
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
        $stmt = $PDO->prepare('SELECT * FROM interjornada WHERE idProcesso = :idProcesso AND idUsuario = :idUsuario');
        $stmt->bindValue(':idProcesso', $id);
        $stmt->bindValue(':idUsuario', $_SESSION['id']);
        $stmt->execute();
       	$a = $stmt->rowCount();
       	if($a==1){


// atualiza o banco
$sql = "UPDATE interjornada SET valor = :valor, numHoras = :numHoras, totalSemFgts = :totalSemFgts, adicional = :adicional, numHorasPleit = :numHorasPleit, fgtsEmultas = :fgtsEmultas WHERE idProcesso = :idProcesso AND idUsuario = :idUsuario";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':valor', $valor);
$stmt->bindParam(':totalSemFgts', $totalSemFgts);
$stmt->bindParam(':numHoras', $numHoras);
$stmt->bindParam(':adicional', $adicional);
$stmt->bindParam(':numHorasPleit', $numHorasPleit);
$stmt->bindParam(':idProcesso', $id);
$stmt->bindParam(':fgtsEmultas', $fgtsEmultas);
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