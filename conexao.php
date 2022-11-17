<?php

define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('BD', 'login');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, BD) or die('Não foi possivel conectar no banco de dados!');

?>