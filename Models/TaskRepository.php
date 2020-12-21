<?php 
namespace mvc\Models;

use mvc\Models\TaskResourceModel;

class TaskRepository 
{
	protected $TaskResoureceModel;

	public function __construct(){
		$this->TaskResoureceModel = new TaskResourceModel();
	}

	public function add($model)
	{
		$task= $this->TaskResoureceModel;
		return $task->save($model);
	}

	public function edit($model){
		$task= $this->TaskResoureceModel;
		return $task->save($model);
	}

	public function delete($id){
		$task= $this->TaskResoureceModel;
		return $task->delete($id);
	}

	public function get($id){
		$task= $this->TaskResoureceModel;
		return $task->get($id);
	}
	
	public function getAll(){
		$task= $this->TaskResoureceModel;
		return $task->getAll();
	}
}
?>