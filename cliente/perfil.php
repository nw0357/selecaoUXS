<?php
session_start();

if(!isset($_SESSION['id_cliente'])):
    header('Location: ../login.php');
endif;

require_once '../conexao.php';

$id=$_SESSION['id_cliente'];
try{
    $consulta=mysqli_query($conn, "SELECT * FROM tb_cliente WHERE id_cliente=$id");
    $resultado=mysqli_fetch_assoc($consulta);
} catch (\Throwable $th) {
    throw $th;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$_SESSION['nome']?> - Perfil</title>
    <link rel="stylesheet" href="../materialize/css/materialize.min.css">
</head>
<body>

    <nav>
        <a href="#" class="brand-logo right"><img src="src/img/logo.png" alt=""></a>
    </nav>

    <div class="row">
      <div class="col s3">
        <ul class="section table-of-contents">
            <li><a href="../index.php" class="left-align red-text">Início</a></li>
            <li><a href="perfil.php" class="left-align red-text">Perfil</a></li>
            <li><a href="../sair.php" class="left-align red-text">Sair</a></li>
        </ul>
      </div>

    <div class="col5 s5">
        <div class="col s12 m7">
            <ul class="collection with-header">
                <li class="collection-header"><h4>Dados do Usuário</h4></li>
                <li class="collection-item">Nome: <?=$resultado['nome']?></li>
                <li class="collection-item">CPF: <?=$resultado['cpf']?></li>
                <li class="collection-item">CEP: <?=$resultado['cep']?></li>
                <li class="collection-item">Estado: <?=$resultado['estado']?></li>
                <li class="collection-item">Cidade: <?=$resultado['cidade']?></li>
                <li class="collection-item">Bairro: <?=$resultado['bairro']?></li>
                <li class="collection-item">Rua: <?=$resultado['rua']?></li>
                <li class="collection-item">Número da residência: <?=$resultado['numero_residencia']?></li>
                <li class="collection-item">Complemento: <?=$resultado['complemento']?></li>
                <li class="collection-item">Telefone: <?=$resultado['telefone']?></li>
                <li class="collection-item">Email: <?=$resultado['email']?></li>
                <a href="atualizar_form.php?id=<?=$resultado['id_cliente']?>" class="collection-item">Atualizar dados</a>
                <a href="deletar_cliente.php?id=<?=$resultado['id_cliente']?>" class="collection-item" onclick="return confirm('Deseja mesmo deletar sua conta?')">Deletar conta</a>
            </ul>
        </div>
    </div>

    <script src="../materialize/js/materialize.min.js"></script>
</body>
</html>