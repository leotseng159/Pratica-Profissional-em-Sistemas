<?php

session_start();

$host = "localhost";
$usuario = "uwnr528tqnkyu";
$senha = "lijoobelijoobe";
$db = "dbjrsj4hp65vj7";

include("conexao.php");


$update = false;
$usuario_id = 0;
$nome2 = "";
$usuario2 = "";



$mysqli = new mysqli($host, $usuario, $senha, $db);

if($mysqli->connect_errno)
    echo "Falha na conexão: (".$mysqli->connect_errno.") ".$mysqli->connect_error;

if(isset($_GET['edit'])){
    $usuario_id = $_GET['edit'];
    $result = $mysqli->query("select * from usuario where usuario_id = $usuario_id") or die($mysqli->error());
    if (count($result)==1){
        $linha = $result->fetch_array();
        $nome2 = $linha['nome'];
        $usuario2 = $linha['usuario'];
        $tipoConta2 = $linha['tipoConta'];
        $aprovacao = $linha['aprovacao'];
    }
}

if(isset($_POST['update'])){
    $usuario_id = $_POST['usuario_id'];
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $tipoConta = $_POST['tipoConta2'];
    $aprovacao = $_POST['aprovacao'];

    $_SESSION['message'] = "Alterado com sucesso!";
    $_SESSION['msg_type'] = "success";

    $mysqli->query("UPDATE usuario SET nome ='$nome', usuario ='$usuario', tipoConta ='$tipoConta', aprovacao='$aprovacao' where usuario_id ='$usuario_id'") or die($mysqli->error);
    
    header('Location: painelAdm.php');
}


?>
