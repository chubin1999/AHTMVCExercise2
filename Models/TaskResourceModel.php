<?php 
namespace mvc\Models;

use mvc\Models\TaskModel;
use mvc\Core\ResourceModel;
use mvc\Core\Model;

class TaskResourceModel extends ResourceModel
{
    public function __construct()
    {
	    $task='tasks';
	    $id='id';

    	$taskmodel = new TaskModel();
    	
    	$this->_init($task,$id,$taskmodel);
    }
}
?>