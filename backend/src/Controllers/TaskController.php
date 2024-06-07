<?php

namespace Controllers;

use Database\Database;
use Models\Task;
use Helpers\InputValidator;
use Services\TaskService;

class TaskController
{
    private $taskService;

    public function __construct()
    {
        $db = Database::getInstance();
        $this->taskService = new TaskService($db);
    }
    public function handleRequest($method, $uri, $data)
    {

        $parts = explode('/', trim($uri, '/'));
        $resource = array_shift($parts);
        $id = array_shift($parts);

        if ($resource != 'tasks') {
            http_response_code(404);
            echo json_encode(['message' => 'Resource not found']);
            return;
        }

        switch ($method) {
            case 'GET':
                if ($id) {
                    $this->getTask($id);
                } else {
                    $this->getAllTasks();
                }
                break;
            case 'POST':
                $this->createTask($data);
                break;
            case 'PUT':
                $this->updateTask($id, $data);
                break;
            case 'DELETE':
                $this->deleteTask($id);
                break;
            default:
                http_response_code(405);
                echo json_encode(['message' => 'Method not allowed']);
                break;
        }
    }

    private function getAllTasks()
    {
        $tasks = $this->taskService->getAllTasks();
        echo json_encode($tasks);
    }

    private function getTask($id)
    {
        $task = $this->taskService->getTaskById($id);
        if ($task) {
            echo json_encode($task);
        } else {
            http_response_code(404);
            echo json_encode(['message' => 'Task not found']);
        }
    }

    private function createTask($data)
    {
        $title = InputValidator::sanitize($data['title']);
        $description = InputValidator::sanitize($data['description']);
        $due_date = InputValidator::sanitize($data['due_date']);

        if (InputValidator::validateTaskData($title, $description)) {
            $id = $this->taskService->createTask($title, $description, $due_date);
            echo json_encode(['id' => $id]);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Invalid data']);
        }
    }

    private function updateTask($id, $data)
    {
        $title = InputValidator::sanitize($data['title']);
        $description = InputValidator::sanitize($data['description']);
        $due_date = InputValidator::sanitize($data['due_date']);
        $status = $data['status'] == 1 ? 1 : 0;

        if (InputValidator::validateTaskData($title, $description, $status)) {
            $this->taskService->updateTask($id, $title, $description, $due_date, $status);
            echo json_encode(['message' => 'Task updated']);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Invalid data']);
        }
    }

    private function deleteTask($id)
    {
        $this->taskService->deleteTask($id);
        echo json_encode(['message' => 'Task deleted']);
    }
}
