<?php require_once '#_global.php'; require_once 'system-classes/Funcoes.php' ?>
<!DOCTYPE html>
<html lang="pt-br">
<?php require_once '__head.php'; 
$fornecedores = Compras::listar_fornecedores();
$info = Compras::info_fornecedor($_GET['id']);
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
            <h3 class="page-title"><?= $info[0]['titulo'] ?></h3>
            <?php if(isset($_SESSION['OxesUsersMsg'])){ resposta($_SESSION['OxesUsersMsg']); unset($_SESSION['OxesUsersMsg']); } ?>
          </div>

          <div class="row">
            <div class="col-md-12">
              <a href="compras-fornecedor.php" class="btn btn-secondary">Voltar</a> <br><br>
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Editar fornecedor</h4>
                  <!-- <p class="card-description"> Basic form layout </p> -->
                  <form class="forms-sample" action="controller-compras/atualizar-fornecedor.php" method="post">
                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Fornecedor</label>
                      <input type="text" class="form-control form-control-sm" name="titulo" value="<?= $info[0]['titulo'] ?>" id="" placeholder="Fornecedor" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Endereco</label>
                      <input type="text" class="form-control form-control-sm" id="" name="endereco" value="<?= $info[0]['endereco'] ?>" placeholder="Endereço" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="text" class="form-control form-control-sm" id="" name="email" placeholder="email" value="<?= $info[0]['email'] ?>" required>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Responsável</label>
                        <input type="text" class="form-control form-control-sm" name="responsavel" value="<?= $info[0]['responsavel'] ?>" placeholder="Nome do Responsável" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputUsername1">Telefone (WhatsAPP)</label>
                        <input type="text" class="form-control form-control-sm" name="telefone" value="<?= $info[0]['telefone'] ?>" id="" placeholder="Telefone 00901234567" required>
                      </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Salvar">
                  </form>
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