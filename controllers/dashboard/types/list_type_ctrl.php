<?php 
require_once __DIR__ . '/../../../helpers/database.php';
require_once __DIR__ . '/../../../models/Type.php';


try {
    // cette version est pour si on veut creer un objet sinon se sera la methode en dessous
    // $obj = new Type(); 
    // $types = $obj->get_all();
    // ou 
    $types = Type::get_all();
    $title = 'Lister/Modifier/Supprimer';
} catch (\Throwable $th) {

    $error = $th->getMessage();
    
    include __DIR__ . '/../../../views/templates/header.php';
    include __DIR__ . '/../../../views/templates/error.php';
    include __DIR__ . '/../../../views/templates/footer.php';
    die;
}

include __DIR__ . '/../../../views/templates/header.php';
include __DIR__ . '/../../../views/dashboard/types/list_type.php';
include __DIR__ . '/../../../views/templates/footer.php';