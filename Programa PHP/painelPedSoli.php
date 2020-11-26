<?php
session_start();
include('verifica_login.php');
?>


<?php

include("conexao2.php");

$nome2 = $_SESSION['nome'];


$usuarioCli_id = $_GET['edit'];

$sql_code = "SELECT * from pedido where usuarioCli_id = '$usuarioCli_id' group by tipoServ_id";
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

<script>
$(document).ready(function() {
  //Fixing jQuery Click Events for the iPad
  var ua = navigator.userAgent,
    event = (ua.match(/iPad/i)) ? "touchstart" : "click";
  if ($('.table').length > 0) {
    $('.table .header').on(event, function() {
      $(this).toggleClass("active", "").nextUntil('.header').css('display', function(i, v) {
        return this.style.display === 'table-row' ? 'none' : 'table-row';
      });
    });
  }
})
</script>
<head>
    <meta charset="utf-8">
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://assets.ubuntu.com/v1/vanilla-framework-version-2.19.3.min.css" rel="stylesheet">
    <link href="https://assets.ubuntu.com/v1/4653d9ba-example.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/css.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta http-equiv="cache-control" content="max-age=0" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>


	<body>

    <div class="header" >
		<div padding-righ="5px">
        <a href="#" class="logo">Olá, <?php echo $_SESSION['nome'];?> (Contratante)</a>
		</div>
        <div class="header-right">
            <a href="painel.php" > Solicitar Serviço</a> 
            <a href="painelPedSoli.php?edit=<?php echo $linha['usuario_id']; ?>" > Meus Pedidos</a> 
            <a class="active" href="logout.php">Sair</a>
 
        </div>
    </div>
	

    <div style="padding:20px">
    <br>
    <center>
    <h1> Meus Pedidos</h1>
    </center>

    <table class="p-table-expanding" aria-label="Example of expanding table">
    <thead>
        <tr>
            <th id="t-users" aria-sort="none">Tipo de serviço solicitado</th>
            <th id="t-units0" aria-sort="none">Informações Solicitadas</th>
            <th id="t-units2" aria-sort="none">Serviço solicitado para o Dia</th>
            <th id="t-revenue" aria-sort="none" class="u-align--right">Ação</th>
            <th aria-hidden="true">
                <!-- hidden empty cell required for validation -->
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
            do{
            ?>

        <tr>
                <?php
                
                $codigoo = $linha['tipoServ_id'];
                $sql_code2 = "SELECT tipoServico from tipoServico where tipoServ_id = '$codigoo' ";
                $sql_query2 = $mysqli->query($sql_code2) or die ($mysqli->error);
                $linha2 = $sql_query2->fetch_assoc();
                $result2 = $mysqli->query($sql_code2) or die ($mysqli->error);

                $nomeCont = $linha['usuarioCon_id'];
                $sql_code3 = "SELECT * from usuario where usuario_id = '$nomeCont' ";
                $sql_query3 = $mysqli->query($sql_code3) or die ($mysqli->error);
                $linha3 = $sql_query3->fetch_assoc();
                $result3 = $mysqli->query($sql_code3) or die ($mysqli->error);
                ?>
                <td aria-label="Users"><?php echo $linha2['tipoServico']; ?></td>
                <td aria-label="Units"><?php echo $linha['descricao_cli']; ?></td>
                <td aria-label="Units"><?php echo $linha['dia']; ?></td>
                <td class="u-align--right">
                <button class="u-toggle is-dense" aria-controls="<?php echo $linha['pedido_id']; ?>" aria-expanded="false" data-shown-text="Esconder" data-hidden-text="Mostrar mais informações">Mostrar mais informações</button>
            </td>

            <td id="<?php echo $linha['pedido_id']; ?>" class="p-table-expanding__panel" aria-hidden="true">
                <div class="row">
                    <div class="col-8">
                            <table  class="w3-table-all">
			<tr  class="w3-red">
                <td>N Pedido</td>               
                <td>Nome do Contratado</td>
                <td>Retorno do Contratado</td>
                <td>Valor do orçamento</td>
                <td>Açao</td>
			</tr>
            <?php
            $sql_code10 = "SELECT * from pedido where (usuarioCli_id = '$usuarioCli_id') and (tipoServ_id = '$codigoo') ";
                $sql_query10 = $mysqli->query($sql_code10) or die ($mysqli->error);
                $linha10 = $sql_query10->fetch_assoc();
                $result10 = $mysqli->query($sql_code10) or die ($mysqli->error);
            do{
            ?>
            <tr>
                <?php


                $nomeCont = $linha10['usuarioCon_id'];
                $sql_code3 = "SELECT * from usuario where usuario_id = '$nomeCont' ";
                $sql_query3 = $mysqli->query($sql_code3) or die ($mysqli->error);
                $linha3 = $sql_query3->fetch_assoc();
                $result3 = $mysqli->query($sql_code3) or die ($mysqli->error);

                $aprov_cont = $linha10['aprovacao_cont'];
                $aprov_cli = $linha10['aprovacao_cli'];
                ?>
                <td><?php echo $linha10['pedido_id']; ?></td>
                <td><?php echo $linha3['nome']; ?></td>

                <?php if($linha10['descricao_cont'] == " "):
                  $descri_cont = "aguardando";
                else:
                  $descri_cont = $linha10['descricao_cont'];
                endif;

                $pedido_id = $linha10['pedido_id'];;
                 ?>
                <td><?php echo $descri_cont; ?></td>

                <?php if($linha10['valor'] == 0):
                  $valor_d = "aguardando";
                else:
                  $valor_d = $linha10['valor'];
                endif;
                 ?>
                <td>R$ <?php echo $valor_d; ?></td>

                <?php if (($aprov_cont == "false") and ($aprov_cli == "false")):
                  $classe = "btn btn-warning disabled";
                  $frase = "Aguardando orçamento";
                  $tipo = "button";
                elseif (($aprov_cont == "true") and ($aprov_cli == "false")):
                  $classe = "btn btn-info";
                  $frase = "Aceitar a proposta";
                  $tipo = "submit";
                else :
                  $classe = "btn btn-success disabled";
                  $frase = "Confirmado";
                  $tipo = "button";
                endif;
                 ?>
                <td>
                <form action="conexaoConPed.php" method="POST">
                    <input name="pedido_id" type="hidden" class="form-control" value="<?php echo $pedido_id; ?>" placeholder="id">
                    <button type="<?php echo $tipo ?>" name="update" class="<?php echo $classe ?>"><?php echo $frase ?></button>
                </form>
                </td>
                
            </tr>
            <?php } while($linha10 = $sql_query10->fetch_assoc());?>


		</table>
                    </div>
                </div>
            </td>
            </tr>
            <?php } while($linha = $sql_query->fetch_assoc());?>

    </tbody>
</table>


    <br>

       </div>
	
    </div>
    </div>
    <center>
        <div class="footer" >
  <p style="margin-bottom: 0px; max-width: none; ">&copy; Projeto de Prática Profissional em ADS</p>
</div>
</center>
	</body>
<script type="text/javascript">
/**
  Toggles the necessary aria- attributes' values on the table panels
  to show or hide them.
  @param {HTMLElement} element The tab that acts as the handles.
  @param {Boolean} show Whether to show or hide the expanded row panel.
*/
function toggleExpanded(element, show) {
  var target = document.getElementById(element.getAttribute('aria-controls'));

  if (target) {
    element.setAttribute('aria-expanded', show);

    // Adjust the text of the toggle button
    if (show) {
      element.innerHTML = element.getAttribute('data-shown-text');
    } else {
      element.innerHTML = element.getAttribute('data-hidden-text');
    }

    target.setAttribute('aria-hidden', !show);
  }
}

/**
  Attaches event listeners for the expandable table open and close click events.
  @param {HTMLElement} table The expandable table container element.
*/
function setupExpandableTable(table) {
  // Set up an event listener on the container so that panels can be added
  // and removed and events do not need to be managed separately.
  table.addEventListener('click', function(event) {
    var target = event.target;
    var isTargetOpen = target.getAttribute('aria-expanded') === 'true';

    if (target.classList.contains('u-toggle')) {
      // Toggle visibility of the target panel.
      toggleExpanded(target, !isTargetOpen);
    }
  });
}

// Setup all expandable tables on the page.
var tables = document.querySelectorAll('.p-table-expanding');

for (var i = 0, l = tables.length; i < l; i++) {
  setupExpandableTable(tables[i]);
}
</script>

</html>