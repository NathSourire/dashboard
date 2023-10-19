<?php 
require_once __DIR__ . '/../../../models/Vehicle.php';

try {
    $title = 'Lister/Modifier/Supprimer';
    $column = filter_input(INPUT_GET, 'column', FILTER_SANITIZE_SPECIAL_CHARS);
    $order = filter_input(INPUT_GET, 'order', FILTER_SANITIZE_SPECIAL_CHARS);
    if((empty($order) || $order != 'ASC') && $order != 'DESC' ){
        $order='ASC';
    }
    $column = (!in_array($column, COLUMNS)) ? 'type' : $column; 

    //affiche le tableau des véhicules 
    $vehicles = Vehicle::get_all($column, $order);
    //affiche le tableau des véhicules archiver
    $archived = Vehicle::get_all_archived($order);
    // permet d'afficher sur la liste si bien supprimer
    $delete = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT);
    // $archive = filter_input(INPUT_GET, 'archive', FILTER_SANITIZE_NUMBER_INT);


} catch (\Throwable $th) {

    $errors = $th->getMessage();

    
    include __DIR__ . '/../../../views/templates/header.php';
    include __DIR__ . '/../../../views/templates/error.php';
    include __DIR__ . '/../../../views/templates/footer.php';
    die;
}

include __DIR__ . '/../../../views/templates/header.php';
include __DIR__ . '/../../../views/dashboard/vehicle/list_vehicle.php';
include __DIR__ . '/../../../views/templates/footer.php';