<?php
$host = 'db';
$port = 5432;
$dbname = 'mydatabase';
$user = 'myuser';
$password = 'mypassword';

try {
	$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";
	$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
	echo "Connessione riuscita!";
} catch (PDOException $e) {
	die("Errore nella connessione: " . $e->getMessage());
}
?>

