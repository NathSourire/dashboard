<h1> Lister / Modifier / Supprimer</h1>

<a href="/controllers/dashboard/types/create_type_ctrl.php">Ajouter une catégorie</a>

<div class="container">
    <div class="row">
        <table class="table">
            <thead>
                <th>Id</th>
                <th>Catégories</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </thead>
            <tbody>
                <?php
                foreach ($types as $type) {
                ?>
                    <tr>
                        <td><?= $type->id_types ?></td>
                        <td> <?= $type->type; ?> </td>
                        <td><a href="/controllers/dashboard/types/update_type_ctrl.php?id_types=<?= $type->id_types ?>">
                            <img src="/public/assets/img/btnwrite.png" alt="stylo">
                            </a>
                        </td>
                        <td><a href="/controllers/dashboard/types/delete_type_ctrl.php?id_types=<?= $type->id_types ?>">
                            <img src="/public/assets/img/btndelet.png" alt="poubelle">
                            </a>
                        </td>
                    </tr>
                <?php
                } ?>
            </tbody>
        </table>
        <p>
            <?php 
            if($delete == '1'){
                echo 'Catégorie bien supprimée';
            }else if($delete === '0'){
                echo 'suppression échouée';
            }
            ?>
        </p>
    </div>
</div>