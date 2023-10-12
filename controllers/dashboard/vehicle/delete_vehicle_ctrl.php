<?php 
require_once __DIR__ . '/../../../helpers/database.php';
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../models/Vehicle.php';


try {

    $id_vehicles = intval(filter_input(INPUT_GET, 'id_vehicles', FILTER_SANITIZE_NUMBER_INT));
    $isDeleted = (int) Vehicle::delete($id_vehicles);

    $errors = [];
    

    header('location: /controllers/dashboard/vehicle/list_vehicle_ctrl.php?delete ='.$isDeleted);
    die; 
    
} catch (\Throwable $th) {
    $error = $th->getMessage();

    include __DIR__ . '/../../../views/templates/header.php';
    include __DIR__ . '/../../../views/templates/error.php';
    include __DIR__ . '/../../../views/templates/footer.php';
    die;
}


include __DIR__ . '/../../../views/templates/header.php';
include __DIR__ . '/../../../views/dashboard/vehicle/delete_vehicle.php';
include __DIR__ . '/../../../views/templates/footer.php';