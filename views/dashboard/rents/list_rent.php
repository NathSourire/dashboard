<h1> Lister</h1>

<!-- <a href="/controllers/dashboard/vehicle/create_vehicle_ctrl.php">Ajouter une catégorie</a> -->

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
                <th>Modifier</th>
            </thead>
            <tbody>
                <?php
                foreach ($rents as $rent) {
                ?>
                    <tr>
                        <td><?= $rent->id_rents ?></td>
                        <td><?= $rent->lastname ?></td>
                        <td><?= $rent->firstname ?></td>
                        <td><?= $rent->birthday ?></td>
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
                        <td><a href="/controllers/dashboard/rents/update_rent_ctrl.php?id_rents=<?= $rent->id_rents ?>">
                                <img src="/public/assets/img/btnwrite.png" alt="stylo">
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>