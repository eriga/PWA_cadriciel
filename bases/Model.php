<?php

namespace Bases;

use PDO;

class Model
{
    private static $bdd = null;
    protected $table = null;

    /**
     * Retourne la connexion
     *
     * @return PDO
     */
    protected function bdd()
    {
        if(self::$bdd == null){
            $env = parse_ini_file(".env");            

            $hote = $env["HOST"];
            $username = $env["USERNAME"];
            $password = $env["PASSWORD"];
            $nom_bdd = $env["DB_NAME"];

            // Options de connexion
            $options = [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ];

            // Connexion
            self::$bdd = new PDO(
                "mysql:host=$hote;dbname=$nom_bdd", 
                $username, 
                $password,
                $options
            );
        }

        return self::$bdd;
    }

    /**
     * Retourne toutes les entrées, false si aucun résultat
     *
     * @return array|false
     */
    public function all() {
        $sql = "SELECT *
                FROM $this->table";

        $requete = $this->bdd()->prepare($sql);

        $requete->execute();

        return $requete->fetchAll();
    }

    /**
     * Retourne une entrée en fonction d'un id
     *
     * @param integer $id L'id ciblé
     * @return object|false
     */
    public function find($id)
    {
        $sql = "SELECT *
                FROM $this->table
                WHERE id = :id";

        $requete = $this->bdd()->prepare($sql);

        $requete->execute([
            ":id" => $id
        ]);

        return $requete->fetch();
    }
}
