<?php
session_start();
$usuario = $_SESSION['usuario'];
include('verificacao.php');
include('../conexaoProjetoPhp/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de usuario</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
Usuário logado: <?php echo $usuario ?>
<br>
Fazer Logout: <a href="logout.php">SAIR</a>
<!-- Se o usuario foi cadastrado, emite um atert() informando que o 
mesmo foi cadastrado e abre a página painel -->
<?PHP
if (isset($_SESSION['usuario_cadastrado_sucesso'])) {
?>
    <script>
        alert('Usuário cadastrado com sucesso!')
    </script>
<?PHP
}
unset($_SESSION['usuario_cadastrado_sucesso'])
?>
<?PHP
if (isset($_SESSION['usuario_nao_excluido'])) {
?>
    <script>
        alert('O usuario nao pode ser excluido!')
    </script>
<?PHP
}
unset($_SESSION['usuario_nao_excluido'])
?>

<!-- Consulta PHP para retonar informações do Usuario -->
<?php
$consulta = "SELECT * FROM usuario";
$resultado = mysqli_query($conexao, $consulta);
//print_r($resultado);
?>
<br><br>
<table  align= "center"class="table table-striped" style="width: 70em;">
    <!-- 1º Linha da nossa tabela -->
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">E-mail</th>
        <th scope="col">Senha</th>
        <th colspan="2" style="text-align: center;">Operações</th>
    </tr>
    <!-- 2º Linha da nossa tabela -->
    <?php
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $id = $linha['id'];
        $nome = $linha['nome'];
        $email = $linha['email'];
        $senha = $linha['senha'];
    ?>
        <tr>
            <td><?php echo $id ?></td>
            <td><?php echo $nome ?></td>
            <td><?php echo $email ?></td>           
            <td><?php echo $senha ?></td>
            <td>
                <a href="update.php?id= <?php echo $id ?>">
                    <button class= "btn btn-primary">
                        Editar
                    </button >
                </a>
            </td>
            <td>
                <a href="delete.php?id= <?php echo $id ?>">
                    <button class= "btn btn-danger">
                        Delete
                    </button>
                </a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
</body>
</html>