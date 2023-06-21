<?php
    /* 
        pegarTabela: verifica em qual tabela (entre tb_admin, tb_entregador e tb_cliente)
        as informações de login dadas estão localizadas e retorna o nome da tabela. 
    */
    function pegarTabela($conn, $email, $senha){
        $isAdmin="SELECT 'tb_admin' AS tabela FROM tb_admin WHERE login='$email' AND senha='$senha'";
        $isEntrgdr="SELECT 'tb_entregador' AS tabela FROM tb_entregador WHERE email='$email' AND senha='$senha'";
        $isClien="SELECT 'tb_cliente' AS tabela FROM tb_cliente WHERE email='$email' AND senha='$senha'";

        $sql="$isAdmin UNION $isEntrgdr UNION $isClien";

        $resultado=mysqli_fetch_array(mysqli_query($conn, $sql), MYSQLI_ASSOC);

        return $resultado['tabela'];
    }
