<?php

namespace src\Controller;

require_once __DIR__ . '/../Model/Article.php';
require_once __DIR__ . '/../Model/Author.php';
require_once __DIR__ . '/../Model/User.php';

use src\Model\Article;
use src\Model\Author;
use src\Model\User;


class ArticleController
{
    public static function listAction()
    {
        $title_check = isset($_REQUEST['title_check']) ? "getTitle" : "";
        $author_check = isset($_REQUEST['author_check']) ? "getAuthor" : "";
        $conference_check = isset($_REQUEST['conference_check']) ? "getConferenceValue" : "";
        $minipoint_check = isset($_REQUEST['minipoint_check']) ? "getMinipoint" : "";
        $publicdate_check = isset($_REQUEST['publicdate_check']) ? "getPublicdate" : "";
        $doi_check = isset($_REQUEST['doi_check']) ? "getDoi" : "";
        $shares_check = isset($_REQUEST['shares_check']) ? "getShares" : "";
        $title = (isset($_REQUEST['title']) && !empty($_REQUEST['title'])) ? "title LIKE '%{$_REQUEST['title']}%'" : "";
        $name = (isset($_REQUEST['name']) && !empty($_REQUEST['name'])) ? "author LIKE '%{$_REQUEST['name']}%'" : "";
        $conftype = (isset($_REQUEST['conftype']) && !empty($_REQUEST['conftype'])) ? "conftype LIKE '%{$_REQUEST['conftype']}%'" : "";
        $confvalue = (isset($_REQUEST['confvalue']) && !empty($_REQUEST['confvalue'])) ? "confvalue LIKE '%{$_REQUEST['confvalue']}%'" : "";
        $date_from = (isset($_REQUEST['date_from']) && !empty($_REQUEST['date_from'])) ? "publicdate >= '{$_REQUEST['date_from']}'" : "";
        $date_to = (isset($_REQUEST['date_to']) && !empty($_REQUEST['date_to'])) ? "publicdate <= '{$_REQUEST['date_to']}'" : "";
        $sel = (isset($_REQUEST['sel']) && !empty($_REQUEST['sel'])) ? $_REQUEST['sel'] : "author";

        $where = empty($title) ? "" : $title;
        $where .= empty($name) ? "" : (empty($title) ? "" : " AND ") . $name;
        $where .= empty($conftype) ? "" : (empty($conftype) ? "" : " AND ") . $conftype;
        $where .= empty($confvalue) ? "" : (empty($confvalue) ? "" : " AND ") . $confvalue;
        $where .= empty($date_from) ? "" : (empty($surname) ? "" : " AND ") . $date_from;
        $where .= empty($date_to) ? "" : (empty($date_from) ? "" : " AND ") . $date_to;

        $user = User::fetchAll("id_user = '{}'");

        $articles = Article::fetchAll($where, $sel);

        $selectors = [
            $title_check, $author_check, $conference_check, $minipoint_check, $publicdate_check, $doi_check, $shares_check
        ];
        $selectors = array_filter($selectors, function ($sel) {
            return $sel !== "";
        });

        if (isset($_REQUEST['export'])) {
            ob_end_clean();
            ob_start();
            ExportController::exportAction($articles, $selectors);
        }

        require_once __DIR__ . '/../View/Article/list.php';
    }

    public static function editAction()
    {
        if (!isset($_SESSION['name'])) {
            die("Nie jesteś zalogowana/y!");
            exit;
        }
        if (!(isset($_REQUEST['id']) && !empty($_REQUEST['id']))) {
            die("Nie podano ID artykułu!");
            exit;
        }

        $article = Article::fetchAll("id_article = '{$_REQUEST['id']}'");
        $article = $article[0];

        if (explode(", ", $article->getAuthor())[0] !== $_SESSION['name']) {
            die("Nie jesteś autorem artykułu!");
            exit;
        }
        require_once __DIR__ . '/../View/Article/edit.php';
    }

    public static function createAction()
    {

        if (!isset($_SESSION['name'])) {
            die("Nie jesteś zalogowana/y!");
            exit;
        }
        if (isset($_REQUEST['author'])) {
            // walidacja danych
            if (
                !(isset($_REQUEST['author']) && !empty($_REQUEST['author'])
                    && isset($_REQUEST['title']) && !empty($_REQUEST['title'])
                    && isset($_REQUEST['doi']) && !empty($_REQUEST['doi'])
                    && isset($_REQUEST['shares']) && !empty($_REQUEST['shares'])
                    && isset($_REQUEST['minipoint']) && !empty($_REQUEST['minipoint'])
                    && isset($_REQUEST['conftype']) && !empty($_REQUEST['conftype'])
                    && isset($_REQUEST['confvalue']) && !empty($_REQUEST['confvalue'])
                    && isset($_REQUEST['publicdate']) && !empty($_REQUEST['publicdate']))
            ) {
                die("Nieprawidlowe dane");
            }

            $shares = $_REQUEST['shares'];
            $shares = \explode(", ", $shares);
            $licznik = 0;
            foreach ($shares as $share) {
                $sh = explode(" ", $share);
                foreach ($sh as $auth => $count) {
                    $licznik += json_decode($count);
                }
            }
            if ($licznik > 100) {
                echo "Za dużo udziałów! (Maksymalnie 100%)";
                exit;
            }

            $user = $_REQUEST['author'];
            $uEx = explode(", ", $user);
            // $userE = User::fetchAll("name = '{$uEx[0]}'");
            foreach ($uEx as $usr) {
                $userEx = User::fetchAll("name = '{$usr}'");
                if (!$userEx) {
                    echo "Użytkownik nie istnieje!";
                    exit;
                }
            }

            $article = new Article();

            if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
                $article->setId($_REQUEST['id']);
            }

            $article->setTitle($_REQUEST['title']);
            $article->setDoi($_REQUEST['doi']);
            $article->setShares($_REQUEST['shares']);
            $article->setMinipoint($_REQUEST['minipoint']);
            $article->setConferenceType($_REQUEST['conftype']);
            $article->setConferenceValue($_REQUEST['confvalue']);
            $article->setPublicdate($_REQUEST['publicdate']);
            $article->setAuthor($user);
            $req = $article->save();
            if (!$req) {
                echo "Nie można dodać artykułu!";
                exit;
            }

            // foreach (explode(", ", $user) as $usr => $id) {
            //     $user = User::fetchAll("name = '{$id}'");
            //     $user = $user[0];
            //     var_dump($user);

            //     $author = Author::fetchAll("name = '{$id}'");
            //     var_dump($author);
            //     if (count($author) > 0) {
            //         $author = $author[0];
            //         $part = \json_decode($author->getParticipation());
            //         array_push($part, $article->getId());
            //         $part = \json_encode($part);
            //         $author
            //         ->setId($user->getId())
            //         ->setName($user->getName())
            //         ->setParticipation($part)
            //         ->setNumberOfArticles($author->getNumberOfArticles() + 1)
            //         ->saveAuthor();
            //     } else {
            //         $part = \json_encode([$article->getId()]);
            //         $auth = new Author();
            //         $auth
            //             ->setName($user->getName())
            //             ->setParticipation($part)
            //             ->setNumberOfArticles(1);
            //         $authReq = $auth->saveAuthor($user->getId());
            //         if (!$authReq) {
            //             echo "Nie można dodać autora!";
            //             exit;
            //         }
            //     }
            // }

            echo "Artykuł dodano";
        } else {
            require __DIR__ . '/../View/Article/create.php';
        }
    }

    public static function deleteAction()
    {
        if (!(isset($_REQUEST['id']) && !empty($_REQUEST['id']))) {
            die("Nie podano ID artykułu!");
            exit;
        }
        if (!isset($_SESSION['role']) && $_SESSION['role'] !== "admin") {
            die("Nie jesteś adminem!");
            exit;
        }

        $article = new Article();
        $article->setId($_REQUEST['id']);

        if ($article->delete()) {
            echo "Usunięto artykuł!";
        } else {
            echo "Nie można usunąć artykułu!";
        }
    }
}
