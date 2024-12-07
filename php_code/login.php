<?php
if(session_status() == PHP_SESSION_NONE){
session_start();
}

include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];

if($username == '' || $password == '') {
	$_SESSION['loginError'] = 'Username e password sono obbligatori';
	exit(header( "Location: index.php" ));
}	

$dbconn = pg_connect("host=$dbhost dbname=$dbname user=$dbuser password=$dbpassword");
if (!$dbconn) {
    $_SESSION['loginError'] = 'Errore di connessione al database';
    header("Location: index.php");
    exit();
}
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = pg_query($dbconn, $query);
if (!$result) {
    $_SESSION['loginError'] = 'Errore generico col database';
    header("Location: index.php");
    exit();
}
$redirect = "opinions.php";

//verifica se l'utente esiste
if(pg_num_rows($result) == 0) {
	$_SESSION['loginError'] = 'Username e password non corrispondono';
	$redirect = "index.php";
}

while ($row = pg_fetch_row($result)) {
	$_SESSION['id'] = $row[0];
	$_SESSION['username'] = $row[1];
	$_SESSION['password'] = $row[3];
}

pg_free_result($result);
pg_close($dbconn);
header("Location: $redirect", true);
exit();
?>