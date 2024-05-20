<?php

namespace Bases;

class Model
{
    private static $pdo = null;
    protected $table = null;

    /**
     * Retourne la connexion
     *
     * @return PDO
     */
    protected function pdo()
    {
        if(self::$pdo == null){
            $env = parse_ini_file(".env");            

            $hote = $env["HOST"];
            $username = $env["USERNAME"];
            $password = $env["PASSWORD"];
            $nom_bdd = $env["DB_NAME"];

            // Options de connexion
            $options = [
                \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ
            ];

            // Connexion
            self::$pdo = new \PDO(
                "mysql:host=$hote;dbname=$nom_bdd", 
                $username, 
                $password,
                $options
            );
        }

        return self::$pdo;
    }

    /**
     * Retourne toutes les entrées, false si aucun résultat
     *
     * @return array|false
     */
    public function tout() {
        $sql = "SELECT *
                FROM $this->table";

        $requete = self::pdo()->prepare($sql);

        $requete->execute();

        return $requete->fetchAll();
    }

    /**
     * Retourne une entrée en fonction d'un id
     *
     * @param integer $id L'id ciblé
     * @return object|false
     */
    public function parId(int $id) : object|false
    {
        $sql = "SELECT *
                FROM $this->table
                WHERE id = :id";

        $requete = self::pdo()->prepare($sql);

        $requete->execute([
            ":id" => $id
        ]);

        return $requete->fetch();
    }
}
