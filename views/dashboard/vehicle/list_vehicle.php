<h1> Lister / Modifier / Supprimer</h1>

<a href="/controllers/dashboard/vehicle/create_vehicle_ctrl.php">Ajouter une catégorie</a>

<div class="container">
    <div class="row">
        <table class="table tablelist">
            <thead>
                <th><a href="?column=type&order=<?= ($order == 'DESC') ? 'ASC' : 'DESC'; ?>">Catégorie
                <img src="/public/assets/img/flèche_haut.png" alt="fleche vers le haut"><img src="/public/assets/img/flèche_bas.png" alt="fleche vers le bas"></a></th>                
                <th><a href="?column=brand&order=<?= ($order == 'DESC') ? 'ASC' : 'DESC'; ?>">Marque
                <img src="/public/assets/img/flèche_haut.png" alt="fleche vers le haut"><img src="/public/assets/img/flèche_bas.png" alt="fleche vers le bas"></a></th>
                <th><a href="?column=model&order=<?= ($order == 'DESC') ? 'ASC' : 'DESC'; ?>">Modèle
                <img src="/public/assets/img/flèche_haut.png" alt="fleche vers le haut"><img src="/public/assets/img/flèche_bas.png" alt="fleche vers le bas"></a></th>
                <th>Immatriculation</th>
                <th><a href="?column=mileage&order=<?= ($order == 'DESC') ? 'ASC' : 'DESC'; ?>">Kilométrage
                <img src="/public/assets/img/flèche_haut.png" alt="fleche vers le haut"><img src="/public/assets/img/flèche_bas.png" alt="fleche vers le bas"></a></th>
                <th>Photo</th>
                <th>Modifier</th>
                <th>Archiver</th>
            </thead>
            <tbody>
                <?php
                foreach ($vehicles as $vehicle) {
                ?>
                    <tr>
                        <!-- <td title="<?= 'date de création '.$vehicle->created_at.' date de mise à jour '. $vehicle->updated_at ?>"><?= $vehicle->type ?></td> -->
                        <td title="<?= 'date de création '. date("d/m/Y H:i", strtotime($vehicle->created_at)) .' date de mise à jour '. date("d/m/Y H:i", strtotime($vehicle->updated_at)) ?>"><?= $vehicle->type ?></td>
                        <td><?= $vehicle->brand ?></td>
                        <td><?= $vehicle->model ?></td>
                        <td><?= $vehicle->registration ?></td>
                        <td><?= $vehicle->mileage ?></td>
                        <?php if (isset($vehicle->picture)) { ?>
                        <td><a href="/public/uploads/vehicles/<?= $vehicle->picture?>" target="_blank" ><?= $vehicle->picture ?></a></td>
                        <?php } else { ?>
                        <td></td>
                        <?php } ?>
                        <!-- <td><?= $vehicle->created_at ?></td> -->
                        <!-- <td><?= $vehicle->updated_at ?></td> -->
                        <!-- <td><?= $vehicle->deleted_at ?></td> -->
                        <td><a href="/controllers/dashboard/vehicle/update_vehicle_ctrl.php?id_vehicles=<?= $vehicle->id_vehicles ?>">
                                <img src="/public/assets/img/btnwrite.png" alt="stylo">
                            </a>
                        </td>
                        <td><a href="/controllers/dashboard/vehicle/delete_vehicle_ctrl.php?action=archive&id_vehicles=<?= $vehicle->id_vehicles ?>">
                                <img src="/public/assets/img/btnarchived.png" alt="archive">
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <p>
            <?php 
            if($delete == '1'){
                echo 'Véhicule bien supprimée';
            }else if($delete === '0'){
                echo 'suppression échouée';
            }
            ?>
        </p>

    </div>

    <div class="row">
        <h3>Les véhicules archivés</h3>
        <table class="table tablearchived">
            <thead>
                <th>Catégorie</th>                
                <th>Marque</th>
                <th>Modèle</th>
                <th>Immatriculation</th>
                <th>Kilométrage</th>
                <th>Photo</th>
                <!-- <th>Crée le</th> -->
                <!-- <th>Mis à jour le</th> -->
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
                        <td><?= $vehicle->type ?></td>
                        <td><?= $vehicle->brand ?></td>
                        <td><?= $vehicle->model ?></td>
                        <td><?= $vehicle->registration ?></td>
                        <td><?= $vehicle->mileage ?></td>
                        <td><?= $vehicle->picture ?></td>
                        <!-- <td><?= $vehicle->created_at ?></td> -->
                        <!-- <td><?= $vehicle->updated_at ?></td> -->
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
    </div>
</div>
