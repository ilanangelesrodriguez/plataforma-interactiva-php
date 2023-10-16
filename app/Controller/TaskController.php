<?php

namespace Controller;

class TaskController
{
    private $model;
    private $view;

    public function __construct($model, $view)
    {
        $this->model = $model;
        $this->view = $view;
    }

    public function handleRequest()
    {
        $this->model->loadTasksFromCookie();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["description"]) && !empty($_POST["description"])) {
                $this->model->addTask(count($this->model->getTasks()) + 1, $_POST["description"]);
            }

            if (isset($_POST["completeTaskId"])) {
                $this->model->completeTask($_POST["completeTaskId"]);
            }
        }

        $tasks = $this->model->getTasks();
        $this->view->renderTasks($tasks);
    }
}
