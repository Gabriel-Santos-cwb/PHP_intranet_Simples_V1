<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="./CSS/index.css" />
    
</head>
<body>
    <div class="page">
        <form method="POST" action="./funcoes/processa-login.php" class="formLogin" enctype="multipart/form-data">
            <h1>Login</h1>
            <p>Digite os seus dados de acesso no campo abaixo.</p>
            <label for="email">Login</label>
            <input name="login" type="text" placeholder="Digite seu login" autofocus="true" />
            <label for="password">Senha</label>
            <input name="senha" type="password" placeholder="Digite seu e-mail" />
           <!-- <a href="/">Esqueci minha senha</a> -->
           <input class="btn" type="submit" name="trava" id="trava" value="Entrar" ver()>
        </form>
    </div>
    
</body>
</html>