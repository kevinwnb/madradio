<?php
//$link = new mysqli('localhost', 'root', '', 'madradio', 3306);
$link = new mysqli('un0jueuv2mam78uv.cbetxkdyhwsb.us-east-1.rds.amazonaws.com', 'nxwng95hxusgguse', 'euwzk5j82aeayyyq', 'gvyo62mui9wq1klo', 3306);

if ($link->connect_errno) {
    printf("Unable to connect to database: <br> %s", $dbLink->connect_error);
    exit();
}

if (!$link) {
    die("Connection failed" . $dbLink->error());
}
