<h1>Accueil</h1>

<form id="searchForm" class="d-flex" enctype="multipart/form-data" method="get">
    <label class="form-label " for="type"></label>
    <select class="form-select me-2" id="type" name="type">
        <option value="0">Toutes les Catégories</option>
        <?php
        foreach ($types as $type) { ?>
            <!-- ternaire permettant la recupe du select -->
            <?php $isSelected = ($id_types == $type->id_types) ? 'selected' : ''; ?>
            <option value="<?= $type->id_types; ?>" <?= $isSelected ?>>
                <?= $type->type; ?>
            </option>
        <?php } ?>
    </select>
    <input class="form-control me-2" type="search" placeholder="recherche" aria-label="Search" id="searchall" name="searchall" value="<?= $searchall ?>">
    <p class="red">
        <?= $errors['type'] ?? '' ?>
    </p>
</form>

<div class="row row-cols-1 row-cols-md-3 my-5">
    <?php
    foreach ($vehicles as $vehicle) {
    ?>
        <div>
            <a href="/controllers/sheet_vehicle_ctrl.php?id_vehicles=<?= $vehicle->id_vehicles ?>">
                <div class="card border-3 border-warning bg-primary justify-content-center h-100 text-warning col">
                    <?php if ($vehicle->picture) { ?>
                        <img class="img-fluid" src="/public/uploads/vehicles/<?= $vehicle->picture ?>" alt="<?= $vehicle->brand ?>">
                    <?php } else { ?>
                        <img class="img-fluid" src="/public/assets/img/pokemon97.webp" alt="Groupe de pokemon">
                    <?php } ?>
                    <!-- <img class="img-fluid" src="/public/uploads/vehicles/<?= ($vehicle->picture == true) ? $vehicle->picture : '/public/assets/img/pokemon97.webp' ?>" alt=""> -->
                    <h5 class="card-title my-3 d-flex justify-content-center "><?= $vehicle->id_vehicles ?></h5>
                    <li class="d-flex justify-content-around"><?= 'Catégorie : ' . $vehicle->type  ?></li>
                    <li class="d-flex justify-content-around"><?= 'Marque : ' . $vehicle->brand ?></li>
                    <li class="d-flex justify-content-around"><?= 'Model : ' . $vehicle->model ?></li>
                    <li class="d-flex justify-content-around"><?= 'Immatriculation : ' . $vehicle->registration ?></li>
                    <li class="d-flex justify-content-around"><?= 'Kilométrage : ' . $vehicle->mileage ?></li>
                </div>
            </a>
        </div>
    <?php } ?>
</div>

<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" aria-label="Previous">précedente</a>
        </li>
        <?php for ($currentPage = 1; $currentPage <= $nbPages; $currentPage++) {
            $active = ($currentPage == $page) ? 'active' : "" ?>
        <li class="page-item <?php $active ?>"><a class="page-link" href="?type=$id_type&searchall=<?= $searchall ?>&page=<?= $currentPage ?>"><?= $currentPage ?></a></li>
        <?php } ?>
        <li class="page-item">
            <a class="page-link" aria-label="Next">Suivante</a>
        </li>
    </ul>
</nav>
