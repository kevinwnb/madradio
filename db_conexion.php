<?php
$dbLink = new mysqli('localhost', 'root', '', 'madradio', 3306);

if ($dbLink->connect_errno) {
    printf("Unable to connect to database: <br> %s", $dbLink->connect_error);
    exit();
}

if (!$dbLink) {
    die("Connection failed" . $dbLink->error());
}
