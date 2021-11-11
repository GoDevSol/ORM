<?php
include_once __DIR__ . '/../../common/headerPOST.php';
include_once __DIR__ . '/../../common/includeCommon.php';

include_once __DIR__ . '/../../objects/Modelo.php';

$Modelo = new Modelo($db);

if ($common->validateInput($data, "id")) {

    $common->inputMappingObj($data, $Modelo);

    $ModeloResult = $Modelo->getById();

    if ($common->validateStatus($ModeloResult)) {

    $common->response200($ModeloResult);
    } else {
        $common->response404("No data found.");
    }
} else {

    $common->response404("Datos incompletos.");
}
