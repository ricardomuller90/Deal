<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
  header('Location: ../index.html');
  exit();
}


require_once '../config/init.php';

require_once '../include/query_processo.php';
?>
<!doctype html>
<html lang="en">
<head>

 


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


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
};

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

function calcula(){



 var valor = document.getElementById("valor1").value;

        var numHoras = document.getElementById("numHoras").value;
        
         var numHorasPleit = document.getElementById("numHorasPleit").value;



         var mesesTrabalhados = document.getElementById("mesesTrabalhados").value;

         var fgtsParc = document.getElementById("fgtsParc").value;

         var multaFgtsj = document.getElementById("multaFgtsJ").value;

        var e = document.getElementById("adicional");
        var adicional = e.options[e.selectedIndex].value;
       



        subtotal = valor / numHoras * adicional * numHorasPleit * mesesTrabalhados;



        var st = subtotal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});

        $( "#subtotal" ).text(st);

        var dsr = subtotal * 20/100;

        var totalDsr = dsr.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});

        $( "#dsr" ).text(totalDsr);




        var ints = subtotal *30/100;
        ints = ints * <?php echo $reflexos; ?>;
        


        var totalInts = ints.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});

        $( "#totalInts" ).text(totalInts);


        var total = subtotal + dsr + ints;

        $( "#totalSemFgts" ).val(total);

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

        var totalTudo = total + tF + tMF;
        $( "#totalTudo" ).val(totalTudo);
        
        var fgtsEmultas = tF + tMF;
        $( "#fgtsEmultas" ).val(fgtsEmultas);


}

$(document).ready(function(){




    
        window.onload = function(){
    calcula();

}




    
    
    $("#adicional").change(function(){


        calcula();



    });

    
  
    

    $("#valor").blur(function(){    calcula();
});





 $("#numHoras").blur(function(){
    calcula();

});




 $("#numHorasPleit").blur(function(){    calcula();
});



 $("#mesesTrabalhados").blur(function(){
    calcula();
});


});

</script>
<link rel="stylesheet" href="../plugins/Remodal-1.1.1/dist/remodal.css">
        <link rel="stylesheet" href="../plugins/Remodal-1.1.1/dist/remodal-default-theme.css">

<style>
    [data-tooltip] {
  position: relative;
  font-weight: bold;
}

[data-tooltip]:after {
  display: none;
  position: absolute;
  top: -5px;
  padding: 5px;
  border-radius: 3px;
  left: calc(100% + 2px);
  content: attr(data-tooltip);
  white-space: nowrap;
  background-color: #0095ff;
  color: White;
}

[data-tooltip]:hover:after {
  display: block;
}
</style>

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
                                <h4 class="title">Cálculo de 384 clt SEM Aumento da média remuneratória <a href="#modal"><img src="../img/ajuda.png" width="30"></a></h4>
                            </div>
                            <div class="content">
                                <form action="salva.php" method="post">
                                    <input type="hidden" name="idProcesso" value="<?php echo $_GET['idProcesso']?>">
  
<?php   $PDO = db_connect();      
        $stmt = $PDO->prepare('SELECT clt384.valor, clt384.numHoras, clt384.adicional, clt384.numHorasPleit, clt384.mesesTrabalhados, processo.remHab as remHab, difSalariais.valor as difSal,insalubridade.adicional as insAdic ,insalubridade.salarioMin as insSalMin , periculosidade.salarioMin as perSalMin FROM clt384 INNER JOIN processo ON clt384.idProcesso=processo.idProcesso INNER JOIN insalubridade ON processo.idProcesso=insalubridade.idProcesso INNER JOIN periculosidade ON periculosidade.idProcesso=clt384.idProcesso INNER JOIN difSalariais ON difSalariais.idProcesso=processo.idProcesso  WHERE processo.idProcesso = :idProcesso ');
        $stmt->bindValue(':idProcesso', $_GET['idProcesso']);
        $stmt->execute();
        $valores = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($valores as $row){

        $ins = ($row['insSalMin'] * $row['insAdic']) / 100;
        $per = $row['perSalMin'] * 30 / 100;   
        $valor = $row['difSal'] + $ins + $per + $row['remHab'];
        
        echo '<input type="hidden" value="'.$valor.'" id="valor1">';
        if(!empty($valor)){
        $valor = number_format($valor, 2, ',', '.');
        }else{$valor = 0;
        echo '<input type="hidden" value="'.$valor.'" id="valor1">';  
        }

            
            
} ?>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                 <label>Remuneração habitual mensal paga + pleitos mensais<a href="#modal2"><img src="../img/ajuda.png" width="18"></a></label>
                                                <input type="text" id="valor" name="valor" class="form-control" readonly="true" value="<?php if(isset($valor)){echo $valor;}?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                  <label>N° Horas</label>
                                                <input type="text" id="numHoras" name="numHoras" class="form-control" value="<?php if(isset($row['numHoras'])){echo $row['numHoras'];}?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                  <label>Adicional Horas Extras</label>

                                                  <select class="form-control" name="adicional" id="adicional" ><?php switch($row['adicional']){
                         case 1.5:
   echo '<option value="1.5">50%</option><option value="1.5">50%</option><option value="2">100%</option>
              </select>
            ';
        break;
    case 1.6:
         echo '<option value="1.6">60%</option><option value="1.5">50%</option><option value="2">100%</option>
               </select>';
       break;
    default:
      echo '<option value="0">0%</option><option value="1.6">60%</option><option value="1.5">50%</option><option value="2">100%</option>
               </select>';
       break;


   
            }?>
                                            
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="numHorasPleit">N° de horas pleiteadas <a href="#modal3"><img src="../img/ajuda.png" width="18"></a></label>
                                                <input type="text" id="numHorasPleit" name="numHorasPleit" class="form-control" value="<?php if(isset($row['numHorasPleit'])){echo $row['numHorasPleit'];}?>">
                                            </div>
                                        </div>
                                    </div>
                                     <input type="hidden" name="totalSemFgts" id="totalSemFgts">
                                    <div class="row" style="display: none;">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fgts">FGTS</label>
                                               
                                                        <span data-tooltip="Opção configurada na tela FGTS e Multas"> <select disabled="true" class="form-control"><?php switch($row['fgtsParc']){
                    
              case 0:
        echo '<option value="0" selected>NÃO</option>
            <option value="1">SIM</option></select></span>
            <input type="hidden" name="fgtsParc" id="fgtsParc" value="'.$row['fgtsParc'].'">
            ';



        break;
    case 1:
           echo '<option value="1" selected>SIM</option>
            <option value="0">NÃO</option></select></span>
            <input type="hidden" name="fgtsParc" id="fgtsParc" value="'.$row['fgtsParc'].'">
            ';

        break;
   
            }?>

                                                 
                                                
                                            </div>
                                        </div>

                                          <div class="col-md-6">
                                            <div class="form-group">
                                                 <label for="multaFgts">Multa do FGTS</label>
                                                 <span data-tooltip="Opção configurada na tela FGTS e Multas">
                                                <select disabled name="multaFgts" id="multaFgts" class="form-control">
                   <?php switch($row['multaFgts']){
                    
              case 0:
        echo '<option value="0" selected>NÃO</option>
    
             <option value="20">20%</option>
              <option value="40">40%</option></select></span>
               <input type="hidden"  id="multaFgtsJ" value="0">
            ';
        break;
    case 20:
           echo '<option value="20" selected>20%</option>
             <option value="40">40%</option>
            <option value="0">NÃO</option></select></span>
            <input type="hidden"  id="multaFgtsJ" value="0.20">
            ';
        break;
     case 40:
           echo '<option value="40" selected>40%</option>
             <option value="20">20%</option>
            <option value="0">NÃO</option></select></span>
            <input type="hidden" id="multaFgtsJ" value="0.40">
            ';
        break;
   
            }?>
                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                 <label for="numHorasPleit">Quantidade de meses trabalhados não prescritos</label>
                                                <input type="text" id="mesesTrabalhados" name="mesesTrabalhados" class="form-control" readonly="readonly" value="<?php if(isset($mesesTrab)){echo $mesesTrab;}?>">
                                                
                                            </div>
                                        </div>

                                          <div class="col-md-6">
                                              
                                        </div>
                                    </div>

                                      <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            
                                                 <div class="form-group">
                                                <label><b>Total de horas extras</b><p id="subtotal"></p></label>
                                                
                                            </div>

                                            </div>
                                        </div>

                                          <div class="col-md-6">
                                             <div class="form-group">
                                            
                                                 <div class="form-group">
                                                <label><b>Integrações em DSR</b><p id="dsr"></p></label>
                                                
                                            </div>

                                            </div>
                                        </div>
                                    </div>


                                         <div class="row">
                                        <div class="col-md-6">
                                          
                                        </div>

                                          <div class="col-md-6">
                                           
                                        </div>
                                    </div>

                                           <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            
                                                 <div class="form-group">
                                                <label><b>Integrações em aviso, 13° salários e férias SEM 1/3 sem aumento da média remuneratória</b><p id="totalInts"></p></label>
                                                
                                            </div>

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
  <h1>Cálculo 384 CLT <a href="#modal"><img src="../img/ajuda.png" width="30"></a></h1>
  <p>
   Preencha os dados solicitados para obter o valor da parcela, com o preenchimento dos dados será efetuado o seguinte cálculo:

  </p></br>
  <p style="font-weight: bolder"> remuneração habitual mensal paga + pleitos mensais : carga horária mensal x adic. Horas extras x número de horas de intervalo x número de meses obedecendo a prescrição + 30% (referente as integrações de aviso, 13º. Salários e férias c/1/3), caso seja escolhido esta opção na página inicial dos cálculos
    <br><br></p>
    Após preenchido, aperte o botão SALVAR.

  <br>
  <!--<button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>-->
  <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
</div>
<div class="remodal" data-remodal-id="modal2">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h1>Remuneração habitual mensal paga + pleitos mensais*</h1>
  <p>
    *Campo preenchido automático = Remuneração habitual preenchida na página inicial + pleitos mensais (diferenças salariais + insalubridade + periculosidade)
  </p></br>

  <br>
  <!--<button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>-->
  <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
</div>
<div class="remodal" data-remodal-id="modal3">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h1>digitar o número de horas  pleiteadas neste mês</h1>
  <p>
   
Dica para encontrar o número de horas por mês:</br>
384 CLT = intervalo da mulher, ou seja, sempre que houver labor extra, a mulher terá que ter 15 minutos de intervalo</br>
15 minutos por dia quando houve labor extra x número de dias no mês em que houve o respeito deste intervalo</br>
Não se esqueça que os cálculos não são efetuados com minutos, então teremos que fazer a transformação de minuto em hora</br>
15 minutos : 60 minutos = 0,25hs. por dia x número de dias no mês em que não foi respeitado o intervalo de 15 minutos
  </p></br>

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
