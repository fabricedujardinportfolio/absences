<?php require '../classes/database.php';
$conn_import = mysqli_connect($db_host, $db_username, $db_password, $db_name);
?>
<?php include("../model/header.php");?>

<?php
  // Connect to database
//   include("db_connect.php");
  // Je vérifie que mon formulaire "import" est bien posté.
  if (isset($_POST["import"])) 
  {
     // Je prépare ma requéte pour vider ma table CSV.
      $sql = "TRUNCATE TABLE `csv`";
      // Je récupère le fichier CSV posté dans le formulaire.
      $fileName = $_FILES["file"]["tmp_name"]; 
       // Je vérifie que mon fichier n'est pas vide.  
      if ($_FILES["file"]["size"] > 0) 
        {
         $file = fopen($fileName, "r");
        // Créer ma variable pour vérifier le nombre de lignes.
        $nb = 0;
        // Créer la variable pour compter les erreurs.
        $error=0;                                    
        // Truncate la table avant l'import.                                     
        if (mysqli_query($conn_import,$sql)==False)
          { // Si le Truncate s'est mal passé, j'affiche l'erreur.                                    
            $sql = mysqli_error($conn_import);
            echo $sql .'<br>';
          } else 
                 {
                  /*********** Variable pour compter le nombre de ligne dans le fichier CSV ************/
                   $fileLines = file($fileName);
                  /************************************************************************************/
                  while (($column = fgetcsv($file, 10000, ";"))!==FALSE) 
                        { // Transformer le format date '27/01/2022' en '2022-01-27' 
                          $jour= substr($column[6],0,2);
                          $mois= substr($column[6],3,2);
                          $anne= substr($column[6],6,4);
                          $date_debut = $anne.'-'.$mois.'-'.$jour;

                          $jour= substr($column[8],0,2);
                          $mois= substr($column[8],3,2);
                          $anne= substr($column[8],6,4);
                          $date_fin = $anne.'-'.$mois.'-'.$jour;
                                                
                          if ($column[7]=="X") {$temoin_deb = 3;}else {$temoin_deb = 2;}
                          if ($column[9]=="X") {$temoin_fin = 3;}else {$temoin_fin = 2;}
                          
                          // Prépare ma  requéte d'insertion
                           $sql = "INSERT into csv ( nom,matricule,bs,qr,date_entree,date_sortie,date_debut,temoin_midi_debut,date_fin,temoin_midi_fin,temoin_prolongation,
                           temoin_gestion,code_motif,motif,raison_absence,temoin_prime_annuelle,lieu_absence,duree_1,duree_2,commentaires)
                             -- addslashes Ajoute des antislashs dans une chaîne
                            values ( '" . addslashes($column[0]) . "', 
                            '" . $column[1] . "',
                            '" . $column[2] . "',
                            '" . $column[3] . "',
                            '" . $column[4] . "',
                            '" . $column[5] . "',
                            '" . $date_debut . "',
                            '" . $temoin_deb . "',
                            '" . $date_fin . "',
                            '" . $temoin_fin . "',
                            '" . $column[10] . "',
                            '" . $column[11] . "',
                            '" . $column[12] . "',
                            '" . $column[13] . "',
                            '" . $column[14] . "',
                            '" . $column[15] . "',
                            '" . $column[16] . "',
                            '" . $column[17] . "',
                            '" . $column[18] . "',
                            '" . $column[19] . "')";
                            // Si requéte OK, je comptabilise l'enregistrement
                             if ($result = mysqli_query($conn_import, $sql))
                                {
                                  $nb=$nb+1;
                                } else 
                                      {// Si pas OK je comptabilise l'erreur
                                       $sql = mysqli_error($conn_import);
                                       echo $sql .'<br>';
                                       $error = $error+1;
                                      }        
                        }
                  ?>                 
                  <!-- Affiche le résultat de notre import dans la table CSV -->
                          <p class= "alert alert-success mx-auto"><strong>1 - </strong><?= $nb.' Lignes insérées dans table temporaire CSV'; ?></p>
                          <p class= "alert alert-success mx-auto"><strong>2 - </strong><?= count($fileLines).' Lignes Totales'; ?></p>
                          <p class= "alert alert-success mx-auto"><strong>3 - </strong><?= $error.' erreurs';?></p>
                
                  <?php                       
                  // Prépare la requéte SELECT csv pour insertion dans table temporaire.
                  $sql = "SELECT * FROM csv";
                  $result = mysqli_query($conn_import, $sql);
                  if (mysqli_num_rows($result) > 0) 
                      { 
                      // Prépare la requéte TRUNCATE avant insertion.
                      $sql = "TRUNCATE TABLE temp_abs";
                      // Truncate la table temp_abs avant l'insertion                                                              
                      if (mysqli_query($conn_import,$sql)!==False) 
                          {
                            echo' <div class="alert alert-success" role="alert">
                                    <p><strong>4 - </strong>Table temporaire vidée.</p>
                                  </div>';                           
                            // Prépare la requéte de jointure pour récupérer l'ID des agents.
                            $sql2 = "   SELECT a.id, a.name AS lastName, a.first_name, a.poles_services_id, c.date_debut, c.temoin_midi_debut, c.date_fin, c.temoin_midi_fin
                                        FROM agents a
                                        LEFT JOIN csv c
                                        ON  c.nom = CONCAT(a.name,', ',a.first_name) 
                                        WHERE a.active = 1 AND c.date_fin >= CURRENT_DATE ";
                            // Execute la requéte de jointure avec l'ID des agents.
                            $result2 = mysqli_query($conn_import, $sql2);                        
                            if ($result2 = mysqli_query($conn_import, $sql2)) 
                                {
                                  foreach ($result2 as $row)
                                  { 
                                  $id= $row['id'];
                                  $lastName= $row['lastName'];
                                  $firstName= $row['first_name'];
                                  $pole= $row['poles_services_id'];
                                  $date_deb= $row['date_debut'];
                                  $crenaux_deb= $row['temoin_midi_debut'];
                                  $date_fin= $row['date_fin'];
                                  $crenaux_fin= $row['temoin_midi_fin'];
                                  // Prépare l'insertion dans ma table temporaire.
                                  $sql3 = "   INSERT INTO temp_abs
                                              VALUES ('". $id ."','". $lastName ."','". $firstName ."','". $pole ."','". $date_deb."','".$crenaux_deb."','".$date_fin."','".$crenaux_fin."')";
                                  if ($result3 = mysqli_query($conn_import, $sql3)==FALSE) 
                                      {
                                        echo mysqli_error($conn_import);
                                        exit;                        
                                      }                      
                                  }
                                  echo'<div class="alert alert-success" role="alert">
                                          <p><strong>5 - </strong>Insertion dans table temporaire OK. </p>
                                      </div>';
                                                                
                                // ******************************************************//
                                // * Table temporaire dans table absence après truncate *//
                                // ******************************************************//
                                
                                $sql4 = "SELECT * FROM temp_abs"; // Prépare la requéte SELECT csv pour insertion dans table temporaire.
                                $result4 = mysqli_query($conn_import,$sql4);
                                if (mysqli_num_rows($result4) > 0) 
                                    {                                                                                     
                                      $sql5 = "TRUNCATE TABLE absences_absences";// Prépare la requéte TRUNCATE avant insertion dans table Absences
                                      if ($result5 = mysqli_query($conn_import, $sql5)!==FALSE)
                                        {
                                        echo '<div class="alert alert-success" role="alert">
                                                <p><strong>6 - </strong>Table absence vidée.</p>
                                              </div>';
                                          
                                        // Prépare la requete pour récupérer les données de la table temporaire pour l'insérer dans la table !absence
                                        $sql2 = " SELECT * FROM temp_abs ";
                                        // Execute ma requéte de jointure avec l'ID des agents.
                                        if ($result2 = mysqli_query($conn_import, $sql2)) 
                                            {
                                              foreach ($result2 as $row)
                                                  { 
                                                   $date_deb = $row['date_deb'];
                                                   $date_fin = $row['date_fin'];
                                                   $temoin_deb = $row['crenaux_deb'];
                                                   $temoin_fin = $row['crenaux_fin'];
                                                   $idAgent = $row['id'];
                                                   $poleId = $row['pole'];
                                                   // Prépare l'insertion dans ma table Absences.
                                                   $sql3 = "  INSERT INTO absences_absences
                                                              VALUES (' ','". $date_deb ."','". $date_fin ."','". $temoin_deb ."','". $temoin_fin ."','". $idAgent."','".$poleId."')";
                                                   if ($result3 = mysqli_query($conn_import, $sql3)==FALSE) 
                                                      {
                                                        echo mysqli_error($conn_import);
                                                        exit;                        
                                                      } 
                                                  }                                                                               
                                            echo '<div class="alert alert-success" role="alert">
                                                    <p><strong>7 - </strong>Insertion dans table absences OK. </p>
                                                  </div>';
                                            
                                            } else 
                                                {
                                                 echo mysqli_error($conn_import); // Erreur sur select jointure
                                                }

                                        } 
                                          else 
                                            { // erreur sur truncate abscence
                                            $result5 = mysqli_error($conn_import);
                                            echo $result5 .'<br>';
                                            }
                                   } else
                                       {
                                       $result4 = mysqli_error($conn_import); // Si erreur de SELECT de ma table temp_abs.
                                       echo $result4;
                                       exit;
                                       }

                                                                            
                                } else 
                                    { // Erreur sur requete de jointure
                                    $result2 = mysqli_error($conn_import);
                                    echo $result2 .'<br>';
                                    } 
                          } 
                              else
                                 { //erreur sur tps_abs truncate
                                 $sql = mysqli_error($conn_import);
                                 echo $sql .'<br>';
                                 }                                    
                      }
                      else 
                          {
                           $result = mysqli_error($conn_import); // Si erreur de SELECT de ma table CSV.
                           echo $result;
                           exit;
                          }
                }                                                             
        } else 
            {
            echo' <div class="alert alert-danger text-center" role="alert">
                    Le fichier est vide
                  </div>';
            }
  }   // Si le formulaire import n'a pas été posté
  else 
    {
    echo'<div class="alert alert-danger text-center" role="alert">
            Importer le fichier en premier
          </div> ';
    }                                                                                                            
 ?>
  <form class='text-center'>
    <a type="button" class="btn btn-outline-secondary" value = "Retour" href="../">RETOUR</a> 
  </form