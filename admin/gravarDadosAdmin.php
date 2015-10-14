<?php 
   	include '../global.php';

   	$descricao = $_POST['descricao'];
	$tipo      = $_POST['tipo'];
	$preco     = $_POST['preco'];
	$status    = "ATV";
 	 	
	$campo1    = $_POST['campo1'];
	$campo2    = $_POST['campo2'];
	$campo3    = $_POST['campo3'];
	$campo4    = $_POST['campo4'];
	$campo5    = $_POST['campo5'];

	$sql1 = "INSERT INTO planos (descricao, tipo, status, preco) 
			    VALUES ('$descricao', '$tipo', '$status', '$preco')";
	
	

	$stmt1 = $con->prepare($sql1);

	if ($stmt1->execute()) {

		$id_planos = "SELECT id FROM planos";

		$exeid = $con->prepare($id_planos);

		$exeid->execute();

		$id_plano = $con->lastInsertId();
  //       echo '<pre>';
		// print_r($dados);

		// die();


		$sql = "INSERT INTO planos_itens (id_planos, campo1, campo2, campo3, campo4, campo5) 
			    VALUES ('$id_plano', '$campo1', '$campo2', '$campo3', '$campo4', '$campo5')";
			    

		$stmt = $con->prepare($sql);
		

		if ($stmt->execute()) {
			echo '<script language= "JavaScript">
				location.href="edit_wire_res.php"
			</script>';
		}
	}
	
	
?>