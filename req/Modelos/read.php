<?php
include_once __DIR__ . '/../../common/headerGET.php';
include_once __DIR__ . '/../../common/includeCommon.php';

include_once __DIR__ . '/../../objects/Modelos.php';

$Modelos = new Modelos($db);

$ModelosResult = $Modelos->getAll();


if ($common->validateStatus($ModelosResult)) {

    $common->response200($ModelosResult);
} else {
    $common->response404("No data found.");
}