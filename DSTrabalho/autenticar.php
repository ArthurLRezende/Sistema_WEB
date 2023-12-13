<?php

    require_once("conexao.php");
    @session_start();

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $query = $pdo->query("SELECT * FROM membro where ((email = '$usuario' or ra = '$usuario' ) and senha ='$senha')");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $total_enc = count($res);

    if($total_enc == 1){
        
        $_SESSION['$nome_usuario'] = $res[0]['nome'];
        $_SESSION['$cargo_usuario'] = $res[0]['cargo'];
        $_SESSION['$id_usuario'] = $res[0]['id'];
        $_SESSION['$ra_usuario'] = $res[0]['ra'];
        $_SESSION['$email_usuario'] = $res[0]['email'];
        $_SESSION['$curso_usuario'] = $res[0]['curso'];
        $_SESSION['$campus_usuario'] = $res[0]['campus'];
        $_SESSION['$senha_usuario'] = $res[0]['senha'];
        
        header("Location: painelMembro/index.php");

    }else{
        header("Location: index.php");
    }
    

?>