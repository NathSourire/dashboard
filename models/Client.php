<?php 

class Clients{

    private int $id_clients;
    private string $lastname;
    private string $firstname;
    private string $email;
    private DateTime $birthday;
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

    public function get_birthday(): DateTime
    {
        return $this->birthday;
    }
    public function set_birthday(string $birthday)
    {
        $this->birthday = new DateTime($birthday);
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
    public function set_created_at(DateTime $created_at)
    {
        $this->created_at = $created_at;
    }

    public function get_updated_at(): DateTime
    {
        return $this->updated_at;
    }
    public function set_updated_at(DateTime $updated_at)
    {
        $this->updated_at = $updated_at;
    }


}