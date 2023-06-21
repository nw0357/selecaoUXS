<?php
session_start();  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="materialize/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
      #form-login{
        visibility: hidden;
        display: none;
      }

      #sobre{
        visibility: hidden;
        display: none;
      }
    </style>
</head>
<body>

  <nav class="nav-extended">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Logo</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
    <div class="nav-content">
      <ul class="tabs tabs-transparent">
        <li class="tab"><a href="index.php" id="gat-cardapio">Cardápio</a></li>
        <li class="tab"><a href="#sobre">Sobre nós</a></li>
        <li class="tab"><a href="login.php">Entrar</a></li>
      </ul>
    </div>
  </nav>


  <div class="col s12 m7" id="cardapio">
    <?php
    require_once 'conexao.php';

    try {
      $consulta=mysqli_query($conn, 'SELECT * FROM tb_prato ORDER BY nome');
      $resultado=mysqli_fetch_all($consulta, MYSQLI_ASSOC);

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
    } catch (\Throwable $th) {
      $th=mysqli_error($conn);
      ?>
        <script>alert($th)</script>
      <?php

    }
    
    ?>
  </div>
  <script src="materialize/js/materialize.min.js"></script>
</body>
</html>