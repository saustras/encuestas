<?php
$DB_HOST = $_ENV["DB_HOST"];
$DB_USER = $_ENV["DB_USER"];
$DB_PASSWORD = $_ENV["DB_PASSWORD"];
$DB_NAME = $_ENV["DB_NAME"];

$con = new mysqli;
$con->ssl_set(NULL, NULL, "/etc/ssl/certs/ca-certificates.crt", NULL, NULL);
$con->real_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME) or die("Could not connect to mysql" . mysqli_error($con));
var_dump($con);

