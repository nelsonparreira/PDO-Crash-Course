<?php
echo "hello <br>";
	
	$host = 'localhost';
	$user = 'root';
	$pass = 'root';
	$dbname ='pdoposts';
	// set DSN
	$dsn = 'mysql:host='.$host.';dbname='.$dbname;

	// create PDO instance (connections)
	$pdo = new PDO($dsn, $user, $pass);

	//set an attribute this way we do not need to indicate the atribute of fetch each time we need it. Take in mind that this way you "ask" for an object.
	//Used on OPTION 03
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

	/* ****************************************************
			NORMAL WAY TO CONNECT
	*****************************************************/

	#PRDO
	
	//$stmt = $pdo->query('SELECT * FROM posts');

	// OPTION 01 - as an associative array
	//	while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ){
	//		echo $row['title'].'<br>';
	//	}
	
	// OPTION 02 
	//while( $row = $stmt->fetch(PDO::FETCH_OBJ)){
	//		echo $row->title . '<br>';
	//}

	// OPTION 03 - with attribute
	//while( $row = $stmt->fetch()){
	//		echo $row->title . '<br>';
	//}
	
	
	/* ****************************************************
			CONNECT WITH PREPARED STATEMENTS
	*****************************************************/
	
	# prepare & execute
	# separes the instrution from  the actual data
	
	# unsafe way to do it. 
	#$sql = "SELECT * FROM posts WHERE author = '$author'";
	
	// FETCH MULTIPLE POSTS
	
	// user input
	$author = 'Brad';

	//positional parameters
	$sql = "SELECT * FROM posts WHERE author = ?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$author]);
	$posts = $stmt->fetchAll();

	// var_dump($posts);
	foreach ($posts as $post) 
	{
		echo $post->title . '<br>';
	}
