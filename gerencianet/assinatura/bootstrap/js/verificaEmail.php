<?php
//database configuration
    $dbHost     = 'mysql.laranja-marranghello.com.br';
    $dbUsername = 'maranga';
    $dbPassword = 'jupiter1212';
    $dbName     = 'maranga';

echo '<script>alert("Eu sou um alert!");</script>';

#Verifica se tem um cpf para pesquisa
if(isset($_POST['emaill'])){ 

    #Recebe o cpf Postado
    $emaill = $_POST['emaill'];

    #Conecta banco de dados 
    $Mysqli = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
    $sql = mysqli_query($Mysqli, "SELECT 
    username 
        FROM 
         contas 
         WHERE 
             username = '".$emaill."'") or print mysql_error();

 if(mysqli_num_rows($sql)>0) 

        echo json_encode(array('cadastrado' => TRUE,'msg' => 'EMAIL JÁ CADASTRADO!')); 

    else 
        echo json_encode(array('cadastrado' => FALSE ));


    

} ?>