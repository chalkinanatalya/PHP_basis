<?php
require_once 'model/User.php';
require_once 'model/UserProvider.php';

session_start();

$error = null;

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['username']);
    session_destroy();
    header('Location: /');
}

if (isset($_POST['username'], $_POST['password'])) {
    ['username' => $username, 'password' => $password] = $_POST;
    $userProvider = new UserProvider();
    $user = $userProvider->getByUsernameAndPassword($username, $password);
    if ($user === null) {
        $error = 'Пользователь с указанными учетными данными не найден';
    } else {
        $_SESSION['username'] = $user;
        $_SESSION['tasks'] = array();
        header("Location: index.php");
        die();
    }
}

include "view/signin.php";