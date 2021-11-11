<?php
include_once __DIR__ . '/../../common/headerGET.php';
include_once __DIR__ . '/../../common/includeCommon.php';

include_once __DIR__ . '/../../objects/TiposEquipo.php';

$TiposEquipo = new TiposEquipo($db);

$TiposEquipoResult = $TiposEquipo->getAll();


if ($common->validateStatus($TiposEquipoResult)) {

    $common->response200($TiposEquipoResult);
} else {
    $common->response404("No data found.");
}