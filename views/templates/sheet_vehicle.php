<div class="row card border-3 border-warning bg-primary text-warning align-items-center">
    <div class="col imgsheet">
        <?php if ($vehicle->picture) { ?>
            <img class="img-fluid my-5" src="/public/uploads/vehicles/<?= $vehicle->picture ?>" alt="<?= $vehicle->brand ?>">
        <?php } else { ?>
            <img class="img-fluid my-5" src="/public/assets/img/pokemon97.webp" alt="Groupe de pokemon">
        <?php } ?>
    </div>
    <div class="card-body txtCard p-5">
        <li class=" d-flex justify-content-around " ><?= ' Catégorie : ' . $vehicle->type  ?></li>
        <li class=" d-flex justify-content-around " ><?= ' Marque : ' . $vehicle->brand ?></li>
        <li class=" d-flex justify-content-around " ><?= ' Model : ' . $vehicle->model ?></li>
        <li class=" d-flex justify-content-around " ><?= ' Immatriculation : ' . $vehicle->registration ?></li>
        <li class=" d-flex justify-content-around " ><?= ' Kilométrage : ' . $vehicle->mileage ?></li>
        <li class=" d-flex justify-content-around " ><?= ' Date de création ' . date("d/m/Y H:i", strtotime($vehicle->created_at)) ?></li>
        <li class=" d-flex justify-content-around " ><?= ' Date de modification ' . date("d/m/Y H:i", strtotime($vehicle->updated_at)) ?></li>
    </div>
</div>