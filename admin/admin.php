<?php
session_start();

include 'global.php';

?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
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
										 E-mail
									</th>
									<th>
										 Telefone
									</th>
									<th>
										 Cidade
									</th>
									<th>
										 Como soube da Feira
									</th>
									<th>
										 É expositor
									</th>
									<th>
										 Data Cadastro
									</th>
								</tr>
								</thead>
								<tbody>

								<?php 
									$sql="SELECT *,DATE_FORMAT(cadastro.dataCadastro,'%d/%m/%Y') as dataCadastro FROM cadastro";

									$stmt = $pdo->prepare($sql);
									$stmt->execute();
									while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {

										$dados[] = $linha;
									}
								 ?>

								 <?php foreach ($dados as $key => $value): ?>
								 	<!-- Array ( [id] 
								 	 5 [select] 
								 	 1 [radio] 
								 	 0 [nome] 
								 	 Vinicius [email] 
								 	 vinicius.marinho@outlook.com [telefone] 
								 	  9933-3444 [cidade] 
								 	  Cascavel ) -->
								 	<tr>
										<td><?php echo $value['nome'] ?></td>
										<td><?php echo $value['email'] ?></td>
										<td><?php echo $value['telefone'] ?></td>
										<td><?php echo $value['cidade'] ?></td>
										<td>
											<?php 
												if ($value['select'] == 1) {
													echo "Pelo site";
												}
												if ($value['select'] == 2) {
													echo "Com um(a) amigo(a)";
												}
												if ($value['select'] == 3) {
													echo "Na televisão";
												}
												if ($value['select'] == 4) {
													echo "Navegando na Web";
												}												
											?>
										</td>
										<td>
											<?php 
												if ($value['radio'] == 1) {
													echo "Sim";
												}
												if ($value['radio'] == 0) {
													echo "Não";
												}												 
											?>
										</td>
										<td><?php echo $value['dataCadastro'] ?></td>
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
