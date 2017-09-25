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

	//set an attribute this way we do not need to indicate the atribute of fetch each time we need it. Take in mind that this way you "ask" for an object.
	//Used on OPTION 02
//$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

	#PRDO
	
	$stmt = $pdo->query('SELECT * FROM posts');

	// OPTION 01 - as an associative array
//	while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ){
//		echo $row['title'].'<br>';
//	}
	
	// OPTION 02 - with attribute
	while( $row = $stmt->fetch(PDO::FETCH_OBJ)){
			echo $row->title . '<br>';
	}