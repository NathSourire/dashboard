<?php  
require_once __DIR__ . '/../../../models/Vehicle.php';
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../models/Rent.php';

try {

    $id_vehicles = intval(filter_input(INPUT_GET, 'id_vehicles', FILTER_SANITIZE_NUMBER_INT));
    $errors = [];

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    if (empty($email)) {
        $errors['email'] = 'Veuillez entrer un email';
    } else {
        $isOk = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$isOk) {
            $errors['email'] = 'Veuillez entrer un email valide';
        }
    }
    // // récuperation du mot de passe nettoyage et validation
    $password3 = filter_input(INPUT_POST, 'password3', FILTER_DEFAULT);

    if (empty($password3)) {
        $errors['password3'] = 'Veuillez entrer un mot de passe';
    } else {
        $isOk = filter_var($password3, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_PASSWORD . '/']]);
        if (!$isOk) {
            $errors['password3'] = 'Veuillez entrer un mot de passe valide';
        }
        $password = password_hash($password3, PASSWORD_BCRYPT);
    }
    // récuperation du nom de famille nettoyage et validation
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($lastname)) {
        $errors['lastname'] = 'Veuillez entrer un nom de famille ';
    } else {
        $isOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_NAME . '/']]);
        if (!$isOk) {
            $errors['lastname'] = 'Veuillez entrer un nom de famille valide';
        }
    }
        // récuperation du prénom nettoyage et validation
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($firstname)) {
            $errors['firstname'] = 'Veuillez entrer un prénom  ';
        } else {
            $isOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_NAME . '/']]);
            if (!$isOk) {
                $errors['firstname'] = 'Veuillez entrer un prénom valide';
            }
        }
    // récuperation du code postale  nettoyage et validation
    $zipCode = filter_input(INPUT_POST, 'zipCode', FILTER_SANITIZE_NUMBER_INT);
    if (empty($zipCode)) {
        $errors['zipCode'] = 'Veuillez entrer un code postal';
    } else {
        $isOk = filter_var($zipCode, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_POSTAL . '/']]);
        if (!$isOk) {
            $errors['zipCode'] = 'Veuillez entrer un code postale valide';
        }
    }
    // récuperation du pays de naissance nettoyage et validation
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($city)) {
        $errors['city'] = 'Veuillez entrer un nom de ville';
    } else {
        $isOk = filter_var($city, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_POSTAL . '/']]);
        if (!$isOk) {
            $errors['city'] = 'Veuillez entrer un nom de ville valide';
        }
    }
    // récuperation de la date anniversaire nettoyage et validation
    $birthday = filter_input(INPUT_POST, 'birthday', FILTER_SANITIZE_NUMBER_INT);
    if (empty($birthday)) {
        $errors['birthday'] = 'Veuillez entrer une date de naissance';
    } else {
        $isOk = filter_var($birthday, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_DATE. '/']]);
        if (!$isOk) {
            $errors['birthday'] = 'Veuillez entrer une date de naissance valide';
        }
    }
    // récuperation de la date de location nettoyage et validation
    $stardate = filter_input(INPUT_POST, 'stardate', FILTER_SANITIZE_NUMBER_INT);
    if (empty($stardate)) {
        $errors['stardate'] = 'Veuillez entrer une date de location';
    } else {
        $isOk = filter_var($stardate, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_DATE. '/']]);
        if (!$isOk) {
            $errors['stardate'] = 'Veuillez entrer une date de location valide';
        }
    }
    // récuperation de la date de restitution nettoyage et validation
    $enddate = filter_input(INPUT_POST, 'enddate', FILTER_SANITIZE_NUMBER_INT);
    if (empty($enddate)) {
        $errors['enddate'] = 'Veuillez entrer une date de restitution';
    } else {
        $isOk = filter_var($enddate, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_DATE. '/']]);
        if (!$isOk) {
            $errors['enddate'] = 'Veuillez entrer une date de restitution valide';
        }
    }
}   
    
    //affiche le tableau des véhicules 
    $vehicle = Vehicle::get($id_vehicles);


} catch (\Throwable $th) {

    $errors = $th->getMessage();



    include __DIR__ . '/../../../views/templates/header.php';
    include __DIR__ . '/../../../views/templates/error.php';
    include __DIR__ . '/../../../views/templates/footer.php';
    die;
}

include __DIR__ . '/../../../views/templates/header.php';
include __DIR__ . '/../../../views/dashboard/rents/create_rent.php';
include __DIR__ . '/../../../views/templates/footer.php';