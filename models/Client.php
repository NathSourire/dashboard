<?php
require_once  __DIR__ . '/../helpers/database.php';

class Client
{

    private int $id_clients;
    private string $lastname;
    private string $firstname;
    private string $email;
    private string $birthday;
    private string $phone;
    private string $city;
    private string $zipcode;
    private DateTime $created_at;
    private DateTime $updated_at;

    public function get_id_clients(): int
    {
        return $this->id_clients;
    }
    public function set_id_clients(int $id_clients)
    {
        $this->id_clients = $id_clients;
    }

    public function get_lastname(): string
    {
        return $this->lastname;
    }
    public function set_lastname(string $lastname)
    {
        $this->lastname = $lastname;
    }

    public function get_firstname(): string
    {
        return $this->firstname;
    }
    public function set_firstname(string $firstname)
    {
        $this->firstname = $firstname;
    }

    public function get_email(): string
    {
        return $this->email;
    }
    public function set_email(string $email)
    {
        $this->email = $email;
    }

    public function get_birthday(): string
    {
        return $this->birthday;
    }
    public function set_birthday(string $birthday)
    {
        $this->birthday = $birthday;
    }

    public function get_phone(): string
    {
        return $this->phone;
    }
    public function set_phone(string $phone)
    {
        $this->phone = $phone;
    }

    public function get_city(): string
    {
        return $this->city;
    }
    public function set_city(string $city)
    {
        $this->city = $city;
    }

    public function get_zipcode(): string
    {
        return $this->zipcode;
    }
    public function set_zipcode(string $zipcode)
    {
        $this->zipcode = $zipcode;
    }

    public function get_created_at(): DateTime
    {
        return $this->created_at;
    }
    public function set_created_at(string $created_at)
    {
        $this->created_at = new DateTime($created_at);
    }

    public function get_updated_at(): DateTime
    {
        return $this->updated_at;
    }
    public function set_updated_at(string $updated_at)
    {
        $this->updated_at = new DateTime($updated_at);
    }



    //fonction pour ajouter un objet
    public function insert(): int
    {
        $pdo = connect();
        $sql = 'INSERT INTO `clients` ( `lastname` , `firstname` , `email` , `birthday` , `phone` , `city` , `zipcode`) 
                VALUES ( :lastname , :firstname , :email , :birthday, :phone , :city , :zipcode) ;';
        
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':lastname', $this->get_lastname(), PDO::PARAM_STR);
        $sth->bindValue(':firstname', $this->get_firstname(), PDO::PARAM_STR);
        $sth->bindValue(':email', $this->get_email(), PDO::PARAM_STR);
        $sth->bindValue(':birthday', $this->get_birthday(), PDO::PARAM_STR);
        $sth->bindValue(':phone', $this->get_phone(), PDO::PARAM_STR);
        $sth->bindValue(':city', $this->get_city(), PDO::PARAM_STR);
        $sth->bindValue(':zipcode', $this->get_zipcode(), PDO::PARAM_STR);
        $sth->execute();

        $lastInsertedId = $pdo->lastInsertId();
        
        return (int) $lastInsertedId;
    }

    public static function get_all(): array
    {
        $pdo = connect();
        $sql = 'SELECT * FROM `clients`
            ORDER BY `id_clients` , `lastname` , `firstname` , `email` , `birthday` , `phone` , `city` , `zipcode` , `created_at` , `updated_at`;';
        $sth = $pdo->query($sql);
        $clients = $sth->fetchAll();
        return $clients;
    }

    public static function get(int $id_clients): object
    {
        $pdo = connect();
        $sql = 'SELECT * FROM `clients` WHERE `id_clients` = :id_clients ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_clients', $id_clients, PDO::PARAM_INT);
        $sth->execute();
        $clients = $sth->fetch(PDO::FETCH_OBJ);
        return $clients;
    }
}
    // //fonction pour archiver un véhicule et lui attribué une date
    // public static function archived(int $id_vehicles): bool
    // {
    //     $pdo = connect();
    //     $sql = 'UPDATE `vehicles` SET `deleted_at`= NOW() WHERE `id_vehicles` = :id_vehicles ;';
    //     $sth = $pdo->prepare($sql);
    //     $sth->bindValue(':id_vehicles', $id_vehicles, PDO::PARAM_INT);
    //     $sth->execute();
    //     $result = $sth->fetch();
    //     if ($result) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }