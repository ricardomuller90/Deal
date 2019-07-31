<?php
require_once 'basic-logging.php';
//database configuration
    $dbHost     = '108.167.169.163:3306';
    $dbUsername = 'prmuller_wordp';
    $dbPassword = 'Alberto0';
    $dbName     = 'prmuller_calculos';

//echo '<script>alert("Eu sou um alert!");</script>';

#Verifica se tem um cpf para pesquisa
basicLog(print_r($_POST, true));
if(isset($_POST['emaill'])){ 

    #Recebe o cpf Postado
    $emaill = $_POST['emaill'];

    #Conecta banco de dados 
    $Mysqli = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
    $sql = mysqli_query($Mysqli, "SELECT 
    username, final_assinatura, tipo_assinatura
        FROM 
         contas 
         WHERE 
             username = '".$emaill."' OR email='".$emaill."'") or print mysql_error();

    
    if(mysqli_num_rows($sql)>0) {
        $row = mysqli_fetch_assoc($sql);
        $ret = json_encode(array(
            'cadastrado' => TRUE,
            'msg' => 'EMAIL JÁ CADASTRADO!',
            'final_assinatura' => strtotime($row['final_assinatura'])*1000,
            'tipo_assinatura' => $row['tipo_assinatura']
        ));
        basicLog(print_r($ret, true));
        echo $ret;
    } else {
        echo json_encode(array('cadastrado' => FALSE ));
    }


    

} ?>