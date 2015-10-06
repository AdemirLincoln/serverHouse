<?php 

	// print_r($_POST);

	include 'global.php';

		
	$email = $_POST['email'];
	$endereco = $_POST['endereco'];
	$numero = $_POST['numero'];
	$celular = $_POST['celular'];
	$telefone = $_POST['telefone'];
	$data = date('Y-m-d H:i:s');	

	$dadosCidade = returnCidade($_POST['cod_cidades'],$con);

	function returnCidade($id,$con)
	{
		 $sql = "SELECT cidades.nome as cidade, estados.nome as estado FROM cidades 
		INNER JOIN estados ON estados.cod_estados = cidades.estados_cod_estados
		WHERE cod_cidades = {$id}";
		$stmt = $con->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();	

	}

	$type = $_POST['type'];

	if ($type == "pf") {

		$nome = $_POST['nome'];
		$rg = $_POST['rg'];
		$cpf = $_POST['cpf'];

		$sql = "INSERT INTO clientes (nome, rg, cpf, email, endereco, numero, celular, telefone, estado, cidade, data) 
			    VALUES ('$nome', '$rg', '$cpf', '$email', '$endereco', '$numero', '$celular', '$telefone', '{$dadosCidade[0]['estado']}', '{$dadosCidade[0]['cidade']}', '$data')";
			    

		$stmt = $con->prepare($sql);
		$stmt->execute();	

	}else{

		$empresa = $_POST['empresa'];
		$responsavel = $_POST['responsavel'];
		$cnpj = $_POST['cnpj'];

		$sql2 = "INSERT INTO clientes (empresa, responsavel, cnpj, email, endereco, numero, celular, telefone, estado, cidade, data) 
			     VALUES ('$empresa', '$responsavel', '$cnpj', '$email', '$endereco', '$numero', '$celular', '$telefone', '{$dadosCidade[0]['estado']}', '{$dadosCidade[0]['cidade']}', '$data')";

		$stmt = $con->prepare($sql2);
		$stmt->execute();	     		
	}
	
		
	

	if ($stmt) {
		// echo "sucesso";
		echo '<script language= "JavaScript">
			location.href="index.php"
		</script>';
	}

 ?>