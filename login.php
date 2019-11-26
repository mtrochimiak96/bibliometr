<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="utf-8">
  <title>Bibliometr</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="style1.css">
</head>

<body>

  <nav class="navbar navbar-expand-sm bg-light navbar-light">
    <div class="container-fluid">
      <div class="navbar-header">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="navbar-brand" href="#">Bibliometr</a>
          </li>
      </div>

      <div class="collapse navbar-collapse">
        <a class="nav-link" href="index.php">Strona Główna</a>
        </li>
      </div>
      <?php
      if (!isset($_SESSION['name'])) {
        ?>
        <li class="nav navbar-nav navbar-right">
          <a class="nav-link" href="registration.php">Zarejestruj</a>
          <a class="nav-link" href="login.php">Zaloguj</a>
        </li>
      <?php } ?>
      </ul>
    </div>
  </nav>
  <br><br>


  <div class="jumbotron">
    <div class="container text-center">

      <div class="container">
        <h2>Zaloguj</h2>
        <form method="get" action="/index.php" class="was-validated">
          <input type="hidden" name="action" value="user_login">
          <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" id="email" placeholder="Wpisz adres e-mail" name="email" required>
          </div>
          <div class="form-group">
            <label for="pswd">Hasło:</label>
            <input type="password" class="form-control" id="pswd" placeholder="Wpisz hasło" name="pswd" required>
          </div>
          <button type="submit" class="btn btn-success">Zaloguj</button>
          
<br><br>
<div class="alert alert-danger">
    <strong>UWAGA!</strong> Jeśli zapomniałeś hasła skontaktuj się z adminem <strong>admin@admin.com</strong>
  </div>


        </form>
      </div>

    </div>
  </div>



</body>

</html>