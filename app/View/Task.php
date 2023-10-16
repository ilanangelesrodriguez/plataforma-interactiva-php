<?php

class Task
{
    private $id;
    private $description;
    private $completed;

    public function __construct($id, $description, $completed = false)
    {
        $this->id = $id;
        $this->description = $description;
        $this->completed = $completed;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function isCompleted()
    {
        return $this->completed;
    }

    public function complete()
    {
        $this->completed = true;
    }
}

class TaskManager
{
    private $tasks = [];

    public function addTask($description)
    {
        $id = count($this->tasks) + 1;
        $task = new Task($id, $description);
        $this->tasks[] = $task;
        $this->saveTasksToCookie();
    }

    public function getTasks()
    {
        return $this->tasks;
    }

    public function completeTask($taskId)
    {
        foreach ($this->tasks as $key => $task) {
            if ($task->getId() == $taskId) {
                $task->complete();
                unset($this->tasks[$key]); // Eliminar la tarea completada
                $this->saveTasksToCookie();
                return true;
            }
        }
        return false;
    }

    private function saveTasksToCookie()
    {
        $tasksData = [];
        foreach ($this->tasks as $task) {
            $tasksData[] = [
                'id' => $task->getId(),
                'description' => $task->getDescription(),
                'completed' => $task->isCompleted(),
            ];
        }

        $tasksDataJson = json_encode($tasksData);
        setcookie('tasks', $tasksDataJson, time() + (365 * 24 * 60 * 60)); // Cookie válida por un año
    }

    public function loadTasksFromCookie()
    {
        if (isset($_COOKIE['tasks'])) {
            $tasksData = json_decode($_COOKIE['tasks'], true);
            foreach ($tasksData as $taskData) {
                $id = isset($taskData['id']) ? $taskData['id'] : null;
                $description = isset($taskData['description']) ? $taskData['description'] : null;
                $completed = isset($taskData['completed']) ? $taskData['completed'] : null;

                $task = new Task($id, $description, $completed);
                $this->tasks[] = $task;
            }
        }
    }
}

// Uso del gestor de tareas
$taskManager = new TaskManager();
$taskManager->loadTasksFromCookie(); // Cargar tareas desde la cookie

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["description"]) && !empty($_POST["description"])) {
        $taskManager->addTask($_POST["description"]);
    }

    if (isset($_POST["completeTaskId"])) {
        $taskManager->completeTask($_POST["completeTaskId"]);
    }
}

$tasks = $taskManager->getTasks();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Tareas</title>
</head>
<body>

<h1>Gestor de Tareas</h1>

<form method="post" action="">
    <label for="description">Nueva tarea:</label>
    <input type="text" id="description" name="description" required>
    <button type="submit">Agregar tarea</button>
</form>

<ul>
    <?php foreach ($tasks as $task): ?>
        <li>
            Tarea #<?php echo $task->getId(); ?>: <?php echo $task->getDescription(); ?> -
            Estado: <?php echo $task->isCompleted() ? "Completada" : "Pendiente"; ?>
            <form method="post" action="">
                <input type="hidden" name="completeTaskId" value="<?php echo $task->getId(); ?>">
                <button type="submit" <?php echo $task->isCompleted() ? 'disabled' : ''; ?>>Completar</button>
            </form>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>
