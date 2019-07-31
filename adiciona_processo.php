<?php session_start();
require_once 'config/init.php';
 
// resgata os valores do formulário
$numProc = isset($_POST['numProc']) ? $_POST['numProc'] : null;
$reflexos = isset($_POST['reflexos']) ? $_POST['reflexos'] : null;
$nomeAutor = isset($_POST['nomeAutor']) ? $_POST['nomeAutor'] : null;
$admissao = isset($_POST['admissao']) ? $_POST['admissao'] : null;
$demissao = isset($_POST['demissao']) ? $_POST['demissao'] : null;
$remHab = isset($_POST['remHab']) ? $_POST['remHab'] : null;
$fgtsParc = isset($_POST['fgtsParc']) ? $_POST['fgtsParc'] : null;
$multaFgts = isset($_POST['multaFgts']) ? $_POST['multaFgts'] : null;
$aumMed = isset($_POST['aumMed']) ? $_POST['aumMed'] : null;
$empSimpl = isset($_POST['empSimpl']) ? $_POST['empSimpl'] : null;
$danMor = isset($_POST['danMor']) ? $_POST['danMor'] : null;
$advDe = isset($_POST['advDe']) ? $_POST['advDe'] : null;
$pagFgtsContr = isset($_POST['pagFgtsContr']) ? $_POST['pagFgtsContr'] : null;
$reuEmpresa = isset($_POST['reuEmpresa']) ? $_POST['reuEmpresa'] : null;
$mesesTrab = isset($_POST['mesesTrab']) ? $_POST['mesesTrab'] : null;

 
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
$sql = "INSERT INTO processo (numProc, nomeAutor, admissao, demissao, remHab, fgtsParc, multaFgts, aumMed, empSimpl, danMor, advDe, reuEmpresa, pagFgtsContr, reflexos, mesesTrab, idUsuario) VALUES (:numProc, :nomeAutor, :admissao, :demissao, :remHab, :fgtsParc, :multaFgts, :aumMed, :empSimpl, :danMor, :advDe, :reuEmpresa, :pagFgtsContr, :reflexos, :mesesTrab, :idUsuario)";
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
$stmt->bindParam(':idUsuario', $_SESSION['id']);


 
if ($stmt->execute())
{
	
	$id = $PDO->lastInsertId();










/*/




							$sql2 = "  INSERT INTO deciContr (idProcesso, idUsuario, totalSemFgts, fgtsEmultas) VALUES (:idProcesso, :idUsuario, 0 ,0); 
							INSERT INTO insalubridade (idProcesso, idUsuario, totalSemFgts, fgtsEmultas) VALUES  (:idProcesso, :idUsuario, 0 ,0);
							INSERT INTO periculosidade  (idProcesso, idUsuario, totalSemFgts, fgtsEmultas) VALUES (:idProcesso, :idUsuario, 0 ,0);
							INSERT INTO adicNot (idProcesso, idUsuario, totalSemFgts, fgtsEmultas) VALUES (:idProcesso, :idUsuario, 0 ,0);
							INSERT INTO aviso_previo (idProcesso, idUsuario, totalSemFgts, fgtsEmultas) VALUES  (:idProcesso, :idUsuario, 0 ,0);
							INSERT INTO decProp (idProcesso, idUsuario, totalSemFgts, fgtsEmultas)  VALUES (:idProcesso, :idUsuario, 0 ,0);
							INSERT INTO difSalariais (idProcesso, idUsuario, totalSemFgts, fgtsEmultas)  VALUES(:idProcesso, :idUsuario, 0 ,0);
							INSERT INTO feriasProp (idProcesso, idUsuario, totalSemFgts, fgtsEmultas)  VALUES (:idProcesso, :idUsuario, 0 ,0);
							INSERT INTO feriasVencidas(idProcesso, idUsuario, totalSemFgts) VALUES (:idProcesso, :idUsuario, 0); 
							INSERT INTO fgtsContr (idProcesso, idUsuario, total, calcular, valorMultaFgts)  VALUES (:idProcesso, :idUsuario, 0 ,0, 0);
							INSERT INTO horas_exAum(idProcesso, idUsuario, totalSemFgts, fgtsEmultas)  VALUES (:idProcesso, :idUsuario, 0 ,0);
							INSERT INTO hrIrreg(idProcesso, idUsuario, totalSemFgts, fgtsEmultas)  VALUES (:idProcesso, :idUsuario, 0 ,0);
							INSERT INTO indDiv (idProcesso, idUsuario, valor, total)  VALUES(:idProcesso, :idUsuario, 0 ,0);
							INSERT INTO interjornada (idProcesso, idUsuario, totalSemFgts, fgtsEmultas)  VALUES (:idProcesso, :idUsuario, 0 ,0);
							INSERT INTO intrajornada (idProcesso, idUsuario, totalSemFgts, fgtsEmultas) VALUES (:idProcesso, :idUsuario, 0 ,0);
							INSERT INTO multas (idProcesso, idUsuario, calc467,calc477,total467,total477) VALUES (:idProcesso, :idUsuario, 0,0,0,0);
							INSERT INTO saldoSal (idProcesso, idUsuario, totalSemFgts, fgtsEmultas)  VALUES (:idProcesso, :idUsuario, 0 ,0);
							INSERT INTO clt384(idProcesso, idUsuario, totalSemFgts, fgtsEmultas)  VALUES (:idProcesso, :idUsuario, 0 ,0); 
							INSERT INTO outrosInterv(idProcesso, idUsuario, totalSemFgts, fgtsEmultas)  VALUES(:idProcesso, :idUsuario, 0 ,0);
							INSERT INTO feriasVencidasDobro (idProcesso, idUsuario, totalSemFgts)  VALUES (:idProcesso, :idUsuario, 0);
							 INSERT INTO domingosFeriados(idProcesso, idUsuario, totalSemFgts, fgtsEmultas)  VALUES(:idProcesso, :idUsuario, 0 ,0);";

$stmt2 = $PDO->prepare($sql2);
$stmt2->bindParam(':idProcesso', $id);
$totalDanMor = $danMor * $remHab;
$stmt2->bindParam(':idUsuario', $_SESSION['id']);
$stmt2->execute();










*/


	
    header('Location: opcoes.php?idProcesso='.$id.'');
}
else
{
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}