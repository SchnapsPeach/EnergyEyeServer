<?php
	error_reporting(E_ALL);

	if (isset($_POST["api-key"]) && $_POST["api-key"] == "12345678") {
		$samples = $_POST["sample"];

		// connect
		$m = new MongoClient();

		// select a database
		$db = $m->energyEye;

		// select a collection (analogous to a relational database's table)
		$collection = $db->samples;

		// add a record
		for ($i = 0; $i < sizeof($samples); $i++) {
			$collection->update(
				array(
					"time" => $samples[$i]["time"]
				), 
				$samples[$i], 
				array(
					"upsert" => "true"
				)
			);
		}

	}

	echo "<pre>";
	var_dump($_POST);	
	echo "</pre>";

?>
