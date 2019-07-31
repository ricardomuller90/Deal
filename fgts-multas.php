<html><head><style>
table {
  width:100%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
table#t01 tr:nth-child(even) {
  background-color: #eee;
}
table#t01 tr:nth-child(odd) {
 background-color: #fff;
}
table#t01 th {
  background-color: black;
  color: white;
}
</style></head>
<body>

<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'prmuller_wordp');
define('DB_PASS', 'Alberto0');
define('DB_NAME', 'prmuller_calculos');

function db_connect()
{
    $PDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
 
    return $PDO;
}

 $PDO = db_connect(); 
 ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<script type="text/javascript">  
     (function () {  


        // utilizaremos jQuery para facilitar nos seletores dos elementos  
        jQuery(function () {  

	
        	//fgtsParc
		$("#fgtsParc").change(function(){
		// Aqui você tem o value selecionado assim que o usuário muda o option
		var id = jQuery(this).val();
       

		if(id==1){
  		
  		var valorCalculado = 0;

  		
<?php 
for($i=1; $i<9; $i++){
?>
    	//pega parcela e calcula 8%
    	$( ".parcelaC<?php echo $i; ?>" ).each(function() {

    	var a<?php echo $i; ?> = $( this ).val();

    	 fgtsParc<?php echo $i; ?> = a<?php echo $i; ?>*8/100;

    	 	 //com R$
		var g = fgtsParc<?php echo $i; ?>.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
		

    	 $( "#fgtsParc<?php echo $i; ?>" ).text(g);

    	 });
<?php } ?>      






	//soma coluna FGTS da Parcela
	var somaFgts = 0;
	
    $( ".fgtsParc" ).each(function() {
	var a = $( this ).text();	
	a = a.substring(3);
	a = a.replace(",", ".");
	a = parseFloat(a);
	
			
    somaFgts += a;
	
		  
    });
	
	f = somaFgts.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
	
	
    $( "#totalFgts" ).text(f);






    
  	}else if(id==0){
  		fgtsParc = 0;
<?php 
for($i=1; $i<9; $i++){
?>
    	 $( "#fgtsParc<?php echo $i; ?>" ).text(fgtsParc);
		 $( "#multaFgts<?php echo $i; ?>" ).text(fgtsParc);
		  $( "#totalFgts" ).text(fgtsParc);
		   $( "#totalMultaFgts" ).text(fgtsParc);
		 
		 
         $('#multaFgts option[value="0"]').attr({ selected : "selected" });
	
<?php } ?>

  	}

    });





	//multaFgts
	$("#multaFgts").change(function(){
       // Aqui você tem o value selecionado assim que o usuário muda o option
       var id1 = jQuery(this).val();
       

  	if(id1==1){
  		
  		

  		
<?php 
for($a=1; $a<9; $a++){
?>
    	//pega parcela e calcula 8%
    	$( "#fgtsParc<?php echo $a; ?>" ).each(function() {

    	var b<?php echo $a; ?> = $( this ).text();

    	b<?php echo $a; ?> = b<?php echo $a; ?>.replace(",", ".");
    	b<?php echo $a; ?> = b<?php echo $a; ?>.replace("R$", "");
    	

    	multaFgts<?php echo $a; ?> = b<?php echo $a; ?>*20/100;
    	
    	 //com R$
		var f = multaFgts<?php echo $a; ?>;


		var a = f.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});

    	 $( "#multaFgts<?php echo $a; ?>" ).text(a);

    	
    	 });
<?php } ?>      




	//soma coluna MultaFGTS
	var somaMultaFgts = 0;

    $( ".multaFgts" ).each(function() {
			
	var b = $( this ).text();	
	b = b.substring(3);
	b = b.replace(",", ".");
	b = parseFloat(b);

			
    somaMultaFgts += b;
	
		  
    });
	
	g = somaMultaFgts.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
	
	
    $( "#totalMultaFgts" ).text(g);








    
  	}else if(id1==0){
  		multaFgts = 0;
<?php 
for($a=1; $a<9; $a++){
?>
    	 $( "#multaFgts<?php echo $a; ?>" ).text(multaFgts);
		 $( "#totalMultaFgts" ).text(multaFgts);
<?php } ?>

  	}
	else if(id1==2){
  		
  		

  		
<?php 
for($a=1; $a<9; $a++){
?>
    	//pega parcela e calcula 8%
    	$( "#fgtsParc<?php echo $a; ?>" ).each(function() {

    	var b<?php echo $a; ?> = $( this ).text();

    	b<?php echo $a; ?> = b<?php echo $a; ?>.replace(",", ".");
    	b<?php echo $a; ?> = b<?php echo $a; ?>.replace("R$", "");
    	

    	 multaFgts<?php echo $a; ?> = b<?php echo $a; ?>*40/100;
    	
    	 //com R$
		var f = multaFgts<?php echo $a; ?>;


		var a = f.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});

    	 $( "#multaFgts<?php echo $a; ?>" ).text(a);

    	
    	 });
<?php } ?>      

		//soma coluna MultaFGTS
	var somaMultaFgts = 0;

    $( ".multaFgts" ).each(function() {
			
	var b = $( this ).text();	
	b = b.substring(3);
	b = b.replace(",", ".");
	b = parseFloat(b);

			
    somaMultaFgts += b;
	
		  
    });
	
	g = somaMultaFgts.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
	
	
    $( "#totalMultaFgts" ).text(g);



    
  	}

    });











        	/*$('select').change(function() {
   var varURL = $("option:selected", this).val();
   $("#exibeValor").html('O valor selecionado é: ' + varURL);
   });*/




           $('input[name="calcular"]').click(function () {            
    
              // convertemos o valor1, valor2 para float  
              var n1 = parseFloat($('input[name="valor1"]').val()),       
                 n2 = parseFloat($('input[name="valor2"]').val());  
                   
              // obtemos o tipo da operação selecionado pelo usuário             
              var operacao = $('input[name="operacao"]:checked').val();  
    
              // chamamos o método calc, passando os valores de n1, n2 e o tipo de operação  
              // eval() é utilizado para que o valor do tipo 'string' seja reconhecido como um tipo de comando  
              var resultado = calc(n1, n2, eval(operacao));  
    
              // escrevemos o resultado na <div class="resultado"> com algumas estilizações  
              $('.resultado')  
                 .css({ 'font-weight': 'bold', 'font-size': '18pt' })  
                 .html(resultado);  
           });  
        });  
          
        function calc(n1, n2, method) {  
           return method(n1, n2);  
        }  
    
        function somar(n1, n2) {  
           return n1 + n2;  
        }  
    
        function subtrair(n1, n2) {  
           return n1 - n2;  
        }  
    
        function multiplicar(n1, n2) {  
           return n1 * n2;  
        }  
    
        function dividir(n1, n2) {  
           if (n2 === 0) {  
              return "Divisão não pode ser por Zero.";  
           }  
           return n1 / n2;  
        }   
     })();  
  </script>  



<script>
	$(function(){

    var valorCalculado = 0;

    $( ".valor-calculado2" ).each(function() {

    	var a1 = $( this ).text();

    	 valorCalculado = a1*8/100;

      

    });
	
     $( "#qtdtotal" ).text(valorCalculado);
	 
	 

    var valorCalculado1 = 0;
	
    $( ".parcelaSoma" ).each(function() {
			
    valorCalculado1 += parseInt($( this ).val());
		  
    });
	
	q = valorCalculado1.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
	
	
    $( "#qtdtotal1" ).text(q);
	
	
	


    
  });
</script>

<h1 style="margin:0px auto; text-align:center"> FGTS e Multas </h1>

<table class="table table-bordered table-hover" id="customFields" style="width: 900px; padding:30px; border: 1px solid #000; margin:0px auto; text-align:left;">
      <thead>
        <tr>
        </tr>
        <tr>
         
          <th width="35%">Nome </th>
          <th width="25%">Parcela</th>
          <th width="20%">FGTS da parcela</th>
          <th width="20%">Multa FGTS</th>
        </tr>

      </thead>
      <tbody>
        <tr valign="top">

        </tr>

        <?php 

$calculos = array('1' => 'insalubridade',  '2' => 'feriasVencidas', '3' => 'difSalariais');
$nomes = array('1' => 'Insalubridade', '2' => 'Férias Vencidas', '3' => 'Diferenças Salariais');


for($i=1; $i<9; $i++){


	$numProc= '123';

	?>



<?php


        
        $sql  = "SELECT * FROM ".$calculos[$i]." WHERE idProcesso = '123'";
        $stmt = $PDO->prepare($sql);
        $stmt->execute();
        $valores = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($valores as $row){


if($i==1){
$parcela = $row['salarioMin'] * $row['salarioMin']/100;

$parcela = $parcela * $row['mesesTrabalhados'];
$trintaporcento = $parcela *30/100;
$parcela = $parcela + $trintaporcento;



}

if($i==2){
$parcela = $row['salarioBase'] * 1.333;

}

if($i==3){
$parcela = $row['valor'] * $row['mesesTrabalhados'];

}



        ?>

 <tr valign="top" id="148">
         <input type="hidden" id="itemZone" value="148">
          <td><?php echo $nomes[$i];?></td>
		  <input type="hidden" class="parcelaC<?php echo $i;?>" value="<?php echo $parcela;?>">
		  <input type="hidden" class="parcelaSoma" value="<?php echo $parcela;?>">
		  <?php $parcela = 'R$ ' . number_format($parcela, 2, ',', '.'); ?>
          <td class="parcela<?php echo $i;?>"><?php echo $parcela;?></td>
          <td class="fgtsParc" id="fgtsParc<?php echo $i;?>"></td>
		  
          <td class="multaFgts" id="multaFgts<?php echo $i;?>"></td>
 </tr>
<?php } ?>
<?php 



	
?> 
       
<?php } ?>
		
        <tr style="font-weight:bolder"><td>Totais</td><td  id="qtdtotal1"></td><td id="totalFgts"></td><td id="totalMultaFgts"></td></tr>
      </tbody>
    </table>












<!--
  <table border="1" cellpadding="10" cellspacing="0">    
    <tr>  
     <td>Operação: </td>      
      <td>        
        <input type="radio" name="operacao" value="somar" checked="checked"/> Somar   
        <input type="radio" name="operacao" value="dividir" /> Dividir   
        <input type="radio" name="operacao" value="multiplicar" /> Multiplicar   
        <input type="radio" name="operacao" value="subtrair" /> Subtrair   
      </td>      
    </tr>  
    <tr>  
      <td>Valor 1:</td>  
      <td>        
        <input type="text" name="valor1" value="0" />        
      </td>      
  </tr>  
    <tr>  
      <td>Valor 2:</td>  
      <td>        
        <input type="text" name="valor2" value="0" />        
        <input type="button" name="calcular" value="Calcular" />  
      </td>      
    </tr>    
    <tr>  
      <td>Resultado:</td>  
      <td>  
        <div class="resultado"></div>  
      </td>  
    </tr>    
  </table>






<form name="frmChange">
   <select style="width:160px">
     <option value="Valor 1">Valor 1</option>
     <option value="Valor 2">Valor 2</option>
     <option value="Valor 3">Valor 3</option>
   </select>
</form>
<br />
<div id="exibeValor"></div>-->
<div style="width: 860px;  border: 1px solid #000; margin:0px auto; margin-top:30px; padding:20px;">
Fgts da parcela
<select name="fgtsParc" id="fgtsParc">
	<option value="0">NÃO</option>
	<option value="1">SIM</option>

	
</select> </br>

Multa do FGTS
<select name="multaFgts" id="multaFgts">
	<option value="0">NÃO</option>
	<option value="1">20%</option>
	<option value="2">40%</option>
</select>
</div>


 
</body>
</html>