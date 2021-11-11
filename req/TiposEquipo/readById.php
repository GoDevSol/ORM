<?php
include_once __DIR__ . '/../../common/headerPOST.php';
include_once __DIR__ . '/../../common/includeCommon.php';

include_once __DIR__ . '/../../objects/TiposEquipo.php';

$TiposEquipo = new TiposEquipo($db);

if ($common->validateInput($data, "id")) {

    $common->inputMappingObj($data, $TiposEquipo);

    $TiposEquipoResult = $TiposEquipo->getById();

    if ($common->validateStatus($TiposEquipoResult)) {

    $common->response200($TiposEquipoResult);
    } else {
        $common->response404("No data found.");
    }
} else {

    $common->response404("Datos incompletos.");
}
