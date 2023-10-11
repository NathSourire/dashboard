<?php
require_once __DIR__ . '/../helpers/database.php';


class Type
{

    private string $type;
    private int $id_type;


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

    /**
     * @return [type]
     * fonction qui permet de crée une catégorie
     */
    public function insert()
    {
        $pdo = connect();
        $sql = 'INSERT INTO `types` (`type`) VALUES (:type) ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':type', $this->get_type(), PDO::PARAM_STR);
        $result = $sth->execute();
        return $result;
    }

    /**
     * @return [type]
     * fonction permet de lister les catégorie
     */
    public static function get_all()
    {
        $pdo = connect();
        $sql = 'SELECT * FROM `types`;';
        $sth = $pdo->query($sql);
        $types = $sth->fetchAll();
        return $types;
    }

    /**
     * @param int $id_types
     * 
     * @return object
     * fonction qui permet de recuperer une catégorie précise
     */
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

    /**
     * @return bool
     * fonction qui permet la modification d'une catégorie
     */
    public function update(): bool
    {
        $pdo = connect();
        $sql = 'UPDATE `types` SET `type` = :type WHERE `id_types` = :id_types ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':type', $this->get_type(), PDO::PARAM_STR);
        $sth->bindValue(':id_types', $this->get_id_type(), PDO::PARAM_INT);
        return $sth->execute();
    }

    /**
     * @param int $id_types
     * 
     * @return bool
     * fonction qui permet de suprimer une catégorie
     */
    public static function delete(int $id_types): bool
    {
        $pdo = connect();
        $sql = 'DELETE FROM `types` WHERE `id_types` = :id_types ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_types', $id_types, PDO::PARAM_INT);
        // return $sth->execute();
        $sth->execute();
        // if($nbRows>0){
        //     return true;
        // }else{
        //     return false;
        // } ou 
        // return ($nbRows>0) ? true : false ; ou
        return (bool) $sth->rowCount();
    }

    // fonction qui verifie si le type existe déja
    public static function isExist($type): bool
    {
        $pdo = connect();
        $sql = 'SELECT `type` FROM `types` WHERE `type` = :type ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':type', $type, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetch();
        if($result){
            return true;
        }else {
            return false;
        }
        // ou 
        // return (bool) $result;
    }
}
