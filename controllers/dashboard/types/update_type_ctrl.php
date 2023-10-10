<?php
require_once __DIR__ . '/../../../helpers/database.php';
require_once __DIR__ . '/../../../models/Type.php';
require_once __DIR__ . '/../../../config/regex.php';




try {
    $id_types = intval(filter_input(INPUT_GET, 'id_types', FILTER_SANITIZE_NUMBER_INT));
    $typeObj = Type::get($id_types);

    $errors = [];
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($type)) {
            $errors['type'] = 'Veuillez entrer un type de voiture ';
        } else {
            $isOk = filter_var($type, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_NAME . '/']]);
            if (!$isOk) {
                $errors['type'] = 'Veuillez entrer un type de voiture correct';
            }
        }

        if (empty($errors)) {
            $newType = new Type();
            $newType->set_type($type);
            $newType->set_id_type($id_types);
            $saved = $newType->update();
            if ($saved == true) {
                header('location: /controllers/dashboard/types/list_type_ctrl.php');
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
include __DIR__ . '/../../../views/dashboard/types/update_type.php';
include __DIR__ . '/../../../views/templates/footer.php';
