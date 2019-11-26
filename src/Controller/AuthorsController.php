<?php

namespace src\Controller;

require_once __DIR__ . '/../Model/User.php';

use src\Model\User;

class UserController
{

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
        $user->setName($_REQUEST['name']);
        $user->setEmail($_REQUEST['email']);
        $user->setPassword(md5($_REQUEST['password']));
        $user->setAffiliation($_REQUEST['affiliation']);
        $request = $user->saveUser();

        if ($request) {
            $_SESSION['name'] = $_REQUEST['name'];
            $_SESSION['role'] = "user";
            echo "Zarejestrowano";
        } else {
            echo "Użytkownik już istnieje!";
        }
    }

    public static function loginAction()
    {
        if (
            !(isset($_REQUEST['email']) && !empty($_REQUEST['email'])
                && isset($_REQUEST['pswd']) && !empty($_REQUEST['pswd']))
        ) {
            die("Nieprawidlowe dane");
        }

        $password = md5($_REQUEST['pswd']);
        $user = User::fetchAll("email = '{$_REQUEST['email']}' AND password = '{$password}'");
        if ($user) {
            $_SESSION['name'] = $user[0]->getName();
            $_SESSION['role'] = $user[0]->getRole();
        } else {
            return null;
        }
    }
}
