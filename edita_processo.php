<?php session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
  header('Location: ../index.html');
  exit();
}


require_once 'config/init.php';

 
// resgata os valores do formulário
$numProc = isset($_POST['numProc']) ? $_POST['numProc'] : null;
$nomeAutor = isset($_POST['nomeAutor']) ? $_POST['nomeAutor'] : null;
$admissao = isset($_POST['admissao']) ? $_POST['admissao'] : null;
$demissao = isset($_POST['demissao']) ? $_POST['demissao'] : null;
$remHab = isset($_POST['remHab']) ? $_POST['remHab'] : null;

//formata valor monetario para decimal
$source = array('.', ',');
$replace = array('', '.');
$remHab = str_replace($source, $replace, $remHab);


$fgtsParc = isset($_POST['fgtsParc']) ? $_POST['fgtsParc'] : null;
$multaFgts = isset($_POST['multaFgts']) ? $_POST['multaFgts'] : null;
$aumMed = isset($_POST['aumMed']) ? $_POST['aumMed'] : null;
$empSimpl = isset($_POST['empSimpl']) ? $_POST['empSimpl'] : null;
$danMor = isset($_POST['danMor']) ? $_POST['danMor'] : null;
$advDe = isset($_POST['advDe']) ? $_POST['advDe'] : null;
$reflexos = isset($_POST['reflexos']) ? $_POST['reflexos'] : null;
$mesesTrab = isset($_POST['mesesTrab']) ? $_POST['mesesTrab'] : null;

$reuEmpresa = isset($_POST['reuEmpresa']) ? $_POST['reuEmpresa'] : null;

 
// validação (bem simples, mais uma vez)
if (empty($numProc) || empty($nomeAutor) || empty($reuEmpresa))
{
    echo "Volte e preencha todos os campos";
    exit;
}
 
// a data vem no formato dd/mm/YYYY
// então precisamos converter para YYYY-mm-dd
// $isoDate = dateConvert($birthdate);
 
// atualiza o banco
$PDO = db_connect();

$sql = "UPDATE processo SET numProc = :numProc, nomeAutor = :nomeAutor, admissao = :admissao, demissao = :demissao, remHab = :remHab, fgtsParc = :fgtsParc, multaFgts = :multaFgts, aumMed = :aumMed, empSimpl = :empSimpl, danMor = :danMor, advDe = :advDe, reuEmpresa = :reuEmpresa, pagFgtsContr = :pagFgtsContr, reflexos = :reflexos, mesesTrab = :mesesTrab WHERE idProcesso = :idProcesso";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':numProc', $numProc);
$stmt->bindParam(':nomeAutor', $nomeAutor);
$stmt->bindParam(':admissao', $admissao);
$stmt->bindParam(':demissao', $demissao);
$stmt->bindParam(':remHab', $remHab);
$stmt->bindParam(':fgtsParc', $fgtsParc);
$stmt->bindParam(':multaFgts', $multaFgts);
$stmt->bindParam(':aumMed', $aumMed);
$stmt->bindParam(':empSimpl', $empSimpl);
$stmt->bindParam(':danMor', $danMor);
$stmt->bindParam(':advDe', $advDe);
$stmt->bindParam(':reuEmpresa', $reuEmpresa);
$stmt->bindParam(':pagFgtsContr', $pagFgtsContr);
$stmt->bindParam(':reflexos', $reflexos);
$stmt->bindParam(':mesesTrab', $mesesTrab);
$stmt->bindParam(':idProcesso', $_GET['idProcesso']);

$sql2 = "UPDATE danMor SET total = :total WHERE idProcesso = :idProcesso";
$stmt2 = $PDO->prepare($sql2);
$stmt2->bindParam(':idProcesso', $_GET['idProcesso']);

$total = $remHab * $danMor;

$stmt2->bindParam(':total', $total);
$stmt2->execute();


 
if ($stmt->execute())
{


$myArray[] = 'adicNot';
$myArray[] = 'aviso_previo';
$myArray[] = 'clt384';
$myArray[] = 'deciContr';
$myArray[] = 'decProp';
$myArray[] = 'difSalariais';



$myArray[] = 'horas_exAum';
$myArray[] = 'hrIrreg';
$myArray[] = 'insalubridade';
$myArray[] = 'interjornada';
$myArray[] = 'intrajornada';

$myArray[] = 'outrosInterv';
$myArray[] = 'periculosidade';

$myArray[] = 'saldoSal';

//se tem FGTS
	if($fgtsParc==1){


		 foreach ($myArray as $row4){ 
$sql = 'SELECT * FROM '.$row4.' WHERE idProcesso = :idProcesso';


		$stmt2 = $PDO->prepare($sql);
        $stmt2->bindValue(':idProcesso', $_GET['idProcesso']);
        $stmt2->execute();
        $valores2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        foreach ($valores2 as $row){ 


        		$valorfgtsEmultas = $row['totalSemFgts']*8/100;




        		$valormulta = $valorfgtsEmultas * $multaFgts / 100;
        		$valorfgtsEmultas = $valorfgtsEmultas + $valormulta;
	


        	$sql = "UPDATE ".$row4." SET fgtsEmultas = :fgtsEmultas WHERE idProcesso = :idProcesso";
			$stmt3 = $PDO->prepare($sql);
			$stmt3->bindParam(':idProcesso', $_GET['idProcesso']);
			$stmt3->bindParam(':fgtsEmultas', $valorfgtsEmultas);
			$stmt3->execute();

	}
}

} else {


	$sql = "UPDATE adicNot SET fgtsEmultas = '0' WHERE idProcesso = :idProcesso";
			$stmt3 = $PDO->prepare($sql);
			$stmt3->bindParam(':idProcesso', $_GET['idProcesso']);
			$stmt3->execute();

}





















	
	$id = $PDO->lastInsertId();
	
    header('Location: opcoes.php?idProcesso='.$_GET['idProcesso'].'');
}
else
{
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}