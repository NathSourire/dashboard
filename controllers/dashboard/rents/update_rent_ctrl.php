<?php
require_once __DIR__ . '/../../../models/Vehicle.php';
require_once __DIR__ . '/../../../helpers/init.php';
require_once __DIR__ . '/../../../models/Rent.php';
require_once __DIR__ . '/../../../models/Client.php';

try {
    $dateNow = date('Y-m-d');
    $id_rents = intval(filter_input(INPUT_GET, 'id_rents', FILTER_SANITIZE_NUMBER_INT));
    $rentObj = Rent::get($id_rents);
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

        // récuperation de l'email nettoyage et validation
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
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
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
        $rentHeureStart = filter_input(INPUT_POST, 'rentHeureStart');
        $rentMinStart = filter_input(INPUT_POST, 'rentMinStart');
        if (!in_array($rentHeureStart, HOURS) || !in_array($rentMinStart, MINUTES)) {
            $errors['rentTimeStart'] = 'Veuillez entrer un horaire valide';
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
        $rentHeureEnd = filter_input(INPUT_POST, 'rentHeureEnd');
        $rentMinEnd = filter_input(INPUT_POST, 'rentMinEnd');
        if (!in_array($rentHeureEnd, HOURS) || !in_array($rentMinEnd, MINUTES)) {
            $errors['rentTimeEnd'] = 'Veuillez entrer un horaire valide';
        }

        if (empty($errors)) {
            try {
                $pdo = Database::connect();
                $pdo->beginTransaction();
                $newClients = new Client();
                $newClients->set_lastname($lastname);
                $newClients->set_firstname($firstname);
                $newClients->set_email($email);
                $newClients->set_birthday($birthday);
                $newClients->set_phone($phone);
                $newClients->set_city($city);
                $newClients->set_zipcode($zipcode);
                $id_client = $newClients->update();
                $newRents = new Rent();
                $newRents->set_id_clients($id_client);
                $newRents->set_id_vehicles($id_vehicles);
                $newRents->set_startdate($stardate . ' ' . $rentHeureStart . ':' . $rentMinStart);
                $newRents->set_enddate($enddate . ' ' . $rentHeureEnd . ':' . $rentMinEnd);
                $id_rent = $newRents->update();
                // si il y a un id dans client et dans rent ca valide si un des deux ou les deux on pas de id ca annule tout
                if ($id_client && $id_rent) {
                    $pdo->commit();
                } else {
                    $pdo->rollBack();
                }
            } catch (\Throwable $th) {
                $pdo->rollBack();
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
include __DIR__ . '/../../../views/dashboard/rents/update_rent.php';
include __DIR__ . '/../../../views/templates/footer.php';