<?php
require_once('../conexao.php');


$id = $_POST['id'];


$sql = "DELETE FROM projeto WHERE id_projeto = :id ";
$statement = $pdo->prepare($sql);
$statement->bindParam(":id", $id);
$statement->execute();

header("Location: index.php");