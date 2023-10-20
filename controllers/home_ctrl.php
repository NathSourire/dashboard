<?php  
require_once __DIR__ . '/../models/Vehicle.php';
require_once __DIR__ . '/../models/Type.php';
require_once __DIR__ . '/../config/constants.php';

try {
    $script = 'home.js';
    // récuperation du type de voiture nettoyage et validation
    $searchall =(string) filter_input(INPUT_GET, 'searchall', FILTER_SANITIZE_SPECIAL_CHARS);
    $id_types = intval(filter_input(INPUT_GET, 'type', FILTER_SANITIZE_NUMBER_INT));



    //affiche le tableau des véhicules 
    $vehicles = Vehicle::get_all(id_types: $id_types, searchall: $searchall);
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

// SELECT * FROM `vehicles` LIMIT 0,10;
// SELECT * FROM `vehicles` LIMIT 10,10;
// SELECT * FROM `vehicles` LIMIT 20,10;
// SELECT * FROM `vehicles` LIMIT 30,10;
// SELECT * FROM `vehicles` LIMIT 40,10;

// $offset  NB_LINES_PAGE

// SELECT * FROM `vehicles` LIMIT 0,5;
// SELECT * FROM `vehicles` LIMIT 5,5;
// SELECT * FROM `vehicles` LIMIT 10,5;
// SELECT * FROM `vehicles` LIMIT 15,5;
// SELECT * FROM `vehicles` LIMIT 20,5;