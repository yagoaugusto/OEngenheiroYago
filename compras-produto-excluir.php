<?php require_once '#_global.php'; require_once 'system-classes/Funcoes.php' ?>
<!DOCTYPE html>
<html lang="pt-br">
  <?php require_once '__head.php'; 
  $info = Compras::info_produto($_GET['id']);
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
              <h3 class="text-danger text-center">Você confirma a exclusão do produto: <u><?= $info[0]['nome'].' - '.$info[0]['descricao'] ?></u> ? Essa ação não poderá ser desfeita.</h3>
            </div>
            <!-- first row starts here -->
            <div class="row col-md-12">
                <div class="col-md-6">
                  <a class="btn btn-danger" style="width: 100%;" href="controller-compras/excluir-produto.php?id=<?= $_GET['id'] ?>">EXCLUIR</a>
                </div>
                <div class="col-md-6">
                  <a class="btn btn-secondary" style="width: 100%;" href="compras-produto.php">VOLTAR</a>
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
  </body>
</html>