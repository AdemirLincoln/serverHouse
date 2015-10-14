<?php 
session_start();

include '../global.php';

if (($_POST)) {
	
		$consulta = $con->prepare("SELECT login FROM login where login = :usuario;");
		$consulta->bindParam(':usuario', $_POST['login'], PDO::PARAM_STR);
		$consulta->execute();
		if($linha = $consulta->fetch(PDO::FETCH_ASSOC)){

			$consulta = $con->prepare("SELECT senha FROM login where senha = :usuario;");
			$consulta->bindParam(':usuario', $_POST['senha'], PDO::PARAM_STR);
			$consulta->execute();
			if($linha2 = $consulta->fetch(PDO::FETCH_ASSOC)){

				$validacao = "1"; 
				 
				$usuario = $_POST['login']; 

				 
				
				 
				 
				$_SESSION['usuario'] = $usuario;
				$_SESSION['validacao'] = $validacao;

				echo '
					<script>
						
						  location.href="admin.php";
						
				    </script>
				
				';

			}else{
			
			echo '<script>alert("Login ou Senha Incorretos!")</script>';

			}

		}else{
			
			echo '<script>alert("Login ou Senha Incorretos!")</script>';

		}	

}



  
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
	<head>
		<meta charset="Unicode/utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Type" content="text/html">
		<title>Tela de Login</title>
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen" />
	    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	    <link href="css/style.css" rel="stylesheet">
	</head>
	<body>

		<div class="container">							
          		
			<header id="header" class="navbar navbar-statc-top">

				<div class="foto">
					<img src="logo_big.png" height="120" width="350">
				</div>
				
			</header><!-- /header -->


          	<div class="posicao clearfix text-center">
	          	<form action="" method="Post" accept-charset="utf-8">
	          	          	
	          		<div class="input-center">

	          			<input type="text" name="login" class="dourado" placeholder="login: "> <br><br>
	          			
	          		</div>

	          		<div class="input-center">

	          			<input type="password" name="senha" class="dourado" placeholder="senha:"> <br><br>
	          			
	          		</div>	          		

					<br>

					<div class="esqSenha">
						<a href="escSenha.php" title="">Esqueceu sua senha?</a>	          			
					</div>	          		

	        </div>       	
   	 
	        <div>
	        	<input type="submit" class="botao" value="Enviar" name="enviar">
	        </div>

				</form>

			<div class="textoFim">
				<a href="http://www.7cliques.com.br">7 Cliques</a>		
				" © 2010-2015 Todos os direitos reservados."
				<br>

			</div>	

		</div>	
	</body>
</html>














