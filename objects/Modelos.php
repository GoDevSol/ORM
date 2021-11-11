<?php
include_once __DIR__ . '/../common/class/crud.php';

class Modelos extends CRUD
{

    // DB connection y table name
    public $conn;
    public $table_name = "Modelos";

    


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



    public function createModelos()
    {
        $insertParams = "";

        return $this->_create($insertParams, $this);
    }





}
