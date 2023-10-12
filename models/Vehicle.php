<?php
require_once __DIR__ . '/../helpers/database.php';



class Vehicle 
{
    private int $id_vehicles;
    private string $brand;
    private string $model;
    private string $registration;
    private int $mileage;
    private ?string $picture;
    private string $created_at;
    private string $updated_at;
    private ?string $deleted_at;
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

    public function get_created_at(): string
    {
        return $this->created_at;
    }

    public function get_updated_at(): string
    {
        return $this->updated_at;
    }

    public function get_deleted_at(): ?string
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
        $this->created_at = $created_at;
    }
    // pour mettre une date en haut dans private string $created_at; on replace par     private DateTime $created_at;
    // public function set_created_at(string $created_at)
    // {
    //     $this->created_at = new DateTime($created_at);
    // }

    public function set_updated_at(string $updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function set_deleted_at(string $deleted_at)
    {
        $this->deleted_at = $deleted_at;
    }
    public function set_id_types(int $id_types)
    {
        $this->id_types = $id_types;
    }

    public function insert()
    {
        $pdo = connect();
        $sql = 'INSERT INTO `vehicles` (  `brand`, `model`, `registration`, `mileage`, `id_types` ) 
            VALUES ( :brand , :model , :registration , :mileage , :id_types) ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':brand', $this->get_brand(), PDO::PARAM_STR);
        $sth->bindValue(':model', $this->get_model(), PDO::PARAM_STR);
        $sth->bindValue(':registration', $this->get_registration(), PDO::PARAM_STR);
        $sth->bindValue(':mileage', $this->get_mileage(), PDO::PARAM_INT);
        $sth->bindValue(':id_types', $this->get_id_types(), PDO::PARAM_INT);
        $result = $sth->execute();
        return $result;
    }

    public static function get_all()
    {
        $pdo = connect();
        $sql = 'SELECT *
        FROM `vehicles`
        INNER JOIN `types` ON `vehicles`.`id_types` = `types`.`id_types`;';
        $sth = $pdo->query($sql);
        $result = $sth->fetchAll();
        return $result;
    }


    public static function get(int $id_vehicles): object
    {
        $pdo = connect();
        $sql = 'SELECT * FROM `vehicles` WHERE `id_vehicles` = :id_vehicles ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_vehicles', $id_vehicles, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_OBJ);
        var_dump($result);
        die;
        return $result;

    }

    public function update(): bool
    {
        $pdo = connect();
        $sql = 'UPDATE `vehicles` SET `brand` = :brand, `model` = :model, `registration` = :registration,
        `mileage` = :mileage, `id_types` = :id_types, `id_vehicles` = :id_vehicles  
        WHERE `id_vehicles` = :id_vehicles ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':brand', $this->get_brand(), PDO::PARAM_STR);
        $sth->bindValue(':model', $this->get_model(), PDO::PARAM_STR);
        $sth->bindValue(':registration', $this->get_registration(), PDO::PARAM_STR);
        $sth->bindValue(':mileage', $this->get_mileage(), PDO::PARAM_INT);
        $sth->bindValue(':id_types', $this->get_id_types(), PDO::PARAM_INT);
        $sth->bindValue(':id_vehicles', $this->get_id_vehicles(), PDO::PARAM_INT);
        return $sth->execute();
    }

    public static function delete(int $id_vehicles): bool
    {
        $pdo = connect();
        $sql = 'DELETE FROM `vehicles` WHERE `id_vehicles` = :id_vehicles ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_vehicles', $id_vehicles, PDO::PARAM_INT);
        $sth->execute();
        return (bool) $sth->rowCount();
    }

}

    // public static function asc(){
    //     $pdo = connect();
    //     $sql = 'SELECT `vehicles`.`brand`, `vehicles`.`model`, `types`.`type`
    //     FROM `vehicles`
    //     INNER JOIN `types` ON `vehicles`.`id_types` = `types`.`id_types`
    //     ORDER BY `vehicles`.`brand`, `vehicles`.`model`, `types`.`type` ASC;';
    //     $sth = $pdo->query($sql);
    //     $vehicles = $sth->fetchAll();
    //     return $vehicles;
    // }
    

    // public static function desc(){
    //     $pdo = connect();
    //     $sql = 'SELECT `vehicles`.`brand`, `vehicles`.`model`, `types`.`type`
    //     FROM `vehicles`
    //     INNER JOIN `types` ON `vehicles`.`id_types` = `types`.`id_types`
    //     ORDER BY `vehicles`.`brand`, `vehicles`.`model`, `types`.`type` DESC;';
    //     $sth = $pdo->query($sql);
    //     $vehicles = $sth->fetchAll();
    //     return $vehicles;
    // }