<?php

class Task
{
    private string $description;
    private bool $isDone = false;
    private int $id = -1;
    private int $userId = -1;


    public function __construct( string $description, int $userId, string $id = '0', bool $isDone = false)
    {
        $this->id = intval($id);
        $this->description = $description;
        $this->isDone = $isDone;
        $this->userId = intval($userId);
    }


    public function getDescription(): string
    {
        return $this->description;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }
    
    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }


    public function isDone(): bool
    {
        return $this->isDone;
    }


    public function setIsDone(bool $isDone): void
    {
        $this->isDone = $isDone;
    }




}