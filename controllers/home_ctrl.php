<?php
require_once __DIR__ . '/../models/Vehicle.php';
require_once __DIR__ . '/../models/Type.php';
require_once __DIR__ . '/../config/constants.php';

try {
    $script = 'home.js';

    // récuperation du type de voiture nettoyage et validation
    $searchall = trim((string) filter_input(INPUT_GET, 'searchall', FILTER_SANITIZE_SPECIAL_CHARS));
    $id_types = intval(filter_input(INPUT_GET, 'type', FILTER_SANITIZE_NUMBER_INT));
    $page = intval(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));
    
    $totalVehicles = Vehicle::get_all_pagination(id_types: $id_types, searchall: $searchall, page: $page);

    $nbVehicles = count($totalVehicles);
    $nbPages = ceil($nbVehicles / NB_ELEMENTS_PER_PAGE);

    // Si $page vaut 0, alors, on l'initialise en première page.
    $page = ($page == 0) ? 1 : $page;

    //affiche le tableau des véhicules 
    //$vehicles = Vehicle::get_all();
    $types = Type::get_all();
    $errors = [];

    if (!Type::get($id_types)) {
        $errors['id_type'] = 'Il n\'y a pas de véhicules dans cette catégorie';
    }


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
