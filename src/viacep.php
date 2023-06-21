<?php
$endereco=array('cep' => '', 'logradouro' => '', 'bairro' => '', 'localidade' => '', 'uf' => '');

if(isset($_POST['cep'])):
    $cep=$_POST['cep'];
    $url="https://viacep.com.br/ws/01001000/json/";
    $endereco=json_decode(file_get_contents($url), true);
endif;