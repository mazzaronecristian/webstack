<?php

$dbhost = 'db';
$port = 5432;
$dbname = 'mydatabase';
$dbuser = 'myuser';
$dbpassword = 'mypassword';

    $dbconn = pg_connect("host=$dbhost dbname=$dbname user=$dbuser password=$dbpassword")  
        or die('Could not connect: ' . pg_last_error());
    $query = "SELECT * FROM opinions";
    $result = pg_query($query) or die('Error message: ' . pg_last_error());

    while ($row = pg_fetch_row($result)) {
    var_dump($row);
    }

    pg_free_result($result);
    pg_close($dbconn);

?>