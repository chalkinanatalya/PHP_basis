<?php

class TaskService {
    public static function addComment(User $author, Task $task, string $text) 
    {
        $task->addComment($author, $text);
        $task->getComments()[count($task->getComments()) - 1]->setTask($task);
    }
}
