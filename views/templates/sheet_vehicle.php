<a href="/controllers/home_ctrl.php">Retour à la liste des véhicules</a>


<div class="d-flex justify-content-center p-3">
    <form id="sheetForm" enctype="multipart/form-data" method="get">
        <div class="row card border-3 border-warning bg-primary text-warning">
            <div class="col imgsheetm-3">
                <?php if ($vehicle->picture) { ?>
                    <img class="img-fluid my-5" src="/public/uploads/vehicles/<?= $vehicle->picture ?>" alt="<?= $vehicle->brand ?>">
                <?php } else { ?>
                    <img class="img-fluid my-5" src="/public/assets/img/pokemon97.webp" alt="Groupe de pokemon">
                <?php } ?>
            </div>
            <div class="card-body txtCard p-5">
                <ul>
                    <li><?= ' Catégorie : ' . $vehicle->type  ?></li>
                    <li><?= ' Marque : ' . $vehicle->brand ?></li>
                    <li><?= ' Model : ' . $vehicle->model ?></li>
                    <li><?= ' Immatriculation : ' . $vehicle->registration ?></li>
                    <li><?= ' Kilométrage : ' . $vehicle->mileage ?></li>
                </ul>
                <!-- <li class="d-flex justify-content-around"><?= ' Date de création ' . date("d/m/Y H:i", strtotime($vehicle->created_at)) ?></li>
            <li class="d-flex justify-content-around"><?= ' Date de modification ' . date("d/m/Y H:i", strtotime($vehicle->updated_at)) ?></li> -->
                <div class="d-flex justify-content-center"><button class="btn btn-primary my-5 text-light" type="submit">
                    <a href="/controllers/dashboard/rents/create_rent_ctrl.php?id_vehicles=<?= $vehicle->id_vehicles ?>">Louer !</a></button></div>
            </div>
        </div>
    </form>
</div>