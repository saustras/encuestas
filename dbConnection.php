<?php

  $mysqli = mysqli_init();
  $mysqli->ssl_set(NULL, NULL, "/etc/ssl/certs/ca-certificates.crt", NULL, NULL);
  $con = $mysqli->real_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
  $mysqli->close();
