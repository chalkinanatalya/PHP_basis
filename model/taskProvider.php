<?php
require './model/task.php';

class TaskProvider {
    public static function addComment(User $author, Task $task, string $text) 
    {
        $task->addComment($author, $text);
        $task->getComments()[count($task->getComments()) - 1]->setTask($task);
    }

    public function addTask(string $description, string $priority, User $user)
    {
        array_push($_SESSION['tasks'], new Task($description, $priority, $user));
    }

    public function getUndoneList():array 
    {
        $tasks = $_SESSION['tasks'];
        $undoneTask = [];
        foreach ($tasks as $key => $task):
            if(!$task->getIsDone())
            {
                $undoneTask[] = $task;
            }
        endforeach;
        return $undoneTask;
    }
}
