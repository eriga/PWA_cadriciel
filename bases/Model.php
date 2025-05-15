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

    /**
     * Insère une nouvelle entrée
     *
     * @param array $cols   Noms des colonnes de la table
     * @param array $vals   Valeurs à insérer
     * 
     * @return bool
     */
    public function insert($cols, $vals) {
        $colonnes = implode(",", $cols);
        $placeholders = ":" . implode(",:", $cols);

        $sql = "INSERT INTO $this->table ($colonnes)
                VALUES ($placeholders)";

        $requete = $this->bdd()->prepare($sql);

        $params = array_combine($cols, $vals);

        return $requete->execute($params);
    }

    /** 
     * Modifier une entrée existante
     *
     * @param integer $id   Id de l'entrée à modifier
     * @param array $cols   Noms des colonnes de la table
     * @param array $vals   Valeurs à insérer
     * 
     * @return bool
     */
    public function update($id, $cols, $vals) {
        
        $sets = "";

        foreach($cols as $index => $col){
            $sets .= $col . "=:" . $col;

            if($index != count($cols) - 1){
                $sets .= ",";
            }
        }
        
        $sql = "UPDATE $this->table 
                SET $sets
                WHERE id = :id";

        $requete = $this->bdd()->prepare($sql);

        $params = array_combine($cols, $vals);
        $params = array_merge($params, [":id" => $id]);

        return $requete->execute($params);
    }

    /**
     * Supprime une entrée spécifique dans le modèle
     *
     * @param int $id
     * @return bool
     */
    public function destroy($id){
        $sql = "DELETE FROM $this->table
                WHERE id = :id";

        $requete = $this->bdd()->prepare($sql);

        return $requete->execute([
            ":id" => $id
        ]);
    }
}
