<?php

session_start();

$host = "localhost";
$usuario = "uwnr528tqnkyu";
$senha = "lijoobelijoobe";
$db = "dbjrsj4hp65vj7";

include("conexao.php");


$update = false;
$pedido_id = 0;




$mysqli = new mysqli($host, $usuario, $senha, $db);

if($mysqli->connect_errno)
    echo "Falha na conexão: (".$mysqli->connect_errno.") ".$mysqli->connect_error;

if(isset($_GET['edit'])){
    $pedido_id = $_GET['edit'];
    $result2 = $mysqli->query("select * from pedido where pedido_id = $pedido_id") or die($mysqli->error());
    if (count($result)==1){
        $linha2 = $result->fetch_array();
    }
}

if(isset($_POST['update'])){
    $pedido_id = $_POST['pedido_id'];

    $_SESSION['message'] = "Alterado com sucesso!";
    $_SESSION['msg_type'] = "success";

    $mysqli->query("UPDATE pedido SET aprovacao_cli ='true' where pedido_id ='$pedido_id'") or die($mysqli->error);
    header("Location: painel.php");
}


?>
