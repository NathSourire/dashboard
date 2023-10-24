<h1> Modifier</h1>

<form class=" offset-1 offset-md-2 col-10 col-md-8" enctype="multipart/form-data" method="post" novalidate>

    <div>
        <label class="form-label" for="name_vehicle">Nom du véhicule</label>
        <input class="form-control" type="text" id="name_vehicle" name="name_vehicle" value="<?= isset($vehicleObj->name_vehicle) ? htmlspecialchars($vehicleObj->name_vehicle) : '' ?>" pattern="<?= REGEX_NAME ?>" required>
        <p class="red">
            <?= $errors['name_vehicle'] ?? '' ?>
        </p>
    </div>

    <div>
        <label class="form-label" for="brand">Marque</label>
        <input class="form-control" type="text" id="brand" name="brand" value="<?= isset($vehicleObj->brand) ? htmlspecialchars($vehicleObj->brand) : '' ?>" pattern="<?= REGEX_NAME ?>" required>
        <p class="red">
            <?= $errors['brand'] ?? '' ?>
        </p>
    </div>

    <div>
        <label class="form-label" for="model">Modèle</label>
        <input class="form-control" type="text" id="model" name="model" value="<?= isset($vehicleObj->model) ? htmlspecialchars($vehicleObj->model) : '' ?>" pattern="<?= REGEX_NAME ?>" required>
        <p class="red">
            <?= $errors['model'] ?? '' ?>
        </p>
    </div>

    <div>
        <label class="form-label" for="registration">Immatriculation</label>
        <input class="form-control" type="text" id="registration" name="registration" value="<?= isset($vehicleObj->registration) ? htmlspecialchars($vehicleObj->registration) : '' ?>" pattern="<?= REGEX_MILEAGE ?>" required>
        <p class="red">
            <?= $errors['registration'] ?? '' ?>
        </p>
    </div>

    <div>
        <label class="form-label" for="mileage">Kilométrage</label>
        <input class="form-control" type="text" id="mileage" name="mileage" value="<?= isset($vehicleObj->mileage) ? htmlspecialchars($vehicleObj->mileage) : '' ?>" pattern="<?= REGEX_MILEAGE ?>" required>
        <p class="red">
            <?= $errors['mileage'] ?? '' ?>
        </p>
    </div>

    <div>
        <label class="form-label" for="picture">Photo</label>
        <div class="border border-3 pictureProfil ms-5 "><img class="img-fluid" src="/public/uploads/vehicles/<?= $vehicleObj->picture ?>" alt=""></div>
        <input class="form-control my-3" type="file" id="picture" name="picture" accept=".png, .jpeg, .jpg, .gif, .webp">
        <p class="red">
            <?= $errors['picture'] ?? '' ?>
        </p>
    </div>

    <div>
        <label class="form-label" for="type">Catégorie</label>
        <select class="form-select" id="type" name="type">
            <option selected disabled>Catégorie</option>
            <?php
            foreach ($types as $type) { ?>
                <!-- ternaire permettant la recupe du select -->
                <?php $isSelected = ($vehicleObj->id_types == $type->id_types) ? 'selected' : ''; ?>
                <option <?= $isSelected  ?> value="<?= $type->id_types; ?>">
                    <?= $type->type; ?>
                </option>
            <?php } ?>
        </select>
        <p class="red">
            <?= $errors['type'] ?? '' ?>
        </p>
    </div>

    <div>
        <button type="submit">Modifier</button>
    </div>
    <p class="red"><?= isset($saved) ? 'Catégorie modifiée' : '' ?></p>
</form>