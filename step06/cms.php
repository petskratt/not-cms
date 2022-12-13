<?php

if ( ! empty( $_POST['filename'] ) && ! empty( $_POST['thecontent'] ) ) {

	save_page( $_POST['filename'], $_POST['thecontent'] );
	header( "Location: ./?page={$_POST['filename']}" );
}

function the_content() {
	$heading = ! empty( $_GET['page'] ) ? $_GET['page'] : '';
	$post    = get_page( $heading );

	if ( empty( $post ) ) {
		return '';
	}

	return "<h1>{$post['heading']}</h1>\n<p>{$post['bodytext']}</p>";
}

function the_pages() {

	$pdo  = db_connect();
	$stmt = $pdo->prepare( 'SELECT heading, bodytext FROM posts ORDER BY heading' );
	$stmt->execute();
	$posts = $stmt->fetchAll();

	foreach ( $posts as $post ) {
		echo "<a href='?page={$post['heading']}'>{$post['heading']}</a> ";
	}
}

function get_page( $heading = '' ) {

	$pdo = db_connect();

	if ( ! empty( $heading ) ) {
		$stmt = $pdo->prepare( 'SELECT heading, bodytext FROM posts WHERE heading like "' . $heading . '"' );
	} else {
		$stmt = $pdo->prepare( 'SELECT heading, bodytext FROM posts ORDER BY timestamp DESC LIMIT 1' );
	}

	$stmt->execute();
	$page = $stmt->fetch();

	return $page;
}

function save_page( $heading, $bodytext ) {

	$pdo  = db_connect();
	$stmt = $pdo->prepare( 'INSERT INTO posts ( heading, bodytext) VALUES(:heading, :bodytext) ON DUPLICATE KEY UPDATE bodytext = :bodytext_u;' );
	$stmt->execute( [ 'heading' => $heading, 'bodytext' => $bodytext, 'bodytext_u' => $bodytext ] );

	return $pdo->lastInsertId();

}

function db_connect() {

	$host    = '127.0.0.1';
	$db      = 'not-cms';
	$charset = 'utf8mb4';

	$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
	$opt = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES   => false,
	];

	try {
		$pdo = new PDO( $dsn, 'root', 'root', $opt );
	} catch ( PDOException $e ) {
		echo 'Opening DB connection failed: ' . $e->getMessage() . PHP_EOL;
		exit( 1 );
	}

	return $pdo;
}