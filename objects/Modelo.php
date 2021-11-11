<?php
include_once __DIR__ . '/../common/class/crud.php';

class Modelo extends CRUD
{

    // DB connection y table name
    public $conn;
    public $table_name = "Modelo";

    
 public $id;
 public $idTipoEquipo;
 public $modelo;


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

 public function getByIdTipoEquipo()
 {
    return $this->_read("*", "idTipoEquipo=", "", $this, "");
 }

 public function getByModelo()
 {
    return $this->_read("*", "modelo=", "", $this, "");
 }



    public function createModelo()
    {
        $insertParams = "idTipoEquipo,modelo";

        return $this->_create($insertParams, $this);
    }

function updateById()
{
    $updateParams = $this->createParams($this, "id");    

    $whereParams = "id=";

    return $this->_update($updateParams, $whereParams, $this);
}
function updateByIdTipoEquipo()
{
    $updateParams = $this->createParams($this, "idTipoEquipo");    

    $whereParams = "idTipoEquipo=";

    return $this->_update($updateParams, $whereParams, $this);
}
function updateByModelo()
{
    $updateParams = $this->createParams($this, "modelo");    

    $whereParams = "modelo=";

    return $this->_update($updateParams, $whereParams, $this);
}


function deleteById()
{
    $whereParams = "id=";
    return $this->_delete($whereParams, $this);
}
function deleteByIdTipoEquipo()
{
    $whereParams = "idTipoEquipo=";
    return $this->_delete($whereParams, $this);
}
function deleteByModelo()
{
    $whereParams = "modelo=";
    return $this->_delete($whereParams, $this);
}


}
