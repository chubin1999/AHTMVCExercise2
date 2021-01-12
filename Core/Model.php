<?php
namespace mvc\Core;

class Model {
	//Ham tra ve mang cua chinh no
	public function getProperties() {
		return get_object_vars($this);
	}
}
