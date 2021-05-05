<?php

// PDO connect *********
function connectfn() {
	return new PDO('mysql:host=localhost;dbname=giep-master-databass', 'root', '58Lj9pqJNHAabK9O', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
	$pdofn = connectfn();
	$keywordfn = '%'.$_POST['keywordfn'].'%';
	$sqlfn = "SELECT * FROM agents WHERE first_name LIKE (:keywordfn) ORDER BY first_name ASC LIMIT 0, 10";
	$queryfn = $pdofn->prepare($sqlfn);
	$queryfn->bindParam(':keywordfn', $keywordfn, PDO::PARAM_STR);
	$queryfn->execute();
	$listfn = $queryfn->fetchAll();
	foreach ($listfn as $rsfn) {
		// put in bold the written text
		$first_name = str_replace($_POST['keywordfn'], '<b>'.$_POST['keywordfn'].'</b>', $rsfn['first_name']." ".$rsfn['name']);
		// add new option
		echo '<li onclick="set_item2(\''.$rsfn['first_name'].'\')">'.$first_name.'</li>';
	}

?>