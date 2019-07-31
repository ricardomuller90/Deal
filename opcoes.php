<?php session_start();
require_once 'config/init.php'; ?>

<!doctype html>
<html lang="en">
<head>

    <style type="text/css">.link-menu{display: inline;  color: #000; font-size:14px; text-decoration: underline; margin-right: 5px}</style>
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


  <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function(){ 
            setTimeout(function() {
                $("#goaway").fadeOut().empty();
            }, 4000);
        }, false);
    </script>
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

                   <li >
                    <a href="novo_processo.php">
                        <i class="pe-7s-user"></i>
                        <p>Novo Processo</p>
                    </a>
                </li>
                <li class="active">
                    <a href="consulta_processo.php">
                        <i class="pe-7s-note2"></i>
                        <p>Consultar Processo</p>
                    </a>
                </li>
                <!--<li>
                    <a href="dashboard.html">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="user.html">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li>
                    <a href="table.html">
                        <i class="pe-7s-note2"></i>
                        <p>Table List</p>
                    </a>
                </li>
                <li>
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
                <li class="active">
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
					
					
                       <!-- <li>
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
                            <a href="logout.php">
                                <p>Sair</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>

<?php   $PDO = db_connect();      
        $stmt = $PDO->prepare('SELECT * FROM processo WHERE idProcesso = :idProcesso');
        $stmt->bindValue(':idProcesso', $_GET['idProcesso']);
        $stmt->execute();
        $valores = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($valores as $row){ ?>


        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="header">
                        <h4 class="title" style="width: 100%">Processo N° <?php echo $row['numProc'];?>
                       <div style="float: right;"><a href="editar_processo.php?idProcesso=<?php echo $_GET['idProcesso']?>" class="link-menu">Editar processo</a>
                        <a href="resumo_processo.php?idProcesso=<?php echo $_GET['idProcesso']?>" class="link-menu">Ver resumo</a></div></h4>
                        <p class="category"><b>Autor:</b> <?php echo $row['nomeAutor'];?></br>
                            <b>Empresa:</b> <?php echo $row['reuEmpresa'];?></br>
                            <?php if(isset($_GET['sucesso'])){if($_GET['sucesso']==1){?><div id="goaway" style="color:#fff; background: #00a000; width: 300px;  font-size: 13px; height: 15px; text-align: center">Cálculo salvo com sucesso.</div><?php }}?>

                      <!--  <a target="_blank" href="https://github.com/mouse0270">Robert McIntosh</a>. Please checkout the <a href="http://bootstrap-notify.remabledesigns.com/" target="_blank">full documentation.</a></p>-->
<?php } ?>
                    </div>
                    



                    <!--<div class="content">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Notifications Style</h5>
                                <div class="alert alert-info">
                                    <span>This is a plain notification</span>
                                </div>
                                <div class="alert alert-info">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span>This is a notification with close button.</span>
                                </div>
                                <div class="alert alert-info alert-with-icon" data-notify="container">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span data-notify="icon" class="pe-7s-bell"></span>
                                    <span data-notify="message">This is a notification with close button and icon.</span>
                                </div>
                                <div class="alert alert-info alert-with-icon" data-notify="container">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span data-notify="icon" class="pe-7s-bell"></span>
                                    <span data-notify="message">This is a notification with close button and icon and have many lines. You can see that the icon and the close button are always vertically aligned. This is a beautiful notification. So you don't have to worry about the style.</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5>Notification states</h5>
                                <div class="alert alert-info">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span><b> Info - </b> This is a regular notification made with ".alert-info"</span>
                                </div>
                                <div class="alert alert-success">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span><b> Success - </b> This is a regular notification made with ".alert-success"</span>
                                </div>
                                <div class="alert alert-warning">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span><b> Warning - </b> This is a regular notification made with ".alert-warning"</span>
                                </div>
                                <div class="alert alert-danger">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span><b> Danger - </b> This is a regular notification made with ".alert-danger"</span>
                                </div>
                            </div>
                        </div> -->
                        <br>
                        <br>
                        <div class="places-buttons">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 text-center">
                                    <h5>Cálculos e opções 
                                        <!--<p class="category">Click to view notifications</p>-->
                                    </h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 col-md-offset-2">
                                    <button class="btn btn-default btn-block" onclick="window.location = '\insalubridade?idProcesso=<?php echo $_GET['idProcesso']?>';">Insalubridade</button>
                                </div>
                                
                                <div class="col-md-2">
                                    <button class="btn btn-default btn-block" onclick="window.location = '\periculosidade?idProcesso=<?php echo $_GET['idProcesso']?>';">Periculosidade</button>
                                </div>


                                <div class="col-md-2">
                                    <button class="btn btn-default btn-block" onclick="window.location = '\dif-salariais?idProcesso=<?php echo $_GET['idProcesso']?>';">Diferenças Salariais</button>
                                </div>
								
								<div class="col-md-2">
                                      <button class="btn btn-default btn-block" onclick="window.location = '\hora_ex?idProcesso=<?php echo $_GET['idProcesso']?>';">Horas extras</button>
                                    
                                </div>

                                
                            </div>





                            <div class="row">

                                <div class="col-md-2 col-md-offset-2">
                                    <button class="btn btn-default btn-block" onclick="window.location = '\intrajornada?idProcesso=<?php echo $_GET['idProcesso']?>';">Horas Intrajornada</button>
                                </div>
                                 <div class="col-md-2">
                                    <button class="btn btn-default btn-block" onclick="window.location = '\interjornada?idProcesso=<?php echo $_GET['idProcesso']?>';">Horas Interjornada</button>
                                </div>
                                <div class="col-md-4 col-md">
                                    <button class="btn btn-default btn-block" onclick="window.location = '\horasCompensadas?idProcesso=<?php echo $_GET['idProcesso']?>';">Horas compensadas e irregulares</button>
                                </div>

                            </div>   


                                            <div class="row">
                                <div class="col-md-2 col-md-offset-2">
                                    <button class="btn btn-default btn-block"  onclick="window.location = '\clt384?idProcesso=<?php echo $_GET['idProcesso']?>';">CLT 384</button>
                                </div>
                            <div class="col-md-2">
                                    <button class="btn btn-default btn-block" onclick="window.location = '\outrosInterv?idProcesso=<?php echo $_GET['idProcesso']?>';">Outros intervalos</button>
                                </div>
                               
                                <div class="col-md-2">
                                    <button class="btn btn-default btn-block" onclick="window.location = '\domingosFeriados?idProcesso=<?php echo $_GET['idProcesso']?>';">Domingos e feriados</button>
                                </div>
                                  <div class="col-md-2">
                                        <button class="btn btn-default btn-block" onclick="window.location = '\adicional_noturno?idProcesso=<?php echo $_GET['idProcesso']?>';">Adicional Noturno</button>
                                    
                                  
                                </div>
                            </div>


                                                  <div class="row">
                                <div class="col-md-2 col-md-offset-2">
                                    <button class="btn btn-default btn-block"  onclick="window.location = '\sferiasVencSimp?idProcesso=<?php echo $_GET['idProcesso']?>';">Férias simples</button>
                                </div>
                            <div class="col-md-2">
                                     <button class="btn btn-default btn-block" onclick="window.location = '\sferiasVencDobro?idProcesso=<?php echo $_GET['idProcesso']?>';">Férias em dobro</button>
                                </div>
                               <div class="col-md-2">
                                    <button class="btn btn-default btn-block" onclick="window.location = '\sferias_prop?idProcesso=<?php echo $_GET['idProcesso']?>';">Férias proporcionais</button>
                                </div>
                                  <div class="col-md-2">
                                      <button class="btn btn-default btn-block" onclick="window.location = '\aviso-previo?idProcesso=<?php echo $_GET['idProcesso']?>';">Aviso Prévio</button>
                                    
                                </div>
                                <!--<div class="col-md-2">
                                    <button class="btn btn-default btn-block" onclick="window.location = '\danoMoral?idProcesso=<?php echo $_GET['idProcesso']?>';">Dano Moral</button>
                                </div>-->
                            </div>



                            <div class="row">

                                <div class="col-md-2 col-md-offset-2">
                                          <button class="btn btn-default btn-block" onclick="window.location = '\decimo_terceiro_proporcional?idProcesso=<?php echo $_GET['idProcesso']?>';">13° Proporcional</button>
                             
                                </div>
                                 <div class="col-md-2">
                                 <button class="btn btn-default btn-block"  onclick="window.location = '\decTercContr?idProcesso=<?php echo $_GET['idProcesso']?>';">13° do contrato</button>
                                </div>
                                 
                                <div class="col-md-2">
                              <button class="btn btn-default btn-block" onclick="window.location = '\danoMoral?idProcesso=<?php echo $_GET['idProcesso']?>';">Dano Moral</button>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-default btn-block" onclick="window.location = '\multas?idProcesso=<?php echo $_GET['idProcesso']?>';">Multas</button>
                                </div>

                            </div>   









                                    <div class="row">

                               
                                 <div class="col-md-2 col-md-offset-2">
                                    <button class="btn btn-default btn-block" onclick="window.location = '\saldoSalario?idProcesso=<?php echo $_GET['idProcesso']?>';">Saldo Salário</button>
                                </div>
                                <div class="col-md-2">
                                        <button class="btn btn-default btn-block" onclick="window.location = '\sfgtsContr?idProcesso=<?php echo $_GET['idProcesso']?>';">FGTS do contrato</button>
                                   
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-default btn-block" onclick="window.location = '\ind_div?idProcesso=<?php echo $_GET['idProcesso']?>';">Indenizações diversas</button>
                                </div>
                               
                                
                            </div>     
      
            

                                 <!-- <div class="row">
                                <div class="col-md-2 col-md-offset-2">
                                    <button class="btn btn-default btn-block"  onclick="window.location = '\decTercContr?idProcesso=<?php echo $_GET['idProcesso']?>';">13° do contrato</button>
                                </div>
                            <div class="col-md-2">
                                    <button class="btn btn-default btn-block" onclick="window.location = '\outrosInterv?idProcesso=<?php echo $_GET['idProcesso']?>';">Outros intervalos</button>
                                </div>
                               
                                <div class="col-md-2">
                                    <button class="btn btn-default btn-block" onclick="window.location = '\domingosFeriados?idProcesso=<?php echo $_GET['idProcesso']?>';">Domingos e feriados</button>
                                </div>
                                  <div class="col-md-2">
                                    <button class="btn btn-default btn-block" onclick="window.location = '\sferiasVencDobro?idProcesso=<?php echo $_GET['idProcesso']?>';">Férias em dobro</button>
                                </div>-->
                            </div>
                        </div>
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

</html>
