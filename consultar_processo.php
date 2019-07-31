<?php session_start();
require_once 'config/init.php';
$_SESSION['idUsuario'] = '1';
?>
<html>
<head>
<script type="text/javascript" language="javascript" src="js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"></script>

<script>

$(document).ready(function() {
    $('#table_id').DataTable( {
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
    "sInfoPostFix": "",
    "sInfoThousands": ".",
    "sLengthMenu": "_MENU_ resultados por página",
    "sLoadingRecords": "Carregando...",
    "sProcessing": "Processando...",
    "sZeroRecords": "Nenhum registro encontrado",
    "sSearch": "Pesquisar",
    "oPaginate": {
        "sNext": "Próximo",
        "sPrevious": "Anterior",
        "sFirst": "Primeiro",
        "sLast": "Último"
    },
    "oAria": {
        "sSortAscending": ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente"
    }
        }
    } );
} );

</script>

<style type="text/css">
	
	body {
    font-family: 'Nunito', sans-serif;
    color: #384047;
    background: #c850c0;
    background: -webkit-linear-gradient(45deg, #325a96, #3e5361);
    background: -o-linear-gradient(45deg, #325a96, #3e5361);
    background: -moz-linear-gradient(45deg, #325a96, #3e5361);
    background: linear-gradient(45deg, #325a96, #3e5361);
}

	h1{text-align: center; margin:0px auto;}

</style>


<link rel="stylesheet" type="text/css" href="css/menu.css" />

<link rel="stylesheet" href="css/normalize.css">
<link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/main.css">

</head>
<body>
<?php include ('menu.html');?>

<div style="width:60%; margin:0px auto;">

   <div style="width:80%; margin:0px auto; margin-top:20px; background: #fff; border-radius: 5px; padding: 40px">
        <h1 style="margin-bottom:40px ">Consultar Processo</h1>
        
        <!--<fieldset>
          <!--<legend><span class="number">1</span>Your basic info</legend>
          <label for="salarioMin">N° do processo:</label>
          <input type="text" id="numProc" name="numProc">
          
     

        </fieldset>
        
    

        <button type="submit" class="remodal-confirm" style="width:100%">Pesquisar</button>
      </form>-->
	  
	  <table id="table_id" class="cell-border" >
        <thead>
            <tr style="text-align: left;">
                <th>N°</th>
                <th>Autor</th>
                <th>Empresa</th>
              
            </tr>
        </thead>
        <tbody>

	  <?php 
	  $PDO = db_connect(); 
        
    
		
		
	
			$stmt = $PDO->prepare('SELECT * FROM processo WHERE idUsuario = :idUsuario');
			 
	
			 
			$stmt->bindValue(':idUsuario', $_SESSION['idUsuario']);

		
		
		
		
       
        $stmt->execute();
        $valores = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($valores as $row){ ?>
		<tr><td><?php echo $row['numProc'];?></td><td><?php echo $row['nomeAutor'];?></td><td><?php echo $row['reuEmpresa'];?></td></tr>
		<?php } ?>
		</tbody>
		
		 <tfoot>
            <tr>
				<th>N°</th>
                <th>Autor</th>
                <th>Empresa</th>
               
            </tr>
        </tfoot>
	  </table>
</div>
</div>
</body>
</html>