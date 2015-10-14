<?php 
   	include '../global.php';  	

   	$idstal = $_POST['id'];


   	$descricao = $_POST['descricao'];
	$tipo      = $_POST['tipo'];
	$preco     = $_POST['preco'];
	$status    = "ATV";
 	 	
	$campo1    = $_POST['campo1'];
	$campo2    = $_POST['campo2'];
	$campo3    = $_POST['campo3'];
	$campo4    = $_POST['campo4'];
	$campo5    = $_POST['campo5'];

	$sql1 = "UPDATE planos SET descricao = '$descricao', tipo = '$tipo', status = '$status', preco = '$preco' WHERE id = '$idstal'";
		   	
	
	$stmt1 = $con->prepare($sql1);

	$stmt1->execute();

	if ($stmt1) {

		$sql = "UPDATE planos_itens SET id_planos = '$idstal', campo1 = '$campo1', campo2 = '$campo2', campo3 = '$campo3', campo4 = '$campo4', campo5 = '$campo5'
			         WHERE id_planos = '$idstal'";
			    

		$stmt = $con->prepare($sql);
		

		if ($stmt->execute()) {
			echo '<script language= "JavaScript">

					alert("Dados alterados com sucesso!");

					location.href="admin.php"
				</script>';
		}
	}
	
	
?>