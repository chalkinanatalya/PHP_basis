<?php

class Comment {
    private User $author;
    private Task $task;
    private string $text;

    public function getAuthor (): User 
    {
        return $this->author;
    }

    public function getTask (): Task
    {
        return $this->task;
    }

    public function getText (): string
    {
        return $this->text;
    }

    public function setAuthor ($user): void 
    {
        $this->user = $user;
    }

    public function setTask ($task): void
    {
        $this->task = $task;
    }

    public function setText ($text): void
    {
        $this->text = $text;
    }
}