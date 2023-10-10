<?php
require_once __DIR__ . '/../helpers/database.php';


class Type
{

    private string $type;
    private int $id_type;

    // /**
    //  * @param string $type
    //  */
    // public function __construct(string $type)
    // {
    //     $this->setType($type);
    // }

    /**
     * @return string
     */
    public function get_type(): string
    {
        return $this->type;
    }

    public function get_id_type(): int
    {
        return $this->id_type;
    }

    /**
     * @param string $type
     * @return [type]
     */
    public function set_type(string $type)
    {
        $this->type = $type;
    }

    public function set_id_type(int $id_type)
    {
        $this->id_type = $id_type;
    }

    public function insert()
    {
        $pdo = connect();
        $sql = 'INSERT INTO `types` (`type`) VALUES (:type) ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':type', $this->get_type(), PDO::PARAM_STR);
        $result = $sth->execute();
        return $result;
    }

    public static function get_all()
    {
        $pdo = connect();
        $sql = 'SELECT * FROM `types`;';
        $sth = $pdo->query($sql);
        $types = $sth->fetchAll();
        return $types;
    }

    public static function get(int $id_types): object
    {
        $pdo = connect();
        $sql = 'SELECT * FROM `types` WHERE `id_types` = :id_types ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_types', $id_types, PDO::PARAM_INT);
        $sth->execute();
        $type = $sth->fetch(PDO::FETCH_OBJ);
        return $type;
    }

    public function update(): bool
    {
        $pdo = connect();
        $sql = 'UPDATE `types` SET `type` = :type WHERE `id_types` = :id_types ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':type', $this->get_type(), PDO::PARAM_STR);
        $sth->bindValue(':id_types', $this->get_id_type(), PDO::PARAM_INT);
        return $sth->execute();
    }

    public static function delete(int $id_types): bool
    {
        $pdo = connect();
        $sql = 'DELETE FROM `types` WHERE `id_types` = :id_types ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_types', $id_types, PDO::PARAM_INT);
        return $sth->execute();
    }

    public function isExist(){
        $pdo = connect();

    }

}
