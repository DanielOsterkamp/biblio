<?php
error_reporting(E_ALL);

session_start();
if (!isset($_SESSION['nome'])) {
	$msg = urlencode('Voce não tem permissao!');
    header("Location: Home.php?retorno=$msg");
	exit;
}
?>
