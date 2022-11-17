<?php

session_start();
include('../conexaoProjetoPhp/conexao.php');

$nome = mysqli_real_escape_string($conexao ,$_POST['nome']); 
$usuario = mysqli_real_escape_string($conexao ,$_POST['email']); 
$senha = mysqli_real_escape_string($conexao ,$_POST['senha']);


if(empty ($nome) || empty($usuario) || empty ($senha)){
    $_SESSION['dados_incompletos'] = $usuario;
    header('Location: cadastro.php');
    exit;
}

$query = "SELECT * FROM  usuario WHERE email = '{$usuario}'";

$result = mysqli_query($conexao, $query);

$numero_linha = mysqli_num_rows($result);

if($numero_linha == 1){
    $_SESSION['usuario_cadastrado'] = $usuario; 
    header('Location: cadastro.php');
    exit;
}else{
    $insereNoBanco = "INSERT INTO `usuario` (id, nome, email, senha) VALUES (NULL, '{$nome}', '{$usuario}', '{$senha}')"; 

    if($conexao-> query($insereNoBanco) === true){
        $_SESSION['usuario_cadastrado_sucesso'] = true;
        $_SESSION['usuario'] = $usuario;
    }
    $conexao -> close();
    header('Location: painel.php');
    exit;
}