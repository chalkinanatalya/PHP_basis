<?php
require './model/taskProvider.php';
require './model/User.php';

session_start();

$tasks = new TaskProvider();

if(isset($_POST['description']))
{
    $username = $_SESSION['username']->getUsername();
    $user = new User($username);
    $tasks->addTask($_POST['description'], 1, $user);
}

include "view/tasks.php";