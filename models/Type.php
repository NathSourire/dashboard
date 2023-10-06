<?php 
require_once __DIR__. '/../helpers/database.php';


class Type{

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
        return $this->type;
    }

    /**
     * @param string $type
     * @return [type]
     */
    public function set_type(string $type)
    {
        $this->type = $type;
    }

    public function set_id_type(int $type)
    {
        $this->type = $type;
    }

    public function insert(){
    $pdo = connect();
    $sql = 'INSERT INTO `types` (`type`) VALUES (:type) ;';
    $sth = $pdo->prepare($sql);
    $sth->bindValue(':type', $this->get_type(), PDO::PARAM_STR);
    $result = $sth->execute();
    return $result;
    }

    public static function get_all(){
    $pdo = connect();
    $sql = 'SELECT * FROM `types`;';
    $sth = $pdo->query($sql);
    $types = $sth->fetchAll();
    return $types;
    }
    
}

