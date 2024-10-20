<?php
session_start();
require_once('./sistema/estrutura/header.php'); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/style-login.css">
</head>
<body>
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="#">
            <h1>Problemas com o Login?</h1>
            <br>
            <h3>Fale com o responsável técnico pelo login da Coetagri por email:</h3>
            <h6>- keniara.vilasboas@ifsuldeminas.edu.br -</h6>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form class="user" action="./sistema/acesso/valida_login.php" method="post">
            <h1>Login</h1>
            <br>
            <?php if (isset($_SESSION['texto_erro_login'])): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<?= $_SESSION['texto_erro_login'] ?></strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php unset($_SESSION['texto_erro_login']); ?>
            <?php endif; ?>
            <input type="email" name="email" placeholder="Endereço de Email..." required />
            <input type="password" name="senha" placeholder="Senha" required />
            <br>
            <select name="perfil" required>
                <option value="">Selecione o Perfil</option>
                <option value="1">Administrador</option>
                <option value="2">Funcionário</option>
            </select>
            <br>
            <button type="submit">Entrar</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Tudo certo?</h1>
                <p>Volte para conectar-se ao sistema Coetagri!</p>
                <button class="ghost" id="signIn">Voltar</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Problemas com o Login?</h1>
                <p>Veja mais informações de como podemos ajudar.</p>
                <button class="ghost" id="signUp">></button>
            </div>
        </div>
    </div>
</div>
<script src="./js/buttons.js"></script>
</body>
</html>