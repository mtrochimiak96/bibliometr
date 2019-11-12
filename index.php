	
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
			<a class="nav-link" href="/index.php?action=article_create">Dodaj artykuł</a>
				<a class="nav-link" href="registration.php">Zarejestruj</a>
					<a class="nav-link" href="login.php">Zaloguj</a>
	</li>
  </ul>
 </div>
</nav>
<br><br>
	
	
<div class="jumbotron">
  
<div class="container">
 <h2>Wyszukiwarka artykułów</h2>

<div class="col-md-8 order-md-1">
      <form action="wynik.php" class="needs-validation" novalidate>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Tytuł</label>
            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
           
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Imię autora</label>
            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
           
          </div>
		  
		  
		   <div class="col-md-6 mb-3">
            <label for="lastName">Nazwisko autora</label>
            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
          </div>
		  
		  
		   <div class="col-md-6 mb-3">
            <label for="lastName">Data od</label>
            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
          </div>
		  
		    
		   <div class="col-md-6 mb-3">
            <label for="lastName">Data do</label>
            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
          </div>
		  
		  		<div class="col-md-6 mb-3">
            <label for="sel1">Sortuj:</label>
  <select class="form-control" id="sel1">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
  </select>
          </div>
		  

       
          </div>
		  <legend>Wybierz kolumne</legend>
		  <div class="form-check-inline">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="">Option 1
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="">Option 2
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="" disabled>Option 3
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="" disabled>Option 3
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="" disabled>Option 3
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="" disabled>Option 3
  </label>
</div>
<button type="button" class="btn btn-success">Szukaj</button>

        </div>

      
	
  </div>
  
  </form>
 
  
</div></div>

</body>
</html>
<?php
require_once __DIR__ . '/config/dbconfig.php';
require_once __DIR__ . '/src/Controller/ArticleController.php';
require_once __DIR__ . '/src/Model/Article.php';

if (isset($_REQUEST['action'])) {

    switch ($_REQUEST['action']) {
        case 'article_list':
            src\Controller\ArticleController::listAction();
            break;
        case 'article_create':
            src\Controller\ArticleController::createAction();
            break;
}
}
?>
