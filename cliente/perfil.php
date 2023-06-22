<?php
if(!isset($_SESSION['id_cliente'])):
    header('Location: ../login.php');
endif;

require_once '../conexao.php';

$id=$_SESSION['id_cliente'];
$consulta=mysqli_query($conn, "SELECT * FROM tb_cliente WHERE id_cliente=$id");
$resultado=mysqli_fetch_assoc($consulta);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$_SESSION['nome']?> - Perfil</title>
</head>
<body>
    <div class="row">
        <div class="col s12 m6">
        <div class="card red-grey ligthen-2">
            <div class="card-content white-text">
            <span class="card-title">Dados do Usuário</span>
            <div class="card-content white-text"><p>Nome: <?=$resultado['nome']?></p></div>
            <div class="card-content white-text"><p>CPF: <?=$resultado['cpf']?></p></div>
            <div class="card-content white-text"><p>CEP: <?=$resultado['cep']?></p></div>
            <div class="card-content white-text"><p>UF: <?=$resultado['estado']?></p></div>
            <div class="card-content white-text"><p>Cidade: <?=$resultado['cidade']?></p></div>
            <div class="card-content white-text"><p>Bairro: <?=$resultado['bairro']?></p></div>
            <div class="card-content white-text"><p>Rua: <?=$resultado['rua']?></p></div>
            <div class="card-content white-text"><p>Número da residência: <?=$resultado['numero_residencia']?></p></div>
            <div class="card-content white-text"><p>Complemento: <?=$resultado['complemento']?></p></div>
            <div class="card-content white-text"><p>Telefone: <?=$resultado['telefone']?></p></div>
            <div class="card-content white-text"><p>Email: <?=$resultado['email']?></p></div>
            </div>
            <div class="card-action">
            <a href="alterar_dados.php">Alterar dados</a>
            <a href="deletar_cliente.php">Deletar conta</a>
            </div>
        </div>
        </div>
    </div>
</body>
</html>