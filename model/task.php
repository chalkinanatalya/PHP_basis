<?php

class Task
{
    private string $description;
    private bool $isDone = false;


    public function __construct(string $description, bool $isDone = false)
    {
        $this->description = $description;
        $this->isDone = $isDone;
    }


    public function getDescription(): string
    {
        return $this->description;
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