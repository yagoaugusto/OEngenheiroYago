<!DOCTYPE html>
<?php 
session_start();
?>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Oxes!</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/css/demo_3/style.css">
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
          <div class="row flex-grow">
            <div class="col-lg-6 d-flex align-items-center justify-content-center">
              <div class="auth-form-transparent text-left p-3">
                <div class="brand-logo">
                  <h3 class="text-danger">0XES!</h3>  
                  <?php if(isset($_SESSION['OxesLoginErro'])){ ?>
                  <div class="alert alert-danger" role="alert">Usuário ou senha inválida.</div>
                <?php }else {} ?>
                </div>
                <h4>Bem vindo de volta!</h4>
                <form class="pt-3" action="system-autenticacao/valida.php" method="POST">
                  <div class="form-group">
                    <label for="exampleInputEmail">Email</label>
                    <div class="input-group">
                      <input type="text" class="form-control form-control-lg border-left-0" id="" name="email" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword">Senha</label>
                    <div class="input-group">
                      <input type="password" class="form-control form-control-lg border-left-0" name="senha" placeholder="Senha">
                    </div>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <a href="recuperar-senha.html" class="auth-link text-black">Recuperar senha.</a>
                  </div>
                  <div class="my-3">
                    <input type="submit" class="btn btn-primary" style="width:100%;" value="ENTRAR">
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-6 login-half-bg d-flex flex-row">
              <p class="text-white font-weight-semibold text-center flex-grow align-self-end">OXES! &copy; Todos os direitos reservados a Yago, Mayra e Rafael.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
  </body>
</html>