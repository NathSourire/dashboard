<?php
require_once __DIR__ . '/../helpers/database.php';

class Rent
{

    private int $id_rents;
    private DateTime $startdate;
    private DateTime $enddate;
    private DateTime $created_at;
    private DateTime $confirmed_at;
    private int $id_vehicles;
    private int $id_clients;

    public function get_id_rents(): int
    {
        return $this->id_rents;
    }
    public function set_id_rents(int $id_rents)
    {
        $this->id_rents = $id_rents;
    }

    public function get_startdate(): DateTime
    {
        return $this->startdate;
    }
    public function set_startdate(DateTime $startdate)
    {
        $this->startdate = $startdate;
    }

    public function get_enddate(): DateTime
    {
        return $this->enddate;
    }
    public function set_enddate(DateTime $enddate)
    {
        $this->enddate = $enddate;
    }

    public function get_created_at(): DateTime
    {
        return $this->created_at;
    }
    public function set_created_at(DateTime $created_at)
    {
        $this->created_at = $created_at;
    }

    public function get_confirmed_at(): DateTime
    {
        return $this->confirmed_at;
    }
    public function set_confirmed_at(DateTime $confirmed_at)
    {
        $this->confirmed_at = $confirmed_at;
    }

    public function get_id_vehicles(): int
    {
        return $this->id_vehicles;
    }
    public function set_id_vehicles(int $id_vehicles)
    {
        $this->id_vehicles = $id_vehicles;
    }

    public function get_id_clients(): int
    {
        return $this->id_clients;
    }
    public function set_id_clients(int $id_clients)
    {
        $this->id_clients = $id_clients;
    }
    //fonction pour ajouter un objet
    public function insert(): bool
    {
        $pdo = connect();
        $sql = 'INSERT INTO `rents` ( `id_rents` , `startdate` , `enddate` , `created_at` , `confirmed_at` , `id_vehicles` , `id_clients` ) 
                VALUES ( :id_rents , :startdate , :enddate , :created_at , :confirmed_at , :id_vehicles , :id_clients ) ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_rents', $this->get_id_rents(), PDO::PARAM_INT);
        $sth->bindValue(':startdate', $this->get_startdate(), PDO::PARAM_STR);
        $sth->bindValue(':enddate', $this->get_enddate(), PDO::PARAM_STR);
        $sth->bindValue(':created_at', $this->get_created_at(), PDO::PARAM_STR);
        $sth->bindValue(':confirmed_at', $this->get_confirmed_at(), PDO::PARAM_STR);
        $sth->bindValue(':id_vehicles', $this->get_id_vehicles(), PDO::PARAM_INT);
        $sth->bindValue(':id_clients', $this->get_id_clients(), PDO::PARAM_INT);
        $sth->execute();
        return (bool) $sth->rowCount();
    }

    public static function get_all(): array
    {
        $pdo = connect();
        $sql = 'SELECT * FROM `rents`
            ORDER BY `id_rents` , `startdate` , `enddate` , `created_at` , `confirmed_at` , `id_vehicles` , `id_clients`;';
        $sth = $pdo->query($sql);
        $rents = $sth->fetchAll();
        return $rents;
    }

    public static function get(int $id_rents): object
    {
        $pdo = connect();
        $sql = 'SELECT * FROM `rents` WHERE `id_rents` = :id_rents ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_rents', $id_rents, PDO::PARAM_INT);
        $sth->execute();
        $rents = $sth->fetch(PDO::FETCH_OBJ);
        return $rents;
    }
}
