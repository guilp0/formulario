<?php
session_start();
include('verificacao.php');
include('conexao.php');
$usuario_logado = $_SESSION['usuario'];
$query = "SELECT * FROM  usuario WHERE email = '{$usuario_logado}'";
$result = mysqli_query($conexao, $query);
$dados_usuario = mysqli_fetch_assoc($result);

$id_usuario_logado = $dados_usuario['id'];
$id = $_GET ['id'];
if(isset($id)){
    if($id == $id_usuario_logado){
        $_SESSION["usuario_nao_excluido"] = $usuario_logado;
        header('location: painel.php');
        exit;
    }else{
        $query = "DELETE FROM  usuario WHERE id = {$id}";
        $result = mysqli_query($conexao, $query);
        //$numero_linha = mysqli_num_rows($result);
        header('Location: painel.php');
        exit;
    }
}