<?php
session_start();
include("conexao.php");

$descricao = mysqli_real_escape_string($conexao, trim($_POST['descricao']));
$tipoServ_id = intval(mysqli_real_escape_string($conexao, trim($_POST['tipoServ_id'])));
$usuario_id = intval(mysqli_real_escape_string($conexao, trim($_POST['usuario_id'])));
$aprovacaoServ = mysqli_real_escape_string($conexao, trim($_POST['aprovacaoServ']));


$sql = "select count(*) as total from servico where descricao = '$descricao'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);


if($row['total'] == 1) {
	$_SESSION['servico_existe'] = true;
	header('Location: painel2.php');
	exit;
}


$sql = "INSERT INTO servico (descricao, tipoServ_id, usuario_id, aprovacaoServ, data_cadastro) VALUES ('$descricao', '$tipoServ_id', '$usuario_id', 'false', NOW())";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastroServ'] = true;
}

$conexao->close();

header('Location: painel2.php');
exit;
?>