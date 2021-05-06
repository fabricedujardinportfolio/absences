<?php

// PDO connect *********
function connect() {
    return new PDO('mysql:host=localhost;dbname=giep-master-databass', 'root', '58Lj9pqJNHAabK9O', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();
$keyword = '%'.$_POST['keyword'].'%';
$sql = "SELECT * FROM agents WHERE name LIKE (:keyword) ORDER BY name ASC LIMIT 0, 10";
$query = $pdo->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();
foreach ($list as $rs) {
	// put in bold the written text
	$name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['name']." ".$rs['first_name']);
	// add new option
    echo '<li class="border" style="list-style-type: none;" onclick="set_item(\''.$rs['name']." ".$rs['first_name'].'\');set_name(\''.$rs['id'].'\')">'.$name.'</li> ';
}
$pdofn = connect();
	$keyword = '%'.$_POST['keyword'].'%';
	$sqlfn = "SELECT * FROM agents WHERE first_name LIKE (:keyword) ORDER BY first_name ASC LIMIT 0, 10";
	$queryfn = $pdofn->prepare($sqlfn);
	$queryfn->bindParam(':keyword', $keyword, PDO::PARAM_STR);
	$queryfn->execute();
	$listfn = $queryfn->fetchAll();
	foreach ($listfn as $rsfn) {
		// put in bold the written text
		$first_name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rsfn['first_name']." ".$rsfn['name']);
		// add new option
		echo '<li class="border" style="list-style-type: none;" onclick="set_item(\''.$rsfn['first_name']." ".$rsfn['name'].'\');set_name(\''.$rsfn['id'].'\')">'.$first_name.'</li>';
	}

?>