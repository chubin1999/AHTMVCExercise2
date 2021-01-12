<?php
namespace mvc\Models;

use mvc\Models\PersonResourceModel;

class PersonRepository {
	protected $PersonResoureceModel;

	public function __construct() {
		$this->PersonResoureceModel = new PersonResourceModel();
	}

	public function add($model) {
		$task = $this->PersonResoureceModel;
		return $task->save($model);
	}

	public function edit($model) {
		$task = $this->PersonResoureceModel;
		return $task->save($model);
	}

	public function delete($id) {
		$task = $this->PersonResoureceModel;
		return $task->delete($id);
	}

	public function get($id) {
		$task = $this->PersonResoureceModel;
		return $task->get($id);
	}

	public function getAll() {
		$task = $this->PersonResoureceModel;
		return $task->getAll();
	}
}
