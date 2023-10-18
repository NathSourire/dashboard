<h1>Accueil</h1>

<div class="gallery">
    <div class="row row-cols-1 row-cols-md-4 gap-5 d-flex justify-content-center my-5">

        <?php
        foreach ($vehicles as $vehicle) {
        ?>
            <div class="card col">
            <?php if ($vehicle->picture){ ?>
        <img class="img-fluid" src="/public/uploads/vehicles/<?= $vehicle->picture ?>" alt="">
        <?php }else{ ?>
        <img class="img-fluid" src="/public/assets/img/pokemon97.webp" alt="">
        <?php } ?>  
        <!-- <img class="img-fluid" src="/public/uploads/vehicles/<?= ($vehicle->picture == true) ? $vehicle->picture : '/public/assets/img/pokemon97.webp' ?>" alt=""> -->
                <h5 class="card-title my-3">Card title</h5>
                <li><?= 'Catégorie : ' . $vehicle->type  ?></li>
                <li><?= 'Marque : ' . $vehicle->brand ?></li>
                <li><?= 'Model : ' . $vehicle->model ?></li>
                <li><?= 'Immatriculation : ' . $vehicle->registration ?></li>
                <li><?= 'Kilométrage : ' . $vehicle->mileage ?></li> 
            </div>
            <br>
        <?php } ?>


    </div>
</div>