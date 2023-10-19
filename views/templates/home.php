<h1>Accueil</h1>


<form enctype="multipart/form-data" method="get" action=""  >
    <label class="form-label " for="type"></label>
    <select class="form-select" id="type" name="type">
        <option selected disabled>Catégorie</option>
        <?php
        foreach ($types as $type) { ?>
            <!-- ternaire permettant la recupe du select -->
            <?php $isSelected = ($vehicle->id_types == $type->id_types) ? 'selected' : ''; ?>
            <option value="<?= $type->id_types; ?>">
                <?= $type->type; ?>
            </option>
        <?php } ?>
    </select>
    <button class="my-2" type="submit">Envoyer!</button>
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
                <li class="card-text"><?= 'Catégorie : ' . $vehicle->type  ?></li>
                <li class="card-text"><?= 'Marque : ' . $vehicle->brand ?></li>
                <li class="card-text"><?= 'Model : ' . $vehicle->model ?></li>
                <li class="card-text"><?= 'Immatriculation : ' . $vehicle->registration ?></li>
                <li class="card-text"><?= 'Kilométrage : ' . $vehicle->mileage ?></li>
        </div></a>
        <br>
    <?php } ?>
</div>
</div>




