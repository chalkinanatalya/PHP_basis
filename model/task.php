<?php

class Task {
    private string $description;
    private DateTime $dateCreated;
    private DateTime $dateUpdated;
    private DateTime $dateDone;
    private int $priority;
    private bool $isDone;
    private User $user;
    private array $comments = [];

    function __construct(string $description, string $priority, User $user) 
    {
        $this->description = $description;
        $this->priority = $priority;
        $this->user = $user;
        $this->isDone = false;
 
        $this->dateCreated = new DateTime(); 
    }

    public function addComment(User $author, string $text)
    {
        $comment = new Comment();
        $comment->setAuthor($author);
        $comment->setText($text);
        $this->comments[] = $comment;
    }

    public function getDescription (): string
    {
        return $this->description;
    }

    public function getdateCreated (): DateTime {
        return $this->dateCreated;
    }

    public function getdateUpdated (): DateTime {
        return $this->dateUpdated;
    }

    public function getDateDone (): DateTime {
        return $this->dateDone;
    }

    public function getPriority (): int 
    {
        return $this->priority;
    }

    public function getIsDone (): bool {
        return $this->isDone;
    }

    public function getUser (): User {
        return $this->user;
    }

    public function getComments(): array 
    {
        return $this->comments;
    }

    public function setDescription (string $description): void
    {
        $this->description = $description;
        $this->dateUpdated = new DateTime();
    }

    public function markAsDone (): void
    {
        $this-> isDone = true;
        $this->dateDone = new DateTime();
        $this->dateUpdated = new DateTime();
    }
}