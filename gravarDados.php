<?php 

	// print_r($_POST);

    function validaCPF($cpf = null) {

       // Verifica se um número foi informado
       if(empty($cpf)) {
           return false;
       }

       // Elimina possivel mascara
       $cpf = ereg_replace('[^0-9]', '', $cpf);
       $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
        
       // Verifica se o numero de digitos informados é igual a 11 
       if (strlen($cpf) != 11) {
           return false;
       }
       // Verifica se nenhuma das sequências invalidas abaixo 
       // foi digitada. Caso afirmativo, retorna falso
       else if ($cpf == '00000000000' || 
           $cpf == '11111111111' || 
           $cpf == '22222222222' || 
           $cpf == '33333333333' || 
           $cpf == '44444444444' || 
           $cpf == '55555555555' || 
           $cpf == '66666666666' || 
           $cpf == '77777777777' || 
           $cpf == '88888888888' || 
           $cpf == '99999999999') {
           return false;
        // Calcula os digitos verificadores para verificar se o
        // CPF é válido
        } else {   
            
           for ($t = 9; $t < 11; $t++) {
                
               for ($d = 0, $c = 0; $c < $t; $c++) {
                   $d += $cpf{$c} * (($t + 1) - $c);
               }
               $d = ((10 * $d) % 11) % 10;
               if ($cpf{$c} != $d) {
                   return false;
               }
           }

           return true;
       }
    }

    function validar_cnpj($cnpj)
	{
	    $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
	    // Valida tamanho
	    if (strlen($cnpj) != 14)
	        return false;
	    // Valida primeiro dígito verificador
	    for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
	    {
	        $soma += $cnpj{$i} * $j;
	        $j = ($j == 2) ? 9 : $j - 1;
	    }
	    $resto = $soma % 11;
	    if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
	        return false;
	    // Valida segundo dígito verificador
	    for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
	    {
	        $soma += $cnpj{$i} * $j;
	        $j = ($j == 2) ? 9 : $j - 1;
	    }
	    $resto = $soma % 11;
	    return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
	}

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

		if (!validaCPF($cpf)) {
			echo "CPF é inválido"; die();
		}

		$sql = "INSERT INTO clientes (nome, rg, cpf, email, endereco, numero, celular, telefone, estado, cidade, data) 
			    VALUES ('$nome', '$rg', '$cpf', '$email', '$endereco', '$numero', '$celular', '$telefone', '{$dadosCidade[0]['estado']}', '{$dadosCidade[0]['cidade']}', '$data')";
			    

		$stmt = $con->prepare($sql);
		$stmt->execute();	

	}else{

		$empresa = $_POST['empresa'];
		$responsavel = $_POST['responsavel'];
		$cnpj = $_POST['cnpj'];

		if (!validar_cnpj($cnpj)) {
			echo "CNPJ é inválido"; die();
		}

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