<?php
namespace mvc\Controllers;

use mvc\Core\Controller;

use mvc\Models\PersonRepository;

use mvc\Models\PersonResourceModel;

class PersonController extends Controller {
	private $PersonResoureceModel;

	public function index() {
		$this->PersonResoureceModel = new PersonResourceModel();
		$person                     = $this->PersonResoureceModel;
		$person->getAll();
		echo 'abcs';
		$d['person'] = $person->getall();
		var_dump($d['person']);
		die();
		$this->set($d);
		$this->render("index");
	}

	public function create() {
		if (isset($_POST["name"])) {

			$model = new PersonModel();
			$model->setName($_POST['name']);

			$add = new PersonRepository();

			if ($add->add($model)) {
				header("Location: ".WEBROOT."person/index");
			}
		}

		$this->render("create");
	}

	public function edit($id) {
		$task = new PersonRepository();

		$d["person"] = $task->get($id);

		if (isset($_POST["name"])) {
			$model = new PersonModel();
			$model->setId($id);
			$model->setName($_POST['name']);

			$edit = new PersonRepository();
			if ($edit->edit($model)) {
				header("Location: ".WEBROOT."person/index");
			}
		}
		$this->set($d);
		$this->render("edit");
	}

	public function delete($id) {
		$task = new PersonRepository();
		if ($task->delete($id)) {
			header("Location: ".WEBROOT."person/index");
		}
	}
}
