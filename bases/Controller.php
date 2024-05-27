<?php

namespace Bases;

class Controller {
    /**
     * Prend en charge les routes inexistantes et affiche une erreur 404
     * 
     * @return void
     */
    public function erreur404() {
        $this->vue("erreurs/404", [
            "titre" => "Page introuvable"
        ]);
    }

    /**
     * Redirige à l'URL fourni
     *
     * @param string $url
     * @return void
     */
    protected function rediriger($url) {
        header("location: $url");
        exit();
    }

    /**
     * Inclut la vue spécifiée
     *
     * @param string $chemin
     * @param array $donnees
     * @return void
     */
    protected function vue($chemin, $donnees = []){
        extract($donnees);
        include("views/$chemin.view.php");
    }
}