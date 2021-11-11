<?php
include_once __DIR__ . '/../../common/headerPOST.php';
include_once __DIR__ . '/../../common/includeCommon.php';

include_once __DIR__ . '/../../objects/TiposEquipo.php';

$TiposEquipo = new TiposEquipo($db);

if ($common->validateInput($data, "tipo")) {

    $db->beginTransaction();

    $common->inputMappingObj($data, $TiposEquipo);

    $TiposEquipoResult = $TiposEquipo-> createTiposEquipo();

    if ($common->validateStatus($TiposEquipoResult)) {

        $db->commit();

        $common->response200($TiposEquipoResult);
    } else {

        $db->rollBack();

        $common->response503("Unable to create.");
    }
} else {

    $common->response404("Data is incomplete.");
}