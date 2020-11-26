<?php

session_start();

$host = "localhost";
$usuario = "uwnr528tqnkyu";
$senha = "lijoobelijoobe";
$db = "dbjrsj4hp65vj7";

include("conexao.php");


$update = false;
$servico_id = 0;




$mysqli = new mysqli($host, $usuario, $senha, $db);

if($mysqli->connect_errno)
    echo "Falha na conexão: (".$mysqli->connect_errno.") ".$mysqli->connect_error;

if(isset($_GET['edit'])){
    $servico_id = $_GET['edit'];
    $result = $mysqli->query("select * from servico where servico_id = $servico_id") or die($mysqli->error());
    if (count($result)==1){
        $linha = $result->fetch_array();
        $aprovacaoServ = $linha['aprovacaoServ'];
    }
}

if(isset($_POST['update'])){
    $servico_id = $_POST['servico_id'];
    $aprovacaoServ = $_POST['aprovacaoServ'];

    $_SESSION['message'] = "Alterado com sucesso!";
    $_SESSION['msg_type'] = "success";

    $mysqli->query("UPDATE servico SET aprovacaoServ='$aprovacaoServ' where servico_id ='$servico_id'") or die($mysqli->error);
    
    header('Location: painelTodosServ.php');
}


?>
