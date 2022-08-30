<?php

class TaskProvider
{
    //хранилище задач
    private array $tasks;
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        //при создании хранилища читаем задачи из сессии
        $statement = $this->pdo->prepare(
            'SELECT description, isDone FROM tasks'
        );
        $statement->execute();
        $bufferTasks = $statement->fetchAll(PDO::FETCH_OBJ) ?: [];
        $this->tasks = [];

        foreach ($bufferTasks as $key => $task) {
            $this->tasks[] = new Task($task->description, $task->isDone);
        }
    }


    /**
     * Метод возвращающий массив не выполненных задач из объекта
     * @return array
     */
    public function getUndoneList(): array
    {
        $tasks = [];

        $statement = $this->pdo->prepare(
            'SELECT description, isDone FROM tasks WHERE isDone = 0'
        );
        $statement->execute();
        $bufferTasks = $statement->fetchAll(PDO::FETCH_OBJ) ?: [];
        foreach ($bufferTasks as $key => $task) {
            $tasks[] = new Task($task->description, $task->isDone);
        }

        return $tasks;
    }

    public function addTask(Task $task): void
    {
        $statement = $this->pdo->prepare(
            'INSERT INTO tasks (description, isDone) VALUES (:description, :isDone)'
        );

        $statement->execute([
            'description' => $task->getDescription(),
            'isDone' => $task->isDone() ? 1 : 0
        ]);

        $this->tasks[] = $task;
    }

    public function deleteTask(int $key): void
    {
        $statement = $this->pdo->prepare(
            'DELETE FROM tasks WHERE id = :id'
        );

        $statement->execute([
            'id' => $key,
        ]);
    }


}