<?php session_start();
require_once 'config/init.php'; ?>

<?php   $PDO = db_connect();      
        $stmt = $PDO->prepare('SELECT * FROM processo WHERE idProcesso = :idProcesso');
        $stmt->bindValue(':idProcesso', $_GET['idProcesso']);
        $stmt->execute();
        $valores = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($valores as $row){ 


      $numProc = $row['numProc']; 
      $nomeAutor = $row['nomeAutor'];
      $reuEmpresa = $row['reuEmpresa'];
      $admissao = $row['admissao'];
      $demissao = $row['demissao'];
      $remHab = $row['remHab'];
      $fgtsParc = $row['fgtsParc'];
      $multaFgts = $row['multaFgts'];
      $aumMed = $row['aumMed'];
      $pagFgtsContr = $row['pagFgtsContr'];
      $empSimpl = $row['empSimpl'];
      $danMor = $row['danMor'];
      $advDe = $row['advDe'];
      $mesesTrab = $row['mesesTrab'];
}




/*$date = new DateTime($admissao); // Data de Nascimento
$idade_acompanhamento = $date->diff(new DateTime($demissao)); // Data do Acompanhamento
$idade_acompanhamento_mostra_anos = $idade_acompanhamento->format('%Y')*12;
$idade_acompanhamento_mostra_meses = $idade_acompanhamento->format('%m');
*/

$total_meses = $mesesTrab;




if($total_meses>60){
    $total_meses = '60';
}



?>
                     




<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="plugins/Remodal-1.1.1/dist/remodal.css">
        <link rel="stylesheet" href="plugins/Remodal-1.1.1/dist/remodal-default-theme.css">
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Sistema de Cálculos - Laranja & Marranghello</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />



</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="orange" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<div class="sidebar-wrapper">
            <div class="logo">
           <img src="img/logo1.png" style="width:100%">
            </div>

            <ul class="nav">
                <!--<li>
                    <a href="dashboard.html">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>-->
                <li class="active">
                    <a href="novo_processo.php">
                        <i class="pe-7s-user"></i>
                        <p>Novo Processo</p>
                    </a>
                </li>
                <li>
                    <a href="consulta_processo.php">
                        <i class="pe-7s-note2"></i>
                        <p>Consultar Processo</p>
                    </a>
                </li>
                <!--<li>
                    <a href="typography.html">
                        <i class="pe-7s-news-paper"></i>
                        <p>Typography</p>
                    </a>
                </li>
                <li>
                    <a href="icons.html">
                        <i class="pe-7s-science"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="pe-7s-map-marker"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
				<li class="active-pro">
                    <a href="upgrade.html">
                        <i class="pe-7s-rocket"></i>
                        <p>Upgrade to PRO</p>
                    </a>
                </li>-->
            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--<a class="navbar-brand" href="#">User</a>-->
                </div>
                <div class="collapse navbar-collapse">
                              <ul class="nav navbar-nav navbar-left">
                    <li>
                      <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>"><p>Voltar</p></a>
                    <!-- 
                       <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                                <p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li> 
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <span class="notification hidden-sm hidden-xs">5</span>
                                    <p class="hidden-lg hidden-md">
                                        5 Notifications
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
                                <p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>-->
                    </ul>

                      <ul class="nav navbar-nav navbar-right">
                       <!-- <li>
                           <a href="">
                               <p>Account</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
										Dropdown
										<b class="caret"></b>
									</p>

                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li>-->
                        <li>
                            <a href="#">
                                <p>Sair</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Resumo do processo</h4>
                            </div>
                            <div class="content">
                                <form action="edita_processo.php?idProcesso=<?php echo $_GET['idProcesso']?>" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>N° do Processo</label>
                                                <input type="text" class="form-control" name="numProc" value="<?php echo $numProc; ?>" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                				 <label>Nome Autor</label>
                                                <input type="text" name="nomeAutor" class="form-control" value="<?php echo $nomeAutor; ?>" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                  <label>Empresa</label>
                                                <input type="text" name="reuEmpresa" class="form-control" value="<?php echo $reuEmpresa; ?>" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                          
                                            </div>
                                        </div>
                                    </div>



<?php   $PDO = db_connect();      
        $stmt = $PDO->prepare('SELECT SUM(i.totalSemFgts + peri.totalSemFgts + dif.totalSemFgts +  he.totalSemFgts +an.totalSemFgts+ intraj.totalSemFgts+ interj.totalSemFgts+hi.totalSemFgts+ ss.totalSemFgts + dp.totalSemFgts + dc.totalSemFgts +  c384.totalSemFgts + oi.totalSemFgts + domFer.totalSemFgts) as subtotal FROM processo as p INNER JOIN insalubridade as i ON i.idProcesso = p.idProcesso INNER JOIN periculosidade as peri ON peri.idProcesso = p.idProcesso INNER JOIN difSalariais as dif ON dif.idProcesso = p.idProcesso  INNER JOIN horas_exAum as he ON he.idProcesso = p.idProcesso INNER JOIN interjornada as interj ON interj.idProcesso = p.idProcesso INNER JOIN intrajornada as intraj ON intraj.idProcesso = p.idProcesso INNER JOIN adicNot as an ON an.idProcesso = p.idProcesso  INNER JOIN clt384 as c384 ON c384.idProcesso = p.idProcesso INNER JOIN outrosInterv as oi ON oi.idProcesso = p.idProcesso INNER JOIN domingosFeriados as domFer ON domFer.idProcesso = p.idProcesso INNER JOIN hrIrreg as hi ON hi.idProcesso = p.idProcesso INNER JOIN decProp as dp ON dp.idProcesso = p.idProcesso INNER JOIN saldoSal as ss ON ss.idProcesso = p.idProcesso INNER JOIN deciContr as dc ON dc.idProcesso = p.idProcesso WHERE p.idProcesso=:idProcesso');
        $stmt->bindValue(':idProcesso', $_GET['idProcesso']);
        $stmt->execute();
        $valores = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($valores as $row){
$pt = $row['subtotal'];
$parcelasTrib = number_format($pt,2,",",".");
}
?>


                                        <div class="row" style="margin-top: 60px">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                 <label>Total das parcelas tributáveis</label>
                                                <input type="text" name="remHab" class="form-control" value="R$ <?php echo $parcelasTrib; ?>" readonly="readonly">
                                            </div>
                                        </div>







<?php        
        $stmt2 = $PDO->prepare('SELECT SUM(m.total477 + m.total467 + id.total + ap.totalSemFgts+ fv.totalSemFgts+ fvd.totalSemFgts + fp.totalSemFgts) as subtotal FROM multas as m 
            INNER JOIN indDiv as id ON id.idProcesso = m.idProcesso INNER JOIN aviso_previo as ap ON ap.idProcesso = m.idProcesso 
            INNER JOIN feriasVencidas as fv ON fv.idProcesso = m.idProcesso INNER JOIN feriasVencidasDobro as fvd ON fvd.idProcesso = m.idProcesso INNER JOIN feriasProp as fp ON fp.idProcesso = m.idProcesso 
            WHERE m.idProcesso=:idProcesso');
        $stmt2->bindValue(':idProcesso', $_GET['idProcesso']);
        $stmt2->execute();
        $valores = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        foreach ($valores as $row){
$pnt = $row['subtotal'];

$valorDanMor = $danMor * $remHab;

$pnt = $pnt + $valorDanMor;



$parcelasTrib2 = number_format($pnt,2,",",".");
}
?>















                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Total das parcelas não tributáveis</label>
                                                <input type="text" name="remHab" class="form-control" value="R$ <?php echo $parcelasTrib2; ?>" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>



<!-- segunda linha -->






<?php

    $PDO = db_connect(); 

    $stmt = $PDO->prepare('SELECT * FROM fgtsContr WHERE idProcesso = :idProcesso');
    $stmt->bindValue(':idProcesso', $_GET['idProcesso']);
    $stmt->execute();
       
    $valores = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($valores as $row){
    if (!empty($row['total'])){
        $tfc = $row['total'];
    $tFgtsC = number_format($row['total'],2,",",".");}else{
      $tFgtsC = '0'; 
       $tfc = 0 ; 
    }





}
?>

                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                 <label>Total do FGTS do contrato</label>
                                                <input type="text" name="remHab" class="form-control" value="R$ <?php echo $tFgtsC; ?>" readonly="readonly">
                                            </div>
                                        </div>







<?php        
        $stmt3 = $PDO->prepare('SELECT SUM(ins.fgtsEmultas + per.fgtsEmultas + an.fgtsEmultas + ap.fgtsEmultas + dp.fgtsEmultas + he.fgtsEmultas + hi.fgtsEmultas + interj.fgtsEmultas + intraj.fgtsEmultas + s.fgtsEmultas  + oi.fgtsEmultas  + df.fgtsEmultas+ c3.fgtsEmultas+ dif.fgtsEmultas + decCont.fgtsEmultas) as subtotal FROM processo as p INNER JOIN adicNot as an ON an.idProcesso = p.idProcesso INNER JOIN aviso_previo as ap ON p.idProcesso = ap.idProcesso INNER JOIN decProp as dp ON dp.idProcesso = p.idProcesso  INNER JOIN horas_exAum as he ON he.idProcesso = p.idProcesso INNER JOIN hrIrreg as hi ON hi.idProcesso = p.idProcesso INNER JOIN insalubridade as ins ON ins.idProcesso = p.idProcesso INNER JOIN interjornada as interj ON interj.idProcesso = p.idProcesso INNER JOIN intrajornada as intraj ON intraj.idProcesso = p.idProcesso INNER JOIN periculosidade as per ON p.idProcesso = per.idProcesso INNER JOIN saldoSal as s ON s.idProcesso = p.idProcesso  INNER JOIN outrosInterv as oi ON oi.idProcesso = p.idProcesso  INNER JOIN domingosFeriados as df ON df.idProcesso = p.idProcesso  INNER JOIN clt384 as c3 ON c3.idProcesso = p.idProcesso INNER JOIN difSalariais as dif ON dif.idProcesso = p.idProcesso INNER JOIN deciContr as decCont ON decCont.idProcesso = p.idProcesso WHERE p.idProcesso=:idProcesso');

        $stmt3->bindValue(':idProcesso', $_GET['idProcesso']);
        $stmt3->execute();
        $valores = $stmt3->fetchAll(PDO::FETCH_ASSOC);
        foreach ($valores as $row){

$tf=$row['subtotal'];
$fgtsTotal = number_format($row['subtotal'],2,",",".");
}
?>





                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Total do FGTS sobre as parcelas deferidas</label>
                                                <input type="text" class="form-control" value="R$ <?php echo $fgtsTotal; ?>" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>








<?php

function moeda($get_valor) {
$source = array('.', ',');
$replace = array('', '.');
$valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto
return $valor; //retorna o valor formatado para gravar no banco
}

$parcelasTrib = moeda($parcelasTrib);


?>


                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                 <label>INSS Empregado</label>
                                                 <?php $inss =  $parcelasTrib * 11 /100;?>
                                                  <?php $inssFloat = $inss; ?>
                                                 <?php $inss = number_format($inss, 2, ',', '.'); ?>

                                                <input type="text" class="form-control" value="R$ <?php echo $inss;?>" readonly="readonly">
                                            </div>
                                        </div>






                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Inss Empregador</label>
                                                <?php 

                                                if($empSimpl == 0){
                                                  $inssEmp =  $parcelasTrib *21 /100;
                                                  $inssEmpFloat = $inssEmp; 
                                                  $inssE = number_format($inssEmpFloat, 2, ',', '.');
                                              } 

                                                  else{ $inssE = 'NÃO TEM.';  $inssEmpFloat = 0; }



                                                    ?>
                                         
                                                <input type="text" class="form-control" value="<?php echo $inssE; ?>" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>











                                <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                                      <label>Imposto de renda</label>
                                                <?php $ir = $parcelasTrib - $inssFloat; $irMes = $ir/$total_meses;

                                                $irMes =  number_format($irMes,2,".","");
                                          
                                                $l1 = 1903.98; $l2 = 1903.99;$l3 = 2826.65;

                                                                                              
                                                if($irMes<=1903.98){$total = 'NÃO TEM.'; $totalF = 0;}
                                                    else if($irMes>= 1903.99 && $irMes<=2826.65){
                                                        
                                                        $total = (($irMes *7.5)/100) - 142.8;
                                                        $totalF = $total *$total_meses;
                                                   
                                                        $total = number_format($totalF, 2, ',', '.');
                                                        $total = 'R$ '.$total;
                                                }
                                                
                                                else if($irMes>=2826.66 && $irMes<=3751.05){
                                                        $total = ($irMes *15/100) - 354.80;
                                                         $totalF = $total *$total_meses;
                                                        $total = number_format($totalF, 2, ',', '.');
                                                        $total = 'R$ '.$total;
                                                }
                                                
                                                else if($irMes>=3751.06 && $irMes<=4664.68){
                                                        $total = ($irMes *22.50/100) - 636.13;
                                                         $totalF = $total *$total_meses;
                                                        $total = number_format($totalF, 2, ',', '.');
                                                        $total = 'R$ '.$total;
                                                }
                                                else if($irMes>4664.68){

                                                        $total = ($irMes *27.50/100) - 869.36;
                                                        $totalF = $total *$total_meses;
                                                        $total = number_format($totalF, 2, ',', '.');
                                                        $total = 'R$ '.$total;
                                                }

                                                 ?>
                                                
                                                
                                               
                                                <input type="text" class="form-control" value="<?php echo $total ; ?>" readonly="readonly">
                                            </div>
                                        </div>


                                    </div>




                                   <?php $totalAutorFloat = $pt + $pnt + $tfc + $tf - $inssFloat - $totalF; 
                                   $totalAutor = number_format($totalAutorFloat, 2, ',', '.');
                                     echo '<input type="hidden" class="form-control" id="totalAutorFloat" value='.$totalAutorFloat.'>';
                                  ?>



                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                 <label>Total devido ao autor</label>
                                                <input type="text"  class="form-control" value="R$ <?php echo $totalAutor; ?>" id="totalAutorRed" readonly="readonly">
                                            </div>
                                        </div>



                                        <?php $totalEmpresa = $totalAutorFloat + $inssFloat + $inssEmpFloat + $totalF;

                                          echo '<input type="hidden" class="form-control" id="totalEmpresa" value='.$totalEmpresa.'>';

                                   $totalEmpresa = number_format($totalEmpresa, 2, ',', '.');
                                  ?>



                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Total a ser pago pela empresa</label>
                                                <input type="text" class="form-control" value="R$ <?php echo $totalEmpresa;?>" id="totalEmpresaRed" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>







                                     <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php  if($advDe == '2'){ ?><label>Redutor <a href="#modal3"><img src="img/ajuda.png" width="18"></a></label>
                                                
                                              <input type="text" name="redutor" maxlength="2" id="redutor" class="form-control" style="width: 100px; display: inline-block;"> <span style="display: inline-block;">%</span>


                                            <?php } ?>
                                            </div>
                                        </div>



                                        <?php $totalEmpresa = $totalAutorFloat + $inssFloat + $inssEmpFloat + $totalF;
                                   $totalEmpresa = number_format($totalEmpresa, 2, ',', '.');
                                  ?>



                                        <div class="col-md-6">
                                            <div class="form-group">
                                               
                                            </div>
                                        </div>
                                    </div>








                                 <!--   <button type="submit" class="btn btn-info btn-fill pull-right">Salvar</button>-->
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4"><!--
                        <div class="card card-user">
                            <div class="image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" src="assets/img/faces/face-3.jpg" alt="..."/>

                                      <h4 class="title">Mike Andrew<br />
                                         <small>michael24</small>
                                      </h4>
                                    </a>
                                </div>
                                <p class="description text-center"> "Lamborghini Mercy <br>
                                                    Your chick she so thirsty <br>
                                                    I'm in that two seat Lambo"
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                            </div>
                        </div>-->
                    </div>

                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <!--<nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>-->
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.laranja-marranghello.com.br">Laranja & Marranghello</a>
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
<script>




    
    


    $("#redutor").blur(function(){ 

           var redutor = document.getElementById("redutor").value;


            var totalEmpresa = document.getElementById("totalEmpresa").value;

            var reducaoEmpresa = totalEmpresa*redutor/100;

            var valorReduE = totalEmpresa - reducaoEmpresa;

            valorReduE = valorReduE.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});

            $( "#totalEmpresaRed" ).val(valorReduE);


            var totalAutor = document.getElementById("totalAutorFloat").value;



            var reducaoAutor = totalAutor * redutor/100;



            var valorReduA = totalAutor - reducaoAutor;

            valorReduA = valorReduA.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});

            $( "#totalAutorRed" ).val(valorReduA);
      


});


</script>
<div class="remodal" data-remodal-id="modal3">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h1>Redutor</h1>
  <p>
Se você é empresa poderá aplicar um redutor no total dos cálculos, pois como todo o cálculo de acordo está sendo efetuado pelo último salário percebido pelo Autor, o mesmo está orçado e sendo assim, poderá aplicar redutores para ter uma base melhor para acordo, prevendo assim, uma média melhor aplicada durante todo o cálculo.</br>
O redutor é de escolha do advogado, sugerimos sempre um redutor de 30%
  </p>

  <br>
  <!--<button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>-->
  <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
</div>
<script src="plugins/Remodal-1.1.1/dist/remodal.min.js"></script>
</html>
