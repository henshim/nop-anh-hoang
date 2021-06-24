<?php
include 'User.php';

class Login
{
    public static $login = "user.json";

    public static function loadLogin()
    {
        $loginJson = file_get_contents(self::$login);
        $json = json_decode($loginJson);
        return self::convertLogin($json);
    }

    public static function saveLogin($data)
    {
        $dataJson = json_encode($data);
        file_put_contents(self::$login, $dataJson);
    }

    public static function convertLogin($data)
    {
        $users = [];
        foreach ($data as $item) {
            $user = new User($item->name, $item->password);
            array_push($users, $user);
        }
        return $users;
    }

    public static function checkLogin($user)
    {
        $users = self::loadLogin();
        foreach ($users as $item) {
            if ($user->name == $item->name && $user->password == $item->password) {
                return true;
            }
        }
        return false;
    }

    public static function signIn($name, $email, $password)
    {
        $users = new User($name, $email, $password);
        if (self::checkLogin($users)) {
            session_start();
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            header('Location: index.php');
        } else {
            $_SESSION['wrong'] = 'Wrong user';
        }
    }

    public static function signUp($user)
    {
        $users = self::loadLogin();
        array_push($users, $user);
        self::saveLogin($users);
    }

    public static function checkIn($name, $email, $password)
    {
        $patternName = '/^[a-zA-z0-9]{6,}$/';
        $patternEmail = '/^[A-Za-z0-9]+[A-Za-z0-9]*@[A-Za-z0-9]+(\.[A-Za-z0-9]+)$/';
        $patternPass = '/^[a-zA-z0-9]{6,}$/';
        if (preg_match($patternName, $name) || preg_match($patternEmail, $email) || preg_match($patternPass, $password)) {
            session_start();
            $_SESSION['name'] = 'Invalid name';
            $_SESSION['email'] = 'Invalid email';
            $_SESSION['password'] = 'Invalid password';

        }
    }

    public static function checkEmail($email)
    {

    }
}