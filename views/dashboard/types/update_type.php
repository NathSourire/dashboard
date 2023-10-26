<h1> Modifier</h1>

<form class="update_type  offset-1 offset-md-3 col-10 col-md-6" method="post">
    <div>
        <label class="form-label" for="type">Le Type</label>
        <input class="form-control" type="text" id="type" name="type" value="<?= isset($typeObj->type) ? htmlspecialchars($typeObj->type) : '' ?>" pattern="<?= REGEX_NAME ?>" require>
        <p class="red">
            <?= $errors['type'] ?? '' ?>
        </p>
    </div>
    <div>
    <button class="btn btn-primary text-light" type="submit">Modifier</button>
    </div>
    <p class="red"><?= isset($saved) ? 'Catégorie modifiée' : '' ?></p>
</form>