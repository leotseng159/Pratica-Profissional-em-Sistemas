<?php
session_start();
include('verifica_login.php');
?>


<?php

include("conexaoServ2.php");




$sql_code = "SELECT * from servico";
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
    <h1> Serviços Cadastrados</h1>
    </center>
    <br>
		<table  class="w3-table-all">
			<tr  class="w3-red">
				<td>Codigo Serviço</td>
				<td>Serviço</td>
				<td>Aprovacao</td>
                <td>ID usuario</td>
                <td>Data Cadastro</td>
                <td>Açao</td>
			</tr>
            <?php
            do{
            ?>
            <tr>
                <td><?php echo $linha['tipoServ_id']; ?></td>
                <?php
                $codigoo = $linha['tipoServ_id'];
                $sql_code2 = "SELECT tipoServico from tipoServico where tipoServ_id = '$codigoo' ";
                $sql_query2 = $mysqli->query($sql_code2) or die ($mysqli->error);
                $linha2 = $sql_query2->fetch_assoc();
                $result2 = $mysqli->query($sql_code2) or die ($mysqli->error);
          
                ?>
                <td><?php echo $linha2['tipoServico']; ?></td>
                <td><?php echo $linha['aprovacaoServ']; ?></td>
                <td><?php echo $linha['usuario_id']; ?></td>
                <td><?php echo $linha['data_cadastro']; ?></td>
                
                <td>
                    <a href="painelTodosServ.php?edit=<?php echo $linha['servico_id']; ?>" class="btn btn-info"> Editar</a>
                </td>
            </tr>
            <?php } while($linha = $sql_query->fetch_assoc());?>


		</table>
       </div>
	
    </div>
    </div>

    	<br><br><br>
    <div>
    <div style="background-color: #f2f7fa; border-radius: 6px; box-shadow: 0 2px 3px rgba(10,10,10,.1), 0 0 0 1px rgba(10,10,10,.1); color: #4a4a4a; display: block; padding: 1.25rem; margin-left:40%; margin-right:40%; margin-bottom:10%;">
                             
        <center>
            <div class="row justify-content-center">
            <form action="conexaoServ2.php" method="POST">
				<div class="form-group">
                <input name="servico_id" type="hidden" class="form-control" value="<?php echo $servico_id; ?>" placeholder="Nome" autofocus>
				<label>Aprovação</label>
				<select name="aprovacaoServ">
						<option value="<?php echo $aprovacaoServ; ?>">Não alterar</option>
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