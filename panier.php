<?php

session_start(); // démarre la session


if (isset($_GET['produit'])) { // si un produit a été sélectionné par l'utilisateur. Le GET['produit'] => choix de l'utilisateur
	if (!isset($_SESSION['panier'])) {
		$_SESSION['panier'] = array(); // si le panier n'existe pas dans la session, on l'initialise avec un tableau vide
	}
	$_SESSION['panier'][] = $_GET['produit']; // une autre façon d'ajouter un élément dans un tableau
}

if (isset($_GET['supprimer'])) { // si l'utilisateur clique sur "Supprimer cet article du panier"
	array_splice($_SESSION['panier'], $_GET['supprimer'], 1); /* dans le tableau panier, la fonction array_splice
	supprime le $_GET['supprimer'] qui correspond à l'article à supprimer */
}

if (isset($_GET['vider'])) { // si l'utilisateur clique sur "Vider entièrement le panier"
		unset($_SESSION['panier']); // on détruit le tableau $_SESSION['panier'] à l'aide de la fonction unset()
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title> Panier </title>
</head>
<body>

	<h1> Bienvenue dans votre panier ! </h1>

	<a href="index.php"> Retour à l'accueil </a> <br> <br>



	<ul>
	<?php
	// si le panier existe dans la session, on le parcourt et on affiche le choix de l'utilisateur (sans l'extension .php)

	if (isset($_SESSION['panier'])) {
		foreach ($_SESSION['panier'] as $key => $article) {
			$choix = basename($article, ".php");
			echo '<li>'.$choix.'<a href="panier.php?supprimer='.$key.'"> Supprimer cet article du panier </a>
			<form action="panier.php" method="post"> <input type="number" name="quantity" min="1" max="5" placeholder="quantité voulue">
			<input type="submit" value="Valider la quantité"> </form> </li> <br>';
			}
			echo '<a href="panier.php?vider='.$_SESSION['panier'].'"> Vider entièrement le panier </a> <br>';
	}

	?>

	</ul>

	<?php
		$quantity = $_POST['quantity'];
		echo htmlspecialchars($quantity);
	?>

</body>
</html>	