<?php

$hostname='localhost';
$username='root';
$password='';
$dbname='bd_restaurantemaneiro';

$conn=mysqli_connect($hostname, $username, $password, $dbname);

if(!$conn):
    echo mysqli_connect_error();
endif;