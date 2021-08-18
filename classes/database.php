<?php
$db_host = "localhost";
$db_username = "root";
$db_password = "58Lj9pqJNHAabK9O";
$db_name="giep-master-databass-test-2";	//database name

try {
    $conn = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_username, $db_password);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<!--ok-->";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
?>

<?php

class Databases
{
//Nos constantes
const DB_HOST = 'mysql:host=localhost;dbname=giep-master-databass-test-2;';
const DB_USER = 'root';
const DB_PASS = '58Lj9pqJNHAabK9O';

private $connection;

private function checkConnection()
{
    //Vérifie si la connexion est nulle et fait appel à getConnection()
    if($this->connection === null) {
        return $this->getConnection();
    }
    //Si la connexion existe, elle est renvoyée, inutile de refaire une connexion
    return $this->connection;
}

    //Méthode de connexion à notre base de données
public function getConnection(){
    //Tentative de connexion à la base de données
    try{
        $this->connection = new PDO(self::DB_HOST, self::DB_USER, self::DB_PASS);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //On renvoie un message avec le mot-clé return
        // return 'Connexion OK';
        //On renvoie la connexion
        return $this->connection;
    }
    //On lève une erreur si la connexion échoue
    catch(Exception $errorconn){
        die ('Erreur de connection :'.$errorconn->getMessage());
    }

}
protected function createQuery($sql, $parameters = null)
    {
        if($parameters)
        {
            $result = $this->checkConnection()->prepare($sql);
            // $result->setFetchMode(PDO::FETCH_CLASS, Post::class);
            $result->execute($parameters);
            return $result;
        }
        $result = $this->checkConnection()->query($sql);
        // $result->setFetchMode(PDO::FETCH_CLASS,  Post::class);
        return $result;
    }

}