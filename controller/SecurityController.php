<?php
require_once 'model/UserProvider.php';

session_start();

$pdo = require 'db.php'; // Подключим PDO
$error = null;

//действие разлогиниться
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['user']);
    unset($_SESSION['tasks']);
    header("Location: index.php");
    die();
}

if (isset($_GET['action']) && $_GET['action'] === 'login') {
    include "view/signin.php";
}
if (isset($_POST['username'], $_POST['password']) && $_GET['action'] === 'login') {
    ['username' => $username, 'password' => $password] = $_POST;
    $userProvider = new UserProvider($pdo);
    $user = $userProvider->getByUsernameAndPassword($username, $password);
    if ($user === null) {
        $error = 'Пользователь с указанными учетными данными не найден';
    } else {
        $_SESSION['user'] = $user;
        header("Location: index.php");
        die();
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'signup') {
    include "view/signup.php";
}
if (isset($_POST['name'], $_POST['username'], $_POST['password']) && $_GET['action'] === 'signup') {
    ['name' => $name, 'username' => $username, 'password' => $password] = $_POST;

    $user = new User($username);
    $user->setName($name);
    $userProvider = new UserProvider($pdo);
    $userProvider->registerUser($user, $password);

    $_SESSION['user'] = $user;
    header("Location: index.php");
    die();
}