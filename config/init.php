<?php
  
// constantes com as credenciais de acesso ao banco MySQL
define('DB_HOST', '108.167.169.163:3306');
define('DB_USER', 'prmuller_wordp');
define('DB_PASS', 'Alberto0');
define('DB_NAME', 'prmuller_calculos');
  
// habilita todas as exibições de erros
ini_set('display_errors', true);
error_reporting(E_ALL);
 
date_default_timezone_set('America/Sao_Paulo');
  
// inclui o arquivo de funçõees
require_once 'functions.php';
global $PDO;
$PDO = db_connect();