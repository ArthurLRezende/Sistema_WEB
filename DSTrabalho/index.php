<?php
require_once("conexao.php");
?>
<!DOCTYPE HTML>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Login Page</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row main-content bg-success text-center">
            <div class="col-md-4 text-center company__info">
                <span class="company__logo">
                    <h2><span class="fa fa-android"></span></h2>
                    
                </span>
                <img src="css/LNXF.png" alt="Logo">
                <h4 class="company_title"></h4>
            </div>
            <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
                <div class="container-fluid">
                    <div class="row">
                        <h2>Area de Acesso</h2>
                    </div>
                    <div class="row">
                        <form method="post" action="autenticar.php" class="form-group">
                            <div class="row">
                                <input type="text" name="usuario" id="username" class="form__input"
                                    placeholder="Email ou Ra" required>
                            </div>
                            <div class="row">
                            
                                <input type="password" name="senha" id="password" class="form__input"
                                    placeholder="Senha" required>
                            </div>
                            <div class="row">
                                <input type="checkbox" name="remember_me" id="remember_me" class="">
                                <label for="remember_me">Lembre - me!</label>
                            </div>
                            <div class="row justify-content-center">
                                <input type="submit" value="Entrar" class="btn">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>