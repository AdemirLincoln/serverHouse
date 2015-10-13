<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">Cadastros</h3>

<div class="page-bar">

	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="edit.php">Home</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#">Cadastros</a>
		</li>
	</ul>
	<!-- <div class="page-toolbar">
		<div id="dashboard-report-range" class="tooltips btn btn-fit-height btn-sm green-haze btn-dashboard-daterange" data-container="body" data-placement="left" data-original-title="Change dashboard date range">
			<i class="icon-calendar"></i>
			&nbsp;&nbsp; <i class="fa fa-angle-down"></i>

		</div>
	</div> -->
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN DASHBOARD STATS -->


<?php 
	if ($_SESSION['validacao'] == "1"){ 
?>
	
	<div class="topo">
	
		<div style="font-size: 16px">
			Seja bem vindo <strong><? echo $_SESSION['usuario'];?></strong> ao seu Painel de Edições.
		</div>
		
		<div class="btnDeslogar">
			<a class="btn btn-primary pull-right"  href="deslogar.php">Deslogar</a> 
		</div>	

		<br><br><br>
			
	</div>

	


<?php
	}					
?>

<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet">
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
<!-- END DASHBOARD STATS -->
<div class="clearfix"></div>
