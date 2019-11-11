<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="utf-8">
	<title>Bibliometr</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">	
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	
<nav class="navbar navbar-expand-sm bg-light navbar-light">
	<div class="container-fluid">
		<div class="navbar-header">
			<ul class="navbar-nav">
			<li class="nav-item active">
					<a class="navbar-brand" href="#">Bibliometr</a>
</li></div>

	<div class="collapse navbar-collapse">
		<a class="nav-link" href="index.php">Strona Główna</a>
		</li></div>
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
  <form action="/action_page.php">
    <div class="form-group">
      <label for="usr">Imię:</label>
      <input type="text" class="form-control" id="usr" name="username" >
    </div>
   
     <div class="form-group">
      <label for="usr">Nazwisko:</label>
      <input type="text" class="form-control" id="usr" name="username">
    </div>
   
     <div class="form-group">
      <label for="usr">E-mail:</label>
      <input type="text" class="form-control" id="usr" name="username">
    </div>
   
	     <div class="form-group">
		<label for="pwd">Hasło:</label>
      <input type="password" class="form-control" id="pwd" name="pswd" required>
    </div>
   
        <div class="form-group">
      <label for="usr">Afiliacja:</label>
      <input type="text" class="form-control" id="usr" name="username">
    </div>
   
   
    <button type="submit" class="btn btn-success">Zarejestruj</button>
  </form>
</div>
 
  </div>
</div>
	

	
	
</body>
</html>