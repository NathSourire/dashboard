<?php
require_once __DIR__ . '/../config/constants.php';

class Database
{
    private static $pdo;

    public static function connect()
    {
        if (self::$pdo == null) {
            try {
                self::$pdo = new PDO(DSN, USER, PASSWORD);
                //On définit le mode d'erreur de PDO sur Exception
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                // die ('Connexion réussie');
            }
            // On capture les exceptions si une exception est lancée et on affiche
            // les informations relatives à celle-ci
            catch (PDOException $e) {
                die("Erreur : " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
    

    
}
