<?php require_once '#_global.php'; require_once 'system-classes/Funcoes.php' ?>
<!DOCTYPE html>
<html lang="pt-br">
<?php require_once '__head.php'; 
$fornecedores = Compras::listar_produtos();
$natureza = Compras::listar_natureza();
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
            <h3 class="page-title">Produtos</h3>
            <?php if(isset($_SESSION['OxesUsersMsg'])){ resposta($_SESSION['OxesUsersMsg']); unset($_SESSION['OxesUsersMsg']); } ?>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Cadastro de produto</h4>
                  <!-- <p class="card-description"> Basic form layout </p> -->
                  <form class="forms-sample" action="controller-compras/cadastrar-produto.php" method="post">
                    <input type="hidden" name="pagina" value="compras-produto.php">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="exampleInputUsername1">Código</label>
                        <input type="text" class="form-control form-control-sm" name="codigo" id="" placeholder="" required>
                      </div>  
                      <div class="form-group col-md-6">
                        <label for="exampleInputUsername1">Nome</label>
                        <input type="text" class="form-control form-control-sm" name="nome" id="" placeholder="" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-3">
                        <label for="exampleInputUsername1">Descrição</label>
                        <input type="text" class="form-control form-control-sm" name="descricao" id="" placeholder="" required>
                      </div>  
                      <div class="form-group col-md-3">
                        <label for="exampleInputUsername1">Unidade</label>
                          <select class="form-control form-control-sm" name="unidade">
                            <option value="">SELECIONAR CATEGORIA</option>
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
                      <div class="form-group col-md-3">
                        <label for="exampleInputUsername1">Categoria</label>
                        <select class="form-control form-control-sm" name="categoria">
                          <option value="">SELECIONAR CATEGORIA</option>
                          <option value="ACESSÓRIOS PARA BANHEIRO">ACESSÓRIOS PARA BANHEIRO</option>
                          <option value="ACABAMENTOS">ACABAMENTOS</option>
                          <option value="CLIMATIZAÇÃO">CLIMATIZAÇÃO</option>
                          <option value="CONSTRUÇÃO CIVIL">CONSTRUÇÃO CIVIL</option>
                          <option value="EQUIPAMENTOS DE CLIMATIZAÇÃO">EQUIPAMENTOS DE CLIMATIZAÇÃO</option>
                          <option value="EQUIPAMENTOS DE ELEVAÇÃO E MOVIMENTAÇÃO">EQUIPAMENTOS DE ELEVAÇÃO E MOVIMENTAÇÃO</option>
                          <option value="EQUIPAMENTOS DE JARDINAGEM">EQUIPAMENTOS DE JARDINAGEM</option>
                          <option value="EQUIPAMENTOS DE MEDIÇÃO">EQUIPAMENTOS DE MEDIÇÃO</option>
                          <option value="EQUIPAMENTOS DE PROTEÇÃO INDIVIDUAL (EPI)">EQUIPAMENTOS DE PROTEÇÃO (EPI/EPC)</option>
                          <option value="FERRAMENTAS ELÉTRICAS">FERRAMENTAS ELÉTRICAS</option>
                          <option value="FERRAMENTAS MANUAIS">FERRAMENTAS MANUAIS</option>
                          <option value="ILUMINAÇÃO">ILUMINAÇÃO</option>
                          <option value="ISOLAMENTO TÉRMICO E ACÚSTICO">ISOLAMENTO TÉRMICO E ACÚSTICO</option>
                          <option value="MADEIRAS E COMPENSADOS">MADEIRAS E COMPENSADOS</option>
                          <option value="MATERIAL ELÉTRICO">MATERIAL ELÉTRICO</option>
                          <option value="MATERIAL HIDRÁULICO">MATERIAL HIDRÁULICO</option>
                          <option value="MATERIAIS DE FIXAÇÃO">MATERIAIS DE FIXAÇÃO</option>
                          <option value="MATERIAIS PARA TELHADOS">MATERIAIS PARA TELHADOS</option>
                          <option value="MOBILIÁRIO E DECORAÇÃO">MOBILIÁRIO E DECORAÇÃO</option>
                          <option value="PINTURA E ACABAMENTO">PINTURA E ACABAMENTO</option>
                          <option value="PRODUTOS QUÍMICOS E ADESIVOS">PRODUTOS QUÍMICOS E ADESIVOS</option>
                          <option value="REVESTIMENTOS DE PISOS E PAREDES">REVESTIMENTOS DE PISOS E PAREDES</option>
                          <option value="SINALIZAÇÃO E SEGURANÇA">SINALIZAÇÃO E SEGURANÇA</option>
                          <option value="TINTAS E VERNIZES">TINTAS E VERNIZES</option>
                          <option value="TUBULAÇÕES E CONEXÕES">TUBULAÇÕES E CONEXÕES</option>
                          <option value="UTENSÍLIOS PARA COZINHA E BANHEIRO">UTENSÍLIOS PARA COZINHA E BANHEIRO</option>
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="exampleInputUsername1">Natureza</label>
                          <select class="form-control form-control-sm" name="natureza">
                            <option value="">SELECIONAR NATUREZA</option>
                            <?php foreach($natureza as $x): ?>
                              <option value="<?= $x['id'] ?>"><?= $x['titulo'] ?></option>
                            <?php endforeach; ?>
                          </select>
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
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Unidade</th>
                        <th>Categoria</th>
                        <th>Natureza</th>
                        <th>Gerenciar</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($fornecedores as $x): ?>
                        <tr>
                          <td><?= $x['id']; ?></td>
                          <td><?= $x['codigo']; ?></td>
                          <td><?= $x['nome']; ?></td>
                          <td><?= $x['descricao']; ?></td>
                          <td><?= $x['unidade']; ?></td>
                          <td><?= $x['categoria']; ?></td>
                          <td><?= $x['natureza']; ?></td>
                          <td>
                            <a href="compras-produto-editar.php?id=<?= $x['id'] ?>" class="btn btn-outline-info btt" style="width: 100%;">Editar</a>
                            <a href="compras-produto-excluir.php?id=<?= $x['id'] ?>" class="btn btn-outline-danger" style="width: 100%;">Excluir</a>
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