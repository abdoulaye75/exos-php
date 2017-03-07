<!DOCTYPE html>
<html>
<head>
	<title> Mini-boutique </title>
	<meta charset="utf-8">
</head>
<body>
	<h1> Mini-boutique </h1>

	<main> <!-- on reprend la structure du blog pour lister des produits (ce qu'on veut) pour une mini-boutique en ligne -->
		<ul>
			<?php
				$dir = "../boutique"; // le répertoire courant
				$products = scandir($dir, SCANDIR_SORT_NONE); // pas besoin de trier selon un ordre, d'où le SCANDIR_SORT_NONE
				$products = array_diff($products, array(".", "..","index.php", "chaussures.jpeg", "sac.jpeg", "kettleball.jpeg")); /* correspond aux fichiers et aux images que j'ai choisi personnellement*/

				foreach ($products as $product) {
					echo '<li><a href="index.php?dossier='. $product .' "> '. $product .' </a> </li>'; /* une boucle foreach pour lister tous les fichiers du répertoire courant */
				}

				include "../boutique/" . $_GET['dossier']; // affiche le contenu du fichier sur lequel on a cliqué
			 ?>
		</ul>
	</main>

</body>
</html>