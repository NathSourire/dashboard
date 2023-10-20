<h1>Accueil</h1>

<form class="d-flex" enctype="multipart/form-data" method="get">
    <label class="form-label " for="type"></label>
    <select class="form-select me-2" id="type" name="type">
        <option value="0">Toutes les Catégories</option>
        <?php
        foreach ($types as $type) { ?>
            <!-- ternaire permettant la recupe du select -->
            <?php $isSelected = ($vehicle->id_types == $type->id_types) ? 'selected' : ''; ?>
            <option value="<?= $type->id_types; ?>">
                <?= $type->type; ?>
            </option>
        <?php } ?>
    </select>
    <button class="btn btn-warning me-2" type="submit">Envoyer</button>

    <input class="form-control me-2" type="search" placeholder="recherche" aria-label="Search" id="searchall" name="searchall" value="" >
    <button class="btn btn-warning" type="submit" >Recherche</button>

    <p class="red">
        <?= $errors['type'] ?? '' ?>
    </p>
</form>



<div class="row row-cols-1 row-cols-md-4 gap-5 my-5">
    <?php
    foreach ($vehicles as $vehicle) {
    ?>
        <div class="card border-3 border-warning bg-primary  text-warning col">
            <a href="/controllers/sheet_vehicle_ctrl.php?id_vehicles=<?= $vehicle->id_vehicles ?>">
                <?php if ($vehicle->picture) { ?>
                    <img class="img-fluid" src="/public/uploads/vehicles/<?= $vehicle->picture ?>" alt="<?= $vehicle->brand ?>">
                <?php } else { ?>
                    <img class="img-fluid" src="/public/assets/img/pokemon97.webp" alt="Groupe de pokemon">
                <?php } ?>
                <!-- <img class="img-fluid" src="/public/uploads/vehicles/<?= ($vehicle->picture == true) ? $vehicle->picture : '/public/assets/img/pokemon97.webp' ?>" alt=""> -->
                <h5 class="card-title my-3 "><?= $vehicle->id_vehicles ?></h5>
                <li ><?= 'Catégorie : ' . $vehicle->type  ?></li>
                <li ><?= 'Marque : ' . $vehicle->brand ?></li>
                <li ><?= 'Model : ' . $vehicle->model ?></li>
                <li ><?= 'Immatriculation : ' . $vehicle->registration ?></li>
                <li ><?= 'Kilométrage : ' . $vehicle->mileage ?></li>
        </div></a>
        <br>
    <?php } ?>
</div>
</div>