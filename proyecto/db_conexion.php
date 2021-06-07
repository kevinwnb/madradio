<?php
$link = new mysqli('localhost', 'root', '', 'madradio', 3306);

if ($link->connect_errno) {
    printf("Unable to connect to database: <br> %s", $dbLink->connect_error);
    exit();
}

if (!$link) {
    die("Connection failed" . $dbLink->error());
}
