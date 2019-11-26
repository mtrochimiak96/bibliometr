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
      <li class="nav navbar-nav navbar-right">
        <a class="nav-link" href="registration.php">Zarejestruj</a>
        <a class="nav-link" href="login.php">Zaloguj</a>
      </li>
      </ul>
    </div>
  </nav>
  <br><br>


  <div class="jumbotron">
    <div class="container text-center">

      <div class="container">
        <h2>Rejestracja</h2>
        <p>Wypełnij wszystkie pola, aby się zarejestrować </p>
        <form method="get" action="/index.php?action=user_create">
          <input type="hidden" value="user_create" name="action">
          <div class="form-group">
            <label for="name">Imię i nazwisko:</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>

          <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>

          <div class="form-group">
            <label for="password">Hasło:</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>

          <div class="form-group">
            <label for="affiliation">Afiliacja:</label>
            <input type="text" class="form-control" id="affiliation" name="affiliation">
          </div>


          <button type="submit" class="btn btn-success">Zarejestruj</button>
        </form>
      </div>

    </div>
  </div>




</body>

</html>