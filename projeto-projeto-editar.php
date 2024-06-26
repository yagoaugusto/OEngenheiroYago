<?php require_once '#_global.php'; require_once 'system-classes/Funcoes.php' ?>
<!DOCTYPE html>
<html lang="pt-br">
<?php require_once '__head.php'; 
$info = Projetos::info_projeto($_GET['id']);
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
              <a href="projeto-projeto.php" class="btn btn-secondary">Voltar</a> <br><br>
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Cadastro de projeto</h4>
                  <!-- <p class="card-description"> Basic form layout </p> -->
                  <form class="forms-sample" action="controller-projeto/atualizar-projeto.php" method="post">
                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                    <input type="hidden" name="titulo" value="<?= $info[0]['titulo'] ?>">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Titulo</label>
                      <input type="text" class="form-control form-control-sm" name="t" id="" placeholder="Fornecedor" disabled value="<?= $info[0]['titulo'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Transferência entre competências</label>
                      <select class="form-control" name="transferencia_competencia">
                        <option value="<?= $info[0]['transf_competencia'] ?>">SIM</option>
                        <option value="SIM">SIM</option>
                        <option value="NÃO">NÃO</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Transferência entre naturezas</label>
                      <select class="form-control" name="transferencia_natureza">
                        <?= $info[0]['transf_natureza'] ?>
                        <option value="SIM">SIM</option>
                        <option value="NÃO">NÃO</option>
                      </select>
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