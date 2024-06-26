<?php require_once '#_global.php'; require_once 'system-classes/Funcoes.php' ?>
<!DOCTYPE html>
<html lang="pt-br">
<?php require_once '__head.php'; 

$projeto = Projetos::listar_projetos();
$natureza = Compras::listar_natureza();
$movimentacoes = Saldo::listar_movimentacoes_saldo();
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

          </div>
          <!-- first row starts here -->

          <div class="page-header flex-wrap">
            <h3 class="page-title">Linhas de Saldo</h3>
            <?php if(isset($_SESSION['OxesUsersMsg'])){ resposta($_SESSION['OxesUsersMsg']); unset($_SESSION['OxesUsersMsg']); } ?>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Movimentar Linha</h4>
                  <!-- <p class="card-description"> Basic form layout </p> -->
                  <form class="forms-sample" action="controller-saldo/movimentar.php" method="post">
                    <div class="row">
                      <div class="form-group col-md-4">
                        <label for="exampleInputUsername1">Projeto</label>
                        <select class="form-control" name="projeto" required>
                        	<option value="">Selecionar</option>
                        	<?php foreach($projeto as $x): ?>
                        		<option value="<?= $x['id'] ?>"><?= $x['titulo'] ?></option>
                        	<?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="exampleInputUsername1">Natureza</label>
                        <select class="form-control" name="natureza" required>
                        	<option value="">Selecionar</option>
                        	<?php foreach($natureza as $x): ?>
                        		<option value="<?= $x['id'] ?>"><?= $x['titulo'] ?></option>
                        	<?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="exampleInputUsername1">Tipo de Movimentação</label>
                        <select class="form-control" name="tipo" required>
                        	<option value="">Selecionar</option>
                        	<option value="SALDO">SALDO</option>
                        	<option value="APORTE">APORTE</option>
                        	<option value="EXTORNO">EXTORNO</option>
                        </select>
                      </div>
                      <div class="form-group col-md-2">
                        <label for="exampleInputUsername1">Mês</label>
                        <select class="form-control" name="mes" required>
                        	<option value="">Selecionar</option>
                        	<option value="01">Janeiro</option>
                        	<option value="02">Fevereiro</option>
                        	<option value="03">Março</option>
                        	<option value="04">Abril</option>
                        	<option value="05">Maio</option>
                        	<option value="05">Junho</option>
                        	<option value="07">Julho</option>
                        	<option value="08">Agosto</option>
                        	<option value="09">Setembro</option>
                        	<option value="10">Outubro</option>
                        	<option value="11">Novembro</option>
                        	<option value="12">Dezembro</option>
                        </select>
                      </div>
                      <div class="form-group col-md-2">
                        <label for="exampleInputUsername1">Ano</label>
                        <select class="form-control" name="ano" required>
                        	<option value="">Selecionar</option>
                        	<option value="2024">2024</option>
                        	<option value="2025">2025</option>
                        </select>
                      </div>  
                    </div>

                    <div class="row">
                      <div class="form-group col-md-4">
                        <label for="exampleInputUsername1">Valor R$</label>
                        <input type="text" name="valor" required class="form-control" id="valorMonetario" inputmode="numeric" placeholder="R$">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-12">
                        <label for="exampleInputUsername1">Cometário</label>
                        <input type="text" class="form-control" name="comentario">
                      </div>
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

                  <div class="table-responsive">
                  <table class="table table-responsive table-striped minha-tabela" id="tabela">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Projeto</th>
                        <th>Natureza</th>
                        <th>Competência</th>
                        <th>Responsável</th>
                        <th>Valor</th>
                        <th>Log</th>
                        <th>Comentário</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $cor = "primary"; foreach($movimentacoes as $x): 
                      if($x['tipo']=="SALDO"){$cor="success";}if($x['tipo']=="EXTORNO"){$cor="danger";}if($x['tipo']=="APORTE"){$cor="warning";}if($x['tipo']=="TRANSFERENCIA"){$cor="primary";}
                      ?>
                        <tr>
                          <td><?= $x['id']; ?></td>
                          <td class="text-<?= $cor ?>"><b><?= $x['tipo']; ?></b></td>
                          <td><?= $x['projeto']; ?></td>
                          <td><?= $x['natureza']; ?></td>
                          <td><?= $x['competencia']; ?></td>
                          <td><?= $x['responsavel']; ?></td>
                          <td><?= fin($x['valor']); ?></td>
                          <td><?= $x['log']; ?></td>
                          <td><?= $x['comentario']; ?></td>
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


		document.getElementById('valorMonetario').addEventListener('input', function (e) {
		    var value = e.target.value;
		    value = value.replace(/\D/g, ""); // Remove tudo o que não é dígito
		    value = value.replace(/(\d)(\d{2})$/, "$1,$2"); // Coloca vírgula antes dos últimos 2 dígitos
		    value = value.replace(/(?=(\d{3})+(\D))\B/g, "."); // Coloca ponto a cada 3 dígitos
		    e.target.value = value;
		});

  </script>
</body>
</html>