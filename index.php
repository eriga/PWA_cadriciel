<?php

// Démarrage de l'autoloading
require(__DIR__ . "/vendor/autoload.php");

// Démarrage de la session
session_start();

// Affichage des messages d'erreur
$env = parse_ini_file(".env");

$mode = $env["DEBUG_MODE"] == "local" ? true : false;

ini_set("display_errors", $mode);
ini_set("display_startup_errors", $mode);
error_reporting(E_ALL);


// URL à traiter
$path = $_GET["path"] ?? "index";
$path = trim($path, "/");

// Routes
require("routes/web.php");

// Récupérer la méthode et le controller à exécuter
if(isset($routes[$path])){
    $controller = "Controllers\\" . $routes[$path][0];
    $methode = $routes[$path][1];

} else {
    $controller = "\Bases\Controller";
    $methode = "erreur404";
    http_response_code(404);
}

// Exécution de la méthode
$controller = new $controller();
$controller->{$methode}();
