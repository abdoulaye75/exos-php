<?php
session_start(); // démarre la session
$username = "";
if(isset($_SESSION['username'])) // si la session contient bien la saisie envoyée par le navigateur
{
	$username = $_SESSION['username']; // la session renvoie la saisie au navigateur
}
if(isset($_POST['username']))
{
	$username = $_POST['username']; // si le navigateur perçoit bien la saisie de l'utilisateur
	$_SESSION['username'] = $username; // la session affiche la saisie de l'utilisateur
}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Cookies </title>
	<meta charset="utf-8">
</head>
<body>
	<h1> Bienvenue <?php echo $username; ?> ! </h1>
	<form action="cookie.php" method="post">
		<label for="username"> Nom d'utilisateur : </label> <input type="text" name="username" id="username" value="<?php echo $username; ?>" required> <br> <!-- dans le value, c'est pour que la saisie de l'utilisateur soit conservé dans le champ à remplir -->
		<input type="submit" name="validate" value="valider">
	</form>
</body>
</html>