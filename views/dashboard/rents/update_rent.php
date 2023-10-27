<div class="row">
    <form class=" offset-1 offset-md-2 col-10 col-md-8" id="rentForm" enctype="multipart/form-data" method="post">
        <div>
            <label class="form-label" for="lastname">Nom *</label>
            <input class="form-control form-control-lg " type="text" id="lastname" 
            value="<?= isset($rentObj->lastname) ? htmlspecialchars($rentObj->lastname) : '' ?>" 
            name="lastname" autocomplete="family-name" pattern="<?= REGEX_NAME ?>" required>
            <p class="red">
                <?= $errors['lastname'] ?? '' ?>
            </p>
        </div>

        <div>
            <label class="form-label" for="firstname">Prénom *</label>
            <input class="form-control form-control-lg " type="text" id="firstname" 
            value="<?= isset($rentObj->firstname) ? htmlspecialchars($rentObj->firstname) : '' ?>" 
            name="firstname" autocomplete="given-name" pattern="<?= REGEX_NAME ?>" required>
            <p class="red">
                <?= $errors['firstname'] ?? '' ?>
            </p>
        </div>

        <div>
            <label class="form-label" for="birthday">Date de naissance *</label>
            <input class="form-control form-control-lg " type="date" id="birthday" 
            value="<?= isset($rentObj->birthday) ? htmlspecialchars($rentObj->birthday) : '' ?>" 
            name="birthday" max="<?= $dateNow ?>" required>
            <p class="red">
                <?= $errors['birthday'] ?? '' ?>
            </p>
        </div>

        <div>
            <label class="form-label" for="zipcode">Code postal *</label>
            <input class="form-control form-control-lg " maxlength="5" type="text" 
            value="<?= isset($rentObj->zipcode) ? htmlspecialchars($rentObj->zipcode) : '' ?>" 
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
            <input class="form-control form-control-lg " type="text" name="phone" id="phone" 
            value="<?= isset($rentObj->phone) ? htmlspecialchars($rentObj->phone) : '' ?>" 
            maxlength="10" autocomplete="tel" pattern="<?= REGEX_TEL ?>">
            <p class="red">
                <?= $errors['phone'] ?? '' ?>
            </p>
        </div>

        <div>
            <label class="form-label" for="email">E-mail *</label>
            <input class="form-control form-control-lg " type="email" id="email" 
            value="<?= isset($rentObj->email) ? htmlspecialchars($rentObj->email) : '' ?>" 
            autocomplete="email" name="email" required>
            <p class="red">
                <?= $errors['email'] ?? '' ?>
            </p>
        </div>

        <h6 class="my-3">Date de location du véhicule *</h6>
        <div class="d-flex">
            <label class="form-label" for="startdate"></label>
            <input class="form-control form-control-lg" type="date" id="startdate"
            value="<?= isset($rentObj->startdate) ? htmlspecialchars($rentObj->stardate) : '' ?>" 
            min="<?= $dateNow ?>" name="startdate"  required>
            <!-- <label class="form-label" for="rentHeureStart"></label>
            <select class="form-select form-select-lg" name="rentHeureStart" id="rentHeureStart"> 
                <option selected disabled>Heures</option>
                <?php foreach (HOURS as $key => $value) { ?>
                    <option><?= $value ?></option>
                <?php } ?>
            </select>
            <label class="form-label" for="rentMinStart"></label>
            <select class="form-select form-select-lg" name="rentMinStart" id="rentMinStart">
                <option selected disabled>Minutes</option>
                <?php foreach (MINUTES as $key => $value) { ?>
                    <option><?= $value ?></option>
                <?php } ?>
            </select> -->
            <p class="red">
                <?= $errors['stardate'] ?? '' ?>
            </p>
        </div>

        <h6 class="my-3">Date de restitution du véhicule *</h6>
        <div class="d-flex">
            <label class="form-label" for="enddate"></label>
            <input class="form-control form-control-lg " type="date" id="enddate" 
            name="enddate" value="<?= isset($rentObj->enddate) ? htmlspecialchars($rentObj->enddate) : '' ?>" min="<?= $dateNow ?>"  required>
            <!-- <label class="form-label" for="rentHeureEnd"></label>
            <select class="form-select form-select-lg" name="rentHeureEnd" id="rentHeureEnd">
                <option selected disabled value="<?= isset($rentObj->rentHeureEnd) ? htmlspecialchars($rentObj->rentHeureEnd) : '' ?>">Heures</option>
                <?php foreach (HOURS as $key => $value) { ?>
                    <option><?= $value ?></option>
                <?php } ?>
            </select>
            <label class="form-label" for="rentMinEnd"></label>
            <select class="form-select form-select-lg" name="rentMinEnd" id="rentMinEnd">
                <option selected disabled value="<?= isset($rentObj->rentMinEnd) ? htmlspecialchars($rentObj->rentMinEnd) : '' ?>">Minutes</option>
                <?php foreach (MINUTES as $key => $value) { ?>
                    <option><?= $value ?></option>
                <?php } ?>
            </select> -->
            <p class="red">
                <?= $errors['enddate'] ?? '' ?>
            </p>
        </div>
        <div class="d-flex justify-content-center "><button class="btn btn-primary text-ligth " type="submit">Modifier !</button></div>
    </form>
</div>

<script src="/public/assets/js/city.js"></script>