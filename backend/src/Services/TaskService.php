<?php

namespace Services;

use Models\Task;
use Database\Database;
use PDO;

class TaskService
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAllTasks()
    {
        $stmt = $this->db->query('SELECT * FROM tasks');
        return $stmt->fetchAll(PDO::FETCH_CLASS, Task::class);
    }

    public function getTaskById($id)
    {
        $stmt = $this->db->query('SELECT * FROM tasks WHERE id = :id', [':id' => $id]);
        return $stmt->fetchObject(Task::class);
    }

    public function createTask($title, $description, $due_date)
    {
        $stmt = $this->db->query('INSERT INTO tasks (title, description, due_date) VALUES (:title, :description, :due_date)', [
            ':title' => $title,
            ':description' => $description,
            ':due_date' => $due_date
        ]);
        return $this->db->query('SELECT LAST_INSERT_ID()')->fetchColumn();
    }

    public function updateTask($id, $title, $description, $due_date, $status)
    {
        return $this->db->query('UPDATE tasks SET title = :title, description = :description, due_date = :due_date, status = :status WHERE id = :id', [
            ':id' => $id,
            ':title' => $title,
            ':description' => $description,
            ':due_date' => $due_date,
            ':status' => $status,
        ]);
    }

    public function deleteTask($id)
    {
        return $this->db->query('DELETE FROM tasks WHERE id = :id', [':id' => $id]);
    }
}

