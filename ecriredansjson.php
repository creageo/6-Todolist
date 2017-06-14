<?php

	//sanitization
	$tachesani = filter_var($_POST['tache'], FILTER_SANITIZE_STRING);
	//validation
	if(!empty($tachesani)){
		//safe
		$tableautacheafaire = array(
				"afaire" => $tachesani,
				"faite" => false,
			);
		//rechercher le contenu
		$file = 'todo.json';
		$open_file = file_get_contents($file);
		//transformer le json en array
		$open_file = json_decode($open_file, true);
		//mettre tache dans l'array
		array_push($open_file, $tableautacheafaire);
		//transforme array en code json
		$tacheencode = json_encode($open_file, JSON_PRETTY_PRINT);
		//mettre dans json
		file_put_contents($file, $tacheencode);
} else{
	echo "veiller remplir le formulaire";
}

?>