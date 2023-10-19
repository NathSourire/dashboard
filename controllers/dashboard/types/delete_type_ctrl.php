<?php 
require_once __DIR__ . '/../../../helpers/database.php';
require_once __DIR__ . '/../../../models/Type.php';


    $id_types = intval(filter_input(INPUT_GET, 'id_types', FILTER_SANITIZE_NUMBER_INT));
    $isDeleted = (int) Type::delete($id_types);

    // if ($isDeleted){
    //     var_dump('catégorie bien supprimée');
    // }else {
    //     var_dump('suppression échouée');
    // }
    header('location: /controllers/dashboard/types/list_type_ctrl.php?delete='.$isDeleted);
    die;

// try {

//     if (empty($errors)) {
//         $newType = new Type();
//         $saved = $newType->delete($id_types);
//         if ($saved == true) {
//             header('location: /controllers/dashboard/types/list_type_ctrl.php');
//             die;
//         }
//     }

// } catch (\Throwable $th) {

//     $errors = $th->getMessage();

//     include __DIR__ . '/../../../views/templates/header.php';
//     include __DIR__ . '/../../../views/templates/error.php';
//     include __DIR__ . '/../../../views/templates/footer.php';
//     die;
// }

include __DIR__ . '/../../../views/templates/header.php';
include __DIR__ . '/../../../views/dashboard/types/delete_type.php';
include __DIR__ . '/../../../views/templates/footer.php';