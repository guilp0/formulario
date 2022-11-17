<?php

session_start();
include('../conexaoProjetoPhp/conexao.php');

$usuario = mysqli_real_escape_string($conexao ,$_POST['email']); 
$senha = mysqli_real_escape_string($conexao ,$_POST['senha']);
$_SESSION['usuario'] = $usuario;
//echo $usuario;
//echo $senha;

if(empty ($usuario) || empty($senha)){
    $_SESSION['usuario_nao_autenticado'] = $usuario;
    header('Location: index.php');
    exit;
}

$query = "SELECT * FROM  usuario WHERE email = '{$usuario}' AND senha = '{$senha}' ";

$result = mysqli_query($conexao, $query);

$numero_linha = mysqli_num_rows($result);

if($numero_linha == 1){
    header('Location: painel.php');
    exit;
}else{
    $_SESSION['usuario_invalido'] = $usuario;
    header('Location: index.php');
    exit;
}