<?php
require_once __DIR__ . '/../../../helpers/database.php';
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../models/Type.php';

try {
    $errors = [];
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        // récuperation du type de voiture nettoyage et validation
        $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($type)) {
            $errors['type'] = 'Veuillez entrer un type de voiture ';
        } else {
            $isOk = filter_var($type, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_NAME . '/']]);
            if (!$isOk) {
                $errors['type'] = 'Veuillez entrer un type de voiture correct';
            }
        }
        if (Type::isExist($type)){
            $errors['type'] = 'la catégorie exist déja';
        }
        if (empty($errors)) {
            $newType = new Type();
            $newType->set_type($type);
            $saved = $newType->insert();
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
include __DIR__ . '/../../../views/dashboard/types/create_type.php';
include __DIR__ . '/../../../views/templates/footer.php';
