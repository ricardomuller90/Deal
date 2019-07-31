<?php session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
  header('Location: ../index.html');
  exit();
}


require_once '../config/init.php';

require_once '../include/query_processo.php';?>
<!doctype html>
<html lang="en">
<head>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<script>

function formatarMoeda() {
  var elemento = document.getElementById('valores');
  var valor = elemento.value;
  
  valor = valor + '';
  valor = parseInt(valor.replace(/[\D]+/g,''));
  valor = valor + '';
  valor = valor.replace(/([0-9]{2})$/g, ",$1");

  if (valor.length > 6) {
    valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
  }

  elemento.value = valor;
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



function calcula477(){
     
    var calcular477 = $("#calcular477").val();
    if(calcular477==1){

        var remHab = $("#remHab").val();
        $( "#total477" ).val(remHab);
        remHab = parseFloat(remHab);
        remHab = remHab.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
        $( "#multa477" ).text(remHab);
        
        

    }else{
        var remHab = 'R$ 0,00';
        $( "#multa477" ).text(remHab);
        $( "#total477" ).val('0');
    }
}

function calcula467(){




    var calcular467 = $("#calcular467").val();
    

    if(calcular467==1){
        var total467 = $("#calculo467").val();
        $( "#total467" ).val(total467);
        total467 = parseFloat(total467);
        total467 = total467.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
        $( "#multa467" ).text(total467);
    }else{
        var total467 = 'R$ 0,00';
        $( "#total467" ).val('0');
        $( "#multa467" ).text(total467);
    }









}


$(document).ready(function(){
    

<?php

    $PDO = db_connect(); 

    $stmt = $PDO->prepare('SELECT * FROM processo WHERE idProcesso = :idProcesso');
    $stmt->bindValue(':idProcesso', $_GET['idProcesso']);
    $stmt->execute();
    $valores = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($valores as $row){
    $fgts = $row['fgtsParc'];
    $multaFgts = $row['multaFgts'];
    $remHab = $row['remHab'];




}
?>

    window.onload = function(){

 calcula467();
 calcula477();

}


 $("#calcular467").change(function(){
calcula467();
})


    $("#calcular477").change(function(){ 

calcula477();



})




    
    


    
    
    
    
  


});

</script>
<link rel="stylesheet" href="../plugins/Remodal-1.1.1/dist/remodal.css">
        <link rel="stylesheet" href="../plugins/Remodal-1.1.1/dist/remodal-default-theme.css">



	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Sistema de Cálculos - Laranja & Marranghello</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="orange" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<div class="sidebar-wrapper">
            <div class="logo">
                <img src="../img/logo1.png" style="width:100%">
            </div>

            <ul class="nav">
                <!--<li>
                    <a href="dashboard.html">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>-->
                <li >
                    <a href="../novo_processo.php">
                        <i class="pe-7s-user"></i>
                        <p>Novo Processo</p>
                    </a>
                </li>
                <li class="active">
                    <a href="../consulta_processo.php">
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
					</li>
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
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Cálculo de Multas <a href="#modal"><img src="../img/ajuda.png" width="30"></a></h4>
                            </div>
                            <div class="content">
                                <form action="salva.php" method="post">
                                    <input type="hidden" name="idProcesso" value="<?php echo $_GET['idProcesso']?>">
                                    <input type="hidden" id="remHab" value="<?php echo $remHab; ?>">
<?php   $PDO = db_connect();      
        $stmt = $PDO->prepare('SELECT * FROM multas WHERE idProcesso = :idProcesso');
        $stmt->bindValue(':idProcesso', $_GET['idProcesso']);
        $stmt->execute();
        $valores = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($valores as $row){

$calc467 = $row['calc467'];
$total477 = $row['total477'];
$calc477 = $row['calc477'];

echo '<input type="hidden" value="'.$total477.'" name="total477" id="total477">';


} 
?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Multa 467</label>
                                          <select class="form-control" id="calcular467" name="calc467">
                                          <?php switch($calc467){
                    
              case 0:
        echo '<option value="0" selected>NÃO</option>
            <option value="1">SIM</option>
       ';
        break;
    case 1:
          echo '<option value="1" selected>SIM</option>
          <option value="0">NÃO</option>';
         break;
       
    default:
      echo '<option value="0" selected>Erro. Acionar suporte.</option>';
}?>

                                          </select>

                                            </div>
                                        
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                               
                                                                <label>Multa 477</label>
                                          <select class="form-control" id="calcular477" name="calc477">
                                          <?php switch($calc477){
                    
              case 0:
        echo '<option value="0" selected>NÃO</option>
            <option value="1">SIM</option>
       ';
        break;
    case 1:
          echo '<option value="1" selected>SIM</option>
          <option value="0">NÃO</option>';
         break;
       
    default:
      echo '<option value="0" selected>Erro. Acionar suporte.</option>';
}?>

                                          </select>





                                            </div>
                                   

                                            </div>
                                         
                                        </div>
                                    
                                
                        

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><b>Total de multa 467</b><p id="multa467"></p></label>
                                
                                            </div>
                                        </div>




<?php   $PDO = db_connect();      
        $stmt = $PDO->prepare('SELECT p.multaFgts as pm, sl.totalSemFgts as sl, ap.totalSemFgts as ap, fp.totalSemFgts as fp, fv.qtd as fvQ, fv.totalSemFgts as fvT, dp.totalSemFgts as dp FROM processo as p LEFT JOIN feriasVencidas as fv ON fv.idProcesso = p.idProcesso LEFT JOIN feriasProp as fp ON fp.idProcesso = p.idProcesso LEFT JOIN decProp as dp ON dp.idProcesso = p.idProcesso LEFT JOIN saldoSal as sl ON sl.idProcesso = p.idProcesso  LEFT JOIN aviso_previo as ap ON ap.idProcesso = p.idProcesso WHERE p.idProcesso=:idProcesso');
        $stmt->bindValue(':idProcesso', $_GET['idProcesso']);
        $stmt->execute();
        $valores = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($valores as $row){

$row['pm'] = $multaFgts;

//aviso previo sem fgts
$ap = $row['ap'];

//fgtsaviso previo
$fgtsAP = ($ap * 8 /100);

//multa aviso previo
$multaFgtsAP = $fgtsAP *$row['pm'] /100;

//--



//saldo salario sem fgts
$sl = $row['sl'];

//fgts saldo salario
$fgtsSL = ($sl * 8 /100);

//multa saldo salario
$multaFgtsSL = $fgtsSL * $row['pm']/100;

//--

//13°p sem fgts
$dp = $row['dp'];

//fgts 13°p
$fgtsDP = ($dp * 8 /100);

//multa 13°p
$multaFgtsDP = $fgtsDP * $row['pm']/100;

//--

if($row['fvQ']!=0){
//ferias proporcionais
$fp = $row['fp'];

//ferias vencidas simples 
$fvT = $row['fvT']/$row['fvQ'];
        }else{$fp = 0; $fvT = 0;}}

        $stmt2 = $PDO->prepare('SELECT total FROM fgtsContr WHERE idProcesso=:idProcesso');
        $stmt2->bindValue(':idProcesso', $_GET['idProcesso']);
        $stmt2->execute();
        $valores = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        foreach ($valores as $row){
            $valorMultaFgts = $row['total'] * $multaFgts / 100;    

} 

$total = ($sl + $multaFgtsSL + $fp + $fvT + $dp + $multaFgtsDP + $valorMultaFgts+ $ap + $multaFgtsAP) * 50/100;

echo '<input type="hidden" value="'.$total.'" id="calculo467">';
echo '<input type="hidden" name="total467" id="total467">';



?>








                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><b>Total de multa 477</b><p id="multa477"></p></label>
                                                
                                            </div>
                                        </div>
                                    </div>

                                         



                                    <!--
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" placeholder="City" value="Mike">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control" placeholder="Country" value="Andrew">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="number" class="form-control" placeholder="ZIP Code">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="5" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                                            </div>
                                        </div>
                                    </div>-->

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Salvar</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!--<div class="card card-user">
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
  <h3>Cálculo de multa do artigo 467 e 477 </h3>
  <p>
   Valores calculados de forma automática, efetuado o seguinte cálculo:

  </p></br>
  <p style="font-weight: bolder">Multa do artigo 477 = remuneração habitual digitada na página inicial </br><br> Multa do 467 = soma das rescisórias + multa do FGTS sobre as rescisórias + multa do FGTS do contrato x 50%
    <br><br></p>
    Após preenchido, aperte o botão SALVAR.

  <br>
  <!--<button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>-->
  <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
</div>
<script src="../plugins/Remodal-1.1.1/dist/remodal.min.js"></script>
</body>

    <!--   Core JS Files   -->
    <script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="../assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="../assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="../assets/js/demo.js"></script>

</html>
