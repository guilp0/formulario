<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
</head>
<body>
    <div class="cabecalho" >
        <h1>ÁREA DE LOGIN</h1>
    </div><br><br><br><br><br>
    <div class="login">
        <h2 class="fw-bolder"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
  <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
</svg> Login do Cliente</h2>
        <p class="fw-light">Se você já for cliente por favor faça seu login e tenha a completa experiência em nosso site!</p><br><br>
    </div>
    <?php
      if(isset($_SESSION['usuario_nao_autenticado'])){
    ?>
        <h4 class="forms" style="color: red">Usuario ou senha não informados</h4>
    <?php
      }
      unset($_SESSION['usuario_nao_autenticado'])
    ?>
    <?php
      if(isset($_SESSION['usuario_invalido'])){
    ?>
        <h4 class="forms" style="color: red">Usuario ou senha incorretos</h4>
    <?php
      }
      unset($_SESSION['usuario_invalido'])
    ?>
<div class="forms">
    <form action="login.php" method="POST">
  <div class="mb-3">
    <label for="email" class="form-label">Email: </label>
    <input type="email" placeholder="Insira seu email" class="form-control" name="email">
  </div>
  <div class="mb-3">
    <label for="senha" class="form-label">Senha: </label>
    <input type="password" placeholder="Insira sua senha" class="form-control" name="senha"aria-describedby="passwordHelp"><input type="checkbox" class="form-check-input" id="Check">
    <label class="form-check-label" for="Check">Lembrar minha senha</label>   
    <div id="passwordHelp" class="form-text">Nós nao compartilhamos sua senha com ninguem!</div>
  </div>
  <button type="submit" class="btn btn-primary btn-lg">Entrar</button><br><br>
  <div id="passwordHelp" class="form-text">Não tem cadastro conosco?<a href="cadastro.php"> Cadastre-se</a></div><br><br>
  <div id="privacyHelp" class="form-text">Ao prosseguir com o login você concorda com nossa politica de privacidade.</div>
</div> 
</form>
</body>
</html>