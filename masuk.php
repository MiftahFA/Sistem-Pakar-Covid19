<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Pakar | Masuk</title>
  <link rel="stylesheet" href="Assets/Css/styleLogin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>

<body>
  <div class="container">
    <?php
    if (isset($_SESSION['status'])) {
    ?>
      <div class="alert hide">
        <span class="fas fa-times-circle"></span>
        <span class="msg"><?= $_SESSION['status'] ?></span>
        <div class="close-btn">
          <span class="fas fa-times"></span>
        </div>
      </div>
    <?php
      unset($_SESSION['status']);
    }
    ?>
    <div class="wrapper">
      <div class="title"><span>
          <h2>Login Form<h2>
        </span></div>
      <form action="prosesmasuk.php" method="POST">
        <div class="row">
          <i class="fas fa-user"></i>
          <input type="text" name="username" placeholder="Username" required>
        </div>
        <div class="row">
          <i class="fas fa-lock"></i>
          <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="row button">
          <button type="submit" name="login" value="Login">Login</button>
        </div>
      </form>
    </div>

  </div>
  <script>
    $(document).ready(function() {
      $('.alert').addClass("show");
      $('.alert').removeClass("hide");
      $('.alert').addClass("showAlert");
      setTimeout(function() {
        $('.alert').removeClass("show");
        $('.alert').addClass("hide");
      }, 3000);
      setTimeout(function() {
        $('.alert').removeClass("showAlert");
      }, 4000);
    });
    $('.close-btn').click(function() {
      $('.alert').removeClass("show");
      $('.alert').addClass("hide");
      setTimeout(function() {
        $('.alert').removeClass("showAlert");
      }, 4000);
    });
  </script>
</body>

</html>