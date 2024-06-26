<?php
session_start ();
require_once '#_global.php';

$responsavel = $_SESSION['OxesUserId'];
$tipo = $_POST['tipo'];
$projeto = $_POST['projeto'];
$natureza = $_POST['natureza'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];
$competencia = $ano.$mes;
$comentario = $_POST['comentario'];

$valorRecebido = $_POST['valor']; // ou $_GET, dependendo do seu método de envio
$valorFormatado = str_replace("R$", "", $valorRecebido);
$valorFormatado = str_replace(".", "", $valorFormatado);
$valorFormatado = str_replace(",", ".", $valorFormatado);
$valor = floatval($valorFormatado);

if ($tipo=="EXTORNO") {
	$valor = $valor*(-1);
}

$verificar_existencia_saldo = Saldo::verificar_existencia_saldo($projeto,$natureza,$competencia);

if ($tipo=="SALDO") {
	//UMA MOVIMENTACAO DE SALDO SO PODE SER GERADO CASO NAO EXISTA UMA LINHA DE SALDO PARA A CONFIGURACAO
	if (isset($verificar_existencia_saldo[0]['id'])) {
	//EXISTE SALDO
	$_SESSION['OxesUsersMsg'] = ['alert-danger','<b>Movimentação não foi registrada! Já existe uma linha de saldo para esse projeto,natureza e competência</b>'];
	}else{
	//NÃO EXISTE SALDO
	$movimentar = Saldo::movimentar($responsavel,$tipo,$projeto,$natureza,$mes,$ano,$competencia,$valor,$comentario);
	$_SESSION['OxesUsersMsg'] = ['alert-success','<b>Movimentação de SALDO aplicado com sucesso!</b>'];
	}

}else{
	//SE A MOVIMENTACAO NAO FOR DE SALDO, SO PODE SER GERADA SE JA EXISTIR UMA LINHA DE SALDO PARA A CONFIGURACAO
	if (isset($verificar_existencia_saldo[0]['id'])) {
	//EXISTE SALDO
	$movimentar = Saldo::movimentar($responsavel,$tipo,$projeto,$natureza,$mes,$ano,$competencia,$valor,$comentario);
	$_SESSION['OxesUsersMsg'] = ['alert-success','<b>Movimentação aplicada com sucesso!</b>'];
	}else{
	//NÃO EXISTE SALDO
	$_SESSION['OxesUsersMsg'] = ['alert-danger','<b>Movimentação não foi registrada! É necessário que seja criado primeiramente uma linha de saldo para esse projeto,natureza e competência</b>'];
	}
}



header('Location:../saldo-movimentar.php');

?>