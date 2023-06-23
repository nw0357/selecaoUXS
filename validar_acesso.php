<?php


    require_once 'conexao.php';
    require_once 'src/pegarTabela.php';

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tabela=pegarTabela($conn, $email, $senha);

    $sql="SELECT * FROM $tabela WHERE $tabela.email='$email' AND $tabela.senha='$senha'";


    /* Verifica se existe um resultado no banco e, se existir, guarda as informações do usuário em uma sessão e o redireciona
    para a página correspondente. */
    try{
        $consulta=mysqli_query($conn, $sql);

        if(mysqli_num_rows($consulta)==0){?>
            <script>
                alert("Informações fornecidas inválidas.")
                window.location="login.php"
            </script>
        <?php
        }else{
            $consulta=mysqli_query($conn, $sql);
            $linha = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
            $tipo_acesso=$linha['tipo_acesso'];
            switch ($tipo_acesso) {
                case 'admin':

                    session_start();
                    $_SESSION['id_admin']=$linha['id_admin'];
                    $_SESSION['email']=$linha['email'];
                    $_SESSION['senha']=$linha['senha'];

                    header('Location: admin/index.php');

                    break;
                case 'entregador':

                    session_start();
                    $_SESSION['id_entregador']=$linha['id_entregador'];
                    $_SESSION['email']=$linha['email'];
                    $_SESSION['senha']=$linha['senha'];
                    $_SESSION['nome']=$linha['nome'];
                    $_SESSION['cpf']=$linha['cpf'];
                    $_SESSION['complemento']=$linha['complemento'];
                    $_SESSION['numero_residencia']=$linha['numero_residencia'];
                    $_SESSION['rua']=$linha['rua'];
                    $_SESSION['bairro']=$linha['bairro'];
                    $_SESSION['cidade']=$linha['cidade'];
                    $_SESSION['estado']=$linha['estado'];
                    $_SESSION['cep']=$linha['cep'];
                    $_SESSION['telefone']=$linha['telefone'];

                    header('Location: entrgd/index.php');

                    break;
                case 'cliente':

                    session_start();
                    $_SESSION['id_cliente']=$linha['id_cliente'];
                    $_SESSION['email']=$linha['email'];
                    $_SESSION['senha']=$linha['senha'];
                    $_SESSION['nome']=$linha['nome'];
                    $_SESSION['cpf']=$linha['cpf'];
                    $_SESSION['complemento']=$linha['complemento'];
                    $_SESSION['numero_residencia']=$linha['numero_residencia'];
                    $_SESSION['rua']=$linha['rua'];
                    $_SESSION['bairro']=$linha['bairro'];
                    $_SESSION['cidade']=$linha['cidade'];
                    $_SESSION['estado']=$linha['estado'];
                    $_SESSION['cep']=$linha['cep'];
                    $_SESSION['telefone']=$linha['telefone'];

                    header('Location: cliente/index.php');

                    break;
            }
        }
    } catch (mysqli_sql_exception $e) {
        echo $e;
    }