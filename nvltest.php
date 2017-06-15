<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
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
</body>
</html>