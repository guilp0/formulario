<?php
session_start();
include('verificacao.php');
include('conexao.php');


#Pega as informações do Banco de dados e grava em variáveis: Nome, Email e Senha
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM usuario WHERE id = {$id}";
    $resultado = mysqli_query($conexao, $sql);
    $dados_Usuario = mysqli_fetch_assoc($resultado);

    $nome = $dados_Usuario['nome'];
    $email = $dados_Usuario['email'];
    $senha = $dados_Usuario['senha'];
}
#Realiza o update no banco de dados
if (isset($_POST['salvar'])) {
    $id = $_POST['id'];
    $nome_editado = $_POST['nome'];
    $email_editado = $_POST['email'];
    $senha_editada = $_POST['senha'];

    $sql = "UPDATE usuario SET nome = '{$nome_editado}', email = '{$email_editado}', senha = '{$senha_editada}'
            WHERE id = {$id}";
    $resultado = mysqli_query($conexao, $sql);
    header('Location: painel.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
    <title>Sistema de Login</title>
</head>

<body style="background-color: #eee; ">

    <section class="h-100 gradient-form">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">

                            <div class="card-body p-md-5 mx-md-4">

                                <div class="text-center">
                                    <!-- Imagem da Logo -->
                                   
                                    <h4 class="mt-1 mb-5 pb-1">Sistema de Login</h4>
                                </div>

                                <form action="update.php" method="POST" class="text-center w-75" style="margin-right: auto;  margin-left: auto;">
                                    <h5>Edição de Cadastro:</h5>
                                    <p>Por favor, altere os dados abaixo para realizar a edição!</p>

                                    <input type="hidden" name="id" value="<?php echo $id ?>">

                                    <div class="form-outline mb-4 text-center">
                                        <input value="<?php echo $nome ?> " type="text" name="nome" class="form-control" placeholder="informe seu nome completo" required />
                                        <label class="form-label" for="email">Nome Completo:</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input value="<?php echo $email ?>" type="email" name="email" class="form-control" placeholder="informe seu email" />
                                        <label class="form-label" for="email">E-mail</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input value="<?php echo $senha ?>" type="text" name="senha" class="form-control" placeholder="informe sua senha" />
                                        <label class="form-label" for="senha">Senha:</label>
                                    </div>

                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <button name="salvar" class="btn btn-primary btn-block gradient-custom-2" type="submit">Salvar</button>
                                    </div>

                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>