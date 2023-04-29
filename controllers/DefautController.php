<?php

namespace Controller;

use Base\Controller;

class DefautController extends Controller {
    public function index() {
        include("views/index.view.php");
    }
}