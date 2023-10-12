<h1> Lister / Modifier / Supprimer</h1>

<a href="/controllers/dashboard/vehicle/create_vehicle_ctrl.php">Ajouter une catégorie</a>

<div class="container">
    <div class="row">
        <table class="table">
            <thead>
                <!-- <th>Id_Véhicule</th> -->
                <th>Marque</th>
                <th><a href="?order=DESC">Modèle</a></th>
                <th>Immatriculation</th>
                <th>Kilométrage</th>
                <th>Photo</th>
                <th>Crée le</th>
                <th>Mis à jour le</th>
                <th>Suprimé le</th>
                <!-- <th>Id_Catégorie</th> -->
                <th>Catégorie</th>
                <th>Modifier</th>
                <th>Archiver</th>
                <th>Supprimer</th>
                <!-- <tr class="arrow">
                    <td>
                        <a href="/controllers/dashboard/vehicle/list_vehicle_ctrl.php?">
                            <img src="/public/assets/img/flèche_haut.png" alt="fleche vers le haut">
                        </a>
                        <a href="/controllers/dashboard/vehicle/list_vehicle_ctrl.php">
                            <img src="/public/assets/img/flèche_bas.png" alt="fleche vers le bas">
                        </a>
                    </td>
                    <td>
                        <a href="/controllers/dashboard/vehicle/list_vehicle_ctrl.php">
                            <img src="/public/assets/img/flèche_haut.png" alt="fleche vers le haut">
                        </a>
                        <a href="/controllers/dashboard/vehicle/list_vehicle_ctrl.php">
                            <img src="/public/assets/img/flèche_bas.png" alt="fleche vers le bas">
                        </a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="/controllers/dashboard/vehicle/list_vehicle_ctrl.php">
                            <img src="/public/assets/img/flèche_haut.png" alt="fleche vers le haut">
                        </a>
                        <a href="/controllers/dashboard/vehicle/list_vehicle_ctrl.php">
                            <img src="/public/assets/img/flèche_bas.png" alt="fleche vers le bas">
                        </a>
                    </td>
                    <td></td>
                    <td></td>
                </tr> -->
            </thead>
            <tbody>
                <?php
                foreach ($vehicles as $vehicle) {

                ?>
                    <tr>
                        <!-- <td><?= $vehicle->id_vehicles ?></td> -->
                        <td><?= $vehicle->brand ?></td>
                        <td><?= $vehicle->model ?></td>
                        <td><?= $vehicle->registration ?></td>
                        <td><?= $vehicle->mileage ?></td>
                        <td><?= $vehicle->picture ?></td>
                        <td><?= $vehicle->created_at ?></td>
                        <td><?= $vehicle->updated_at ?></td>
                        <td><?= $vehicle->deleted_at ?></td>
                        <!-- <td><?= $vehicle->id_types ?></td> -->
                        <td><?= $vehicle->type ?></td>
                        <td><a href="/controllers/dashboard/vehicle/update_vehicle_ctrl.php?id_vehicles=<?= $vehicle->id_vehicles ?>">
                                <img src="/public/assets/img/btnwrite.png" alt="stylo">
                            </a>
                        </td>
                        <td><a href="/controllers/dashboard/vehicle/delete_vehicle_ctrl.php?id_vehicles=<?= $vehicle->id_vehicles ?>">
                                <img src="/public/assets/img/btnarchived.png" alt="archive">
                            </a>
                        </td>
                        <td><a href="/controllers/dashboard/vehicle/delete_vehicle_ctrl.php?id_vehicles=<?= $vehicle->id_vehicles ?>">
                                <img src="/public/assets/img/btndelet.png" alt="poubelle">
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <p>
            <?php 
            if($delete == '1'){
                echo 'Catégorie bien supprimée';
            }else if($delete === '0'){
                echo 'suppression échouée';
            }
            ?>
        </p>
    </div>
</div>
<tbody>