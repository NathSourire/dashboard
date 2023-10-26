
<div class="row">
    <form class=" offset-1 offset-md-2 col-10 col-md-8" id="rentForm" enctype="multipart/form-data" method="post">
        <div>
            <label class="form-label" for="lastname">Nom *</label>
            <input class="form-control form-control-lg " type="text" id="lastname" 
            value="<?= isset($rentObj->lastname) ? htmlspecialchars($rentObj->lastname) : '' ?>"
            name="lastname" autocomplete="family-name" pattern="<?= REGEX_NAME ?>" required >
            <p class="red">
                <?= $errors['lastname'] ?? '' ?>
            </p>
        </div>

        <div>
            <label class="form-label" for="firstname">Prénom *</label>
            <input class="form-control form-control-lg " type="text" id="firstname" 
            value="<?= isset($rentObj->firstname) ? htmlspecialchars($rentObj->firstname) : '' ?>"
            name="firstname" autocomplete="given-name" pattern="<?= REGEX_NAME ?>" required >
            <p class="red">
                <?= $errors['firstname'] ?? '' ?>
            </p>
        </div>

        <div>
            <label class="form-label" for="birthday">Date de naissance *</label>
            <input class="form-control form-control-lg " type="date" id="birthday" 
            value="<?= isset($rentObj->birthday) ? htmlspecialchars($rentObj->birthday) : '' ?>"
            name="birthday" max="<?= $dateNow ?>" required  >
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
                <option selected >Ville</option>
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

        <div>
            <label class="form-label" for="stardate">Date de location du véhicule *</label>
            <input class="form-control form-control-lg " type="texte" id="stardate" 
            value="<?= isset($rentObj->startdate) ? htmlspecialchars($rentObj->startdate) : '' ?>"
            name="stardate" required>
            <p class="red">
                <?= $errors['stardate'] ?? '' ?>
            </p>
        </div>

        <div>
            <label class="form-label" for="enddate">Date de restitution du véhicule *</label>
            <input class="form-control form-control-lg " type="texte" id="enddate" 
            value="<?= isset($rentObj->enddate) ? htmlspecialchars($rentObj->enddate) : '' ?>"
            name="enddate" required>
            <p class="red">
                <?= $errors['enddate'] ?? '' ?>
            </p>
        </div>
        <div class="d-flex justify-content-center "><button class="btn btn-primary text-ligth " type="submit">Modifier !</button></div>
    </form>
</div>

<script src="/public/assets/js/city.js"></script>