<html lang="pt-br">

<head>

	<meta charset="UTF-8">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="../bootstrap/css/style.css">
	<script type="text/javascript" src="../bootstrap/js/jquery-2.2.4.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>

	<script type="text/javascript" src="../bootstrap/js/jquery.mask.js"></script>
	<script type="text/javascript" src="../bootstrap/js/script-assinatura.js"></script>


	<title>Contratação do sistema DEAL >> by Laranja & Marranghello</title>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="../">
				<img src="http://www.laranja-marranghello.com.br/img/logo1.gif" onerror="this.onerror=null; this.src='http://www.laranja-marranghello.com.br/img/logo1.gif'" alt="Contratação do sistema DEAL >> by Laranja & Marranghello" width="218" height="31">
			</a>
		</div>


		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">

				<li class=""><a href="#" target="_blank" title="Contratação do sistema DEAL >> by Laranja & Marranghello">Contratação do sistema DEAL >> by Laranja & Marranghello</a></li>

			</ul>

			<ul class="nav navbar-nav pull-right">
				<!--<li><a target="blank" href="#">Entrar</a>
				</li>-->
				<li><a target="blank" href="http://www.laranja-marranghello.com.br">Voltar para o site</a>
				</li>
			</ul>

		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>

<div class="col-lg-12 col-md-6 col-sm-12">
	<h4>DEAL &gt;&gt; by Laranja &amp; Marranghello</h4>
</div>


	<div class="col-lg-12 well">	
		<form id="form-info" method="post">
			<div class="col-lg-4 col-md-4 col-sm-12">
				<h5>Informações da Assinatura</h5>
				<div class="form-group">
					<label for="assinatura-descricao">Nome do Plano de Assinatura: </label>
					<p class="ex">DEAL by Laranja & Marranghello</p>
					<input type="hidden" id="assinatura-descricao" class="form-control" value="DEAL - Plano Mensal" required="" readonly="readonly">
				</div>
				<div class="form-group">
					<label for="assinatura-interval">Intervalo (periodicidade) da cobrança: <br></label>
					<p class="ex">Mensal</p>
					<input type="hidden" id="assinatura-interval" class="form-control" required value="1"  readonly="readonly" placeholder="Intervalo (em meses) da cobrança gerada">
				</div>
				<!--<div class="form-group">
					<label for="assinatura-repeats">Quantas cobranças devem ser geradas: (<em class="atributo">repeats</em>)<br><strong class="ex">Ex: Este atributo "repeats" é opcional e neste exemplo optamos por não utilizá-lo. Caso queira utilizá-lo, veja <a href="https://dev.gerencianet.com.br/docs/assinaturas-criando-plano" target="_blank">neste link</a> como usar. Se nada for enviado, a cobrança é gerada por tempo indeterminado ou até que o plano seja cancelado.</strong></label>
				</div>-->
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12">
				<h5>Informações do produto/serviço</h5>
				<div class="form-group">
					<label for="item-name">Descrição do produto/serviço: <br></label>
					<p class="ex">Sistema de cálculos trabalhistas</p>
					<input type="hidden" id="item-name" class="form-control" value="DEAL - Plano Mensal" required="" readonly="readonly">
				</div>
				<div class="form-group">
					<label for="item-value">Valor: <br></label>
							<p class="ex">99,90 / mês</p>
					<input type="hidden" class="form-control" value="R$ 99,90 / mês" required="" readonly="readonly">
				</div>
				<!--<div class="form-group">
					<label for="item-value">Valor do produto/serviço: <br></label>
					<input type="hidden" id="item-value" class="form-control"  value="501"
					required readonly="readonly">
				</div>
				<div class="form-group">
					<label for="item-amount">Quantidade de itens: <br></label>
					<input type="hidden" id="item-amount" class="form-control"  value="1"
					required readonly="readonly">
				</div>-->

					<input type="hidden" id="item-value" class="form-control"  value="9990"
					required readonly="readonly">

						<input type="hidden" id="item-amount" class="form-control"  value="1"
					required readonly="readonly">
				</div>
			
		</form>



		<div class="col-lg-4 col-md-4 col-sm-12">
			<h5>Forma de Pagamento</h5>
			<ul class="nav nav-tabs">
				<li role="presentation" class="active" id="boleto"><a href="#" class="boleto">Boleto</a></li>
				<!--<li role="presentation" id="cartao" ><a href="#" class="cartao">Cartão</a></li>-->
			</ul>
		</div>
	</div>
		<div class="col-lg-12">
			<form id="form-cartao" class="hide">
				<div class="col-lg-4 col-md-4 col-sm-12">
					<h5 style="margin-top:0px;">Informações do Cliente</h5>
					<div class="form-group">
						<label for="customer-name">Nome do cliente:<br></label>
						<input type="text" id="customer-name" class="form-control" placeholder="Nome do cliente" required="">
					</div>
					<div class="form-group">
						<label for="customer-cpf">CPF:<br></label>
						<input type="text" id="customer-cpf" class="form-control" placeholder="CPF" required="">
					</div>
					<div class="form-group">
						<label for="customer-email">E-mail: <br></label>
						<input type="email" id="customer-email" class="form-control" placeholder="E-mail" required="" >
					</div>
					<div class="form-group">
						<label for="customer-phone_number">Telefone:<br></label>
						<input type="text" id="customer-phone_number" class="form-control" placeholder="Telefone" required="" >
					</div>
					<div class="form-group">
						<label for="customer-birth">Data de Nascimento:<br></label>
						<input type="text" id="customer-birth" class="form-control" placeholder="Data de nascimento" required="" >
					</div>	
					<div class="form-group">
						<label for="customer-birth">Senha de acesso ao sistema:<br></label>
						<input type="password"  class="form-control" required="" id="customer-password"  >
					</div>					
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12">
				<h5 style="margin-top:0px;">Informações do Endereço</h5>
					<div class="form-group">
						<label for="street">Endereço: <br></label>
						<input type="text" id="street" class="form-control" placeholder="Rua ou Av." required=""  >
					</div>
					<div class="form-group">
						<label for="number">Número: <br></label>
						<input type="text" id="number" class="form-control" placeholder="Número" >
					</div>
					<div class="form-group">
						<label for="neighborhood">Bairro: <br></label>
						<input type="text" id="neighborhood" class="form-control" placeholder="Bairro"  >
					</div>
					<div class="form-group">
						<label for="zipcode">CEP:<br></label>
						<input type="text" id="zipcode" class="form-control" placeholder="CEP" >
					</div>
					<div class="form-group">
						<label for="city">Cidade:<br></label>
						<input type="text" id="city" class="form-control" placeholder="Cidade" >
					</div>
					<div class="form-group">
						<label for="state">Estado:<br></label>
						<input type="text" id="state" class="form-control" placeholder="Estado" >
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12">
				<h5 style="margin-top:0px;">Informações do Cartão</h5>
					<div class="form-group">
						<label for="brand">Bandeira do Cartão: <br></strong></label>
						<select id="brand" class="form-control" required="">
							<option value="" Selecione um bandeira</option>							
							<option value="visa" selected="">Visa</option>
							<option value="mastercard">MasterCard</option>
							<option value="jcb">JCB</option>
							<option value="diners">Diners</option>
							<option value="amex">Amex</option>
							<option value="elo">Elo</option>
							<option value="aura">Aura</option>
						</select>
					</div>
					<div class="form-group">
						<label for="number">Número: <br></label>
						<input type="text" class="form-control atr-card" id="numero" name="number" required="" >
					</div>
					<div class="form-group">
						<label for="cvv">Código de segurança: <br></label>
						<input type="text" class="form-control" id="cvv" max="3" required="" >
					</div>
					<div class="form-group">
						<label for="expiration_month">Mês de validade: <br></label>
						<input type="text" class="form-control" id="expiration_month">
					</div>
					<div class="form-group">
						<label for="expiration_year">Ano de validade: <br></label>
						<input type="text" class="form-control" id="expiration_year" required="" >
					</div>
					<input type="hidden" id="token">

				
				</div>
			</form>
			<form id="form-boleto" >
				<div class="col-lg-4 col-md-4 col-sm-12">
				<h5 style="margin-top:0px;">Informações do Cliente</h5>
					<div class="form-group">
						<label for="customer-name-b">Nome do cliente: <!--(<em class="atributo">name</em>)--><br></label>
						<input type="text" id="customer-name-b" class="form-control" placeholder="Nome do cliente" required="">
					</div>
					<div class="form-group">
						<label for="customer-cpf-b">CPF:</label>
						<input type="text" id="customer-cpf-b" class="form-control" placeholder="CPF " required="">
					</div>
							
					<div class="form-group">
						<label for="customer-phoneNumber-b">Telefone:<br></label>
						<input type="text" id="customer-phoneNumber-b" class="form-control" placeholder="Telefone" required="">
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12">
						<h5 style="margin-top:0px;">Informações para acesso ao sistema</h5>
						<div class="form-group">
						<label for="customer-email">E-mail: <br></label>
						<input type="email" id="customer-email-b" class="form-control" placeholder="E-mail" required="">
					</div>
						<div class="form-group">
						<label for="customer-birth">Senha: <br></label>
						<input type="password"  class="form-control" required id="customer-password-b">
						</div>
						<!--
						<div class="form-group">
						<label for="customer-birth">Data de vencimento: (<em class="atributo">expire_at</em>)<br></label>
						
					</div>-->	
					<input type="hidden" id="expire_at" class="form-control" placeholder="Data de vencimento" required="" value="<?php echo date('Y-m-d', strtotime('+2 days'));?>">


				</div>
			
			</form>
		</div>
			<div class="col-lg-4 col-md-4 col-sm-12">
			<button id="btn_emitir_assinatura" type="submit" class="btn btn-success">Emitir assinatura <img src="../img/ok-mark.png"></button>
		</div>


<!-- Este componente é utilizando para exibir um alerta(modal) para o usuário aguardar as consultas via API.  -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myModalLabel">Um momento.</h4>
			</div>
			<div class="modal-body">
				Estamos processando a requisição <img src="../img/ajax-loader.gif">.
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary">Fechar</button>
			</div>
		</div>
	</div>
</div>

<!-- Este componente é utilizando para exibir um alerta(modal) para o usuário aguardar as consultas via API.  -->
<div class="modal fade" id="myModalResult" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">



			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myModalLabel">Retorno da emissão da Assinatura.</h4>

							<h6>Aguarde a confirmação de pagamento por email, e após isso use os dados (email e senha) informados na tela anterior para acessar o sistema.</h6>
			</div>
			<div class="modal-body">

				<!--div responsável por exibir o resultado da emissão do boleto-->
				<div>
					<div class="panel panel-success">
						<div class="panel-body">
							<div class="table-responsive">
								<strong>Dados da Assinatura</strong>
								<table class="table table-bordered">
									<thead>
										<tr>
											<th># ("subscription_id")</th>
											<th>Status</th>
											<th>Código de Barras</th>
											<th>Link</th>											
										</tr>
									</thead>
									<tbody id="table-geral">										
									</tbody>
								</table>
								<strong>Dados do Plano</strong>
								<table class="table table-bordered">
									<thead>
										<tr>
											<th># ("plan_id")</th>
											<th>Intervalo (periodicidade) das cobranças (1 = mensal)</th>
											<th>Data. Exp.</th>
											<th>Valor Total</th>
										</tr>
									</thead>
									<tbody id="table-info">

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Este componente é utilizando para exibir um alerta(modal) para o usuário aguardar as consultas via API.  -->
<div class="modal fade" id="myModalResultCard" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myModalLabel">Retorno da emissão da Assinatura.</h4>
				<h6>Aguarde a confirmação de pagamento por email, e após isso use os dados (email e senha) informados na tela anterior para acessar o sistema.</h6>
			</div>
			<div class="modal-body">

				<!--div responsável por exibir o resultado da emissão do boleto-->
				<div>
					<div class="panel panel-success">
						<div class="panel-body">
							<div class="table-responsive">


								


								<strong>Dados da Assinatura</strong>
								<table class="table table-bordered">
									<thead>
										<tr>
											<th># ("subscription_id")</th>
											<th>Status</th>																			
										</tr>
									</thead>
									<tbody id="table-geral-card">										
									</tbody>
								</table>
								<strong>Dados do Plano</strong>
								<table class="table table-bordered">
									<thead>
										<tr>
											<th># ("plan_id")</th>
											<th>Intervalo (periodicidade) das cobranças (1 = mensal)</th>
											<th>Valor Total</th>
										</tr>
									</thead>
									<tbody id="table-info-card">

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>













<!-- Este componente é utilizando para exibir um alerta(modal) para o usuário aguardar as consultas via API.  -->
<div class="modal fade" id="myModalResultCard2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myModalLabel">Retorno da emissão da Assinatura.</h4>
				<h6>Aguarde a confirmação de pagamento por email, e após isso use os dados (email e senha) informados na tela anterior para acessar o sistema.</h6>
			</div>
			<div class="modal-body">

				<!--div responsável por exibir o resultado da emissão do boleto-->
				<div>
					<div class="panel panel-success">
						<div class="panel-body">
							<div class="table-responsive">



								<strong>Dados da Assinatura</strong>
								<table class="table table-bordered">
									<thead>
										<tr>
											<th># ("subscription_id")</th>
											<th>Status</th>																			
										</tr>
									</thead>
									<tbody id="table-geral-card">										
									</tbody>
								</table>
								<strong>Dados do Plano</strong>
								<table class="table table-bordered">
									<thead>
										<tr>
											<th># ("plan_id")</th>
											<th>Intervalo (periodicidade) das cobranças (1 = mensal)</th>
											<th>Valor Total</th>
										</tr>
									</thead>
									<tbody id="table-info-card">

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>















</div>



</body>

</html>