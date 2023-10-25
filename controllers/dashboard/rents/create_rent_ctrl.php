<?php
require_once __DIR__ . '/../../../models/Vehicle.php';
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../models/Rent.php';
require_once __DIR__ . '/../../../models/Client.php';

try {

    $id_vehicles = intval(filter_input(INPUT_GET, 'id_vehicles', FILTER_SANITIZE_NUMBER_INT));
    // $id_clients = Client::get($id_clients);
    // $lastInsertedId = $client->insert();
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {


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

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        if (empty($email)) {
            $errors['email'] = 'Veuillez entrer un email';
        } else {
            $isOk = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!$isOk) {
                $errors['email'] = 'Veuillez entrer un email valide';
            }
        }

        // récuperation de la date de restitution nettoyage et validation
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($phone)) {
            $errors['phone'] = 'Veuillez entrer un numéro de téléphone';
        } 

        // récuperation du code postale  nettoyage et validation
        $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_NUMBER_INT);
        if (empty($zipcode)) {
            $errors['zipcode'] = 'Veuillez entrer un code postal';
        }

        // récuperation du pays de naissance nettoyage et validation
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($city)) {
            $errors['city'] = 'Veuillez choisir un nom de ville';
        } 

        // récuperation de la date anniversaire nettoyage et validation
        $birthday = filter_input(INPUT_POST, 'birthday', FILTER_SANITIZE_NUMBER_INT);
        if (empty($birthday)) {
            $errors['birthday'] = 'Veuillez entrer une date de naissance';
        } else {
            $isOk = filter_var($birthday, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_DATE . '/']]);
            if (!$isOk) {
                $errors['birthday'] = 'Veuillez entrer une date de naissance valide';
            }
        }

        // récuperation de la date de location nettoyage et validation
        $stardate = filter_input(INPUT_POST, 'stardate', FILTER_SANITIZE_NUMBER_INT);
        if (empty($stardate)) {
            $errors['stardate'] = 'Veuillez entrer une date de location';
        } else {
            $isOk = filter_var($stardate, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_DATE . '/']]);
            if (!$isOk) {
                $errors['stardate'] = 'Veuillez entrer une date de location valide';
            }
        }

        // récuperation de la date de restitution nettoyage et validation
        $enddate = filter_input(INPUT_POST, 'enddate', FILTER_SANITIZE_NUMBER_INT);
        if (empty($enddate)) {
            $errors['enddate'] = 'Veuillez entrer une date de restitution';
        } else {
            $isOk = filter_var($enddate, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_DATE . '/']]);
            if (!$isOk) {
                $errors['enddate'] = 'Veuillez entrer une date de restitution valide';
            }
        }


        if (empty($errors)) {
            $newClients = new Client();
            $newClients->set_lastname($lastname);
            $newClients->set_firstname($firstname);
            $newClients->set_email($email);
            $newClients->set_birthday($birthday);
            $newClients->set_phone($phone);
            $newClients->set_city($city);
            $newClients->set_zipcode($zipcode);
            $saved = $newClients->insert();
        }

        if (empty($errors)) {
            $newRents = new Rent();
            $newRents->set_id_clients($lastInsertedId);
            $newRents->set_startdate($stardate);
            $newRents->set_enddate($enddate);
            $saved = $newRents->insert();
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
