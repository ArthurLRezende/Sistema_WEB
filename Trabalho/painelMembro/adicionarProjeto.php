<?php
require_once('../conexao.php');
@session_start();


$nome_projeto = $_POST['projeto'];
$gerente_projeto = $_POST['gerente'];
$data_projeto = $_POST['data'];
$consultores_projeto = $_POST['consultores'];
$info_projeto = $_POST['info'];




?>