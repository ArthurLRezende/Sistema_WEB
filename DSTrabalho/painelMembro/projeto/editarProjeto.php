<?php
require_once('../../conexao.php');


$id = $_POST['id_projeto'];
$nome_pj= $_POST['NomePJ'];
$data_pj = $_POST['DatePJ'];
$etapa_pj =  $_POST['EtapaPJ'];
$gerente_pj = $_POST['GerentePJ'];
$info_pj =$_POST['info'];

if($etapa_pj=='Selecione a opção'){
    $etapa_pj = '';
}

$sql = "UPDATE projeto SET nome_projeto=:nome_pj, data_projeto=:data_pj, gerente_projeto=:gerente_pj, info_projeto=:info_pj, etapa_projeto=:etapa_pj WHERE id_projeto=:id";
$statement = $pdo->prepare($sql);
$statement->bindParam(":id", $id);
$statement->bindParam(":nome_pj", $nome_pj);
$statement->bindParam(":data_pj", $data_pj);
$statement->bindParam(":gerente_pj", $gerente_pj);
$statement->bindParam(":info_pj", $info_pj);
$statement->bindParam(":etapa_pj", $etapa_pj);

$statement->execute();

header("Location: ../index.php");