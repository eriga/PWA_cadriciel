<?php

/************
 * CE CONTRÔLEUR PEUT ÊTRE SUPPRIMÉ
 */

namespace Controllers;

use Bases\Controller;

class DefautController extends Controller {
    /**
     * Affiche la page d'accueil temporaire
     */
    public function index() {
        $this->view("welcome");
    }
}