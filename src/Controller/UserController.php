<?php

namespace src\Controller;

require_once __DIR__ . '/../Model/User.php';

use src\Model\User;

class UserController
{
    public static function listAction()
    {
        $users = User::fetchAll();

        require_once __DIR__ . '/../View/User/list.php';
    }

    public static function createAction()
    {
        if (
            !(isset($_REQUEST['name']) && !empty($_REQUEST['name'])
                && isset($_REQUEST['email']) && !empty($_REQUEST['email'])
                && isset($_REQUEST['password']) && !empty($_REQUEST['password'])
                && isset($_REQUEST['affiliation']) && !empty($_REQUEST['affiliation']))
        ) {
            die("Nieprawidlowe dane");
        }

        $user = new User();

        $idCheck = isset($_REQUEST['id']) && !empty($_REQUEST['id']);

        if ($idCheck) {
            $usr = User::fetchAll("id_user = '{$_REQUEST['id']}'");
            if ($usr) {
                $usr = $usr[0];
                $user->setId($usr->getId());
                $user->setRole($_REQUEST['role']);
                $password = $usr->getPassword() === $_REQUEST['password'] ? $usr->getPassword() : md5($_REQUEST['password']);
                $user->setPassword($password);
            }
        } else {
            $user->setPassword(md5($_REQUEST['password']));
        }
        $user->setName($_REQUEST['name']);
        $user->setEmail($_REQUEST['email']);
        $user->setAffiliation($_REQUEST['affiliation']);
        $request = $user->saveUser();

        if ($request) {
            if ($idCheck) {
                echo "Edytowano!";
            } else {
                $_SESSION['name'] = $_REQUEST['name'];
                $_SESSION['role'] = "user";
                echo "Zarejestrowano";
            }
        } else {
            echo "Użytkownik już istnieje!";
        }
    }

    public static function loginAction()
    {
        if (
            !(isset($_REQUEST['email']) && !empty($_REQUEST['email']) && isset($_REQUEST['pswd']) && !empty($_REQUEST['pswd']))
        ) {
            die("Nieprawidlowe dane");
        }

        $password = md5($_REQUEST['pswd']);
        $user = User::fetchAll("email = '{$_REQUEST['email']}' AND password = '{$password}'");
        if ($user) {
            $_SESSION['name'] = $user[0]->getName();
            $_SESSION['role'] = $user[0]->getRole();
        } else {
            echo "Niepoprawne dane!";
            exit;
        }
    }

    public static function deleteAction()
    {
        if (!(isset($_REQUEST['id']) && !empty($_REQUEST['id']))) {
            die("Nie podano ID użytkownika!");
            exit;
        }
        if (!isset($_SESSION['role']) && $_SESSION['role'] !== "admin") {
            die("Nie jesteś adminem!");
            exit;
        }

        $user = new User();
        $user->setId($_REQUEST['id']);

        if ($user->delete()) {
            echo "Usunięto użytkownika!";
        } else {
            echo "Nie można usunąć użytkownika!";
        }
    }

    public static function editAction()
    {
        if (!isset($_SESSION['name']) || !isset($_SESSION['role'])) {
            die("Nie jesteś zalogowana/y!");
            exit;
        }
        if (!(isset($_REQUEST['id']) && !empty($_REQUEST['id']))) {
            die("Nie podano ID użytkownika!");
            exit;
        }
        if (!isset($_SESSION['role']) && $_SESSION['role'] !== "admin") {
            die("Nie jesteś adminem!");
            exit;
        }

        $user = User::fetchAll("id_user = '{$_REQUEST['id']}'");
        $user = $user[0];

        require_once __DIR__ . '/../View/User/edit.php';
    }
}
