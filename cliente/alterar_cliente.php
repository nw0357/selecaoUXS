<?
require_once '../conexao.php';

try{
    $id=$_GET['id'];
    $nome=$_POST['nome'];
    $cpf=$_POST['cpf'];
    $cep=$_POST['cep'];
    $estado=$_POST['estado'];
    $cidade=$_POST['cidade'];
    $bairro=$_POST['bairro'];
    $rua=$_POST['rua'];
    $numero_residencia=$_POST['numero_residencia'];
    $complemento=$_POST['complemento'];
    $telefone=$_POST['telefone'];
    $email=$_POST['email'];
    $senha=$_POST['senha'];

    $sql="UPDATE tb_cliente SET nome='$nome', cpf='$cpf', cep='$cep', estado='$estado', cidade='$cidade', bairro='$bairro', rua='$rua', numero_residencia='$numero_residencia', complemento='$complemento', telefone='$telefone', email='$email', senha='$senha' WHERE id_cliente='$id'g";

    $consulta=mysqli_query($conn, $sql);

    if($consulta):?>
        <script>
        alert('Dados atualizados!')
        window.location='perfil.php'
        </script>
    <?
endif;
} catch (mysqli_sql_exception $e) {
    echo $e;
}