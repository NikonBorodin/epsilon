<?php
session_start();
require_once 'vendor/autoload.php';

$client_id = 'KV7Sry0IfZ5XqyfwF1elgrDuh9sH1Y2vjGwmS2wB';
$client_secret = 'aUP2fkIcWfsunGnUjBRL9oAUftugrSZcIs9YU692';
$id = (int) $_GET['id'];

$auth = new Acme\Auth( $_SESSION, $client_id, $client_secret );
$auth->handle();

?><!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<style>
h1 { margin: 1em 0; }
</style>
</head>
<body>

<?php
if ( ! $id ) {
	include 'tpl/main.php';
} else {
	include 'tpl/service.php';
}
?>

</body>
</html>