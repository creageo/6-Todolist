<?php
	//SANITIZE
	if(isset ($_POST['tache'])){
		$tache = $_POST['tache'];
		$tachefilter = filter_var($tache, FILTER_SANITIZE_STRING);
		echo $tachefilter;
	} else{
		echo "";
	}
   	// JSON
   $myFile = "todo.json";
   $arr_data = array();

  try
  {
	   $formdata = array(
	      'tache' => $_POST['tache']
	   );

	   $jsondata = file_get_contents($myFile);

	   $arr_data = json_decode($jsondata, true);

	   array_push($arr_data, $formdata);

	   $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
	   
	   if(file_put_contents($myFile, $jsondata)) {
	        echo ' Data successfully saved ';
	    }
	   else 
	        echo " error ";

   }
   catch (Exception $e) {
            echo ' Caught exception: ',  $e->getMessage(), "\n";
   }

?>