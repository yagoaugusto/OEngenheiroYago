<?php
	session_start();
	//Incluindo a conexão com banco de dados
	include_once("conexao.php");
	//O campo usuário e senha preenchido entra no if para validar
	if((isset($_POST['email'])) && (isset($_POST['senha']))){
		$email = mysqli_real_escape_string($conn, $_POST['email']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
		$senha = mysqli_real_escape_string($conn, $_POST['senha']);

		//Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
		$result_usuario = "SELECT * from usuario where email='{$email}' and senha='{$senha}' and status='ATIVO'
		limit 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$resultado = mysqli_fetch_assoc($resultado_usuario);

		//Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		if(isset($resultado)){
			//VARIAVEIS DE USUARIO
			$_SESSION['OxesUserId'] = $resultado['id'];
			$_SESSION['OxesUserNome'] = $resultado['nome'];
			$_SESSION['OxesUserEmail'] = $resultado['email'];
			$_SESSION['OxesUserSenha'] = $resultado['senha'];

			header("Location: ../principal.php");
		//Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		//redireciona o usuario para a página de login
		}else{
			//Váriavel global recebendo a mensagem de erro
			$_SESSION['OxesLoginErro'] = "Usuário ou senha Inválido";
			header("Location: ../index.php");
		}
	//O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
	}else{
		$_SESSION['OxesLoginErro'] = "Usuário ou senha inválido";
		header("Location: ../index.php");
	}
?>
