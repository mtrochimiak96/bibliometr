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
    private $password;

    /** @var string */
    private $affiliation;

    /** @var string */
    private $role;

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
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param string $role
     * @return User
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }




    /**
     * @param string $where
     * @param string $order
     * @return User[]
     */
    public static function fetchAll($where = null, $order = null)
    {
        $dbh = self::getConnection();

        $users = [];
        $where = $where ? " WHERE " . $where : "";
        $order = $order ? " ORDER BY " . $order : "";
        $qry = $dbh->query("SELECT * from users" . $where . $order);
        if ($qry) {
            foreach ($qry as $row) {
                $user = new User();
                $user
                    ->setId($row['id_user'])
                    ->setEmail($row['email'])
                    ->setName($row['name'])
                    ->setPassword($row['password'])
                    ->setRole($row['role'])
                    ->setAffiliation($row['affiliation']);
                $users[] = $user;
            }
        }
        $dbh = null;


        return $users;
    }

    public static function userExists($name, $role)
    {
        $dbh = self::getConnection();

        $ex = false;
        $qry = $dbh->query("SELECT * from `users` WHERE name = '{$name}' AND role = '{$role}'")->fetch(\PDO::FETCH_OBJ);
        if ($qry) {
            $ex = true;
        }
        $dbh = null;


        return $ex;
    }


    public function saveUser()
    {
        // polacz z baza danych
        $dbh = self::getConnection();

        // sprawdz czy jest ID
        if (!$this->getId()) {
            // insert nowy jesli nie ma ID
            $sql = "INSERT INTO `users` (`email`, `name`, `password`, `affiliation`) VALUES ('{$this->getEmail()}', '{$this->getName()}', '{$this->getPassword()}', '{$this->getAffiliation()}')";
            $qry = $dbh->query($sql);
            return !!$qry;
        } else {
            // update istniejacego jesli jest ID
            $sql = "UPDATE `users` SET email='{$this->getEmail()}', name='{$this->getName()}', password='{$this->getPassword()}', affiliation='{$this->getAffiliation()}', role='{$this->getRole()}' WHERE id_user='{$this->getId()}'";
            $qry = $dbh->query($sql);
            return !!$qry;
        }
    }

    public function delete()
    {
        // polacz z baza danych
        $dbh = self::getConnection();

        // sprawdz czy jest ID
        if ($this->getId()) {
            // insert nowy jesli nie ma ID
            $sql = "DELETE FROM `users` WHERE id_user = '{$this->getId()}'";
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
