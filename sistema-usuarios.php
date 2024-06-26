<?php require_once '#_global.php'; require_once 'system-classes/Funcoes.php' ?>
<!DOCTYPE html>
<html lang="pt-br">
<?php require_once '__head.php'; ?>
<?php
$usuarios = Usuario::listar_usuarios();
?>
<body>
	<div class="container-scroller">
		<!-- partial:partials/_horizontal-navbar.html -->
		<?php require_once '__nav.php'; ?>
		<!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<div class="main-panel">
				<div class="content-wrapper pb-0">
					<div class="page-header flex-wrap">
						<h3 class="page-title">Usuários do sistema</h3>
						<?php if(isset($_SESSION['OxesUsersMsg'])){ resposta($_SESSION['OxesUsersMsg']); unset($_SESSION['OxesUsersMsg']); } ?>
					</div>
					<!-- first row starts here -->
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Cadastro de usuário</h4>
									<!-- <p class="card-description"> Basic form layout </p> -->
									<form class="forms-sample" action="controller-usuario/cadastrar-usuario.php" method="post">
										<div class="form-group">
											<label for="exampleInputUsername1">Nome</label>
											<input type="text" class="form-control form-control-sm" name="nome" id="" placeholder="Nome" required>
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">Email</label>
											<input type="email" class="form-control form-control-sm" id="" name="email" placeholder="Email" required>
										</div>
										<div class="form-group">
											<label for="exampleInputUsername1">Telefone</label>
											<input type="text" class="form-control form-control-sm" name="telefone" id="" placeholder="Telefone 00901234567" required>
										</div>
										<input type="submit" class="btn btn-primary" value="Salvar">
									</form>
								</div>
							</div>
						</div>
					</div>

					<br>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">

									<table class="table table-striped" id="tabela">
										<thead>
											<tr>
												<th>ID</th>
												<th>Nome</th>
												<th>Telefone</th>
												<th>Email</th>
												<th>Gerenciar</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($usuarios as $x): ?>
												<tr>
													<td><?= $x['id']; ?></td>
													<td><?= $x['nome']; ?></td>
													<td><?= $x['telefone']; ?></td>
													<td><?= $x['email']; ?></td>
													<td>
							                            <a href="" class="btn btn-outline-info">Editar</a>
							                            <a href="" class="btn btn-outline-warning">Permissões</a>
							                            <a href="" class="btn btn-outline-danger">Excluir</a>
													</td>
												</tr>
											<?php endforeach; ?>
											<!-- Adicione mais linhas conforme necessário -->
										</tbody>
									</table>

								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- content-wrapper ends -->
				<?php require_once '__footer.php'; ?>
				<!-- partial -->
			</div>
			<!-- main-panel ends -->
		</div>
		<!-- page-body-wrapper ends -->
	</div>
	<?php require_once '__js.php'; ?>
	<script type="text/javascript">

			  $(function() {
			    $('#tabela').DataTable({
			    "order": [0, 'desc'],
			      "aLengthMenu": [
			        [5, 10, 15, -1],
			        [5, 10, 15, "All"]
			      ],
			      "iDisplayLength": 10,
			      "language":{ 
			        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
			      }
			    });
			  });

	</script>
</body>
</html>