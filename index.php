	
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