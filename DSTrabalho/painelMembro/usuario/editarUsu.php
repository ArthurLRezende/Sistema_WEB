<?php
require_once('../../conexao.php');

$id = $_POST['floatingId'];
$senha = $_POST['floatingPassword'];
$curso = $_POST['floatingInput'];
$campus =  $_POST['floatingSelectGrid'];
$email = $_POST['floatingInputValue'];


$sql = "UPDATE membro SET senha=:senha, curso=:curso, campus=:campus, email=:email WHERE id = :id ";
$statement = $pdo->prepare($sql);
$statement->bindParam(":id", $id);
$statement->bindParam(":senha", $senha);
$statement->bindParam(":curso", $curso);
$statement->bindParam(":campus", $campus);
$statement->bindParam(":email", $email);
$statement->execute();

header("Location: ../index.php");


