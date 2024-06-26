<?php
session_start ();
require_once '#_global.php';

$titulo = $_POST['titulo'];
$transferencia_competencia = $_POST['transferencia_competencia'];
$transferencia_natureza = $_POST['transferencia_natureza'];

$cadastrar = Projetos::cadastrar_projeto($titulo,$transferencia_competencia,$transferencia_natureza);

$_SESSION['OxesUsersMsg'] = ['alert-success','<b>PROJETO CADASTRADO COM SUCESSO!</b>'];

header('Location:../projeto-projeto.php');

?>