<?php


namespace src\Model;


class Author
{
    /** @var int */
    private $id_authors;

    /** @var string */
    private $name;

    /** @var string[] */
    private $participation;

    /** @var number */
    private $numberofarticles;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id_authors;
    }

    /**
     * @param int $id_authors
     * @return Author
     */
    public function setId($id_authors)
    {
        $this->id_authors = $id_authors;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Author
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */

    public function getParticipation()
    {

        return $this->participation;
    }

    /**
     * @param string $participation
     * @return Author
     */
    public function setParticipation($participation)
    {
        $this->participation = $participation;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumberOfArticles()
    {
        return $this->numberofarticles;
    }

    /**
     * @param string $numberofarticles
     * @return Author
     */
    public function setNumberOfArticles($numberofarticles)
    {
        $this->numberofarticles = $numberofarticles;
        return $this;
    }


    /**
     * @param string $where
     * @param string $order
     * @return Author[]
     */
    public static function fetchAll($where = null, $order = null)
    {
        $dbh = self::getConnection();

        $authors = [];
        $where = $where ? " WHERE " . $where : "";
        $order = $order ? " ORDER BY " . $order : "";
        $qry = $dbh->query("SELECT * from `authors`" . $where . $order);
        if ($qry) {
            foreach ($qry as $row) {
                $author = new Author();
                $author
                    ->setId($row['id_authors'])
                    ->setName($row['name'])
                    ->setParticipation($row['participation'])
                    ->setNumberOfArticles($row['numberofarticles']);
                $authors[] = $author;
            }
        }
        $dbh = null;


        return $authors;
    }


    public function saveAuthor($userIdNewAuthor = null)
    {
        // polacz z baza danych
        $dbh = self::getConnection();

        // sprawdz czy jest ID
        if (!$this->getId()) {
            // insert nowy jesli nie ma ID
            $sql = "INSERT INTO `authors` (`id_authors`, `name`, `participation`, `numberofarticles`) VALUES ('{$userIdNewAuthor}', '{$this->getName()}', '{$this->getParticipation()}', '{$this->getNumberOfArticles()}')";
            $qry = $dbh->query($sql);
            return !!$qry;
        } else {
            // update istniejacego jesli jest ID
            $sql = "UPDATE `authors` SET name='{$this->getName()}', participation='{$this->getParticipation()}', numberofarticles='{$this->getNumberOfArticles()}'";
            $qry = $dbh->query($sql);
            return !!$qry;
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
