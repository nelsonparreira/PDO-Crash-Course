<?php
echo "hello";
	
	$host = 'localhost';
	$user = 'root';
	$pass = 'root';
	$dbname ='pdoposts';
	// set DSN
	 $dsn = 'mysql:host='.$host.';dbname='.$dbname;

	// create PDO instance (connections)
	$pdo = new PDO($dsn, $user, $pass);

	#PRDO
	
	$stmt = $pdo->query('SELECT * FROM posts');

	//as an associative array
	while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ){
		echo $row['title'].'<br>';
	}
	