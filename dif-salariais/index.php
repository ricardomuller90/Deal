<?php session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
  header('Location: ../index.html');
  exit();
}


require_once '../config/init.php';

require_once '../include/query_processo.php'; ?>

<?php

    $PDO = db_connect(); 

    $stmt = $PDO->prepare('SELECT * FROM processo WHERE idProcesso = :idProcesso');
    $stmt->bindValue(':idProcesso', $_GET['idProcesso']);
    $stmt->execute();
    $valores = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($valores as $row){
    $fgts = $row['fgtsParc'];
    $multaFgts = $row['multaFgts'];
     $reflexos = $row['reflexos'];
       $mesesTrab = $row['mesesTrab'];
}
?>
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







   function calcular(){


  
    var valores = $( "#valores" ).val();

    var vals = converteMoedaFloat(valores);

    var mesesTrabalhados = $( "#mesesTrabalhados" ).val();

    var subtotal = vals * mesesTrabalhados;

    var total = subtotal + (<?php echo $reflexos; ?> * subtotal * 30 /100);
    
    var f = total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});

      $( "#total" ).text(f);
      $( ".totalSemFgts" ).val(total);

      var fgts = total *8/100;

          // se não tem FGTS, resulta 0
        <?php if($fgts==0){?> var tF = 0;
        
        // se tem FGTS, calcula 8%
        <?php }else{ ?>
        var tF = total*8/100;
        <?php } ?>
        var totalFgts = tF.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
        $( "#totalFgts" ).text(totalFgts);

        // se não tem Multa FGTS, resulta 0
        <?php if($multaFgts==0){?> var tMF = 0;
        
        // se tem Multa FGTS, calcula 40% ou 20%
        <?php }else{ ?>
        var porcentagem = <?php echo $multaFgts;?>;
        var tMF = tF*porcentagem/100;
        <?php } ?>
        var totalMultaFgts = tMF.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
        $( "#totalMultaFgts" ).text(totalMultaFgts);
        
             var fgtsEmultas = tF + tMF;


            $( "#fgtsEmultas" ).val(fgtsEmultas);
   }



$(document).ready(function(){
    


    
        window.onload = function(){
    calcular();

}
    
    
    
  

   $("#valores").blur(function(){
    
   calcular();
});

    $("#mesesTrabalhados").blur(function(){
  
 calcular();
});












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
                                <h4 class="title">Cálculo de Diferenças Salariais <a href="#modal"><img src="../img/ajuda.png" width="30"></a></h4>
                            </div>
                            <div class="content">
                                <form action="salva.php" method="post">
                                    <input type="hidden" name="idProcesso" value="<?php echo $_GET['idProcesso']?>">
  
<?php   $PDO = db_connect();      
        $stmt = $PDO->prepare('SELECT * FROM difSalariais WHERE idProcesso = :idProcesso');
        $stmt->bindValue(':idProcesso', $_GET['idProcesso']);
        $stmt->execute();
        $valores = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($valores as $row){

$valor = $row['valor'];
echo '<input type="hidden" value="'.$valor.'" id="valor">';


 if(!empty($valor)){
        $valor = number_format($valor, 2, ',', '.');
        }else{$valor = 0;
        }

} 
?>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Somatório das diferenças remuneratórias – Base 30 dias <a href="#modal2"><img src="../img/ajuda.png" width="18"></a></label>
                                                <input type="text" id="valores" name="valores" onkeyup="formatarMoeda()" class="form-control" value="<?php if(isset($valor)){echo $valor;}?>">

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                               
                                             
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">  <div class="form-group">
                                                <label for="mesesTrabalhados">Quantidade de meses trabalhados não prescritos</label>
                                                <input type="text" id="mesesTrabalhados" name="mesesTrabalhados" maxlength="2" readonly="readonly" class="form-control" value="<?php if(isset($mesesTrab)){echo $mesesTrab;}?>">
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-6">
                                          
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><b>Total de diferenças salariais c/reflexos em 13º. Salários, férias c/1/3 e aviso-prévio</b><p id="total"></p></label>
                                                <input type="hidden" name="totalSemFgts" value="" class="totalSemFgts">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><b>FGTS</b><p id="totalFgts"></p></label>
                                                
                                            </div>
                                        </div>
                                    </div>



                                      <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><b>Multa FGTS</b><p id="totalMultaFgts"></p></label>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="fgtsEmultas" id="fgtsEmultas">
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

                                    <button type="submit" class="btn btn-info btn-fill pull-right" onClick="enviar()">Salvar</button>
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
  <h3>Cálculo de diferenças salariais </h3>

    <b><img src="../img/ajuda.png" width="30">Caso hajam diferenças salariais, voce deve preencher esse campos antes de fazer os cálculos de hora extra, adicional noturno, horas intrajornada e interjornada, horas compensadas e irregulares, clt 384, domingos e feriados e outros intervalos. Pois eles dependem dos dados da insalubridade para fazer esses cálculos.<img src="../img/ajuda.png" width="30"></b></br></br>
  <p>
   Preencha os dados solicitados para obter o valor da parcela, com o preenchimento dos dados será efetuado o seguinte cálculo:

  </p></br>
  <p style="font-weight: bolder"> Somatório das diferenças remuneratórias mensais x número de meses obedecendo a prescrição + 30% (referente as integrações de aviso, 13º. Salários e férias c/1/3), caso seja escolhido esta opção na página inicial dos cálculos.
    <br><br></p>
    Após preenchido, aperte o botão SALVAR.

  <br>
  <!--<button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>-->
  <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
</div>
 <div class="remodal" data-remodal-id="modal2">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h3>Somatório de todas as parcelas na base 30 dias</h3>
  <p>
  São elas:
  </p></br>
  <p style="font-weight: bolder"> Diferenças de comissões com DSR + diferenças de enquadramento convenção coletiva, desvio de função, equiparação salarial, reajustes diversos, diferença de gratificação, adicionais por tempo de serviço, ou seja, o somatório de todos os pleitos mensais referente a diferenças remuneratórias.
 </p>
    

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
