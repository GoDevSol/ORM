<?php
include_once __DIR__ . '/../../common/headerPOST.php';
include_once __DIR__ . '/../../common/includeCommon.php';

include_once __DIR__ . '/../../objects/Modelo.php';

$Modelo = new Modelo($db);

if ($common->validateInput($data, "Campos a cambiar")) {

    $db->beginTransaction();

    $common->inputMappingObj($data, $Modelo);

    $ModeloResult = $Modelo->updateByIdTipoEquipo();
    

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