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

<div class="row row-cols-1 row-cols-md-3  m-1 my-5">
    <?php
    foreach ($totalVehicles as $vehicle) {
    ?>
        <div class="accueilimg py-3">
            <a href="/controllers/sheet_vehicle_ctrl.php?id_vehicles=<?= $vehicle->id_vehicles ?>">
                <div class="card border-3 border-warning bg-primary d-flex align-items-center  text-center h-100 text-warning col">
                    <?php if ($vehicle->picture) { ?>
                        <img class="img-fluid " src="/public/uploads/vehicles/<?= $vehicle->picture ?>" alt="<?= $vehicle->brand ?>">
                    <?php } else { ?>
                        <img class="img-fluid" src="/public/assets/img/pokemon97.webp" alt="Groupe de pokemon">
                    <?php } ?>
                    <!-- <img class="img-fluid" src="/public/uploads/vehicles/<?= ($vehicle->picture == true) ? $vehicle->picture : '/public/assets/img/pokemon97.webp' ?>" alt=""> -->
                    <h4 class="card-title my-3"><?= $vehicle->name_vehicle ?></h4>
                    <ul>
                        <li><?= 'Catégorie : ' . $vehicle->type  ?></li>
                        <li><?= 'Marque : ' . $vehicle->brand ?></li>
                        <li><?= 'Model : ' . $vehicle->model ?></li>
                        <li><?= 'Immatriculation : ' . $vehicle->registration ?></li>
                        <li><?= 'Kilométrage : ' . $vehicle->mileage ?></li>
                    </ul>
                </div>
            </a>
        </div>
    <?php } ?>
</div>

<!-- <nav class="d-flex justify-content-center" aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
            <a class="page-link" aria-label="Previous" href="?type=<?= $id_type ?>&searchall=<?= $searchall ?>&page=<?= ($page > 1) ? $page - 1 : 1 ?>">précédente</a>
        </li>
        <?php for ($currentPage = 1; $currentPage <= $nbPages; $currentPage++) {
            $active = ($currentPage == $page) ? 'active' : "";
        ?>
            <li class="page-item <?= $active ?>"><a class="page-link" href="?type=<?= $id_type ?>&searchall=<?= $searchall ?>&page=<?= $currentPage ?>"><?= $currentPage ?></a></li>
        <?php } ?>
        <li class="page-item <?php echo ($page >= $nbPages) ? 'disabled' : ''; ?>">
            <a class="page-link" aria-label="Next" href="?type=<?= $id_type ?>&searchall=<?= $searchall ?>&page=<?= ($page < $nbPages) ? $page + 1 : $page ?>">suivante</a>
        </li>
    </ul>
</nav> -->
<?php
