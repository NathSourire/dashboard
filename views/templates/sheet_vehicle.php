<div class="d-flex justify-content-center">
<form id="sheetForm" enctype="multipart/form-data" method="get">
    <div class="row card border-3 border-warning bg-primary text-warning align-items-center">
        <div class="col imgsheet w-75 m-3">
            <?php if ($vehicle->picture) { ?>
                <img class="img-fluid my-5" src="/public/uploads/vehicles/<?= $vehicle->picture ?>" alt="<?= $vehicle->brand ?>">
            <?php } else { ?>
                <img class="img-fluid my-5" src="/public/assets/img/pokemon97.webp" alt="Groupe de pokemon">
            <?php } ?>
        </div>
        <div class="card-body txtCard p-5">
            <li class="d-flex justify-content-around"><?= ' Catégorie : ' . $vehicle->type  ?></li>
            <li class="d-flex justify-content-around"><?= ' Marque : ' . $vehicle->brand ?></li>
            <li class="d-flex justify-content-around"><?= ' Model : ' . $vehicle->model ?></li>
            <li class="d-flex justify-content-around"><?= ' Immatriculation : ' . $vehicle->registration ?></li>
            <li class="d-flex justify-content-around"><?= ' Kilométrage : ' . $vehicle->mileage ?></li>
            <!-- <li class="d-flex justify-content-around"><?= ' Date de création ' . date("d/m/Y H:i", strtotime($vehicle->created_at)) ?></li>
            <li class="d-flex justify-content-around"><?= ' Date de modification ' . date("d/m/Y H:i", strtotime($vehicle->updated_at)) ?></li> -->
            <div class="d-flex justify-content-center"><button class="btn btn-primary my-5 text-warning" type="submit"><a href="/controllers/dashboard/rents/create_rent_ctrl.php?id_vehicles=<?= $vehicle->id_vehicles ?>">Louer !</a></button></div>
        </div>
    </div>
</form>
</div>