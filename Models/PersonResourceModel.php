<?php
namespace mvc\Models;

use mvc\Core\ResourceModel;

class PersonResourceModel extends ResourceModel {
	public function __construct() {
		$person = 'person';
		$id     = 'id';

		$personModel = new PersonModel();

		$this->_init($person, $id, $personModel);
	}
}
