<?php
error_reporting(E_ALL);

session_start();
if (!isset($_SESSION['login']) || $_SESSION['login'] != 'ok') {
	$msg = urlencode('Voce não tem permissao!');
	header("location: ../php/entrar.php?retorno=$msg");
	exit;
}
?>