<?php
include_once __DIR__ . '/../../common/headerPOST.php';
include_once __DIR__ . '/../../common/includeCommon.php';

include_once __DIR__ . '/../../objects/Modelo.php';

$Modelo = new Modelo($db);

if ($common->validateInput($data, "{stringInsert}")) {

    $db->beginTransaction();

    $common->inputMappingObj($data, $Modelo);

    $ModeloResult = $Modelo-> deleteByIdTipoEquipo();
    

    if ($common->validateStatus($ModeloResult)) {

        $db->commit();

        $common->response200($ModeloResult);
    } else {

        $db->rollBack();

        $common->response503("Unable to delete.");
    }
} else {

    $common->response404("Data is incomplete.");
}


<?php
include_once __DIR__ . '/../../common/headerGET.php';
include_once __DIR__ . '/../../common/includeCommon.php';



$Modelo = new Modelo($db);

$ModeloResult = $Modelo->getAll();


if ($common->validateStatus($ModeloResult)) {

    $common->response200($ModeloResult);
} else {
    $common->response404("No data found.");
}


