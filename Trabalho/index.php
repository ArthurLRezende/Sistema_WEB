<?php
    require_once("conexao.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <title>SISTEMA LOGIN</title>
    </head>
    <body>

    <div class="login">
	<h1>Area Restrita</h1>
    <form method="post" action="autenticar.php">
    	<input type="text" name="usuario" placeholder="Email ou RA" required="required" />
        <input type="password" name="senha" placeholder="SENHA" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large">Acessar</button>
    </form>
    </div>
    </body>
</html>
