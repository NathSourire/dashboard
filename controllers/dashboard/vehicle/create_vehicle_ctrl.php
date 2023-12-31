<?php
require_once __DIR__ . '/../../../models/Type.php';
require_once __DIR__ . '/../../../models/Vehicle.php';
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../config/constants.php';




try {
    $types = Type::get_all();
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {

        // récuperation du nom de voiture nettoyage et validation
        $name_vehicle = filter_input(INPUT_POST, 'name_vehicle', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($name_vehicle)) {
            $errors['name_vehicle'] = 'Veuillez entrer une marque ';
        } else {
            $isOk = filter_var($name_vehicle, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_NAME . '/']]);
            if (!$isOk) {
                $errors['name_vehicle'] = 'Veuillez entrer une marque de voiture correct';
            }
        }

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
            $isOk = filter_var($registration, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_REGISTRATION . '/']]);
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

        // récuperation de id du type de voiture nettoyage et validation
        $id_types = intval(filter_input(INPUT_POST, 'type', FILTER_SANITIZE_NUMBER_INT));
        if (!Type::get($id_types)) {
            $errors['id_type'] = 'la catégorie n\'existe pas';
        }

        //récuperation du ficher recu nettoyage et validation
        try {
            $picture = $_FILES['picture'];
            if (empty($picture['name'])) {
                throw new Exception("Veuillez entrer un fichier", 1);
            }
            if ($picture['error'] > 0) {
                throw new Exception("Fichier non envoyé", 2);
            }
            if (!in_array($picture['type'], EXTENSION)) {
                throw new Exception("Veuillez entrer un fichier valide ( soit .png, .jpg, .jpeg, .gif, .pdf, .webp)", 3);
            }
            if ($picture['size'] > FILESIZE) {
                throw new Exception ('Veuillez entrer un fichier avec une taille inferieur', 4);
            }
            $extension = pathinfo($picture['name'], PATHINFO_EXTENSION);
            $newnamefile = uniqid('img_') . '.' . $extension;
            $from = $picture['tmp_name'];
            $to = __DIR__ . '/../../../public/uploads/vehicles/' . $newnamefile;
            move_uploaded_file($from, $to);
            
        } catch (\Throwable $th) {
            $errors ['picture']= $th->getMessage();
            
        }

        if (empty($errors)) {
            $newVehicle = new Vehicle();
            $newVehicle->set_name_vehicle($name_vehicle);
            $newVehicle->set_brand($brand);
            $newVehicle->set_model($model);
            $newVehicle->set_registration($registration);
            $newVehicle->set_mileage($mileage);
            $newVehicle->set_id_types($id_types);
            $newVehicle->set_picture($newnamefile);
            $saved = $newVehicle->insert();
            if ($saved == true) {
                header('location: /controllers/dashboard/vehicle/list_vehicle_ctrl.php');
                die;
            }
        }

    }
} catch (\Throwable $th) {
    $errors = $th->getMessage();

    include __DIR__ . '/../../../views/templates/header.php';
    include __DIR__ . '/../../../views/templates/error.php';
    include __DIR__ . '/../../../views/templates/footer.php';
    die;
}



include __DIR__ . '/../../../views/templates/header.php';
include __DIR__ . '/../../../views/dashboard/vehicle/create_vehicle.php';
include __DIR__ . '/../../../views/templates/footer.php';


