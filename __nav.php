<div class="horizontal-menu">
  <nav class="navbar top-navbar col-lg-12 col-12 p-0">
    <div class="container">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="principal.php">
          <h3>OXES</h3>
          <span class="font-12 d-block font-weight-light">Gestão e Produtividade</span>
        </a>
        <a class="navbar-brand brand-logo-mini" href="principal.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-img">
                <img src="assets/images/faces/face1.jpg" alt="image">
              </div>
              <div class="nav-profile-text">
                <p class="text-black font-weight-semibold m-0"><?= $_SESSION['OxesUserNome'] ?></p>
                <span class="font-13 online-color">online <i class="mdi mdi-chevron-down"></i></span>
              </div>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                    <!-- <a class="dropdown-item" href="#">
                      <i class="mdi mdi-cached me-2 text-success"></i> Activity Log 
                    </a> -->
                    <!-- <div class="dropdown-divider"></div> -->
                    <a class="dropdown-item" href="system-autenticacao/sair.php">
                      <i class="mdi mdi-logout me-2 text-primary"></i> Sair </a>
                    </div>
                  </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                  <span class="mdi mdi-menu"></span>
                </button>
              </div>
            </div>
          </nav>


          <nav class="bottom-navbar">
            <div class="container">
              <ul class="nav page-navigation">
                <li class="nav-item">
                  <a class="nav-link" href="principal.php">
                    <i class="mdi mdi-home-outline menu-icon"></i>
                    <span class="menu-title">Inicio</span>
                  </a>
                </li>



                <li class="nav-item mega-menu">
                  <a href="#" class="nav-link">
                    <i class="mdi mdi-cart menu-icon"></i>
                    <span class="menu-title">Compras</span>
                    <i class="menu-arrow"></i></a>
                    <div class="submenu">
                      <div class="col-group-wrapper row">
                        <div class="col-group col-md-3">
                          <p class="category-heading">Ações</p>
                          <ul class="submenu-item">
                            <li class="nav-item"><a class="nav-link" href="pages/tables/basic-table.html">Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link" href="compras-novo-pedido.php">Novo pedido</a></li>
                            <li class="nav-item"><a class="nav-link" href="pages/tables/data-table.html">Pedidos abertos</a></li>
                            <li class="nav-item"><a class="nav-link" href="pages/tables/js-grid.html">Pedidos concluidos</a></li>
                            <li class="nav-item"><a class="nav-link" href="pages/tables/sortable-table.html">Pedidos reprovados</a></li>
                            <li class="nav-item"><a class="nav-link" href="pages/tables/sortable-table.html">Pendente nota fiscal</a></li>
                          </ul>
                        </div>
                        <div class="col-group col-md-3">
                          <p class="category-heading">Gerenciar</p>
                          <ul class="submenu-item">
                            <li class="nav-item"><a class="nav-link" href="pages/maps/google-maps.html">Aprovadores</a></li>
                            <li class="nav-item"><a class="nav-link" href="compras-fornecedor.php">Fornecedores</a></li>
                            <li class="nav-item"><a class="nav-link" href="compras-produto.php">Produtos</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </li>


                  <li class="nav-item mega-menu">
                    <a href="#" class="nav-link">
                      <i class="mdi mdi-book menu-icon"></i>
                      <span class="menu-title">Projetos</span>
                      <i class="menu-arrow"></i></a>
                      <div class="submenu">
                        <div class="col-group-wrapper row">
                         <div class="col-group col-md-3">
                          <p class="category-heading">Ações</p>
                          <ul class="submenu-item">
                            <li class="nav-item"><a class="nav-link" href="projeto-projeto.php">Novo projeto</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </li>


                  <li class="nav-item mega-menu">
                    <a href="#" class="nav-link">
                      <i class="mdi mdi-cash-multiple"></i>
                      <span class="menu-title">Saldos</span>
                      <i class="menu-arrow"></i></a>
                      <div class="submenu">
                        <div class="col-group-wrapper row">

                        <div class="col-group col-md-3">
                          <p class="category-heading">Gerenciar</p>
                          <ul class="submenu-item">
                            <li class="nav-item"><a class="nav-link" href="projeto-projetos.php">Saldos</a></li>
                            <li class="nav-item"><a class="nav-link" href="projeto-projetos.php">Transferência entre competências</a></li>
                            <li class="nav-item"><a class="nav-link" href="projeto-projetos.php">Transferência entre naturezas</a></li>
                          </ul>
                        </div>
                         <div class="col-group col-md-3">
                          <p class="category-heading">Ações</p>
                          <ul class="submenu-item">
                            <li class="nav-item"><a class="nav-link" href="saldo-movimentar.php">Movimentar linha de saldo</a></li>
                          </ul>
                        </div>

                      </div>
                    </div>
                  </li>


                  <li class="nav-item mega-menu">
                    <a href="#" class="nav-link">
                      <i class="mdi mdi-responsive menu-icon"></i>
                      <span class="menu-title">Sistema</span>
                      <i class="menu-arrow"></i></a>
                      <div class="submenu">
                        <div class="col-group-wrapper row">
                         <div class="col-group col-md-3">
                          <p class="category-heading">Cadastros</p>
                          <ul class="submenu-item">
                            <li class="nav-item"><a class="nav-link" href="sistema-usuarios.php">Usuários</a></li>
                          </ul>
                        </div>
                    <!--
                    <div class="col-group col-md-3">
                      <p class="category-heading">Maps</p>
                      <ul class="submenu-item">
                        <li class="nav-item"><a class="nav-link" href="pages/maps/mapael.html">Mapael</a></li>
                        <li class="nav-item"><a class="nav-link" href="pages/maps/vector-map.html">Vector Map</a></li>
                        <li class="nav-item"><a class="nav-link" href="pages/maps/google-maps.html">Google Map</a></li>
                      </ul>
                    </div> -->
                  </div>
                </div>
              </li>


              <li class="nav-item mega-menu">
                <a href="#" class="nav-link">
                  <!-- <i class="mdi mdi-responsive menu-icon"></i> -->
                  <!-- <span class="menu-title">Sistema</span> -->
                  <!-- <i class="menu-arrow"></i> -->
                </a>
              </li>
              <li class="nav-item mega-menu">
                <a href="#" class="nav-link">
                  <!-- <i class="mdi mdi-responsive menu-icon"></i> -->
                  <!-- <span class="menu-title">Sistema</span> -->
                  <!-- <i class="menu-arrow"></i> -->
                </a>
              </li>
              <li class="nav-item mega-menu">
                <a href="#" class="nav-link">
                  <!-- <i class="mdi mdi-responsive menu-icon"></i> -->
                  <!-- <span class="menu-title">Sistema</span> -->
                  <!-- <i class="menu-arrow"></i> -->
                </a>
              </li>
              <li class="nav-item mega-menu">
                <a href="#" class="nav-link">
                  <!-- <i class="mdi mdi-responsive menu-icon"></i> -->
                  <!-- <span class="menu-title">Sistema</span> -->
                  <!-- <i class="menu-arrow"></i> -->
                </a>
              </li>

              
            </ul>
          </div>
        </nav>
      </div>