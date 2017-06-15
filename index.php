<?php

function pr($array){
	echo '<pre>';
	print_r($array);
	echo '</pre>';
	
}

	//si i a bien submit dans post
	if (isset($_POST['submit'])) {
		//on recupere le code de ecriredansjson.php
		include "ecriredansjson.php";
		//on recupere $open_file = $file; de ecriredansjson.php
		$stockjsondecode = json_decode($tacheencode);
		//pr($stockjsondecode);
		for ($i=0; $i < count($stockjsondecode) ; $i++) { 
		//echo $stockjsondecode[$i]->afaire;
		}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>liste de tache</title>
</head>
<body>

	<section>
		<form>

		<?php
			}
		?>
		<?php

			$file = 'todo.json';
			$open_file = file_get_contents($file);

			$open_file = json_decode($open_file);

			foreach ($open_file as $key => $objets) {

			?>
			<label for="tacheafaire"><?php echo $objets -> afaire; ?></label>
			<input type="checkbox" name="tacheafaire" id="tacheafaire">
			<br>
			<?php
			}

		?>
			<input type="submit" name="save" value="enregistrer">
		</form>
	</section>

	<section>
		
	</section>

	<form action="" method="POST">
		<input type="text" name="tache" class="tache">
		<br>
		<input type="submit" name="submit" class="submit">
	</form>

</body>
</html>