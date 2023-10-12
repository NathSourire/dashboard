<?php 
require_once __DIR__ . '/../../../helpers/database.php';
require_once __DIR__ . '/../../../models/Vehicle.php';

try {
    $delete = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT);
    // cette version est pour si on veut creer un objet sinon se sera la methode en dessous
    // $obj = new Type(); 
    // $types = $obj->get_all();
    // ou 
    $vehicles = Vehicle::get_all();
    // $vehicles = Vehicle::asc();
    // $vehicles = Vehicle::desc();
    // $delete = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT);
    $title = 'Lister/Modifier/Supprimer';
} catch (\Throwable $th) {

    $error = $th->getMessage();
    
    include __DIR__ . '/../../../views/templates/header.php';
    include __DIR__ . '/../../../views/templates/error.php';
    include __DIR__ . '/../../../views/templates/footer.php';
    die;
}

include __DIR__ . '/../../../views/templates/header.php';
include __DIR__ . '/../../../views/dashboard/vehicle/list_vehicle.php';
include __DIR__ . '/../../../views/templates/footer.php';