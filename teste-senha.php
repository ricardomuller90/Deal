<?php 

$senha = '123';

echo password_hash($senha, PASSWORD_BCRYPT);

?>