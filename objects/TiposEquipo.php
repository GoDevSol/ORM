<?php
include_once __DIR__ . '/../common/class/crud.php';

class TiposEquipo extends CRUD
{

    // DB connection y table name
    public $conn;
    public $table_name = "TiposEquipo";

    
 public $id;
 public $tipo;


    public function __construct($db)
    {
        $this->conn = $db;
    }


    function getAll()
    {
        return $this->_read("*", "", "", $this, "");
    }

    function existField($string)
    {
        $result = $this->_read("*", $string, "", $this, "");

        if ($this->validateStatus($result)) {

            $this->inputMappingObj((object) $result["data"][0], $this);

            return true;
        } else {

            return false;
        }
    }

    function loadById()
    {
        $result = $this->_read("*", "id=", "", $this, "");

        if ($this->validateStatus($result)) {

            $this->inputMappingObj((object) $result["data"][0], $this);
        }
    }

 public function getById()
 {
    return $this->_read("*", "id=", "", $this, "");
 }

 public function getByTipo()
 {
    return $this->_read("*", "tipo=", "", $this, "");
 }



    public function createTiposEquipo()
    {
        $insertParams = "tipo";

        return $this->_create($insertParams, $this);
    }

function updateById()
{
    $updateParams = $this->createParams($this, "id");    

    $whereParams = "id=";

    return $this->_update($updateParams, $whereParams, $this);
}
function updateByTipo()
{
    $updateParams = $this->createParams($this, "tipo");    

    $whereParams = "tipo=";

    return $this->_update($updateParams, $whereParams, $this);
}


function deleteById()
{
    $whereParams = "id=";
    return $this->_delete($whereParams, $this);
}
function deleteByTipo()
{
    $whereParams = "tipo=";
    return $this->_delete($whereParams, $this);
}


}
