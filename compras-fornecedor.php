<?php require_once '#_global.php'; require_once 'system-classes/Funcoes.php' ?>
<!DOCTYPE html>
<html lang="pt-br">
<?php require_once '__head.php'; 
$fornecedores = Compras::listar_fornecedores();
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
            <h3 class="page-title">Fornecedores</h3>
            <?php if(isset($_SESSION['OxesUsersMsg'])){ resposta($_SESSION['OxesUsersMsg']); unset($_SESSION['OxesUsersMsg']); } ?>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Cadastro de fornecedor</h4>
                  <!-- <p class="card-description"> Basic form layout </p> -->
                  <form class="forms-sample" action="controller-compras/cadastrar-fornecedor.php" method="post">
                    <input type="hidden" name="pagina" value="compras-fornecedor.php">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Fornecedor</label>
                      <input type="text" class="form-control form-control-sm" name="titulo" id="" placeholder="Fornecedor" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Endereco</label>
                      <input type="text" class="form-control form-control-sm" id="" name="endereco" placeholder="Endereço" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="text" class="form-control form-control-sm" id="" name="email" placeholder="email" required>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Responsável</label>
                        <input type="text" class="form-control form-control-sm" name="responsavel" placeholder="Nome do Responsável" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputUsername1">Telefone (WhatsAPP)</label>
                        <input type="text" class="form-control form-control-sm" name="telefone" id="" placeholder="Telefone 00901234567" required>
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

                  <table class="table table-responsive table-striped minha-tabela" id="tabela">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Fornecedor</th>
                        <th>Responsável</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Endereço</th>
                        <th>Gerenciar</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($fornecedores as $x): ?>
                        <tr>
                          <td><?= $x['id']; ?></td>
                          <td><?= $x['titulo']; ?></td>
                          <td><?= $x['responsavel']; ?></td>
                          <td><?= $x['telefone']; ?></td>
                          <td><?= $x['email']; ?></td>
                          <td><?= $x['endereco']; ?></td>
                          <td>
                            <a href="compras-fornecedor-editar.php?id=<?= $x['id'] ?>" class="btn btn-outline-info btt">Editar</a>
                            <a href="compras-fornecedor-excluir.php?id=<?= $x['id'] ?>" class="btn btn-outline-danger">Excluir</a>
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