<?
require_once 'conexao.php';

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

$sql="INSERT INTO tb_cliente VALUES(DEFAULT, $nome, $cpf, $cep, $estado, $cidade, $bairro, $rua, $numero_residencia, $complemento, $telefone, $email, $senha, DEFAULT)";

$consulta=mysqli_query($conn, $sql);

if($consulta):?>
    <script>
    alert('Usuário cadastrado!')
    window.location='login.php'
    </script>
<?
endif;