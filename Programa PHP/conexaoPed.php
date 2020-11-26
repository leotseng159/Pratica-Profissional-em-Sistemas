<?php

session_start();

$host = "localhost";
$usuario = "uwnr528tqnkyu";
$senha = "lijoobelijoobe";
$db = "dbjrsj4hp65vj7";

include("conexao.php");


$update = false;
$pedido_id = 0;
$descricao_cont2 = " ";
$aprovacao_cont = " ";




$mysqli = new mysqli($host, $usuario, $senha, $db);

if($mysqli->connect_errno)
    echo "Falha na conexão: (".$mysqli->connect_errno.") ".$mysqli->connect_error;

if(isset($_GET['edit'])){
    $pedido_id = $_GET['edit'];
    $result2 = $mysqli->query("select * from pedido where pedido_id = $pedido_id") or die($mysqli->error());
    if (count($result)==1){
        $linha2 = $result->fetch_array();
        $descricao_cont = $linha2['descricao_cont'];
        $valor2 = $linha2['valor'];
		$usuarioCon_id = $linha2['usuarioCon_id'];
		$aprovacao_cont= $linha2['aprovavao_cont'];
    }
}

if(isset($_POST['update'])){
    $pedido_id = $_POST['pedido_id'];
    $descricao_cont2 = $_POST['descricao_cont'];
    $valor2 = $_POST['valor'];
	$aprovacao_cont = $_POST['aprovacao_cont'];

    $_SESSION['message'] = "Alterado com sucesso!";
    $_SESSION['msg_type'] = "success";

    $mysqli->query("UPDATE pedido SET descricao_cont ='$descricao_cont2', valor ='$valor2', aprovacao_cont ='$aprovacao_cont' where pedido_id ='$pedido_id'") or die($mysqli->error);
    header("Location: painel2.php");
}


?>
