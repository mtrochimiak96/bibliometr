<?php

namespace src\Controller;

require_once __DIR__ . '/../Model/Article.php';

use src\Model\Article;


class ArticleController
{
    public static function listAction()
    {
        $articles = Article::fetchAll();

        require_once __DIR__ . '/../View/Article/list.php';
    }

    public static function createAction()
    {

        if (isset($_REQUEST['author'])) {
            // walidacja danych
            if (
                !(isset($_REQUEST['author']) && !empty($_REQUEST['author'])
                    && isset($_REQUEST['title']) && !empty($_REQUEST['title'])
                    && isset($_REQUEST['doi']) && !empty($_REQUEST['doi'])
                    && isset($_REQUEST['minipoint']) && !empty($_REQUEST['minipoint'])
                    && isset($_REQUEST['conference']) && !empty($_REQUEST['conference'])
                    && isset($_REQUEST['publicdate']) && !empty($_REQUEST['publicdate']))
            ) {
                die("Nieprawidlowe dane");
            }
            $article = new article();


            $article->setTitle($_REQUEST['title']);
            $article->setDoi($_REQUEST['doi']);
            $article->setMinipoint($_REQUEST['minipoint']);
            $article->setConference($_REQUEST['conference']);
            $article->setPublicdate($_REQUEST['publicdate']);
            $article->setAuthor($_REQUEST['author']);
            $article->save();

            echo "Artykuł dodano";
        } else {
            require __DIR__ . '/../View/Article/create.php';
        }
    }
}
