<?php

    $banco = "sistema";
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    
    try{
    
        $pdo = new PDO("mysql:dbname=$banco;host$servidor","$usuario", "$senha");
      
    
    }catch(Exception $e){

        echo 'Erro ao conectar com o Banco de dados! \n'.$e;

    }


?>