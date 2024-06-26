<?php
session_start ();
require_once '#_global.php';

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$transf_competencia = $_POST['transferencia_competencia'];
$transf_natureza = $_POST['transferencia_natureza'];

$atualizar = Projetos::atualizar_projeto($id,$titulo,$transf_competencia,$transf_natureza);

$_SESSION['OxesUsersMsg'] = ['alert-success','<b>PROJETO ATUALIZADO COM SUCESSO!</b>'];

header('Location:../projeto-projeto.php');

?>