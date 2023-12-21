<?php

session_start();
if (isset($_SESSION['username'])) {
  header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>LOGIN</title>
  <meta name="description" content="" />
  <?php require_once('layout/_css.php') ?>
  <style>
    /* CSS untuk memusatkan form login */
    .authentication-inner {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
  </style>
  <script src="sneat-1.0.0/assets/js/config.js"></script>
</head>
<body>
  <!-- Content -->
  <div class="container-sm">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner d-flex justify-content-center">
        <!-- login -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <a href="index.html" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
                  <!-- Logo SVG -->
                </span>
                <span class="app-brand-text demo text-body fw-bolder">L O G I N</span>
              </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2" style="margin-top: 20px;">Skandakra! 👋</h4>
            <p class="mb-4">Silahkan login disini</p>
            <form id="formAuthentication" class="mb-3" action="auth_model.php" method="post">
              <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" autofocus />
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label">Password</label>
                </div>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>
              <div class="mb-3">
                <button name="login" class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /login -->
      </div>
    </div>
  </div>
  <!-- / Content -->
  <!-- js -->
  <?php require_once('layout/_js.php') ?>
  <!-- akhir js -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>