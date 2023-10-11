<h1> Modifier</h1>

<form class="update_type" method="post">
    <div>
        <label ></label>
        <input>
        <p class="red">
            <?= $errors['type'] ?? '' ?>
        </p>
    </div>
    <div>
        <button type="submit">Modifier</button>
    </div>
    <!-- <p class="red"><?= isset($saved) ? 'Catégorie enregistrée' : '' ?></p> -->
</form>