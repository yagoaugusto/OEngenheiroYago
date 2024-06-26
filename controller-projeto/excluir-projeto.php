<?php
session_start ();
require_once '#_global.php';

$id = $_GET['id'];

$excluir = Projetos::excluir_projeto($id);

$_SESSION['OxesUsersMsg'] = ['alert-warning','<b>PROJETO EXCLUIDO COM SUCESSO!</b>'];

header('Location:../projeto-projeto.php');
?>