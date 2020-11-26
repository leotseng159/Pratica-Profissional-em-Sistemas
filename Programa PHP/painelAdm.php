<?php
session_start();
include('verifica_login.php');
?>


<?php

include("conexao2.php");

$sql_code = "SELECT * FROM usuario";
$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
$linha = $sql_query->fetch_assoc();
$result = $mysqli->query($sql_code) or die ($mysqli->error);

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
        <a href="#" class="logo">Olá, <?php echo $_SESSION['nome'];?></a>
		</div>
        <div class="header-right">
            <a href="painelAdm.php" > Usuarios</a> 
            <a href="painelTodosServ.php" >Serviços</a>
            <a class="active" href="logout.php">Sair</a>
 
        </div>
    </div>


    <div style="padding:20px">
    <br>
    <center>
    <h1> Usuarios Cadastrados</h1>
    </center>
    <br>
		<table  class="w3-table-all">
			<tr  class="w3-red">
				<td>Codigo</td>
				<td>Usuario</td>
				<td>Nome</td>
				<td>Tipo Conta</td>
				<td>Aprovacao</td>
                <td>Data</td>
                <td>Ação</td>
			</tr>
            <?php
            do{
            ?>
            <tr>
                <td><?php echo $linha['usuario_id']; ?></td>
                <td><?php echo $linha['usuario']; ?></td>
                <td><?php echo $linha['nome']; ?></td>
                <td><?php echo $linha['tipoConta']; ?></td>
                <td><?php echo $linha['aprovacao']; ?></td>
               </td>
                <td><?php echo $linha['data_cadastro']; ?></td>
                <td>
                    <a href="painelAdm.php?edit=<?php echo $linha['usuario_id']; ?>" class="btn btn-info"> Editar</a>
                </td>
            </tr>
            <?php } while($linha = $sql_query->fetch_assoc());?>


		</table>
       </div>
		<br><br><br>
    <div>
    <div style="background-color: #f2f7fa; border-radius: 6px; box-shadow: 0 2px 3px rgba(10,10,10,.1), 0 0 0 1px rgba(10,10,10,.1); color: #4a4a4a; display: block; padding: 1.25rem; margin-left:40%; margin-right:40%; margin-bottom:10%;">
                             
        <center>
            <div class="row justify-content-center">
            <form action="conexao2.php" method="POST">
                <div class="form-group">
                <input name="usuario_id" type="hidden" class="form-control" value="<?php echo $usuario_id; ?>" placeholder="Nome" autofocus>
                <label>Nome</label>
                <input name="nome" type="text" class="form-control" value="<?php echo $nome2; ?>" placeholder="Nome" autofocus>
                </div>
                <div class="form-group">
                <label>Usuario</label>
                <input name="usuario" type="text" class="form-control" value="<?php echo $usuario2; ?>" placeholder="Usuário">
                </div>
				<div class="form-group">
                <label>Tipo Conta</label>
					<select name="tipoConta2">
						<option value="<?php echo $tipoConta2; ?>">Não alterar</option>
						<option value="contratante" >Contratante (Cliente)</option>
						<option value="contratado">Contratado</option>
					</select>
                </div>
				<div class="form-group">
				<label>Aprovação</label>
				<select name="aprovacao">
						<option value="<?php echo $aprovacao; ?>">Não alterar</option>
						<option value="false" >Pendente</option>
						<option value="true">Aprovar</option>
				</select>
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