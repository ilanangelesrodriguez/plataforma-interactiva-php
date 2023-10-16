<?php

class TaskModel
{
    private $tasks = [];

    public function addTask($id, $description, $completed = false)
    {
        $task = [
            'id' => $id,
            'description' => $description,
            'completed' => $completed,
        ];

        $this->tasks[] = $task;
        $this->saveTasksToCookie();
    }

    public function getTasks()
    {
        return $this->tasks;
    }

    public function completeTask($taskId)
    {
        foreach ($this->tasks as &$task) {
            if ($task['id'] == $taskId) {
                $task['completed'] = true;
                $this->saveTasksToCookie();
                return true;
            }
        }
        return false;
    }

    private function saveTasksToCookie()
    {
        $tasksDataJson = json_encode($this->tasks);
        setcookie('tasks', $tasksDataJson, time() + (365 * 24 * 60 * 60)); // Cookie válida por un año
    }

    public function loadTasksFromCookie()
    {
        if (isset($_COOKIE['tasks'])) {
            $this->tasks = json_decode($_COOKIE['tasks'], true);
        }
    }
}
