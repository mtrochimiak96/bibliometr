<?php
ob_start();
// ob_end_clean();
?>

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
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>

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
        <form action="index.php?action=article_list" method="get" class="needs-validation" novalidate>
          <input type="hidden" name="action" value="article_list">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="title">Tytuł</label>
              <input type="text" class="form-control" name="title" placeholder="" value="" required>

            </div>
            <div class="col-md-6 mb-3">
              <label for="name">Imię autora</label>
              <input type="text" class="form-control" name="name" placeholder="" value="" required>
            </div>


            <div class="col-md-6 mb-3">
              <label for="surname">Nazwisko autora</label>
              <input type="text" class="form-control" name="surname" placeholder="" value="" required>
            </div>


            <div class="col-md-6 mb-3">
              <label for="date_from">Data od</label>
              <input type="date" class="form-control" name="date_from" placeholder="" value="" required>
            </div>


            <div class="col-md-6 mb-3">
              <label for="date_to">Data do</label>
              <input type="date" class="form-control" name="date_to" placeholder="" value="" required>
            </div>

            <div class="col-md-6 mb-3">
              <label for="sel">Sortuj:</label>
              <select class="form-control" name="sel">
                <option value="title">Tytuł</option>
                <option value="author">Autor</option>
                <option value="publicdate">Data publikacji</option>
                <option value="minipoint">Punkty</option>
              </select>
            </div>
          </div>
          <legend>Wybierz kolumne</legend>
          <div class="form-check-inline">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="title_check" value="title" checked>Tytuł
            </label>
          </div>
          <div class="form-check-inline">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="author_check" value="author" checked>Autor
            </label>
          </div>
          <div class="form-check-inline">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="conference_check" value="conference">Konferencja
            </label>
          </div>
          <div class="form-check-inline">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="minipoint_check" value="minipoint">Punkty
            </label>
          </div>
          <div class="form-check-inline">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="publicdate_check" value="publicdate" checked>Data publikacji
            </label>
          </div>
          <div class="form-check-inline">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="doi_check" value="doi">DOI
            </label>
          </div>
          <input type="submit" class="btn btn-success" value="Szukaj">
          <input type="submit" class="btn btn-success" name="export" value="Eksportuj">
      </div>
    </div>
    </form>
  </div>
  </div>

</body>

</html>
<?php
require_once __DIR__ . '/config/dbconfig.php';
require_once __DIR__ . '/src/Controller/ArticleController.php';
require_once __DIR__ . '/src/Controller/ExportController.php';
require_once __DIR__ . '/src/Model/Article.php';

if (isset($_REQUEST['action'])) {

  switch ($_REQUEST['action']) {
    case 'article_list':
      src\Controller\ArticleController::listAction();
      break;
    case 'article_create':
      src\Controller\ArticleController::createAction();
      break;
    case 'article_edit':
      src\Controller\ArticleController::editAction();
      break;
    case 'article_delete':
      src\Controller\ArticleController::deleteAction();
      break;
  }
}
?>
