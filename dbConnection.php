<?php

$DB_HOST = $_ENV["DB_HOST"];
$DB_USER = $_ENV["DB_USER"];
$DB_PASSWORD = $_ENV["DB_PASSWORD"];
$DB_NAME = $_ENV["DB_NAME"];
$DB_PORT = $_ENV["DB_PORT"];
$con = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_PORT) or die("Could not connect to mysql" . mysqli_error($con));
