<?php
	session_start();

	unset(
		$_SESSION['OxesUserId'],
		$_SESSION['OxesUserNome'],
		$_SESSION['OxesUserEmail'],
		$_SESSION['OxesUserSenha'],
		$_SESSION['OxesConsultaEntrada'],
		$_SESSION['OxesConsultaFim'],
		$_SESSION['OxesUserFilial'],
		$_SESSION['OxesUserFilialTitulo'],
		$_SESSION['OxesLoginErro']
	);

	$_SESSION['logindeslogado'] = "Deslogado com sucesso";
	//redirecionar o usuario para a página de login
	header("Location: ../index.php");
?>
