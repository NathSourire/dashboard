<h1> Lister / Mofier / Supprimer</h1>

<a href="/controllers/dashboard/types/list_type_ctrl.php">Ajouter une catégorie</a>
<div class="row ">
    <table class="ms-5">
        <thead>
            <th>Catégories</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </thead>
        <tbody>
            <?php
            foreach ($types as $type) {
            ?>
                <tr>
                    <td> <?= $type->type; ?> </td>
                    <td><button class="btn " type="button">
                            <img src="/public/assets/img/btnwrite.png" alt="stylo">
                        </button></td>
                    <td><button class="btn " type="button">
                            <img src="/public/assets/img/btndelet.png" alt="poubelle">
                        </button></td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>
</div>