<h1>Location</h1>

<a href="/controllers/home_ctrl.php">Retour à la liste de véhicules</a>

<div class="d-flex justify-content-center ">
    <div class="row card border-3 border-warning bg-primary text-warning text-center m-3">
        <div class="col imgsheet">
            <h5>Récapitulatif du véhicule</h5>
            <?php if ($vehicle->picture) { ?>
                <img class="img-fluid my-3" src="/public/uploads/vehicles/<?= $vehicle->picture ?>" alt="<?= $vehicle->brand ?>">
            <?php } else { ?>
                <img class="img-fluid my-3" src="/public/assets/img/pokemon97.webp" alt="Groupe de pokemon">
            <?php } ?>
        </div>
        <li><?= ' Catégorie : ' . $vehicle->type  ?></li>
        <li><?= ' Marque : ' . $vehicle->brand ?></li>
        <li><?= ' Model : ' . $vehicle->model ?></li>
        <li><?= ' Immatriculation : ' . $vehicle->registration ?></li>
        <li><?= ' Kilométrage : ' . $vehicle->mileage ?></li>
        <!-- <li class="d-flex justify-content-around"><?= ' Date de création ' . date("d/m/Y H:i", strtotime($vehicle->created_at)) ?></li>
            <li class="d-flex justify-content-around"><?= ' Date de modification ' . date("d/m/Y H:i", strtotime($vehicle->updated_at)) ?></li> -->
    </div>
</div>

<div class="row">
    <form class=" offset-1 offset-md-2 col-10 col-md-8" id="rentForm" enctype="multipart/form-data" method="post">
        <div>
            <label class="form-label" for="lastname">Nom *</label>
            <input class="form-control form-control-lg " type="text" id="lastname" value=""
            name="lastname" autocomplete="family-name" pattern="<?= REGEX_NAME ?>" required>
            <p class="red">
                <?= $errors['lastname'] ?? '' ?>
            </p>
        </div>

        <div>
            <label class="form-label" for="firstname">Prénom *</label>
            <input class="form-control form-control-lg " type="text" id="firstname" value=""
            name="firstname" autocomplete="given-name" pattern="<?= REGEX_NAME ?>" required>
            <p class="red">
                <?= $errors['firstname'] ?? '' ?>
            </p>
        </div>

        <div>
            <label class="form-label" for="birthday">Date de naissance *</label>
            <input class="form-control form-control-lg " type="date" id="birthday" 
            name="birthday" max="<?= $dateNow ?>" required>
            <p class="red">
                <?= $errors['birthday'] ?? '' ?>
            </p>
        </div>

        <div>
            <label class="form-label" for="zipcode">Code postal *</label>
            <input class="form-control form-control-lg " maxlength="5" type="text" 
            placeholder="Entrez un code postal" name="zipcode" id="zipcode">
            <p class="red">
                <?= $errors['zipcode'] ?? '' ?>
            </p>
        </div>

        <div>
            <label class="form-label" for="city">ville *</label>
            <select class="form-select form-select-lg " name="city" id="city">
                <option selected>Ville</option>
            </select>
            <p class="red">
                <?= $errors['city'] ?? '' ?>
            </p>
        </div>

        <div>
            <label class="form-label" for="phone">Numéro de téléphone *</label>
            <input class="form-control form-control-lg " type="text" name="phone" id="phone" value=""
            maxlength="10" autocomplete="tel" pattern="<?= REGEX_TEL ?>">
            <p class="red">
                <?= $errors['phone'] ?? '' ?>
            </p>
        </div>

        <div>
            <label class="form-label" for="email">E-mail *</label>
            <input class="form-control form-control-lg " type="email" id="email" value=""
            autocomplete="email" name="email" required>
            <p class="red">
                <?= $errors['email'] ?? '' ?>
            </p>
        </div>
        <h6 class="my-3">Date de location du véhicule *</h6>
        <div class="d-flex">
            <label class="form-label" for="startdate"></label>
            <input class="form-control form-control-lg " type="date" id="startdate" name="startdate" min="<?= $dateNow ?>" required>
            <label class="form-label" for="rentHeureStart"></label>
            <select class="form-select form-select-lg"  name="rentHeureStart" id="rentHeureStart">
                <option selected disabled value="">Heures</option>
                <?php foreach (HOURS as $key => $value) { ?>
                    <option><?= $value ?></option>
                <?php } ?>
            </select>
            <label class="form-label" for="rentMinStart"></label>
            <select class="form-select form-select-lg"  name="rentMinStart" id="rentMinStart">
                <option selected disabled value="">Minutes</option>
                <?php foreach (MINUTES as $key => $value) { ?>
                    <option><?= $value ?></option>
                <?php } ?>
            </select>
            <p class="red">
                <?= $errors['stardate'] ?? '' ?>
            </p>
        </div>
        <h6 class="my-3">Date de restitution du véhicule *</h6>
        <div class="d-flex">
            <label class="form-label" for="enddate"></label>
            <input class="form-control form-control-lg " type="date" id="enddate" name="enddate" min="<?= $dateNow ?>" required>
            <label class="form-label" for="rentHeureEnd"></label>
            <select class="form-select form-select-lg"  name="rentHeureEnd" id="rentHeureEnd">
                <option selected disabled value="">Heures</option>
                <?php foreach (HOURS as $key => $value) { ?>
                    <option><?= $value ?></option>
                <?php } ?>
            </select>
            <label class="form-label" for="rentMinEnd"></label>
            <select class="form-select form-select-lg"  name="rentMinEnd" id="rentMinEnd">
                <option selected disabled value="">Minutes</option>
                <?php foreach (MINUTES as $key => $value) { ?>
                    <option><?= $value ?></option>
                <?php } ?>
            </select>
            <p class="red">
                <?= $errors['enddate'] ?? '' ?>
            </p>
        </div>
        <div class="d-flex justify-content-center "><button class="btn btn-primary text-warning " type="submit">Envoyer !</button></div>
    </form>
</div>

<script src="/public/assets/js/city.js"></script>