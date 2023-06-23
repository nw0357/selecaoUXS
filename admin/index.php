<?php

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="materialize/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
  <nav>
    <a href="#" class="brand-logo right"><img src="src/img/logo.png" alt=""></a>
  </nav>

  <div class="row">
      <div class="col s3">
        <ul class="section table-of-contents">
            <li><a href="index.php" class="left-align red-text">Início</a></li>
            <li><a href="ger_usuarios.php" class="left-align red-text">Gerenciar usuários</a></li>
            <li><a href="ger_cardapio.php" class="left-align red-text">Gerenciar cardápio</a></li>
            <li><a href="ger_cardapio.php" class="left-align red-text">Perfil</a></li>
            <li><a href="../sair.php" class="left-align red-text">Sair</a></li>
        </ul>
      </div>

      <div class="col5 s5">
        <div class="col s12 m7" id="cardapio">
          <h2>Cardápio</h2>
          <?php
          require_once 'conexao.php';

            $consulta=mysqli_query($conn, 'SELECT * FROM tb_prato ORDER BY nome');
            $resultado=mysqli_fetch_all($consulta, MYSQLI_ASSOC);
            if(mysqli_num_rows($consulta)>0):
              foreach($resultado as $linha):
          ?>
              <div class="card horizontal grey darken-4">
                <div class="card-image">
                  <img src="src/img_pratos/<?=$linha['nome']?>.png">
                </div>
                <div class="card-stacked">
                  <div class="card-content">
                    <h3 style="text-decoration: underline;" class="white-text"><?=$linha['nome']?></h3><br>
                    <blockquote class="white-text"><?=$linha['descricao']?></blockquote>
                    <div>
                      <i class="material-icons green-text">payments</i>
                      <span class="white-text" style="font-size:x-large;">R$<?=$linha['preco']?></span>
                    </div>
                  </div>
                  <div class="card-action">
                    <a href="cliente/realizar_pedido.php?id=<?=$linha['id_prato']?>" class="red-text">Realizar pedido</a>
                  </div>
                </div>
              </div>
          <?php
              endforeach;
            endif;
          ?>
        </div>
      </div>
    </div>
  <script src="materialize/js/materialize.min.js"></script>
</body>
</html>