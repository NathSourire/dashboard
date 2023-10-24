<h1> Créer /Ajouter</h1>

<a href="/controllers/dashboard/vehicle/list_vehicle_ctrl.php">Liste des véhicules</a>
<hr>
<form class=" offset-1 offset-md-2 col-10 col-md-8" enctype="multipart/form-data" method="post" novalidate>

    <div>
        <label class="form-label" for="name_vehicle">Nom du véhicule</label>
        <input class="form-control" type="text" id="name_vehicle" name="name_vehicle" value="<?= isset($vehicleObj->name_vehicle) ? htmlspecialchars($vehicleObj->name_vehicle) : '' ?>" pattern="<?= REGEX_NAME ?>" required>
        <p class="red">
            <?= $errors['name_vehicle'] ?? '' ?>
        </p>
    </div>

    <div>
        <label class="form-label" for="brand">Marque *</label>
        <input class="form-control" type="text" id="brand" name="brand" value="" pattern="<?= REGEX_NAME ?>" required placeholder="Ex: Statik">
        <p class="red">
            <?= $errors['brand'] ?? '' ?>
        </p>
    </div>

    <div>
        <label class="form-label" for="model">Modèle *</label>
        <input class="form-control" type="text" id="model" name="model" value="" pattern="<?= REGEX_NAME ?>" required placeholder="Ex: Souris">
        <p class="red">
            <?= $errors['model'] ?? '' ?>
        </p>
    </div>

    <div>
        <label class="form-label" for="registration">Immatriculation *</label>
        <input class="form-control" type="text" id="registration" name="registration" value="" pattern="<?= REGEX_MILEAGE ?>" required placeholder="Ex: 82exp">
        <p class="red">
            <?= $errors['registration'] ?? '' ?>
        </p>
    </div>

    <div>
        <label class="form-label" for="mileage">Kilométrage *</label>
        <input class="form-control" type="text" id="mileage" name="mileage" value="" pattern="<?= REGEX_MILEAGE ?>" required placeholder="Ex: 6kg">
        <p class="red">
            <?= $errors['mileage'] ?? '' ?>
        </p>
    </div>

    <div>
        <label class="form-label" for="picture">Photo</label>
        <!-- <div class="border border-3 pictureProfil ms-5 "></div> -->
        <input class="form-control my-3" type="file" id="picture" name="picture" accept=".webp, .png, .jpeg, .jpg, .gif">
        <p class="red">
            <?= $errors['picture'] ?? '' ?>
        </p>
    </div>

    <div>
        <label class="form-label" for="type">Catégorie *</label>
        <select class="form-select" id="type" name="type">
            <option selected disabled>Catégorie</option>
            <?php
            foreach ($types as $type) { ?>
                <option value="<?= $type->id_types; ?>">
                    <?= $type->type; ?>
                </option>
            <?php } ?>
        </select>
        <p class="red">
            <?= $errors['type'] ?? '' ?>
        </p>
    </div>

    <div>
        <button class="btn btn-light" type="submit">Ajouter</button>
    </div>
    <p class="red"><?= isset($saved) ? 'Catégorie enregistrée' : '' ?></p>
</form>
<p>* Champs obligatoires</p>