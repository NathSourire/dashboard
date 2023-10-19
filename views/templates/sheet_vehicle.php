<div class="row card border-3 border-warning bg-primary text-warning align-items-center">
    <div class="col imgsheet">
        <?php if ($vehicle->picture) { ?>
            <img class="img-fluid my-5" src="/public/uploads/vehicles/<?= $vehicle->picture ?>" alt="<?= $vehicle->brand ?>">
        <?php } else { ?>
            <img class="img-fluid my-5" src="/public/assets/img/pokemon97.webp" alt="Groupe de pokemon">
        <?php } ?>
    </div>
    <div class="card-body txtCard p-5">
        <li><?= ' Catégorie : ' . $vehicle->type  ?></li>
        <li><?= ' Marque : ' . $vehicle->brand ?></li>
        <li><?= ' Model : ' . $vehicle->model ?></li>
        <li><?= ' Immatriculation : ' . $vehicle->registration ?></li>
        <li><?= ' Kilométrage : ' . $vehicle->mileage ?></li>
        <li><?= ' Date de création ' . date("d/m/Y H:i", strtotime($vehicle->created_at)) ?></li>
        <li><?= ' Date de modification ' . date("d/m/Y H:i", strtotime($vehicle->updated_at)) ?></li>
    </div>
</div>