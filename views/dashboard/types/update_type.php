<h1> Modifier</h1>

<form class="update_type" method="post">
    <div>
        <label class="form-label" for="type">Le Type</label>
        <input class="form-control" type="text" id="type" name="type" value="<?= isset($typeObj->type) ? htmlspecialchars($typeObj->type) : '' ?>" pattern="<?= REGEX_NAME ?>" require>
        <p class="red">
            <?= $errors['type'] ?? '' ?>
        </p>
    </div>
    <div>
        <button type="submit">Modifier</button>
    </div>
    <p class="red"><?= isset($saved) ? 'Catégorie enregistrée' : '' ?></p>
</form>