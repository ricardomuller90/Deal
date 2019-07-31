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
      $reflexos = $row['reflexos'];
      $mesesTrab = $row['mesesTrab'];
                     
} ?>

<!doctype html>
<html lang="en">
<head>
  <script>
  function formatarMoeda() {
  var elemento = document.getElementById('valor');
  var valor = elemento.value;
  
  valor = valor + '';
  valor = parseInt(valor.replace(/[\D]+/g,''));
  valor = valor + '';
  valor = valor.replace(/([0-9]{2})$/g, ",$1");

  if (valor.length > 6) {
    valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
  }

  elemento.value = valor;

   if(valor === ""){
         valor =  0;
      }else{
         valor = valor.replace(".","");
         valor = valor.replace(",",".");
         valor = parseFloat(valor);
      }
      $( "#remHab" ).val(valor);

}

function converteMoedaFloat(valor){
      
      if(valor === ""){
         valor =  0;
      }else{
         valor = valor.replace(".","");
         valor = valor.replace(",",".");
         valor = parseFloat(valor);
      }
      return valor;

   }
</script>
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
                <li>
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
                            <h4 class="title">Editar processo <a href="#modal2"><img src="img/ajuda.png" height="40"></a></h4>
                            </div>
                            <div class="content">
                                <form action="edita_processo.php?idProcesso=<?php echo $_GET['idProcesso']?>" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>N° do Processo</label>
                                                <input type="text" class="form-control" name="numProc" value="<?php echo $numProc; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                				 <label>Nome Autor</label>
                                                <input type="text" name="nomeAutor" class="form-control" value="<?php echo $nomeAutor; ?>">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                  <label>Empresa</label>
                                                <input type="text" name="reuEmpresa" class="form-control" value="<?php echo $reuEmpresa; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                          
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                 <label>Admissão</label>
                                                <input type="date" name="admissao" class="form-control" value="<?php echo $admissao; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Demissão</label>
                                               <input type="date" name="demissao" class="form-control" value="<?php echo $demissao; ?>">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row" style="margin-top: 60px">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                 <label>Remuneração habitual <a href="#modal"><img src="img/ajuda.png" height="18"></a></label>
                                                     <input type="text"  name="remHab" class="form-control" id="valor" onkeyup="formatarMoeda();" value="<?php echo number_format($remHab,2,",",".");?>">
                                               
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                 <label>Meses trabalhados não prescritos </label>
                                                     <input type="text"  name="mesesTrab" class="form-control" value="<?php echo $mesesTrab;?>">
                                               
                                            </div>
                                        </div>
                                     
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                              <label>FGTS</label>
                                               <select class="form-control" name="fgtsParc">

                                                  <?php
                                                  switch ($fgtsParc) {
                                                    case '1':
                                                      echo '<option value="1">SIM</option>';
                                                      echo '<option value="0">NÃO</option>';
                                                      break;

                                                    case '0':
                                                     
                                                      echo '<option value="0">NÃO</option>';
                                                       echo '<option value="1">SIM</option>';
                                                      break;
                                                    
                                                    default:
                                                    echo '<option value="">SELECIONE</option>';
                                                    echo '<option value="0">NÃO</option>';
                                                    echo '<option value="1">SIM</option>';
                                                      break;
                                                  }

                                                  ?>
                                                  
                                               </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Multa do FGTS</label>
                                               <select class="form-control" name="multaFgts">
                                               		      <?php
                                                  switch ($multaFgts) {
                                                    case '0':
                                                      echo '<option value="0">NÃO</option>';
                                                      echo '<option value="20">20%</option>';
                                                      echo '<option value="40">40%</option>';
                                                      break;

                                                    case '20':
                                                      echo '<option value="20">20%</option>';
                                                      echo '<option value="40">40%</option>';
                                                      echo '<option value="0">NÃO</option>';
                                                      
                                                      break;

                                                    case '40':
                                                      echo '<option value="40">40%</option>';
                                                      echo '<option value="20">20%</option>';
                                                      echo '<option value="0">NÃO</option>';
                                                      break;
                                                    
                                                    default:
                                                    echo '<option value="">SELECIONE</option>';
                                                   echo '<option value="40">40%</option>';
                                                      echo '<option value="20">20%</option>';
                                                      echo '<option value="0">NÃO</option>';
                                                      break;
                                                  }

                                                  ?>
                                                  
                                               </select>
                                            </div>
                                        </div>
                                    </div>


                                              <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                               <label>Reflexos em 13º. Salários, férias e aviso</label>
                                               <select class="form-control" name="reflexos">
                                                   <?php
                                                  switch ($reflexos) {
                                                    case '0':
                                                      echo '<option value="0">NÃO</option>';
                                                      echo '<option value="1">SIM</option>';
                                                      
                                                      break;
                                                      case '1':
                                                      echo '<option value="1">SIM</option>';
                                                      echo '<option value="0">NÃO</option>';
                                                                                   
                                                      break;
                                                                                                      
                                                    default: 
                                                      echo '<option value="">SELECIONE</option>';
                                                      echo '<option value="1">SIM</option>';
                                                      echo '<option value="0">NÃO</option>';
                                                      break;
                                                  }

                                                  ?>
                                               </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                               
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top: 60px">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                               <label>Aumento da média remuneratória em horas extras e adicional noturno</label>
                                               <select class="form-control" name="aumMed">
                                               		 <?php
                                                  switch ($aumMed) {
                                                    case '0':
                                                      echo '<option value="0">NÃO</option>';
                                                      echo '<option value="1">SIM</option>';
                                                      
                                                      break;
                                                      case '1':
                                                      echo '<option value="1">SIM</option>';
                                                      echo '<option value="0">NÃO</option>';
                                                                                   
                                                      break;
                                                                                                      
                                                    default: 
                                                      echo '<option value="">SELECIONE</option>';
                                                      echo '<option value="1">SIM</option>';
                                                      echo '<option value="0">NÃO</option>';
                                                      break;
                                                  }

                                                  ?>
                                               </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Houve pagamento de FGTS do contrato</label>
                                               <select class="form-control" name="pagFgtsContr">
                                               		 <?php
                                                  switch ($pagFgtsContr) {
                                                    case '0':
                                                      echo '<option value="0">NÃO</option>';
                                                      echo '<option value="1">SIM</option>';
                                                      
                                                      break;
                                                      case '1':
                                                      echo '<option value="1">SIM</option>';
                                                      echo '<option value="0">NÃO</option>';
                                                                                   
                                                      break;
                                                                                                      
                                                    default: 
                                                      echo '<option value="">SELECIONE</option>';
                                                      echo '<option value="1">SIM</option>';
                                                      echo '<option value="0">NÃO</option>';
                                                      break;
                                                  }

                                                  ?>
                                               </select>
                                            </div>
                                        </div>
                                    </div>




                                         <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                               <label>Empresa SIMPLES</label>
                                               <select class="form-control" name="empSimpl">
                                               		<option value="0">NÃO</option>
                                               		<option value="1">EPP</option>
                                               		<option value="2">EIRELI</option>
                                               </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Dano moral</label>
                                               <select class="form-control" name="danMor">
                                               		<?php
                                                  switch ($danMor) {
                                                    case '0':
                                                      echo '<option value="0">NÃO</option>';
                                                      echo '<option value="3">LEVE</option>';
                                                       echo '<option value="5">MÉDIO</option>';
                                                        echo '<option value="20">GRAVE</option>';
                                                       echo '<option value="50">GRAVÍSSIMO</option>';
                                                      break;
                                                      case '3':
                                                      echo '<option value="3">LEVE</option>';
                                                       echo '<option value="5">MÉDIO</option>';
                                                        echo '<option value="20">GRAVE</option>';
                                                       echo '<option value="50">GRAVÍSSIMO</option>';
                                                       echo '<option value="0">NÃO</option>';
                                                                                   
                                                      break;
                                                         case '5':
                                                          echo '<option value="5">MÉDIO</option>';
                                                      echo '<option value="3">LEVE</option>';
                                                       echo '<option value="20">GRAVE</option>';
                                                       echo '<option value="50">GRAVÍSSIMO</option>';
                                                       echo '<option value="0">NÃO</option>';
                                                                                   
                                                      break;
                                                         case '20':
                                                          echo '<option value="20">GRAVE</option>';
                                                        echo '<option value="0">NÃO</option>';
                                                      echo '<option value="3">LEVE</option>';
                                                       echo '<option value="5">MÉDIO</option>';
                                                       echo '<option value="50">GRAVÍSSIMO</option>';
                                                                                   
                                                      break;
                                                      case '50':
                                                      echo '<option value="50">GRAVÍSSIMO</option>';
                                                          echo '<option value="20">GRAVE</option>';
                                                        echo '<option value="5">MÉDIO</option>';
                                                      echo '<option value="3">LEVE</option>';
                                                      
                                                        echo '<option value="0">NÃO</option>';
                                                       
                                                                                   
                                                      break;
                                                                                                      
                                                    default: 
                                                                      echo '<option value="0">NÃO</option>';
                                                      echo '<option value="3">LEVE</option>';
                                                       echo '<option value="5">MÉDIO</option>';
                                                        echo '<option value="20">GRAVE</option>';
                                                       echo '<option value="50">GRAVÍSSIMO</option>';
                                                      break;
                                                  }

                                                  ?>
                                               </select>
                                            </div>
                                        </div>
                                    </div>




                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                               <label>Voce é advogado de:</label>
                                               <select class="form-control" name="advDe">
                                              <?php
                                                  switch ($advDe) {
                                                    case '1':
                                                      echo '<option value="1">AUTOR</option>';
                                                      echo '<option value="2">EMPRESA</option>';
                                                      break;
                                                      case '2':
                                                      echo '<option value="2">EMPRESA</option>';
                                                      echo '<option value="1">AUTOR</option>';
                                                      break;
                                                    
                                                    default:
                                                    echo '<option value="">SELECIONE</option>';
                                                    echo '<option value="1">AUTOR</option>';
                                                      echo '<option value="2">EMPRESA</option>';
                                                      break;
                                                  }

                                                  ?>
                                               </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                               
                                            </div>
                                        </div>
                                    </div>

                       


                                    <button type="submit" class="btn btn-info btn-fill pull-right">Salvar</button>
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

<div class="remodal" data-remodal-id="modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h3>
  Remuneração habitual</h3>

  Remuneração habitual = Somatório de todas as parcelas remuneratórias habituais pagas ao Autor em seu último contracheque (sempre na base 30 dias), exemplo: salário-base, adicional por tempo de serviço, gratificações diversas, comissões com DSR, prêmios mensais com DSR, insalubridade, periculosidade, etc.
  OBS. Neste campo não entra valores pagos a título de horas extras, adicional noturno, integrações sobre horas extras e adicional noturno, salário-família, PLR, indenizações, ressarcimentos, multas, etc.</br>

  
  <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
</div>
<div class="remodal" data-remodal-id="modal2">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h3>
  Edição de processo</h3>

 PS: Se for alterar dados do processo e já tiver feito algum cálculo, deve fazer e salvar os cálculos novamente um por um, pois eles dependem dessas informações.

  
  <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
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
  <script src="plugins/Remodal-1.1.1/dist/remodal.min.js"></script>
</html>
