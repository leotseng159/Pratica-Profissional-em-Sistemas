<?php
session_start();
include('conexao.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: indexLogin.php');
	exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
$aprovacao = mysqli_real_escape_string($conexao, $_POST['aprovacao']);
$tipoConta = mysqli_real_escape_string($conexao, $_POST['tipoConta']);

$query = "select nome from usuario where usuario = '{$usuario}' and senha = md5('{$senha}')";
$tconta = "select tipoConta from usuario where usuario = '{$usuario}'";
$tsituacao = "select aprovacao from usuario where usuario = '{$usuario}'";

$result = mysqli_query($conexao, $query);
$tipo = mysqli_query($conexao, $tconta);
$situacao = mysqli_query($conexao, $tsituacao);

$row = mysqli_num_rows($result);


if($row == 1) {
    $usuario_aprova = mysqli_fetch_assoc($situacao);
    if($usuario_aprova['aprovacao'] == 'true') {
		$usuario_bd = mysqli_fetch_assoc($result);
		$usuarioId_bd = mysqli_fetch_assoc($result);
		$_SESSION['usuario_id'] = $usuarioId_bd['usuario_id'];
		$_SESSION['nome'] = $usuario_bd['nome'];
        $usuario_tipo = mysqli_fetch_assoc($tipo);
        if($usuario_tipo['tipoConta'] == 'contratante') {
            header('Location: painel.php');
            exit();
        } elseif($usuario_tipo['tipoConta'] == 'contratado') {
            header('Location: painel2.php');
            exit();
        } else {
            header('Location: painelAdm.php');
            exit();
        }
    } else {
        $_SESSION['nao_aprovado'] = true;
        header('Location: indexLogin.php');
        exit();
    }
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: indexLogin.php');
	exit();
}