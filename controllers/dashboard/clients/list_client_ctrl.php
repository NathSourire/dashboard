<?php 
require_once __DIR__ . '/../../../models/Rent.php';
require_once __DIR__ . '/../../../models/Client.php';

try {


} catch (\Throwable $th) {

    $errors = $th->getMessage();


    include __DIR__ . '/../../../views/templates/header.php';
    include __DIR__ . '/../../../views/templates/error.php';
    include __DIR__ . '/../../../views/templates/footer.php';
    die;
}

include __DIR__ . '/../../../views/templates/header.php';
include __DIR__ . '/../../../views/dashboard/clients/list_client.php';
include __DIR__ . '/../../../views/templates/footer.php';