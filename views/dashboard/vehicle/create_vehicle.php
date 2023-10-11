<h1> Créer /Ajouter</h1>

<form method="post" novalidate>
    <div>
        <label class="form-label" for="brand">Marque</label>
        <input class="form-control" type="text" id="brand" name="brand" value="" pattern="<?= REGEX_NAME ?>" required>
        <p class="red">
            <?= $errors['brand'] ?? '' ?>
        </p>
    </div>

    <div>
        <label class="form-label" for="model">Modèle</label>
        <input class="form-control" type="text" id="model" name="model" value="" pattern="<?= REGEX_NAME ?>" required>
        <p class="red">
            <?= $errors['model'] ?? '' ?>
        </p>
    </div>

    <div>
        <label class="form-label" for="registration">Immatriculation</label>
        <input class="form-control" type="text" id="registration" name="registration" value="" pattern="<?= REGEX_MILEAGE ?>" required>
        <p class="red">
            <?= $errors['registration'] ?? '' ?>
        </p>
    </div>

    <div>
        <label class="form-label" for="mileage">Kilométrage</label>
        <input class="form-control" type="text" id="mileage" name="mileage" value="" pattern="<?= REGEX_MILEAGE ?>" required>
        <p class="red">
            <?= $errors['mileage'] ?? '' ?>
        </p>
    </div>

    <div>
        <label class="form-label" for="picture">Photo</label>
        <div class="border border-3 pictureProfil ms-5 "></div>
        <input class="form-control my-3" type="file" id="picture" name="picture" accept=".png, .jpeg, .jpg, .gif">
        <p class="red">
            <?= $errors['picture'] ?? '' ?>
        </p>
    </div>

    <div>
        <label class="form-label" for="type">Catégorie</label>
        <select class="form-select" id="type" name="type">
            <option selected disabled >Catégorie</option>
            <?php
            foreach ($types as $type) { ?>
                <option value="<?= $type->id_types;?>">
                    <?= $type->type;?>
                </option>
            <?php } ?>
        </select>
        <p class="red">
            <?= $errors['type'] ?? '' ?>
        </p>
    </div>

    <div>
        <button type="submit">Ajouter</button>
    </div>
    <p class="red"><?= isset($saved) ? 'Catégorie enregistrée' : '' ?></p>
</form>