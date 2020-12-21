<?php 
namespace MVC\Core;

use mvc\Config\Database;
use mvc\Core\ResourceModelInterface;
use PDO;

class ResourceModel implements ResourceModelInterface
{
    protected $table;
    protected $id;
    protected $model;

    public function _init($table, $id, $model)
    {
        $this->table = $table;
        $this->id = $id;
        $this->model = $model;
    }

    public function save($model)
    {
        $properties = $model->getProperties();
        $check = $model->getId();

        //attribute: add
        $keyAssignment = [];
        $add = [];
        //attribute: edit
        $edit = [];

        //add
        if ($check==null) {
            foreach ($properties as $key => $value) {
                $keyAssignment[]=$key;
                array_push($add,':'.$key);
            }
            $arrkey = implode(',',$keyAssignment);
            $arradd = implode(',', $add);
            $sqladd = "INSERT INTO $this->table ({$arrkey}) VALUES ({$arradd})";
            $req= Database::getBdd()->prepare($sqladd);
            return $req->execute($properties);
        //edit
        } elseif($check!=null) {
            foreach ($properties as $key => $value) {
                array_push($edit, $key.' = :'.$key);        
            }
            $arredit = implode(',',$edit);
            $sqledit = "UPDATE $this->table SET $arredit WHERE id = :id";
            $req= Database::getBdd()->prepare($sqledit);
            return $req->execute($properties);
        }
    }

    public function delete($id)
    {
        $delete = "DELETE FROM $this->table WHERE id = $id";
        $req = Database::getBdd()->prepare($delete);
        return $req->execute();
    }
    
    public function get($id)
    {
        $get = "SELECT * FROM $this->table WHERE id = $id";
        $req = Database::getBdd()->prepare($get);
        $req->execute();
        return $req->fetch();
    }

    public function getAll()
    {
        $getall = "SELECT * FROM $this->table";
        $req = Database::getBdd()->prepare($getall);
        $req ->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

}
