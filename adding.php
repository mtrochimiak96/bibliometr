<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="utf-8">
	<title>Bibliometr</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">	
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
			<a class="nav-link" href="adding.php">Dodaj artykuł</a>
				<a class="nav-link" href="registration.php">Zarejestruj</a>
					<a class="nav-link" href="login.php">Zaloguj</a>
	</li>
  </ul>
 </div>
</nav>
<br><br>
	
	
<div class="jumbotron">
  
 <div class="container"> 
 
 <h2>Publikacja artykułu</h2>

    <label for="title">Tytuł:</label>
    <input type="title" class="form-control" id="title" name="title">
    <label for="date">Data:</label>
    <input type="date" class="form-control" id="date" name="date">
	<br>
      <textarea class="form-control" rows="5" id="comment" placeholder="Miejsce na artykuł" name="text"></textarea>
	  
	  
	  
		 <label for="sel1">Współautorzy:</label> 		 
			<select class="form-control form-inline" id="sel1">
					<option>Autor1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					
			</select>
	
			
				<label for="title">Pkt Ministerialne:</label>
					<input type="title" class="form-control" id="title" name="title">
						<label for="title">DOI:</label>
							<input type="title" class="form-control" id="title" name="title">
								<label for="title">Konferencja:</label>
										<input type="title" class="form-control" id="title" name="title">	
	  
  </form>
</div></div>


	
</body>
</html>