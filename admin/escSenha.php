<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title>Tela de Login</title>
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen" />
	    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	    <link href="css/style.css" rel="stylesheet">
	</head>
	<body>

		<div class="container">							
          		
          	<div class="posicao clearfix text-center">
	          	<form action="" method="Post" accept-charset="utf-8">
	          	          	
	          		<div class="input-center">

	          			<input type="text" name="login" class="dourado" placeholder="login: "> <br><br>
	          			
	          		</div>

	          		<div class="input-center">

	          			<input type="text" name="email" class="dourado" placeholder="e-mail: "> <br><br>
	          			
	          		</div>

	        </div>       	
   	 
	        <div>
	        	<input type="submit" class="botao" value="Reenviar" name="enviar">
	        </div>

				</form>

			<div class="textoFim">
				<a href="http://www.7cliques.com">7 Cliques</a>		
				" © 2010-2015 Todos os direitos reservados."
				<br>

			</div>	

		</div>	
	</body>
</html>

<?php 

include 'global.php';


if ($_POST) {

	if (!empty($_POST['login']) && !empty($_POST['email'])) {
			
		$consulta = $pdo->prepare("SELECT login FROM login where login = :usuario;");
		$consulta->bindParam(':usuario', $_POST['login'], PDO::PARAM_STR);
		$consulta->execute();
		if($linha = $consulta->fetch(PDO::FETCH_ASSOC)){

			if (isset($_POST['enviar'])) {

				$consulta = $pdo->prepare("SELECT senha FROM login where senha = :usuario;");
				$consulta->bindParam(':usuario', $_POST['senha'], PDO::PARAM_STR);
				$consulta->execute();
				$linha2 = $consulta->fetch(PDO::FETCH_ASSOC);


				$destino = $_POST['email'];
				$headers = "MIME-Version: 1.1\r\n";
				$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
				$headers .= "From: desenvolvimento2@7cliques.com\r\n"; // remetente
				$headers .= "Return-Path: desenvolvimento2@7cliques.com\r\n"; // return-path
				$envio = mail($destino, "Senha Admin", "Sua senha é: ".$linha2, $headers);

				echo '<script>alert("Senha reenviada no e-mail!")</script>';
				echo '
					<script>
						
						  location.href="index.php";
						
				    </script>
				
				';
			}

		}else{
			echo '<script>alert("login não cadastrado!")</script>';
		}

	}else{
		echo '<script>alert("Favor inserir login e e-mail!")</script>';
	}	
}	

?>


