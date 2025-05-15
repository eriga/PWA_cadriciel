<?php

$env = parse_ini_file(".env");

$host = $env["DB_HOST"] ?? "localhost";
$username = $env["DB_USERNAME"] ?? "root";
$password = $env["DB_PASSWORD"] ?? "";
$dbname = $env["DB_NAME"] ?? "pwa_projet";