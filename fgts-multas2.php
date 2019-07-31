<html>
	
<head>
<style>
    table, table td{
        border:2px solid #000;

    }

    table{width: 700px}

</style>

</head>

<body style="padding:30px;">

<h1>FGTS e Multas</h1>









<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!--
<div id="div1">Texto original</div>
<div id="div2">Texto original</div>
<div id="div3">Texto original</div>


<script>
	$("#div1").append(" <b>Adicionado usando append()</b>");
	$("#div2").prepend("<b>Adicionado usando prepend()</b> ");
	$("#div3").html(" <b>Adiciondo usando html()</b> ");
</script>
-->


<table>
	<tr><td style="width:200px;"></td><td style="width:100px;">Parcela</td><td style="width:100px;">FGTS da Parcela</td><td style="width:100px;">Multa do FGTS</td></tr>
	<tr><td>Insalubridade</td><td>1560,00</td><td>124,80</td><td>49,92</td></tr>
	<tr><td>Férias vencidas</td><td>1000</td><td></td><td></td></tr>
	<tr><td>Periculosidade</td><td>1560,00</td><td>124,80</td><td>49,92</td></tr>	
	<tr><td>Diferença salarial</td><td>200</td><td></td><td></td></tr>		
</table>

<p>FGTS da Parcela</p>

<select name="fgtsParc">
	<option value="1">SIM</option>
	<option value="0">NÃO</option>
	
</select>

<p>Multa do FGTS</p>

<select name="fgtsParc">
	<option value="2">40%</option>
	<option value="0">NÃO</option>
	<option value="1">20%</option>
	
</select>

</body>

<table>
	<tr><td style="width:200px;">Total</td><td style="width:100px;">4320,00</td><td style="width:100px;">249,60</td><td style="width:100px;">99,84</td></tr>
		
</table>



</html>