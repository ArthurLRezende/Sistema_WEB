<?php 

require_once('../../conexao.php');


$ra = $_POST['ra'];
$info= $_POST['infoFerias'];
$tipo = $_POST['tipo'];
$dataini = $_POST['dataI'];
$datafinal = $_POST['dataF'];

$sql = " INSERT INTO solicitacao (ra_solicitacao, info_solicitacao, tipo_solicitacao, datai_solicitacao, dataf_solicitacao)
VALUES (:ra, :info, :tipo, :dataini, :datafinal)";

$statement = $pdo->prepare($sql);
$statement->bindParam(":ra", $ra);
$statement->bindParam(":info", $info);
$statement->bindParam(":tipo", $tipo);
$statement->bindParam(":dataini", $dataini);
$statement->bindParam(":datafinal", $datafinal);
$statement->execute();

header("Location: ../index.php");