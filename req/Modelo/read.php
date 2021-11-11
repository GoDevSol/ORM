<?php
include_once __DIR__ . '/../../common/headerGET.php';
include_once __DIR__ . '/../../common/includeCommon.php';

include_once __DIR__ . '/../../objects/Modelo.php';

$Modelo = new Modelo($db);

$ModeloResult = $Modelo->getAll();


if ($common->validateStatus($ModeloResult)) {

    $common->response200($ModeloResult);
} else {
    $common->response404("No data found.");
}