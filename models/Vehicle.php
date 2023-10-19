<?php
require_once __DIR__ . '/../helpers/database.php';
class Vehicle
{
    private int $id_vehicles;
    private string $brand;
    private string $model;
    private string $registration;
    private int $mileage;
    private ?string $picture = NULL;
    private DateTime $created_at;
    private DateTime $updated_at;
    private ?DateTime $deleted_at;
    private int $id_types;

    public function get_id_vehicles(): int
    {
        return $this->id_vehicles;
    }

    public function get_brand(): string
    {
        return $this->brand;
    }

    public function get_model(): string
    {
        return $this->model;
    }

    public function get_registration(): string
    {
        return $this->registration;
    }

    public function get_picture(): ?string
    {
        return $this->picture;
    }

    public function get_mileage(): int
    {
        return $this->mileage;
    }

    public function get_created_at(): DateTime
    {
        return $this->created_at;
    }

    public function get_updated_at(): DateTime
    {
        return $this->updated_at;
    }

    public function get_deleted_at(): DateTime
    {
        return $this->deleted_at;
    }

    public function get_id_types(): int
    {
        return $this->id_types;
    }

    public function set_id_vehicles(int $id_vehicles)
    {
        $this->id_vehicles = $id_vehicles;
    }

    public function set_brand(string $brand)
    {
        $this->brand = $brand;
    }

    public function set_model(string $model)
    {
        $this->model = $model;
    }

    public function set_registration(string $registration)
    {
        $this->registration = $registration;
    }

    public function set_picture(?string $picture)
    {
        $this->picture = $picture;
    }

    public function set_mileage(int $mileage)
    {
        $this->mileage = $mileage;
    }

    public function set_created_at(string $created_at)
    {
        $this->created_at = new DateTime($created_at);
    }
    // pour mettre une date en haut dans private string $created_at; on replace par     private DateTime $created_at;
    // public function set_created_at(string $created_at)
    // {
    //     $this->created_at = new DateTime($created_at);
    // }

    public function set_updated_at(string $updated_at)
    {
        $this->updated_at = new DateTime($updated_at);
    }

    public function set_deleted_at(string $deleted_at)
    {
        $this->deleted_at = new DateTime($deleted_at);
    }
    public function set_id_types(int $id_types)
    {
        $this->id_types = $id_types;
    }
    //fonction pour ajouter un objet
    public function insert(): bool
    {
        $pdo = connect();
        $sql = 'INSERT INTO `vehicles` (  `brand` , `model` , `registration` , `mileage` , `id_types` , `picture` ) 
            VALUES ( :brand , :model , :registration , :mileage , :id_types , :picture ) ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':brand', $this->get_brand(), PDO::PARAM_STR);
        $sth->bindValue(':model', $this->get_model(), PDO::PARAM_STR);
        $sth->bindValue(':registration', $this->get_registration(), PDO::PARAM_STR);
        $sth->bindValue(':mileage', $this->get_mileage(), PDO::PARAM_INT);
        $sth->bindValue(':id_types', $this->get_id_types(), PDO::PARAM_INT);
        $sth->bindValue(':picture', $this->get_picture(), PDO::PARAM_STR);
        $sth->execute();
        return (bool) $sth->rowCount();
        // ou 
        // $rowCount = $sth->rowCount();
        // if ($rowCount > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
        // ou
        // return ($rowCount >0) ? true : false;
    }

    //fonction qui affiche que si la colonne deleted at et vide on entre 
    // des valeur par default pour que ca ne soit plus obligatoire entre parenthese
    public static function get_all(string $column = "type", string $order = "ASC",$id_types = null): array
    {
        $table = ($column == 'type') ? 'types' : 'vehicles';
        $pdo = connect();

        $sql = $sql = "SELECT *
        FROM `vehicles`
        INNER JOIN `types` ON `vehicles`.`id_types` = `types`.`id_types`
        WHERE `vehicles`.`deleted_at` IS NULL";
        if (!is_null($id_types)) {
            $sql = $sql ." AND `types`.`id_types` = :id_types";
        }
        $sql = $sql ." ORDER by `$table`.`$column` $order";


        $sth = $pdo->prepare($sql);
        if (!is_null($id_types)) {
            $sth->bindValue(':id_types', $id_types, PDO::PARAM_INT);
        }
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }

    // morceau qui remplace la requete 
    // if (is_null($id_types)) {
    //         $sql = "SELECT *
    //         FROM `vehicles`
    //         INNER JOIN `types` ON `vehicles`.`id_types` = `types`.`id_types`
    //         WHERE `vehicles`.`deleted_at` IS NULL
    //         ORDER by `$table`.`$column` $order;";
    // } else {
    //         $sql = "SELECT *
    //         FROM `vehicles`
    //         INNER JOIN `types` ON `vehicles`.`id_types` = `types`.`id_types`
    //         WHERE `vehicles`.`deleted_at` IS NULL AND `types`.`id_types` = :id_types
    //         ORDER by `$table`.`$column` $order;";
    // }


    // fonction qui permet de recuperer une catégorie précise
    public static function get(int $id_vehicles): object
    {
        $pdo = connect();
        $sql = 'SELECT * FROM `vehicles` 
        INNER JOIN `types` ON `vehicles`.`id_types` = `types`.`id_types`
        WHERE `id_vehicles` = :id_vehicles;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_vehicles', $id_vehicles, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();
        return $result;
    }

    //fonction pour modifier
    public function update(): bool
    {
        $pdo = connect();
        $sql = 'UPDATE `vehicles` SET `brand` = :brand, `model` = :model, `registration` = :registration,
        `mileage` = :mileage, `id_types` = :id_types, `id_vehicles` = :id_vehicles, `picture` = :picture  
        WHERE `id_vehicles` = :id_vehicles ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':brand', $this->get_brand(), PDO::PARAM_STR);
        $sth->bindValue(':model', $this->get_model(), PDO::PARAM_STR);
        $sth->bindValue(':registration', $this->get_registration(), PDO::PARAM_STR);
        $sth->bindValue(':mileage', $this->get_mileage(), PDO::PARAM_INT);
        $sth->bindValue(':id_types', $this->get_id_types(), PDO::PARAM_INT);
        $sth->bindValue(':id_vehicles', $this->get_id_vehicles(), PDO::PARAM_INT);
        $sth->bindValue(':picture', $this->get_picture(), PDO::PARAM_STR);
        $sth->execute();
        return (bool) $sth->rowCount();
    }

    // fonction pour supprimer le vehicule
    public static function delete(int $id_vehicles): bool
    {
        $pdo = connect();
        $sql = 'DELETE FROM `vehicles` WHERE `id_vehicles` = :id_vehicles ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_vehicles', $id_vehicles, PDO::PARAM_INT);
        $sth->execute();
        return (bool) $sth->rowCount();
    }

    //fonction pour archiver un véhicule et lui attribué une date
    public static function archived(int $id_vehicles): bool
    {
        $pdo = connect();
        $sql = 'UPDATE `vehicles` SET `deleted_at`= NOW() WHERE `id_vehicles` = :id_vehicles ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_vehicles', $id_vehicles, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public static function get_all_archived(string $order): array
    {
        $pdo = connect();
        $sql = "SELECT *
        FROM `vehicles`
        INNER JOIN `types` ON `vehicles`.`id_types` = `types`.`id_types`
        WHERE `vehicles`.`deleted_at` IS NOT NULL
        ORDER BY `vehicles`.`brand` $order, `vehicles`.`model` $order, `types`.`type` $order ;";
        $sth = $pdo->query($sql);
        // $sth->bindValue(':order', $order);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    //fonction pour archiver un véhicule et lui attribué une date
    public static function restored(int $id_vehicles): bool
    {
        $pdo = connect();
        $sql = 'UPDATE `vehicles` SET `deleted_at`= NULL WHERE `id_vehicles` = :id_vehicles ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_vehicles', $id_vehicles, PDO::PARAM_INT);
        $sth->execute();
        return (bool) $sth->rowCount();
    }
}
