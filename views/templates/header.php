<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="/public/assets/js/script.js"></script>
    <link rel="shortcut icon" href="/public/assets/img/icons8-pokemon-24.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <title>Projet Dashbord <?= ' ' . $title ?> </title>
</head>


<body>
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand">Projet Dashbord </a>
            <img class="imgpokemon" src="/public/assets/img/Pokemon.jpg" alt="Pokemon" srcset="">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/controllers/home_ctrl.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/controllers/dashboard/dashboard_ctrl.php">Accueil dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Catégories
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/controllers/dashboard/types/create_type_ctrl.php">Créer/Ajouter</a></li>
                            <li><a class="dropdown-item" href="/controllers/dashboard/types/list_type_ctrl.php">Lister/Modifier/Supprimer</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Véhicules
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/controllers/dashboard/vehicle/create_vehicle_ctrl.php">Créer/Ajouter</a></li>
                            <li><a class="dropdown-item" href="/controllers/dashboard/vehicle/list_vehicle_ctrl.php">Lister/Modifier/Supprimer</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Clients
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/controllers/dashboard/clients/create_client_ctrl.php">Créer/Ajouter</a></li>
                            <li><a class="dropdown-item" href="/controllers/dashboard/clients/list_client_ctrl.php">Lister/Modifier/Supprimer</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Locations
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/controllers/dashboard/rents/create_rent_ctrl.php">Créer/Ajouter</a></li>
                            <li><a class="dropdown-item" href="/controllers/dashboard/rents/list_rent_ctrl.php">Lister/Modifier/Supprimer</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <div class="container my-5">