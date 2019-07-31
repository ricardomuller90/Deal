<?php
 
require __DIR__.'/../../vendor/autoload.php'; // caminho relacionado a SDK
 
use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;
 
$clientId = 'Client_Id_62b1b867c7e37c0b671244299bf0271ca6671679'; // insira seu Client_Id, conforme o ambiente (Des ou Prod)
$clientSecret = 'Client_Secret_85209df840950e22045724f51c73017b88bc5259'; // insira seu Client_Secret, conforme o ambiente (Des ou Prod)
 
$options = [
  'client_id' => $clientId,
  'client_secret' => $clientSecret,
  'sandbox' => false // altere conforme o ambiente (true = desenvolvimento e false = producao)
];

$params = ['limit' => 20, 'offset' => 0];

try {
    $api = new Gerencianet($options);
    $plans = $api->getPlans($params, []);
    print_r($plans);
} catch (GerencianetException $e) {
    print_r($e->code);
    print_r($e->error);
    print_r($e->errorDescription);
} catch (Exception $e) {
    print_r($e->getMessage());
}