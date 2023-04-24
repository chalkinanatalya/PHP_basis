<?php
class TaskProvider
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        //при создании хранилища читаем задачи из сессии
        $statement = $this->pdo->prepare(
            'SELECT id, userId, description, isDone FROM tasks WHERE userId = :userId'
        );
        $statement->execute([
            'userId' => $_SESSION['user']->getId(),
        ]);
    }


    /**
     * Метод возвращающий массив не выполненных задач из объекта
     * @return array
     */
    public function getUndoneList(): array
    {
        $tasks = [];

        $statement = $this->pdo->prepare(
            'SELECT id, description, userId, isDone FROM tasks WHERE isDone = 0 AND userId = :userId'
        );
        $statement->execute([
            'userId' => $_SESSION['user']->getId(),
        ]);
        $bufferTasks = $statement->fetchAll(PDO::FETCH_OBJ) ?: [];
        foreach ($bufferTasks as $task) {
            $tasks[] = new Task($task->description, $task->userId, $task->id, $task->isDone,);
        }

        return $tasks;
    }

    public function addTask(Task $task): void
    {
        $statement = $this->pdo->prepare(
            'INSERT INTO tasks (description, isDone, userId) VALUES (:description, :isDone, :userId)'
        );

        $statement->execute([
            'description' => $task->getDescription(),
            'isDone' => $task->isDone() ? 1 : 0,
            'userId' => $task->getUserId(),
        ]);
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