<meta charset="utf-8">
<?php

$emailBaixo = $_POST['emailBaixo'];
		

//1 – Definimos Para quem vai ser enviado o email 

$para = "contato@serverhouse.com.br"; 

//2 - resgatar o nome digitado no formulário e grava na variavel 

$nomeBaixo = $_POST['nomeBaixo'];

// 3 - resgatar o assunto digitado no formulário e grava na variavel 

$mensagemBaixo = $_POST['mensagemBaixo']; 

//4 – Agora definimos a mensagem que vai ser enviado no e-mail 

$mensagem = "<strong>Nome: </strong>".$nomeBaixo; 

$mensagem .= "<br> <strong>Mensagem: </strong>".$mensagemBaixo; 

//5 – agora inserimos as codificações corretas e tudo mais. 

$headers = "Content-Type:text/html; charset=UTF-8\n"; 

$headers .= "From: Contato Site: <administrativo@serverhouse.com.br>\n"; 

//Vai ser mostrado que o email partiu deste email e seguido do nome

//email do servidor //que enviou 
$headers .= "X-Mailer: PHP v".phpversion()."\n"; 
$headers .= "X-IP: ".$_SERVER['REMOTE_ADDR']."\n"; 
$headers .= "Return-Path: <administrativo@serverhouse.com.br>\n"; 
//caso a msg //seja respondida vai para este email. 
$headers .= "MIME-Version: 1.0\n"; 

if(mail($para, $mensagem, $headers)){
	echo '<script> 
			alert("Email enviado com sucesso!");
		  </script>';
	echo '<script language= "JavaScript">
			location.href="index.php"
		  </script>';		  
}