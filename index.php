<?php
ob_start();
session_start();

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
        <?php
        if (!isset($_SESSION['name'])) {
          ?>
          <a class="nav-link" href="registration.php">Zarejestruj</a>
          <a class="nav-link" href="login.php">Zaloguj</a>
        <?php } else { ?>
          <a class="nav-link" href="/index.php?action=article_create">Dodaj artykuł</a>
          <a class="nav-link" href="/index.php?action=article_list&name=<?= $_SESSION['name'] ?>&date_from=&date_to=&shares_check=shares&sel=title&title_check=title&author_check=author&conference_check=conference&minipoint_check=minipoint&publicdate_check=publicdate&doi_check=doi">Moje artykuły</a>
          <a class="nav-link" href="/index.php?action=user_logout">Wyloguj</a>
        <?php } ?>
        <?php
        if (isset($_SESSION['role']) && $_SESSION['role'] === "admin") {
          ?>
          <a class="nav-link" href="/index.php?action=user_list">Użytkownicy</a>
        <?php } ?>
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
              <label for="name">Imię i nazwisko autora</label>
              <input type="text" class="form-control" name="name" placeholder="" value="" required>
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
          <?php
          $title_check = isset($_REQUEST['title_check']);
          $author_check = isset($_REQUEST['author_check']);
          $conference_check = isset($_REQUEST['conference_check']);
          $minipoint_check = isset($_REQUEST['minipoint_check']);
          $publicdate_check = isset($_REQUEST['publicdate_check']);
          $doi_check = isset($_REQUEST['doi_check']);
          $shares_check = isset($_REQUEST['shares_check']);
          ?>
          <legend>Wybierz kolumne</legend>
          <div class="form-check-inline">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="title_check" value="" <?= empty($_REQUEST['title_check']) ? "checked" : ($title_check ? "checked" : "") ?>>Tytuł
            </label>
          </div>
          <div class="form-check-inline">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="author_check" value="" <?= empty($_REQUEST['author_check']) ? "checked" : ($author_check ? "checked" : "") ?>>Autor
            </label>
          </div>
          <div class="form-check-inline">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="conference_check" value="" <?= $conference_check ? "checked" : "" ?>>Konferencja
            </label>
          </div>
          <div class="form-check-inline">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="minipoint_check" value="" <?= $minipoint_check ? "checked" : "" ?>>Punkty
            </label>
          </div>
          <div class="form-check-inline">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="publicdate_check" value="" <?= empty($_REQUEST['publicdate_check']) ? "checked" : ($publicdate_check ? "checked" : "") ?>>Data publikacji
            </label>
          </div>
          <div class="form-check-inline">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="doi_check" value="" <?= $doi_check ? "checked" : "" ?>>DOI
            </label>
          </div>
          <div class="form-check-inline">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="shares_check" value="" <?= $shares_check ? "checked" : "" ?>>Udziały
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
require_once __DIR__ . '/src/Controller/UserController.php';
require_once __DIR__ . '/src/Controller/ExportController.php';
require_once __DIR__ . '/src/Model/Article.php';
require_once __DIR__ . '/src/Model/User.php';


if (isset($_SESSION['name']) && isset($_SESSION['role'])) {
  if (!src\Model\User::userExists($_SESSION['name'], $_SESSION['role'])) {
    echo 'not exists';
    header("Location: index.php?action=user_logout");
  }
}

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
    case 'user_create':
      src\Controller\UserController::createAction();
      break;
    case 'user_edit':
      src\Controller\UserController::editAction();
      break;
    case 'user_delete':
      src\Controller\UserController::deleteAction();
      break;
    case 'user_login':
      src\Controller\UserController::loginAction();
      break;
    case 'user_list':
      src\Controller\UserController::listAction();
      break;
    case 'user_logout':
      session_unset();
      session_destroy();
      header("Location: index.php");
      break;
    default:
      break;
  }
}
?>