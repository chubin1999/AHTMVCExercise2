<?php
namespace mvc\Controllers;

use mvc\Core\Controller;
use mvc\Models\TaskModel;
use mvc\Models\TaskRepository;


class TasksController extends Controller  
{
    function index()
    {
        $tasks = new TaskRepository();

        $d['tasks'] = $tasks->getall();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"]))
        {

            $model = new TaskModel();
            $model->setTitle($_POST['title']);
            $model->setDescription($_POST['description']);
            
            $add = new TaskRepository();
            if ($add->add($model)) 
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        $task = new TaskRepository();

        $d["task"] = $task->get($id);

        if (isset($_POST["title"]))
        {
            $model = new TaskModel();
            $model->setId($id);
            $model->setTitle($_POST['title']);
            $model->setDescription($_POST['description']);

            $edit = new TaskRepository();
            if ($edit->edit($model))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        $task = new TaskRepository();
        if ($task->delete($id))
        {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
?>