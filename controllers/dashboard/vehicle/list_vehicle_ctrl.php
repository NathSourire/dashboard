<?php 
require_once __DIR__ . '/../../../helpers/database.php';
require_once __DIR__ . '/../../../models/Vehicle.php';

try {

    $delete = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT);
    $title = 'Lister/Modifier/Supprimer';

    $order = filter_input(INPUT_GET, 'order', FILTER_SANITIZE_SPECIAL_CHARS);
    if((empty($order) || $order != 'ASC') && $order != 'DESC' ){
        $order='ASC';
    }

    //affiche le tableau des véhicules 
    $vehicles = Vehicle::get_all($order);
    //affiche le tableau des véhicules archiver
    $archived = Vehicle::get_all_archived($order);

    // $archive = filter_input(INPUT_GET, 'archive', FILTER_SANITIZE_NUMBER_INT);


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