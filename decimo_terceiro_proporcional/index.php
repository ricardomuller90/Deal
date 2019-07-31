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
		var elemento = document.getElementById('remuneracao');
		var valor = elemento.value;

		valor = valor + '';
		valor = parseInt(valor.replace(/[\D]+/g, ''));
		valor = valor + '';
		valor = valor.replace(/([0-9]{2})$/g, ",$1");

		if (valor.length > 6) {
			valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
		}

		elemento.value = valor;
	}

	function converteMoedaFloat(valor) {
		if (valor === "") {
			valor = 0;
		} else {
			valor = valor.replace(".", "");
			valor = valor.replace(",", ".");
			valor = parseFloat(valor);
		}
		return valor;
	}

	Date.prototype.addDays = function(days) {
		var date = new Date(this.valueOf());
		date.setDate(date.getDate() + days + 1);
		return date;
	}

	<?php
		$PDO = db_connect(); 

		$stmt = $PDO->prepare('SELECT * FROM processo WHERE idProcesso = :idProcesso');
		$stmt->bindValue(':idProcesso', $_GET['idProcesso']);
		$stmt->execute();
		$valores = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach ($valores as $row){
			$admissao = $row['admissao'];
			$demissao = $row['demissao'];			

			if(!empty($row['remHab'])){
				$remHab = number_format($row['remHab'], 2, ',', '.');
				}else{$remHab = 0;}




			$fgts = $row['fgtsParc'];
			$multaFgts = $row['multaFgts'];
		}
	?>

	$(document).ready(function () {




		window.onload = function(){


	    var calcular = $("#calcular").val();

    if(calcular==1){
   	calcula13Salario();
    }else{
	naoCalcula();
    }

}






   $("#calcular").change(function(){ 

    var calcular = $( this ).val();
			if(calcular==1){
				calcula13Salario();
			}else{
				naoCalcula();
		
			}
			
		});



		$("#remuneracao").blur(function () {
			calcula13Salario();
		});

		$("#dataAdmissao").blur(function () {
			calcula13Salario();
		});

		$("#dataDemissao").blur(function () {
			calcula13Salario();
		});

		function naoCalcula(){
					
				$( "#totalSemFgts" ).val('0');
				$("#resultado").html('R$ 0,00');
				$("#totalFgts").html('R$ 0,00');

				$( "#totalMultaFgts" ).text('R$ 0,00');

        $( "#totalTudo" ).val('0');
        

        $( "#fgtsEmultas" ).val('0');

	
		
		}

		function calcula13Salario() {
			var remuneracao = $("#remuneracao").val();
			var dataAdmissaoInput = $("#dataAdmissao").val();
			var dataDemissaoInput = $("#dataDemissao").val();

			if (remuneracao && remuneracao !== '0' && dataAdmissaoInput && dataDemissaoInput) {
				var dataAdmissaoSplit = dataAdmissaoInput.split("-")
				var dataAdmissao = new Date(dataAdmissaoSplit[0], dataAdmissaoSplit[1] - 1, dataAdmissaoSplit[2])
				
				var dataDemissaoSplit = dataDemissaoInput.split("-")
				var dataDemissao = new Date(dataDemissaoSplit[0], dataDemissaoSplit[1] - 1, dataDemissaoSplit[2])
				
				var timeDiff = Math.abs(dataDemissao.getTime() - dataAdmissao.getTime());
				
				var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
				var anosTrabalhados = parseInt(Math.ceil(timeDiff / (1000 * 3600 * 24)) / 365);

				var diasAviso = 0;

				switch (anosTrabalhados) {
					case 0:
						diasAviso = 30;
						break;
					case 1:
						diasAviso = 33;
						break;
					case 2:
						diasAviso = 36;
						break;
					case 3:
						diasAviso = 39;
						break;
					case 4:
						diasAviso = 42;
						break;
					case 5:
						diasAviso = 45;
						break;
					case 6:
						diasAviso = 48;
						break;
					case 7:
						diasAviso = 51;
						break;
					case 8:
						diasAviso = 54;
						break;
					case 9:
						diasAviso = 57;
						break;
					case 10:
						diasAviso = 60;
						break;
					case 11:
						diasAviso = 63;
						break;
					case 12:
						diasAviso = 66;
						break;
					case 13:
						diasAviso = 69;
						break;
					case 14:
						diasAviso = 72;
						break;
					case 15:
						diasAviso = 75;
						break;
					case 16:
						diasAviso = 78;
						break;
					case 17:
						diasAviso = 81;
						break;
					case 18:
						diasAviso = 84;
						break;
					case 19:
						diasAviso = 87;
						break;
					default:
						diasAviso = 90;
						break;
				}

				console.log('Anos: ' + anosTrabalhados);
				console.log('Dias Aviso: ' + diasAviso);
				var dataDemissaoNova = dataDemissao.addDays(diasAviso);
				console.log('Data Nova: ' + dataDemissaoNova);

				// getMonth trás o index inicando pelo zero então precisamos adicionar 1 (+1) para ficar correto o cálculo
				var mesesTrabalhados = dataDemissaoNova.getMonth() + 1;
				if (dataDemissaoNova.getDate() < 15) {
					mesesTrabalhados--;
				}
				
				if (dataAdmissao.getFullYear() === dataDemissaoNova.getFullYear()) {
					var timeDiffResult = Math.abs(dataDemissaoNova.getTime() - dataAdmissao.getTime());
					mesesTrabalhados = parseInt(Math.ceil(timeDiffResult / (1000 * 3600 * 24)) / 12);
					
					var mesDemissaoNova = dataDemissaoNova.getMonth();
					
					if (dataDemissaoNova.getDate() < 15) {
						mesDemissaoNova--;
					}
					
					mesesTrabalhados = mesDemissaoNova - dataAdmissao.getMonth() + (12 * (dataDemissaoNova.getFullYear() - dataAdmissao.getFullYear()));
				}

				console.log('Meses trabalhados: ' + mesesTrabalhados);

				var resultado = converteMoedaFloat(remuneracao) / 12 * mesesTrabalhados;

				$( "#totalSemFgts" ).val(resultado);
				
				$("#resultado").html(
					resultado.toLocaleString(
						'pt-br',
						{
							style: 'currency',
							currency: 'BRL',
							maximumFractionDigits: 2
						}
					)
				);





		var total = resultado;
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
		}
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
                    </ul>

										<ul class="nav navbar-nav navbar-right">
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
                                <h4 class="title">Cálculo de 13º Salário Proporcional <a href="#modal"><img src="../img/ajuda.png" width="30"></a></h4>
                            </div>
                            <div class="content">
                                <form action="salva.php" method="post">
                                    <input type="hidden" name="idProcesso" value="<?php echo $_GET['idProcesso']?>">
  				<?php        
																						$stmt = $PDO->prepare('SELECT * FROM decProp WHERE idProcesso = :idProcesso and idUsuario = :idUsuario');
																						$stmt->bindValue(':idProcesso', $_GET['idProcesso']);
																						$stmt->bindValue(':idUsuario', $_SESSION['id']);
																						$stmt->execute();
																						$valores = $stmt->fetchAll(PDO::FETCH_ASSOC);
																						foreach ($valores as $row){
																						$calcular = $row['calcular'];
																					
																					
																		} ?>
													

                                    <div class="row">
																			<div class="col-md-6">
																	
																				<div class="form-group">

																						<label>Calcular</label>
																					<select class="form-control" id="calcular" name="calcular">
																				  <?php switch($calcular){
                    
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
																					<label>Remuneração Habitual</label>
																					<input type="text" readonly="readonly" id="remuneracao" onkeyup="formatarMoeda();" name="remuneracao"
																						class="form-control" value="<?php echo $remHab;?>">
																						<input type="hidden" name="totalSemFgts" id="totalSemFgts" >
																				</div>
																			</div>

																		</div>

																		<div class="row">
																			<div class="col-md-6">
																				<div class="form-group">
																					<label>Data admissão</label>
																					<input type="date" readonly="readonly" id="dataAdmissao" name="dataAdmissao" class="form-control" value="<?php echo $admissao?>">
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="form-group">
																					<label>Data demissão</label>
																					<input type="date" readonly="readonly" id="dataDemissao" name="dataDemissao" class="form-control" value="<?php echo $demissao;?>">
																				</div>
																			</div>
																		</div>

																		<div class="row">
																			<div class="col-md-12">
																				<div class="form-group">
																					<label><b>Valor 13º proporcional: </b>
																						<p id="resultado"></p>
																					</label>
																				</div>
																			</div>
																		</div>


									<div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><b>FGTS</b><p id="totalFgts"></p></label>
                                                
                                            </div>
                                        </div>
                                  



                     
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><b>Multa FGTS</b><p id="totalMultaFgts"></p></label>
                                                
                                            </div>
                                        </div>

                                         <input type="hidden" name="fgtsEmultas" id="fgtsEmultas">
                                    </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Salvar</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        
                    </div>

                </div>
            </div>
        </div>

       <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.laranja-marranghello.com.br">Laranja & Marranghello</a>
                </p>
            </div>
        </footer>

    </div>
</div>
 <div class="remodal" data-remodal-id="modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h1>Cálculo de 13º Salário Proporcional <a href="#modal"><img src="../img/ajuda.png" width="30"></a></h1>
 
  <p style="font-weight: bolder"> Preenchimento automático com a seguinte fórmula:
Remuneração habitual digitada na página inicial x avos devidos
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
