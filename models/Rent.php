<?php 

class Rents{

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

}