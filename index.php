<?php

//si l'utilisateur click sur submit
if(isset($_POST['submit'])){

	//sanitization de la tache
	$tachesani = filter_var($_POST['tache'], FILTER_SANITIZE_STRING);

	//validation de la tache
	if(!empty($tachesani)){

		//dans un tableau je la tache a faire et par defaut elle n'est pas faites
		$tableautacheafaire = array(

			"afaire" => $tachesani,
			"faite" => false,

		);

		//rechercher le contenu
		$file = 'todo.json';

		//obtenir le contenu du fichier $file
		$open_file = file_get_contents($file);

		//transformer le json en array
		$open_file = json_decode($open_file, true);

		//mettre tache a faire dans l'array
		array_push($open_file, $tableautacheafaire);

		//transforme array en code json
		$tacheencode = json_encode($open_file, JSON_PRETTY_PRINT);

		//mettre dans json
		file_put_contents($file, $tacheencode);

	} else{

		echo "veiller remplir le formulaire";

	}

}
	
?>

<!DOCTYPE html>

<html>

<head>

	<meta charset="utf-8">

	<title>Todolist JSON</title>

</head>

<body>

	<h1>Todolist JSON</h1>

	<section>

		<h2>A faire :</h2>

		<form action="" method="POST">

		<?php

			//rechercher le contenu
			$file = 'todo.json';

			//obtenir le contenu du fichier $file
			$open_file = file_get_contents($file);

			//transformer le json en array
			$open_file = json_decode($open_file);

			foreach($open_file as $key => $objets){

		?>

			<label for="<?php echo $key; ?>"><?php echo $objets->afaire; ?></label>

			<input type="checkbox" name="tacheafaire[]" value="<?php echo $objets->afaire; ?>" id="<?php echo $key; ?>">

			<br>

		<?php

			}

		?>
			<br>

			<input type="submit" name="save" class="save" value="save">

		</form>

	</section>

	<section>

		<h2>Archive :</h2>

		<form action="" method="POST">

		<?php

			foreach($_POST['tacheafaire'] as $chkbx){

		?>

			<label for="<?php echo $chkbx; ?>"><?php echo $chkbx; ?></label>

			<input type="checkbox" name="tachefait" value="<?php echo $chkbx; ?>" id="<?php echo $chkbx ?>">

			<br>

		<?php

				}

		?>

		<br>

		<input type="text" name="tache" class="tache">

		<br><br>

		<input type="submit" name="submit" class="submit" value="submit">

		</form>

	</section>

</body>

</html>