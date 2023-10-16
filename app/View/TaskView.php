<?php

namespace View;


class TaskView
{
    public function renderTasks($tasks)
    {
        echo '<ul>';
        foreach ($tasks as $task) {
            echo '<li>';
            echo 'Tarea #' . $task['id'] . ': ' . $task['description'] . ' - Estado: ' . ($task['completed'] ? 'Completada' : 'Pendiente');
            echo '<form method="post" action="">
                    <input type="hidden" name="completeTaskId" value="' . $task['id'] . '">
                    <button type="submit" ' . ($task['completed'] ? 'disabled' : '') . '>Completar</button>
                </form>';
            echo '</li>';
        }
        echo '</ul>';
    }
}
