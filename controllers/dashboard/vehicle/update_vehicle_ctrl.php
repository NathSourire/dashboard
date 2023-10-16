<?php
require_once __DIR__ . '/../../../helpers/database.php';
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../models/Vehicle.php';
require_once __DIR__ . '/../../../models/Type.php';

try {

    $id_vehicles = intval(filter_input(INPUT_GET, 'id_vehicles', FILTER_SANITIZE_NUMBER_INT));
    $vehicleObj = Vehicle::get($id_vehicles);
    $types = Type::get_all();
    $errors = [];


    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        // récuperation du type de voiture nettoyage et validation
        $brand = filter_input(INPUT_POST, 'brand', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($brand)) {
            $errors['brand'] = 'Veuillez entrer une marque ';
        } else {
            $isOk = filter_var($brand, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_NAME . '/']]);
            if (!$isOk) {
                $errors['brand'] = 'Veuillez entrer une marque de voiture correct';
            }
        }

        $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($model)) {
            $errors['model'] = 'Veuillez entrer un modèle ';
        } else {
            $isOk = filter_var($model, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_NAME . '/']]);
            if (!$isOk) {
                $errors['model'] = 'Veuillez entrer un modèle de voiture correct';
            }
        }

        $registration = filter_input(INPUT_POST, 'registration', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($registration)) {
            $errors['registration'] = 'Veuillez entrer une marque ';
        } else {
            $isOk = filter_var($registration, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_MILEAGE . '/']]);
            if (!$isOk) {
                $errors['registration'] = 'Veuillez entrer un type de voiture correct';
            }
        }

        $mileage = intval(filter_input(INPUT_POST, 'mileage', FILTER_SANITIZE_NUMBER_INT));
        if (empty($mileage)) {
            $errors['mileage'] = 'Veuillez entrer un kilomètrage';
        } else {
            $isOk = filter_var($mileage, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_MILEAGE . '/']]);
            if (!$isOk) {
                $errors['mileage'] = 'Veuillez entrer un kilomètrage correct';
            }
        }

        // récuperation du type de voiture nettoyage et validation
        $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($type)) {
            $errors['type'] = 'Veuillez entrer un catégorie de voiture ';
        } else {
            $isOk = filter_var($type, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_NAME . '/']]);
            // ou  $isOk = filter_var($type, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/' . REGEX_NAME . '/')));
            if (!$isOk) {
                $errors['type'] = 'Veuillez entrer une catégorie de voiture correct';
            }
        }

        $id_types = intval(filter_input(INPUT_POST, 'type', FILTER_SANITIZE_NUMBER_INT));
        if (!Type::get($id_types)) {
            $errors['id_type'] = 'la catégorie n\'existe pas';
        }

        //récuperation du ficher recu nettoyage et validation
        try {
            $picture = ($_FILES['picture']);
            if (empty($picture)) {
                throw new Exception("Veuillez entrer un fichier", 1);
            }
            if ($picture['error'] > 0) {
                throw new Exception("Fichier non envoyé", 2);
            }
            if (!in_array($picture['type'], EXTENSION)) {
                throw new Exception("Veuillez entrer un fichier valide ( soit .png, .jpg, .jpeg, .gif, .pdf, wepb)", 3);
            }
            if ($picture['size'] > FILESIZE) {
                $errors['picture'] = 'Veuillez entrer un fichier avec une taille inferieur';
            }
            $extension = pathinfo($picture['name'], PATHINFO_EXTENSION);
            $newnamefile = uniqid('img_') . '.' . $extension;
            $from = $picture['tmp_name'];
            $to = __DIR__ . '/../../../public/uploads/vehicles/' . $newnamefile;
            move_uploaded_file($from, $to);
        } catch (\Throwable $th) {
            $errors = $th->getMessage();
        }

        if (empty($errors)) {
            $newVehicle = new Vehicle();
            $newVehicle->set_id_vehicles($id_vehicles);
            $newVehicle->set_brand($brand);
            $newVehicle->set_model($model);
            $newVehicle->set_registration($registration);
            $newVehicle->set_mileage($mileage);
            $newVehicle->set_id_types($id_types);
            $newVehicle->set_picture($newnamefile);
            $saved = $newVehicle->update();
            if ($saved == true) {
                header('location: /controllers/dashboard/vehicle/list_vehicle_ctrl.php');
                die;
            }
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
include __DIR__ . '/../../../views/dashboard/vehicle/update_vehicle.php';
include __DIR__ . '/../../../views/templates/footer.php';
