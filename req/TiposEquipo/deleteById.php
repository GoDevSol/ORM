<?php
include_once __DIR__ . '/../../common/headerPOST.php';
include_once __DIR__ . '/../../common/includeCommon.php';

include_once __DIR__ . '/../../objects/TiposEquipo.php';

$TiposEquipo = new TiposEquipo($db);

if ($common->validateInput($data, "{stringInsert}")) {

    $db->beginTransaction();

    $common->inputMappingObj($data, $TiposEquipo);

    $TiposEquipoResult = $TiposEquipo-> deleteById();
    

    if ($common->validateStatus($TiposEquipoResult)) {

        $db->commit();

        $common->response200($TiposEquipoResult);
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



$TiposEquipo = new TiposEquipo($db);

$TiposEquipoResult = $TiposEquipo->getAll();


if ($common->validateStatus($TiposEquipoResult)) {

    $common->response200($TiposEquipoResult);
} else {
    $common->response404("No data found.");
}


