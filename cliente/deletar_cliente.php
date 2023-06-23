<?
require_once '../conexao.php';

try {
    $id=$_GET['id'];

    $sql="DELETE FROM tb_cliente WHERE id_cliente=$id";

    $consulta=mysqli_query($conn, $sql);

    if($consulta):?>
        <script>
        alert('Conta deletada!')
        window.location='perfil.php'
        </script>
    <?
    endif;
} catch (mysqli_sql_exception $e) {
    echo $e;
}