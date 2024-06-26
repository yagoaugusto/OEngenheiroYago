<?php
session_start ();
require_once '#_global.php';

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$gerarsenha = random_bytes(4);
$senha = bin2hex($gerarsenha);

$verifica_email = Usuario::verifica_email($email);
if (isset($verifica_email[0]['id'])) {
  $_SESSION['OxesUsersMsg'] = ['alert-warning','<b>USUÁRIO NÃO FOI CADASTRADO! </b>Email • '.$email.' • já tem cadastro ativo no sistema! '];
  header('Location:../sistema-usuarios.php');
  exit;
}


$cadastrar = Usuario::cadastrar_usuario($nome,$email,$telefone,$senha);
$_SESSION['OxesUsersMsg'] = ['alert-success','<b>USUÁRIO CADASTRADO COM SUCESSO!</b>'];

// Inclui o arquivo class.phpmailer.php localizado na mesma pasta do arquivo php
include "../system-PHPMailer/PHPMailerAutoload.php";

// Inicia a classe PHPMailer
$mail = new PHPMailer();

// Método de envio
$mail->IsSMTP(); // Enviar por SMTP
$mail->Host = "smtp.hostinger.com.br"; // Você pode alterar este parametro para o endereço de SMTP do seu provedor
$mail->Port = 587;

$mail->SMTPAuth = true; // Usar autenticação SMTP (obrigatório)
$mail->Username = 'suporte@oxes.agendateste.xyz'; // Usuário do servidor SMTP (endereço de email)
$mail->Password = 'Oxes@2023'; // Mesma senha da sua conta de email

// Configurações de compatibilidade para autenticação em TLS
$mail->SMTPOptions = array(
 'ssl' => array(
 'verify_peer' => false,
 'verify_peer_name' => false,
 'allow_self_signed' => true
 )
);
// $mail->SMTPDebug = 2; // Você pode habilitar esta opção caso tenha problemas. Assim pode identificar mensagens de erro.

// Define o remetente
$mail->From = "suporte@oxes.agendateste.xyz"; // Seu e-mail
$mail->FromName = "OXES! Suporte"; // Seu nome

// Define o(s) destinatário(s)
$mail->AddAddress($email, $nome); // SOLICITANTE
// CC
//$mail->AddCC('joana@provedor.com', 'Joana');
// BCC - Cópia oculta
//$mail->AddBCC('roberto@gmail.com', 'Roberto');


// Definir se o e-mail é em formato HTML ou texto plano
$mail->IsHTML(true); // Formato HTML . Use "false" para enviar em formato texto simples.

$mail->CharSet = 'UTF-8'; // Charset (opcional)

// Assunto da mensagem
$mail->Subject = "Acesso disponível - Oxes!";

// Corpo do email
$mail->Body = '
<div style="text-align:center"><hr>
Olá, você já pode acessar o <b>Oxes!</b><br><br>
Email: '.$email.'<br>
Senha: '.$senha.'<br>
Link: https://oxes.agendateste.xyz/index.php<br><br>
Lembre-se de alterar a senha no primeiro acesso! <hr>
</div>
';

// Anexos (opcional)
//$mail->AddAttachment("/home/usuario/public_html/documento.pdf", "documento.pdf");

// Envia o e-mail
$enviado = $mail->Send();

// Exibe uma mensagem de resultado
if ($enviado) {
     echo "Seu email foi enviado com sucesso!";
} else {
     echo "Houve um erro enviando o email: ".$mail->ErrorInfo;
}



header('Location:../sistema-usuarios.php');
?>