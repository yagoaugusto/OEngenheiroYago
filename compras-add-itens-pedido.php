<?php require_once '#_global.php'; require_once 'system-classes/Funcoes.php' ?>
<!DOCTYPE html>
<html lang="pt-br">
<?php require_once '__head.php'; 
$id_pedido = $_GET['pedido'];
$info_pedido = Compras::info_pedido($id_pedido);
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
            <h3 class="page-title">Pedido: <?= $id_pedido ?></h3>
            <p>
              <b style="color:blue;">|</b>
              <b>Projeto: </b><?= $info_pedido[0]['projeto'] ?> 
              <b style="color:blue;">|</b> 
              <b>Solicitante: </b><?= $info_pedido[0]['solicitante'] ?> em <i><?= momento($info_pedido[0]['log_pedido']) ?></i>
              <b style="color:blue;">|</b> <b>Prazo:</b> <?= data($info_pedido[0]['prazo_recebimento']) ?>
              <b style="color:blue;">|</b><br>
              <b style="color:blue;">|</b>
              <b>Descrição da necessidade: </b><?= $info_pedido[0]['desc_necessidade'] ?> 
              <b style="color:blue;">|</b>
            </p>
            <?php if(isset($_SESSION['OxesUsersMsg'])){ resposta($_SESSION['OxesUsersMsg']); unset($_SESSION['OxesUsersMsg']); } ?>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Adicionar item ao pedido</h4>
                  <!-- <p class="card-description"> Basic form layout </p> -->
                  <form class="forms-sample" action="controller-compras/novo-pedido.php" method="post">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Projeto</label>
                      <select class="form-control required" name="projeto">
                      	<option value="">Selecionar</option>
                      	<?php foreach($projetos as $x): ?>
                      		<option value="<?= $x['id'] ?>"><?= $x['titulo'] ?></option>
                      	<?php endforeach ?>
                      </select>
                    </div>
                    <!-- <div class="row">
                    <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">Produto</label>
                      <input type="text" class="form-control form-control-sm" id="" name="produto" placeholder="Produto" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">Quantidade</label>
                      <input type="number" class="form-control form-control-sm" id="" name="quantidade" placeholder="" required>
                    </div>
                  <div class="form-group col-md-4">
                    <label for="exampleInputUsername1">Unidade</label>
                      <select class="form-control form-control-sm" name="unidade">
                        <option value="">Selecionar</option>
                        <option value="CENTÍMETRO">CENTÍMETRO (CM)</option>
                        <option value="CENTÍMETRO QUADRADO">CENTÍMETRO QUADRADO (CM²)</option>
                        <option value="CONJUNTO">CONJUNTO (CONJ)</option>
                        <option value="GRAMA">GRAMA (G)</option>
                        <option value="KILOWATT-HORA">KILOWATT-HORA (KWH)</option>
                        <option value="LITRO">LITRO (L)</option>
                        <option value="METRO">METRO (M)</option>
                        <option value="METRO QUADRADO">METRO QUADRADO (M²)</option>
                        <option value="MILÍMETRO">MILÍMETRO (MM)</option>
                        <option value="MILILITRO">MILILITRO (ML)</option>
                        <option value="PEÇA">PEÇA (PC)</option>
                        <option value="QUILOGRAMA">QUILOGRAMA (KG)</option>
                        <option value="UNIDADE">UNIDADE (UNI)</option>
                      </select>
                  </div>
                    </div> -->
                    <div class="form-group">
                      <label for="exampleInputEmail1">Descrição da necessidade</label>
                      <input type="text" class="form-control form-control-sm" id="" name="desc_necessidade" placeholder="descrição da necessidade" required>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-4">
                        <label>Prazo para recebimento</label>
                        <input type="date" class="form-control form-control-sm" name="prazo_recebimento" required>
                      </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Criar pedido">
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
                        <th>Log</th>
                        <th>Produto</th>
                        <th>Qtd</th>
                        <th>Projeto</th>
                        <th>Solicitante</th>
                        <th>Prazo</th>
                        <th>Situação</th>
                        <th> - </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($pedidos as $x): ?>
                        <tr>
                          <td><?= $x['id']; ?></td>
                          <td><?= momento($x['log_pedido']) ?></td>
                          <td><?= $x['produto']; ?></td>
                          <td><?= $x['quantidade']; ?></td>
                          <td><?= $x['projeto']; ?></td>
                          <td><?= $x['solicitante']; ?></td>
                          <td><?= data($x['prazo_recebimento']); ?></td>
                          <td><?= $x['situacao']; ?></td>
                          <td>
                            <a href="compras-produto-editar.php?id=<?= $x['id'] ?>" class="btn btn-outline-info btt" style="width: 100%;">Abrir pedido</a>
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