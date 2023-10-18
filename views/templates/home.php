<h1>Accueil</h1>

<div class="row row-cols-1 row-cols-md-4 gap-5 d-flex justify-content-center my-5">
    <?php
    foreach ($vehicles as $vehicle) {
    ?>
        <div class="card border-3 border-warning bg-primary col">
            <?php if ($vehicle->picture) { ?>
                <img class="img-fluid card-img-top" src="/public/uploads/vehicles/<?= $vehicle->picture ?>" alt="">
            <?php } else { ?>
                <img class="img-fluid card-img-top" src="/public/assets/img/pokemon97.webp" alt="">
            <?php } ?>
            <!-- <img class="img-fluid" src="/public/uploads/vehicles/<?= ($vehicle->picture == true) ? $vehicle->picture : '/public/assets/img/pokemon97.webp' ?>" alt=""> -->
            <h5 class="card-title my-3"><?= $vehicle->id_vehicles ?></h5>
            <li class="card-text"><?= 'Catégorie : ' . $vehicle->type  ?></li>
            <li class="card-text"><?= 'Marque : ' . $vehicle->brand ?></li>
            <li class="card-text"><?= 'Model : ' . $vehicle->model ?></li>
            <li class="card-text"><?= 'Immatriculation : ' . $vehicle->registration ?></li>
            <li class="card-text"><?= 'Kilométrage : ' . $vehicle->mileage ?></li>
        </div>
        <br>
    <?php } ?>
</div>
</div>