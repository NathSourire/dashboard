<?php 
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../models/Vehicle.php';


try {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
    $id_vehicles = intval(filter_input(INPUT_GET, 'id_vehicles', FILTER_SANITIZE_NUMBER_INT));
    // permet d'afficher sur la liste si bien supprimer
    $delete = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT); 
    
    $errors = [];

    switch ($action) {
        case 'archive':
            $archived = (int) Vehicle::archived($id_vehicles);
            header('location: /controllers/dashboard/vehicle/list_vehicle_ctrl.php?archive='.$archived);
            die;
        case 'restor':
            $restor = (int) Vehicle::restored($id_vehicles);
            header('location: /controllers/dashboard/vehicle/list_vehicle_ctrl.php?restor='.$restored);
            die; 
        case 'delete':
            $isDeleted = (int) Vehicle::delete($id_vehicles);
            if ($isDeleted){
            @unlink( __DIR__ . '/../../../public/uploads/vehicles/'. $vehicleObj->picture );
            header('location: /controllers/dashboard/vehicle/list_vehicle_ctrl.php?delete='.$isDeleted);
            die;
            }

    }
    
    
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