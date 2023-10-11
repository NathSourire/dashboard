<?php
require_once __DIR__ . '/../helpers/database.php';


class Vehicle
{
    private int $id_vehicle;
    private string $brand;
    private string $model;
    private string $registration;
    private int $mileage;
    private string $picture;
    private string $created_at;
    private string $updated_at;
    private string $deleted_at;

    public function get_id_vehicle(): int
    {
        return $this->id_vehicle;
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

    public function get_picture(): string
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

    public function get_deleted_at(): string
    {
        return $this->deleted_at;
    }


    public function set_id_vehicle(int $id_vehicle)
    {
        $this->id_vehicle = $id_vehicle;
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

    public function set_picture(string $picture)
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

    public function set_updated_at(string $updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function set_deleted_at(string $deleted_at)
    {
        $this->deleted_at = $deleted_at;
    }

    public function insert()
    {
        $pdo = connect();
        $sql = 'INSERT INTO `vehicles` ( `id_vehicle`, `brand`, `model`, `registration`, `mileage`, `picture` ) 
            VALUES (:id_vehicle , :brand , :model , :registration , :mileage , :picture) ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_vehicle', $this->get_id_vehicle(), PDO::PARAM_INT);
        $sth->bindValue(':brand', $this->get_brand(), PDO::PARAM_STR);
        $sth->bindValue(':model', $this->get_model(), PDO::PARAM_STR);
        $sth->bindValue(':registration', $this->get_registration(), PDO::PARAM_STR);
        $sth->bindValue(':mileage', $this->get_mileage(), PDO::PARAM_INT);
        $sth->bindValue(':picture', $this->get_picture(), PDO::PARAM_STR);
        $result = $sth->execute();
        return $result;
        var_dump($result);
    }




}
