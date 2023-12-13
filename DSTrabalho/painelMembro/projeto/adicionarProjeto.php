<?php
require_once('../../conexao.php');
@session_start();


$nome_pj = $_POST['floatingNomePJ'];
$gerente_pj = $_POST['floatingGerentePJ'];
$data_pj = $_POST['floatingDatePJ'];
$info_pj = $_POST['floatingInfoPJ'];
$etapa_pj = $_POST['floatingEtapaPJ'];

$sql = " INSERT INTO projeto (nome_projeto, data_projeto, gerente_projeto, info_projeto, etapa_projeto)
VALUES (:nome_pj, :data_pj, :gerente_pj, :info_pj, :etapa_pj)";

$statement = $pdo->prepare($sql);
$statement->bindParam(":nome_pj", $nome_pj);
$statement->bindParam(":data_pj", $data_pj);
$statement->bindParam(":gerente_pj", $gerente_pj);
$statement->bindParam(":info_pj", $info_pj);
$statement->bindParam(":etapa_pj", $etapa_pj);
$statement->execute();

header("Location: ../index.php");


?>