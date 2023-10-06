<?php 
require_once __DIR__ . '/../../../helpers/database.php';




try {
    $title = 'Lister/Modifier/Supprimer';
} catch (\Throwable $th) {

    $error = $th->getMessage();
    
    include __DIR__ . '/../../../views/templates/header.php';
    include __DIR__ . '/../../../views/templates/error.php';
    include __DIR__ . '/../../../views/templates/footer.php';
    die;
}

include __DIR__ . '/../../../views/templates/header.php';
include __DIR__ . '/../../../views/dashboard/types/add_type.php';
include __DIR__ . '/../../../views/templates/footer.php';