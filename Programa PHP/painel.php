<?php
session_start();
include('verifica_login.php');


include("conexao2.php");

$nome2 = $_SESSION['nome'];

$sql_code = "SELECT usuario_id FROM usuario where nome = '$nome2'";
$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
$linha = $sql_query->fetch_assoc();

$sql_code2 = "SELECT * FROM tipoServico";
$sql_query2 = $mysqli->query($sql_code2) or die ($mysqli->error);
$linha2 = $sql_query2->fetch_assoc();



?>


<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel Contratante</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="CSS/estilo.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="CSS/login.css">
    <link rel="stylesheet" href="CSS/css.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>


<body>

    <div class="header" style="background-color: white;">
		<div padding-righ="5px">
        <a href="#" class="logo">Olá, <?php echo $_SESSION['nome'];?> (Contratante)</a>
		</div>
        <div class="header-right">
            <a href="painel.php" > Solicitar Serviço</a> 
            <a href="painelPedSoli.php?edit=<?php echo $linha['usuario_id']; ?>" > Meus Pedidos</a> 
            <a class="active" href="logout.php">Sair</a>
 
        </div>
    </div>
	

    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Solicitar Serviço </h3>
                    <?php
                    if($_SESSION['status_cadastroServ']):
                    ?>
                        <div class="notification is-success">
                        <p>Pedido solicitado com sucesso!</p>
                        <p>Veja seus pedidos<a href="painelPedSoli.php?edit=<?php echo $linha['usuario_id']; ?>" > aqui</a></p>
                        </div>
                    <?php
                    endif;
                    unset($_SESSION['status_cadastroServ']);
                    ?>
                    <?php
                    if($_SESSION['servico_existe']):
                    ?>
                    <div class="notification is-info">
                        <p>O serviço escolhido já existe. Informe outro e tente novamente.</p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['servico_existe']);
                    ?>
		

                    <div class="box">
                      
 

                        <form action="solicitarServico.php"  method="POST">
                   
                          
                       
                        <div class="custom-select" style="padding: 0px;" >             
                            <select name="tipoServ_id">
                                <option value="">Selecione um tipo de Serviço</option>
                                <?php
                                do{
                                ?> 
                                
                                <option value="<?php echo $linha2['tipoServ_id']; ?>" ><?php echo $linha2['tipoServico']; ?></option>
                                <?php } while($linha2 = $sql_query2->fetch_assoc());?>
                            </select>
    
                        </div> 
                        <br> <br>
                        <div class="field">
                                <div class="control">
									<input name="usuarioCli_id" type="hidden" value="<?php echo $linha['usuario_id']; ?>" placeholder="Nome" autofocus>
                                    <textarea style="width: 300px; height:150px;" name="descricao_cli" type="text" class="input is-large" placeholder="Descrição" autofocus></textarea>
                                </div>
                        </div>
                        <br> 
                        <div class="field">
                                <div class="control">
                                    <p>Dia: <input type="text" name="dia" id="datepicker"></p>
                                </div>
                        </div>
                     
                    </div>
                 
              
                            <button type="submit" class="button is-block is-link is-large is-fullwidth"> Solicitar Orçamento</button>
            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<div class="footer" >
  <p style="margin-bottom: 0px;">&copy; Projeto de Prática Profissional em ADS</p>
</div>
</body>
<script>
var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>
 <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
</html>