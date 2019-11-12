<?php


namespace src\Model;


class Article
{
    /** @var int */
    private $id_article;

	/** @var DateTime */
    private $author;

    /** @var string */
    private $title;

    /** @var int */
    private $doi;

    /** @var int */
    private $minipoint;

    /** @var string */
    private $conference;
	
		/** @var DateTime */
    private $publicdate;
	


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id_article;
    }

    /**
     * @param int $id
     * @return Article
     */
    public function setId($id_article)
    {
        $this->id_article = $id_article;
        return $this;
    }
    
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $publication_date
     * @return Article
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDoi()
    {
        return $this->doi;
    }

    /**
     * @param string $DOI
     * @return Article
     */
    public function setDoi($doi)
    {
        $this->doi = $doi;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinipoint()
    {
        return $this->minipoint;
    }

    /**
     * @param int $points
     * @return Article
     */
    public function setMinipoint($minipoint)
    {
        $this->minipoint = $minipoint;
        return $this;
    }

    /**
     * @return string
     */

	 public function getConference()
    {
        return $this->conference;
    }

    /**
     * @param string $conference
     * @return Article
     */
    public function setConference($conference)
    {
        $this->conference = $conference;
        return $this;
    }
	
	    public function getPublicdate()
    {
        return $this->publicdate;
    }

    /**
     * @param string $publication_date
     * @return Article
     */
    public function setPublicdate($publicdate)
    {
        $this->publicdate = $publicdate;
        return $this;
    }
	


    /**
     * @return Article[]
     */
    public static function fetchAll()
    {
        $dbh = self::getConnection();

        $articles = [];
        foreach($dbh->query('SELECT * from article') as $row) {
            $article = new article();
            $article
                ->setId($row['id_article'])
                ->setAuthor($row['author'])
                ->setTitle($row['title'])
                ->setDoi($row['doi'])
                ->setMinipoint($row['minipoint'])
                ->setConference($row['conference'])
				->setPublicdate($row['publicdate'])
				
            ;
            $articles[] = $article;
        }
        $dbh = null;

        return $articles;
    }

   
    public function save()
    {
        // polacz z baza danych
        $dbh = self::getConnection();

        // sprawdz czy jest ID
        if (! $this->getId()) {
            // insert nowy jesli nie ma ID
            $sql = "INSERT INTO article(author, title, doi, minipoint, conference, publicdate ) VALUES ('{$this->getAuthor()}', '{$this->getTitle()}', '{$this->getDoi()}', '{$this->getMinipoint()}', '{$this->getConference()}', '{$this->getPublicdate()}' )";
            $dbh->query($sql);
        } else {
            // update istniejacego jesli jest ID
            $sql ="UPDATE aricle SET author='{$this->getAuthor()}', title='{$this->getTitle()}', doi='{$this->getDoi()}', minipoint='{$this->getMinipoint()}', conference='{$this->getConference()}' , publicdate='{$this->getPublicdate()}'  WHERE id_article={$this->getId()}";

        }
    
    }

    public static function getConnection()
    {
        global $dbConfig;

        $user = $dbConfig['user'];
        $pass = $dbConfig['pass'];
        $dbname = $dbConfig['name'];
        $host = $dbConfig['host'];

        $dbh = new \PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

        return $dbh;
    }
    
}
?>