<?php
if(!isset($_SESSION['id_cliente'])):
    header('Location: ../login.php');
endif;

require_once '../conexao.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$_SESSION['nome']?> - Perfil</title>
</head>
<body>
    <section>
        <h4>Dados do Usuário</h4>
        <div>
            
        </div>
    </section>
</body>
</html>