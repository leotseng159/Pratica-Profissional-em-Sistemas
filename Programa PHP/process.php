<?php
$host = "localhost";
$usuario = "uwnr528tqnkyu";
$senha = "lijoobelijoobe";
$db = "dbjrsj4hp65vj7";


$mysqli = new mysqli($host, $usuario, $senha, $db);

if($mysqli->connect_errno)
    echo "Falha na conexão: (".$mysqli->connect_errno.") ".$mysqli->connect_error;

?>
