<h1> Créer /Ajouter</h1>

<a href="/controllers/dashboard/types/list_type_ctrl.php ">Liste des véhicules</a>

<form enctype="multipart/form-data" method="post">
    <div>
        <label class="form-label" for="type">Le Type</label>
        <input class="form-control" type="text" id="type" name="type" pattern="<?= REGEX_NAME ?>" require>
        <p class="red">
            <?= $errors['type'] ?? '' ?>
        </p>
    </div>
    <div>
        <button type="submit">Ajouter</button>
    </div>
<p class="red"><?= isset($saved) ? 'Catégorie enregistrée' : '' ?></p>
</form>