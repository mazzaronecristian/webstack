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
	$data = array('error' => 'Errore generico col database');
    echo json_encode($data);
	exit();
}

//verifica se l'utente esiste
if(pg_num_rows($result) == 0) {
	$data = array('error' => 'Username e password non corrispondono');
    echo json_encode($data);
	exit();
}

while ($row = pg_fetch_row($result)) {
	$_SESSION['id'] = $row[0];
	$_SESSION['username'] = $row[1];
	$_SESSION['password'] = $row[3];
}

pg_free_result($result);
pg_close($dbconn);
setcookie('ctf_firstStep','6jF7Til6%Sj7rr3X^6PYqdJRXPPzodz22fv7xuWiv');

echo json_encode($result);
exit();
?>