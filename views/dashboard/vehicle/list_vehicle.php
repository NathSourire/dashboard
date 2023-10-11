<h1> Lister / Modifier / Supprimer</h1>

<a href="/controllers/dashboard/vehicle/create_vehicle_ctrl.php">Ajouter une catégorie</a>

<div class="container">
    <div class="row">
        <table class="table">
            <thead>
                <!-- <th>Id_Véhicule</th> -->
                <th>Marque</th>
                <th>Modèle</th>
                <th>Immatriculation</th>
                <th>Kilométrage</th>
                <th>Photo</th>
                <th>Crée le</th>
                <th>Mis à jour le</th>
                <th>Suprimé le</th>
                <!-- <th>Id_Catégorie</th> -->
                <th>Catégorie</th>
                <th>Modifier</th>
                <th>Supprimer</th>
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
                        <td><a href="/controllers/dashboard/types/update_type_ctrl.php?id_types=<?= $vehicle->id_vehicles ?>">
                                <img src="/public/assets/img/btnwrite.png" alt="stylo">
                            </a>
                        </td>
                        <td><a href="/controllers/dashboard/types/delete_type_ctrl.php?id_types=<?= $vehicle->id_vehicles ?>">
                                <img src="/public/assets/img/btndelet.png" alt="poubelle">
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <!-- <div>
            <label for="search">recherche</label>
            <input type="search" name="search" id="search">
            <p class="red">
                <?= $errors['type'] ?? '' ?>
            </p>
        </div> -->

    </div>
</div>
<tbody>