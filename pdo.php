<?php
	require __DIR__ . '/vendor/autoload.php';

	$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
	$dotenv->load();

	echo '<h2>Using PHP and PDO to perform CRUD operations on mySQL database</h2>' . '<hr />';


	$host = 'localhost';
	$user = 'root';
	$password = $_ENV['DB_PASSWORD'];
	$dbname = 'pdo_contacts';

	// Set Data Source Name (DSN)
	$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

	// Create a PDO instance
	$pdo = new PDO($dsn, $user, $password);
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

	# PDO Query
	$stmt = $pdo->query('SELECT * FROM contacts');

	// Fetching data using a PHP object
	while($row = $stmt->fetch()) {
		echo $row->firstName . '<br>';
	}

	# PREPARED STATEMENTS (prepare & execute)

	// FETCH MULTIPLE POSTS

	// User Input
	$lastName = 'Hawthorne';
	// $id = 3;

	// Position Parameters
	// $sql = 'SELECT * FROM contacts WHERE lastName = ?';
	// $stmt = $pdo->prepare($sql);
	// $stmt->execute([$lastName]);
	// $contacts = $stmt->fetchAll();

	// Named Parameters
	// $sql = 'SELECT * FROM contacts WHERE lastName = :lastName';
	// $stmt = $pdo->prepare($sql);
	// $stmt->execute(['lastName' => $lastName]);
	// $contacts = $stmt->fetchAll();

	// var_dump($posts);
	// foreach($contacts as $contact) {
	// 	echo $contact->phone . '<br>';
	// }

	// Fetch Single Post
	// $sql = 'SELECT * FROM contacts WHERE id = :id';
	// $stmt = $pdo->prepare($sql);
	// $stmt->execute(['id' => $id]);
	// $contacts = $stmt->fetch();
	// echo $contacts->lastName;

	// Get Row Count
	// $stmt = $pdo->prepare('SELECT * from contacts WHERE lastName = ?');
	// $stmt->execute([$lastName]);
	// $contactCount = $stmt->rowCount();

	// echo $contactCount;

	// Insert Data - Possibly coming from a web form
	// $lastName = 'User';
	// $firstName = 'Test';
	// $phone = '3525551111';

	// $sql = 'INSERT INTO contacts(lastName, firstName, phone) VALUES(:lastName, :firstName, :phone)';
	// $stmt = $pdo->prepare($sql);
	// $stmt->execute(['lastName' => $lastName, 'firstName' => $firstName, 'phone' => $phone]);
	// echo 'Contact added';

	// // Update Data
	// $id = 4;
	// $phone = '3525552222';

	// $sql = 'UPDATE contacts SET phone = :phone WHERE id = :id';
	// $stmt = $pdo->prepare($sql);
	// $stmt->execute(['phone' => $phone, 'id' => $id]);
	// echo 'Contact updated';

	// Delete Data
	// $id = 4;

	// $sql = 'DELETE from contacts WHERE id = :id';
	// $stmt = $pdo->prepare($sql);
	// $stmt->execute(['id' => $id]);
	// echo 'Contact deleted';

	// Search Data
	// $search = "%608%";
	// $sql = 'SELECT * FROM contacts WHERE phone LIKE ?';
	// $stmt = $pdo->prepare($sql);
	// $stmt->execute([$search]);
	// $contacts = $stmt->fetchAll();

	// foreach($contacts as $contact) {
	// 	echo $contact->lastName . '<br>';
	// }
?>

