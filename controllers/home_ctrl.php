<?php  
require_once __DIR__ . '/../models/Vehicle.php';
require_once __DIR__ . '/../models/Type.php';

try {

    $id_types = intval(filter_input(INPUT_GET, 'type', FILTER_SANITIZE_NUMBER_INT));

    //affiche le tableau des véhicules 
    $vehicles = Vehicle::get_all();
    $types = Type::get_all();
    $errors = [];



} catch (\Throwable $th) {

    $errors = $th->getMessage();

    
    include __DIR__ . '/../views/templates/header.php';
    include __DIR__ . '/../views/templates/error.php';
    include __DIR__ . '/../views/templates/footer.php';
    die;
}
include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/templates/home.php';
include __DIR__ . '/../views/templates/footer.php';
