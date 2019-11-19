<?php


namespace src\Model;


class User
{
    /** @var int */
    private $id_user;

    /** @var string */
    private $email;

    /** @var string */
    private $name;

    /** @var string */
    private $surname;

    /** @var string */
    private $password;

    /** @var string */
    private $affiliation;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id_user;
    }

    /**
     * @param int $id_user
     * @return User
     */
    public function setId($id_user)
    {
        $this->id_user = $id_user;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getAffiliation()
    {
        return $this->affiliation;
    }

    /**
     * @param string $affiliation
     * @return User
     */
    public function setAffiliation($affiliation)
    {
        $this->affiliation = $affiliation;
        return $this;
    }




    /**
     * @return User[]
     */
    public static function fetchAll()
    {
        $dbh = self::getConnection();

        $users = [];
        foreach ($dbh->query('SELECT * from users') as $row) {
            $user = new User();
            $user
                ->setId($row['id_user'])
                ->setEmail($row['email'])
                ->setName($row['name'])
                ->setSurname($row['surname'])
                ->setPassword($row['password'])
                ->setAffiliation($row['affiliation']);
            $users[] = $user;
        }
        $dbh = null;

        return $users;
    }


    public function save()
    {
        // polacz z baza danych
        $dbh = self::getConnection();

        // sprawdz czy jest ID
        if (!$this->getId()) {
            // insert nowy jesli nie ma ID
            $sql = "INSERT INTO `article` (`email`, `name`, `surname`, `password`, `affiliation`) VALUES ('{$this->getEmail()}', '{$this->getName()}', '{$this->getSurname()}', '{$this->getPassword()}', '{$this->getAffiliation()}')";
            $dbh->query($sql);
        } else {
            // update istniejacego jesli jest ID
            $sql = "UPDATE `users` SET email='{$this->getEmail()}', name='{$this->getName()}', surname='{$this->getSurname()}', password='{$this->getPassword()}', affiliation='{$this->getAffiliation()}'  WHERE id_user='{$this->getId()}'";
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
