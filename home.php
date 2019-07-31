<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
  header('Location: index.html');
  exit();
}
?>
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
              
                <li>
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
                <li  class="active">
                    <a href="home.php">
                        <i class="pe-7s-note2"></i>
                        <p>Tutorial do sistema</p>
                    </a>
                </li>
              
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


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Tutorial do Sistema</h4>
                            </div>
                            <div class="content">
  

                       <p>Prezados assinantes bem-vindos ao “DEAL”, o acordo de cálculos trabalhistas desenvolvido pelo Escritório Laranja & Marranghello Peritos Consultores.
A história do nosso escritório já vai além de 40 anos de consultoria e perícia contábil e para contribuir e facilitar o dia-a-dia dos advogados, empresas, peritos e R.H., desenvolvemos um sistema e um aplicativo de celular de acordos trabalhistas chamado “DEAL”.</p><p>
Este sistema é muito prático e fácil de ser utilizado, pois cada página é alto explicativa e para cada rubrica que achamos a necessidade de melhores instruções, consta o sinal “?”, sempre que você ver este sinal constam instruções de como preencher, como também dicas para o seu dia-a-dia de como efetuar os cálculos
Você terá um sistema completo, pois poderá preencher tudo via sistema e salvar em seu aplicativo, como também efetuar tudo pelo aplicativo se optar desta forma.
Todos os cálculos serão salvos, dando a opção de rever os mesmos caso precise.</p><p>
Imagine na hora de sua audiência ir com o cálculo do acordo pronto, e pela sugestão das partes o seu cálculo deve ser modificado....Complicado? Sim, bem complicado pois você terá que refazer os seus cálculos para obter o mais rápido possível o valor do acordo e este tempo muitas vezes você não tem, pois a audiência é dinâmica e impossibilita esta modificação de uma forma rápida e precisa, e muitas vezes o advogado é obrigado a falar um montante que muitas vezes não é o mais adequado.
Mas com o aplicativo “DEAL”, você só precisa de alguns cliques para modificar o que quiser alterar em seus cálculos, obtendo assim, o seu novo resumo final em segundos.</p><p>
Por fim, informamos que se trata de cálculos de acordo, sendo assim, tudo é calculado pelo último salário e remuneração do Autor, como também horas e outras rubricas de forma arbitradas pelos advogados ou outros profissionais que estiverem utilizando o aplicativo, pois esta é a fase da instrução, ainda não há decisões, são tratativas entre as partes, visando a conciliação.
Pois, caso você não obtenha sucesso no acordo, é claro que será necessário a contratação do profissional contábil (perito contábil) para a efetivação de uma possível perícia de instrução para esclarecer melhor o litígio entre as partes, como também a contratação do perito contábil para a fase de liquidação, o qual analisará todos os documentos do contrato do Autor juntamente com todas as decisões já proferidas, transformando os pleitos deferidos em pecúnia de uma forma precisa e correta, pois nesta fase tudo será calculado de acordo com a documentação real analisada de forma mês a mês, pois nesta fase não se trata mais de acordo e sim, da liquidação das decisões já proferidas.</p><p>
E nesse momento da liquidação dos cálculos, como também da instrução ou até mesmo no preventivo trabalhista, através do compliance e da due-diligence e no treinamento de cursos, não se esqueça de procurar a Laranja & Marranghello Peritos Consultores e a L&M Cursos, através do nosso site: <a href="http://www.laranja-marranghello.com.br">www.laranja-marranghello.com.br</a>, o qual teremos o maior prazer em atendê-los.</p>
  

                    </div>

                </div>
            </div>
        </div>
</div></div>

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

<b>**Se essa opção for alterada posteriormente, você deverá salvar novamente todos os cálculos já feitos, pois eles dependem desse dado. </b></br>

  Remuneração habitual = Somatório de todas as parcelas remuneratórias habituais pagas ao Autor em seu último contracheque (sempre na base 30 dias), exemplo: salário-base, adicional por tempo de serviço, gratificações diversas, comissões com DSR, prêmios mensais com DSR, insalubridade, periculosidade, etc.
  OBS. Neste campo não entra valores pagos a título de horas extras, adicional noturno, integrações sobre horas extras e adicional noturno, salário-família, PLR, indenizações, ressarcimentos, multas, etc.
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
