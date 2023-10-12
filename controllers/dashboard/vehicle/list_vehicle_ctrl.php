<?php 
require_once __DIR__ . '/../../../helpers/database.php';
require_once __DIR__ . '/../../../models/Vehicle.php';

try {
    $delete = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT);
    $vehicles = Vehicle::get_all();
    $title = 'Lister/Modifier/Supprimer';

    // $order = filter_input(INPUT_GET, 'order', FILTER_SANITIZE_SPECIAL_CHARS);
    // if(empty($order) || $order != 'ASC' || $order != 'DESC' ){
    //     $order='ASC';
    // }
    


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