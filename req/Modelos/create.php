<?php
include_once __DIR__ . '/../../common/headerPOST.php';
include_once __DIR__ . '/../../common/includeCommon.php';

include_once __DIR__ . '/../../objects/Modelos.php';

$Modelos = new Modelos($db);

if ($common->validateInput($data, "")) {

    $db->beginTransaction();

    $common->inputMappingObj($data, $Modelos);

    $ModelosResult = $Modelos-> createModelos();

    if ($common->validateStatus($ModelosResult)) {

        $db->commit();

        $common->response200($ModelosResult);
    } else {

        $db->rollBack();

        $common->response503("Unable to create.");
    }
} else {

    $common->response404("Data is incomplete.");
}