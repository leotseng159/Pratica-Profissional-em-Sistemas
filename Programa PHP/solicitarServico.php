<?php


session_start();
include("conexao.php");

$tipoServ_id = intval(mysqli_real_escape_string($conexao, trim($_POST['tipoServ_id'])));
$descricao_cli = mysqli_real_escape_string($conexao, trim($_POST['descricao_cli']));
$usuarioCli_id = intval(mysqli_real_escape_string($conexao, trim($_POST['usuarioCli_id'])));
$dia = mysqli_real_escape_string($conexao, trim($_POST['dia']));
$aprovacao_cli = mysqli_real_escape_string($conexao, trim($_POST['aprovacao_cli']));


$sql = "select count(*) as total from pedido where tipoServ_id = '$tipoServ_id'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

$sql_code5 = "SELECT * FROM servico where tipoServ_id = '$tipoServ_id'";
$sql_query5 = mysqli_query($conexao, $sql_code5);
$linha5 = mysqli_fetch_assoc($sql_query5);

 

if($row['total'] == 10) {
	$_SESSION['servico_existe'] = true;
	header('Location: painel.php');
	exit;
}


do{
	$usuarioCon_id = $linha5['usuario_id'];    
     
                                                                
	$sql = "INSERT INTO pedido (tipoServ_id, descricao_cli, descricao_cont, usuarioCli_id, usuarioCon_id, dia, valor, aprovacao_cont, aprovacao_cli) VALUES ('$tipoServ_id', '$descricao_cli', ' ', '$usuarioCli_id', '$usuarioCon_id', '$dia', '0.0','false', 'false')";
if($conexao->query($sql) === TRUE) {
$_SESSION['status_cadastroServ'] = true;

}
} while($linha5 = $sql_query5->fetch_assoc());


$conexao->close();

header('Location: painel.php');
exit;

?>