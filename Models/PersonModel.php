<?php
namespace mvc\Models;

use mvc\Core\Model;

class PersonModel extends Model {
	protected $id;
	protected $name;
	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getName() {
		return $this->title;
	}

	public function setName($title) {
		$this->title = $title;
	}
}
