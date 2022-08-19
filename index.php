<?php 

require 'comment.php';
require 'task.php';
require 'taskService.php';
require 'user.php';


//mocks
$user1 = new User('Ivan', 'test@test.com');
$user2 = new User('Oleg', 'test@gmail.com');
$task1 = new Task('test', 5, $user1);
$taskService1 = new TaskService();
$taskService1->addComment($user2, $task1, 'Hello');

//checks
print_r($task1->getComments()[count($task1->getComments()) - 1]->getText());