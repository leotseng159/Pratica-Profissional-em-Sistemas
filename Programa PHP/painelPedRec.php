<?php
session_start();
include('verifica_login.php');
?>


<?php

include("conexao2.php");

$nome2 = $_SESSION['nome'];


$usuario_id = $_GET['edit'];

$sql_code = "SELECT * from servico where usuario_id = '$usuario_id'";
$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
$linha = $sql_query->fetch_assoc();
$result = $mysqli->query($sql_code) or die ($mysqli->error);

$sql_code2 = "SELECT * from pedido where usuarioCon_id = '$usuario_id'";
$sql_query2 = $mysqli->query($sql_code2) or die ($mysqli->error);
$linha2 = $sql_query2->fetch_assoc();
$result2 = $mysqli->query($sql_code2) or die ($mysqli->error);

?>

<?php

if(isset($_SESSION['message'])):

?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">

<?php

    echo $_SESSION['message'];
    unset($_SESSION['message']);

?>
</div>
<?php endif ?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="CSS/css.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta http-equiv="cache-control" content="max-age=0" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>


	<body>

    <div class="header">
		<div padding-righ="5px">
        <a href="#" class="logo">Olá, <?php echo $_SESSION['nome'];?> (Contratado)</a>
		</div>
        <div class="header-right">
            <a href="painel2.php" > Cadastrar Serviço</a> 
            <a href="painelServCad.php?edit=<?php echo $usuario_id?>" > Meus Serviços</a> 
            <a href="painelPedRec.php?edit= <?php echo $usuario_id?>" > Pedidos Recebidos</a> 
            <a class="active" href="logout.php">Sair</a>
 
        </div>
    </div>


    <div style="padding:20px">
    <br>
    <center>
    <h1> Pedidos Recebidos</h1>
    </center>
    <br>
		<table  class="w3-table-all">
			<tr  class="w3-red">
				<td>Codigo Pedido</td>
				<td>Serviço</td>
				<td>Nome Contratante</td>
				<td>Descrição</td>
				<td>Data do serviço</td>
        <td>Detalhes para contatante</td>
        <td>Orçamento</td>
                <td>Ação</td>
			</tr>
            <?php
            do{
            ?>

            <?php
                
                $codigoo = $linha2['tipoServ_id'];
                $sql_code3 = "SELECT tipoServico from tipoServico where tipoServ_id = '$codigoo' ";
                $sql_query3 = $mysqli->query($sql_code3) or die ($mysqli->error);
                $linha3 = $sql_query3->fetch_assoc();
                $result3 = $mysqli->query($sql_code3) or die ($mysqli->error);

                $nomeCli = $linha2['usuarioCli_id'];
                $sql_code4 = "SELECT * from usuario where usuario_id = '$nomeCli' ";
                $sql_query4 = $mysqli->query($sql_code4) or die ($mysqli->error);
                $linha4 = $sql_query4->fetch_assoc();
                $result4 = $mysqli->query($sql_code4) or die ($mysqli->error);

                $aprov_cont = $linha2['aprovacao_cont'];
                $aprov_cli = $linha2['aprovacao_cli'];


            ?>
            <tr>
                <td><?php echo $linha2['pedido_id']; ?></td>
                <td><?php echo $linha3['tipoServico']; ?></td>
                <td><?php echo $linha4['nome']; ?></td>
                <td><?php echo $linha2['descricao_cli']; ?></td>
                <td><?php echo $linha2['dia']; ?></td>
                <td><?php echo $linha2['descricao_cont']; ?></td>
                <td><?php echo $linha2['valor']; ?></td>

                <?php if (($aprov_cont == "false") and ($aprov_cli == "false")):
                  $classe = "btn btn-info";
                  $frase = "Editar";
                  $tipo = "submit";
                  
                elseif (($aprov_cont == "true") and ($aprov_cli == "false")):
                  $classe = "btn btn-warning disabled";
                  $frase = "Aguardando Confirmação";
                  $tipo = "button";
                else :
                  $classe = "btn btn-success disabled";
                  $frase = "Cliente Confirmado";
                  $tipo = "button";
                endif;
                 ?>
                <td>
                    <a href="painelPedRec.php?edit=<?php echo $linha2['pedido_id']; ?>" class="<?php echo $classe ?>"> <?php echo $frase ?></a>
                </td>
            </tr>
            <?php } while($linha2 = $sql_query2->fetch_assoc());?>


		</table>
       </div>
		<br><br><br>
    <div>
    <div style="background-color: #f2f7fa; border-radius: 6px; box-shadow: 0 2px 3px rgba(10,10,10,.1), 0 0 0 1px rgba(10,10,10,.1); color: #4a4a4a; display: block; padding: 1.25rem; margin-left:40%; margin-right:40%; margin-bottom:10%;">
                             
        <center>
            <div class="row justify-content-center">
            <form action="conexaoPed.php" method="POST">
                <div class="form-group">
                <?php $pedido_id = $_GET['edit']; ?>
                <input name="pedido_id" type="hidden" class="form-control" value="<?php echo $pedido_id; ?>" placeholder="$pedido_id" autofocus>
				<input name="usuarioCon_id" type="hidden" class="form-control" value="<?php echo $usuarioCon_id; ?>" placeholder="usuarioCon_id" autofocus>
                <input name="aprovacao_cont" type="hidden" class="form-control" value="true" placeholder="aprovacao_cont" autofocus>
                <label>Detalhes para Contrantante</label>
                <div class="field">
                  <div class="control">
								  <textarea style="width: 300px; height:150px;" name="descricao_cont" type="text" class="input is-large" placeholder="Digite aqui" autofocus></textarea>
                  </div>
                 </div>
                </div>
                
                <div class="form-group">
                <label>Valor do Orçamento</label>
                <input name="valor" type="number" class="form-control" value="<?php echo $valor2; ?>" placeholder="Digite apenas numeros">
                </div>
			
                <div>
                <?php
                if (update == true):
                ?>
                    <button type="submit" name="update" class="btn btn-info">Atualizar</button>
                <?php endif; ?>
            </div>
        </div>
            </form>
        </center>
    </div>
    </div>

    <div class="footer" >
  <p style="margin-bottom: 0px;">&copy; Projeto de Prática Profissional em ADS</p>
</div>
	</body>
</html>