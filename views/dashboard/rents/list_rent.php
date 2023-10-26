<h1> Lister / Modifier / Archiver / Supprimer</h1>

<a href="/controllers/dashboard/vehicle/create_vehicle_ctrl.php">Ajouter une catégorie</a>

<div class="container">
    <div class="row">
        <table class="table tablelist">
            <thead>
            <th>Id de location</th>
            <th>Nom de famille</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Date annimversaire</th>
            <th>Téléphone</th>
            <th>Ville</th>
            <th>Code postal</th>
            <th>Prise du véhicule</th>
            <th>Restitution du véhicule</th>
            <th>Création</th>
            <th>Modification</th>
            <th>Id véhicule</th>
            <th>Id client</th>
                <!-- <th><a href="?column=mileage&order=<?= ($order == 'DESC') ? 'ASC' : 'DESC'; ?>">Kilométrage
                <img src="/public/assets/img/flèche_haut.png" alt="fleche vers le haut"><img src="/public/assets/img/flèche_bas.png" alt="fleche vers le bas"></a></th> -->
            </thead>
            <tbody>
                <?php
                foreach ($rents as $rent) {
                ?>
                    <tr>
                        <td><?= $rent->id_rents ?></td>
                        <td><?= $rent->lastname ?></td>
                        <td><?= $rent->firstname?></td>
                        <td><?= $rent->birthday?></td>
                        <td><?= $rent->email ?></td>
                        <td><?= $rent->phone ?></td>
                        <td><?= $rent->city ?></td>
                        <td><?= $rent->zipcode ?></td>
                        <td><?= $rent->startdate ?></td>
                        <td><?= $rent->enddate ?></td>
                        <td><?= $rent->created_at ?></td>
                        <td><?= $rent->updated_at ?></td>
                        <td><?= $rent->id_vehicles ?></td>
                        <td><?= $rent->id_clients ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- <div class="row">
        <h3>Les véhicules archivés</h3>
        <table class="table tablearchived">
            <thead>
                <th>Nom du véhicule</th>
                <th>Catégorie</th>                
                <th>Marque</th>
                <th>Modèle</th>
                <th>Immatriculation</th>
                <th>Kilométrage</th>
                <th>Photo</th>
                <th>Crée le</th>
                <th>Mis à jour le</th>
                <th>Archivé le</th>
                <th>Modifier</th>
                <th>Archiver</th>
                <th>Supprimer</th>
            </thead>
            <tbody>
                <?php
                foreach ($archived as $vehicle) {

                ?>
                    <tr>
                        <td><?= $vehicle->name_vehicle ?></td>
                        <td><?= $vehicle->type ?></td>
                        <td><?= $vehicle->brand ?></td>
                        <td><?= $vehicle->model ?></td>
                        <td><?= $vehicle->registration ?></td>
                        <td><?= $vehicle->mileage ?></td>
                        <td><?= $vehicle->picture ?></td>
                        <td><?= $vehicle->created_at ?></td>
                        <td><?= $vehicle->updated_at ?></td>
                        <td><?= date("d/m/Y H:i", strtotime($vehicle->deleted_at)) ?></td>
                        <td><a href="/controllers/dashboard/vehicle/update_vehicle_ctrl.php?id_vehicles=<?= $vehicle->id_vehicles ?>">
                                <img src="/public/assets/img/btnwrite.png" alt="stylo">
                            </a>
                        </td>
                        <td><a href="/controllers/dashboard/vehicle/delete_vehicle_ctrl.php?action=restor&id_vehicles=<?= $vehicle->id_vehicles ?>">
                                <img src="/public/assets/img/btnarchived.png" alt="archive">
                            </a>
                        </td>
                        <td><a href="/controllers/dashboard/vehicle/delete_vehicle_ctrl.php?action=delete&id_vehicles=<?= $vehicle->id_vehicles ?>">
                                <img src="/public/assets/img/btndelet.png" alt="poubelle">
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div> -->
</div>
