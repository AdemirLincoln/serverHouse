<?php
session_start();

include '../global.php';

?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<head>
	  <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<title>Pagina restrita 1</title>
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen" />
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href="css/style.css" rel="stylesheet">
</head>
<body>

<?php 
	if ($_SESSION['validacao'] == "1"){ 
?>
	
	<div class="topo">
	
		Seja bem vindo <strong><? echo $_SESSION['usuario'];?></strong> ao seu Admin.
		
		<div class="btnDeslogar">
			<a class="btn btn-primary"  href="deslogar.php">Deslogar</a> 
		</div>	
			
	</div>


<?php
}
else{
	echo "<a href=index.php>VOLTAR</a>";
}
?>

<div class="row">
					<div class="col-md-12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-edit"></i>Tabela de usuários Cadastrados.
								</div>
								<div class="tools">
									<a href="javascript:;" class="collapse">
									</a>
									<a href="#portlet-config" data-toggle="modal" class="config">
									</a>
									<a href="javascript:;" class="reload">
									</a>
									<a href="javascript:;" class="remove">
									</a>
								</div>
							</div>
							<div class="tabela">
								<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
								<thead>
								<tr>
									<th>
										 Nome
									</th>
									<th>
										 RG
									</th>
									<th>
										 CPF
									</th>
									<th>
										 E-mail
									</th>
									<th>
										 Endereço
									</th>
									<th>
										 Número
									</th>
									<th>
										 Celular
									</th>
									<th>
										 Telefone
									</th>
									<th>
										 Estado
									</th>
									<th>
										 Cidade
									</th>									
									<th>
										 Data Cadastro
									</th>
								</tr>
								</thead>
								<tbody>

								<?php 
									$sql="SELECT *,DATE_FORMAT(clientes.data,'%d/%m/%Y') as data FROM clientes";

									$stmt = $con->prepare($sql);
									$stmt->execute();
									while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {

										$dados[] = $linha;
									}
								 ?>

								 <?php foreach ($dados as $key => $value): ?>
								 	
								 	<tr>
										<td><?php echo $value['nome'] ?></td>
										<td><?php echo $value['rg'] ?></td>
										<td><?php echo $value['cpf'] ?></td>
										<td><?php echo $value['email'] ?></td>
										<td><?php echo $value['endereco'] ?></td>
										<td><?php echo $value['numero'] ?></td>
										<td><?php echo $value['celular'] ?></td>
										<td><?php echo $value['telefone'] ?></td>
										<td><?php echo utf8_encode($value['estado']); ?></td>
										<td><?php echo utf8_encode($value['cidade']); ?></td>										
										<td><?php echo $value['data'] ?></td>
									</tr>
								 	
								 <?php endforeach ?>
								
								
								</tbody>
								</table>
							</div>
						</div>
						<!-- END EXAMPLE TABLE PORTLET-->
					</div>
				</div>

</body>
</html>
