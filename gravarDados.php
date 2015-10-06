<?php 

	// print_r($_POST);

	include 'global.php';

		
	$email = $_POST['email'];
	$endereco = $_POST['endereco'];
	$numero = $_POST['numero'];
	$celular = $_POST['celular'];
	$telefone = $_POST['telefone'];
	$estado = $_POST['cod_estados'];
	$cidade = $_POST['cod_cidades'];
	$type = $_POST['type'];

	if ($type == "pf") {

		$nome = $_POST['nome'];
		$rg = $_POST['rg'];
		$cpf = $_POST['cpf'];

		$sql = "INSERT INTO clientes (nome, rg, cpf, email, endereco, numero, celular, telefone, estado, cidade) 
			    VALUES ('$nome', '$rg', '$cpf', '$email', '$endereco', '$numero', '$celular', '$telefone', '$estado', '$cidade')";

		$stmt = $con->prepare($sql);
		$stmt->execute();	

	}else{

		$empresa = $_POST['empresa'];
		$responsavel = $_POST['responsavel'];
		$cnpj = $_POST['cnpj'];

		$sql2 = "INSERT INTO clientes (empresa, responsavel, cnpj, email, endereco, numero, celular, telefone, estado, cidade) 
			     VALUES ('$empresa', '$responsavel', '$cnpj', '$email', '$endereco', '$numero', '$celular', '$telefone', '$estado', '$cidade')";

		$stmt = $con->prepare($sql2);
		$stmt->execute();	     		
	}
	
		
	

	if ($stmt) {
		echo "sucesso";
	}

 ?>