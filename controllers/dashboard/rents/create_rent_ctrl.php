<?php  
require_once __DIR__ . '/../../../models/Vehicle.php';

try {

    $id_vehicles = intval(filter_input(INPUT_GET, 'id_vehicles', FILTER_SANITIZE_NUMBER_INT));
    //affiche le tableau des véhicules 
    $vehicle = Vehicle::get($id_vehicles);


} catch (\Throwable $th) {

    $errors = $th->getMessage();



    include __DIR__ . '/../../../views/templates/header.php';
    include __DIR__ . '/../../../views/templates/error.php';
    include __DIR__ . '/../../../views/templates/footer.php';
    die;
}

include __DIR__ . '/../../../views/templates/header.php';
include __DIR__ . '/../../../views/dashboard/rents/create_rent.php';
include __DIR__ . '/../../../views/templates/footer.php';