<?php
$msg = "";
$msgupdate = "";
if(isset($_POST['button-absence']))
      try {
        // var_dump($_POST);
        $msgupdate="";
      if (!empty($_POST)) {
        $id="";
        $dateStart="";
        $dateEnd="";
        $motif= $_POST['motif'];
        $id = $_POST['button-absence'] ;
        $date = $_POST['date_start'];
        $dateStart = date('Y-m-d', strtotime($date));
        // var_dump($dateStart);
        $dateEnd = $_POST['date_end'];
        $dateEndUpdate = date('Y-m-d', strtotime($dateEnd));
        // var_dump($dateEndUpdate);
        // $motif = $_POST['motif'];
        $motif_int = (int)$motif;
        // var_dump($motif_int);
        // Update posts table
        $stmt = $conn->prepare('UPDATE absences_absences SET date_start = ?, date_end = ?, motifs_id = ? WHERE id = ?');
        $stmt->execute([$dateStart, $dateEndUpdate,$motif_int, $id]);
        // $teste = header('refresh:2; index.php');
        $msgupdate = '<spans class="alert alert-success" role="alert">Mis à jour avec succés!</span>';
        header("refresh:2; index.php");
      }
        else{
        //  test
        }
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
      else {
        // echo"";
      }
?>
<?php 
if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false):
    ?>
<?php
        header("refresh:0; views/login.php");
    else: 
?>

<div class="container">
  <!-- ************Formulaire de saisi***************** -->
  <?php
    if(isset($_POST['valider']))
 try {        
    $msg = '';
        $Name = isset($_POST['nameUser']) ? $_POST['nameUser'] : '';
        $name_int = (int)$Name;
        $Date_start = isset($_POST['date_start']) ? $_POST['date_start'] : '';
        $Date_start_date = date($Date_start);
        $Date_end = isset($_POST['date_end']) ? $_POST['date_end'] : '';
        $Date_end_date = date($Date_end);
        $Motifs_id_start = isset($_POST['idmotif_start']) ? $_POST['idmotif_start'] : '';    
        $Motifs_id_int_start = (int)$Motifs_id_start;     
        $Motifs_id_end = isset($_POST['idmotif_end']) ? $_POST['idmotif_end'] : '';    
        $Motifs_id_int_end = (int)$Motifs_id_end;   
        // Insert value into 
        $stmt = $conn->prepare('INSERT INTO `absences_absences` VALUES ("",?, ?, ?, ?, ?)');
        $stmt->execute([$Date_start_date,$Date_end_date,$name_int,$Motifs_id_int_start,$Motifs_id_int_end]);  
    $msg = '<div class="alert alert-success" role="alert">
    Créer avec succès!
  </div>';
  header("refresh:2; index.php");
}catch(PDOException $e) {
  echo "
  <div class='alert alert-warning text-center' role='alert'>
  <strong>Utiliser un des utilisateurs que vous proposent l'auto-complétions du tableau.</strong>
  </div>
  " ;
    // echo "Error: " . $e->getMessage();
}
else {
  // echo"test";
}

?>
  <form class="container " id="form1" action="index.php" method="post">
    <div class="col-6 formulaire m-auto ">
      <div class="title col-md-12 text-center text-uppercase mb-3">
        <div class="col-md-6 pt-5">
        </div>
      </div>
      <div class="col-md-12   text-center">
        <div class="col-md-12">
          <span>
            <input type="text" id="nameUser" name="nameUser" style="display:none;">
          </span>
          <input type="text" class="form-control" placeholder="Saisir le prénom de l'agent" aria-label="name" id="name"
            name="name" onkeyup="autocomplet()" autocomplete="off" onclick="datnow();">
          <span>
            <ul class="text-success fst-italic ps-0 overflow-auto h-50 text-start"
              style="cursor: pointer; display: none;" id="name_list">
              <li class="border bg-white" style="list-style-type: none;" onclick="set_item();set_name()"></li>
              <li class="border bg-white" style="list-style-type: none;" onclick="set_item();set_name()"></li>
            </ul>
          </span>
          <!-- <span><ul id="first_name_list"></ul></span> -->
        </div>

      </div>
      <div class="col-12 showSubmit" style="display:none">

        <div class=" my-1">
          <div class="col-md-12">
            <div class="col-md-12  align-items-center d-md-flex">
              <div class="col-md-4 p-2 rounded mb-1 mb-md-0" style="background-color:#2e4f9b; color:white">
                <label for="inputLastName" class="form-label m-0 fs-6">DÉBUT DE L'ABSENCE</label>
              </div>


              <div class="col-md-4">
                <input type="date" id="dayNow" class="form-control" name="date_start" onclick="datnow();" value="" require="">

              </div>
              <div class="col-md-4">
                <div class="input-group ">
                <select class="form-select" id="inputGroupSelect01" name="idmotif_start">
                    <option selected="" value="1">Journée</option>
                    <option  value="2">Matin</option>
                    <option  value="3">Après-midi </option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="my-1">
          <div class="col-md-12">
            <div class="col-md-12  align-items-center d-md-flex">
              <div class="col-md-4 p-2 rounded mb-1 mb-md-0" style="background-color:#2e4f9b; color:white">
                <label for="inputLastName" class="form-label m-0">FIN DE L'ABSENCE</label>
              </div>
              <div class="col-md-4">
                <input type="date" class="form-control" name="date_end" width="100%" require="">
              </div>
              <div class="col-md-4">
                <div class="input-group ">
                <select class="form-select" id="inputGroupSelect01" name="idmotif_end">
                    <option selected="" value="1">Journée</option>
                    <option  value="2">Matin</option>
                    <option  value="3">Après-midi </option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class=" ">
          <div class="col-md-12">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mt-3 text-center pb-5">
            <button type="submit" name="valider" class="btn btn-primary"
              style="background-color:#2e4f9b">VALIDER</button>
          </div>
        </div>
      </div>
    </div>
  </form> <!-- ************Table de récap***************** -->
  <?php 
  try {                              
    $pole_service = "pole_service";
    $stmt = $conn->prepare('SELECT pole_service, name,first_name,DATE_FORMAT(date_start, "%d-%m-%Y") AS `date_start`,DATE_FORMAT(date_end, "%d-%m-%Y") AS `date_end`,motif_start,motif_end,absences_absences.id FROM `absences_absences`,`agents`,`absences_motif_start`,`absences_motif_end` WHERE motif_start_id= absences_motif_start.idmotif_start AND motif_end_id= absences_motif_end.idmotif_end AND agents_id=agents.id AND CURRENT_DATE <= date_end ORDER BY pole_service=? , name');
    $stmt->execute([$pole_service]);
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
?>
  <?php if ($msgupdate): ?>
  <p><?=$msgupdate?></p>
  <?php endif; ?>
  <div class="pole col-md-5 border border-1 border-dark rounded-top mt-5 mb-0 text-center"
    style="background-color:#2e4f9b;color:white;">
    <h3>Liste des agents absents du GIEP-NC</h3>
  </div>
  <div class="col-12 d-md-flex d-none p-2 text-uppercase text-center"
    style="background-color:#2e4f9b;color:white; font-size: 1.2em;">
    <div class="col-md-1 "> Pôle </div>
    <div class="col-md-1 "> Nom </div>
    <div class="col-md-2 "> Prénom </div>
    <div class="col-md-2 "> Début de l'absence </div>
    <div class="col-md-1  "> De...</div>
    <div class="col-md-1  "> A...</div>
    <div class="col-md-2 "> Fin de l'absence </div>
    <div class="col-md-2  text-center">Action</div>
  </div>

  <?php foreach ($posts as $post): ?>
  <form action="" class="border" method="POST">
    <div class="col-md-12  d-flex pt-1 pb-1">

      <div class="col-6 col-md-10 d-md-flex text-center">

        <div class="col-md-1 col-12 ps-md-1 fw-bold text-uppercase">
          <?=$post['pole_service']?>
        </div>
        <div class="col-md-2 col-12">
          <?=$post['name']?>
        </div>
        <div class="col-md-2 text-start px-4 col-12">
          <?=$post['first_name']?>
        </div>
        <div class="col-md-2 col-12">
          <span class="date_start_reel_<?=$post['id']?>">
            <?=$post['date_start']?>
          </span>
        </div>

        <div class="col-md-1 col-12 ps-5">après-midi
          <!-- <span class="motif_start_<?=$post['id']?>">
            <?=$post['motif']?>
          </span> -->
        </div>
        <div class="col-md-1 col-12 ps-5">matin
          <!-- <span class="motif_end_<?=$post['id']?>">
            <?=$post['motif']?>
          </span> -->
        </div>



        <div class="col-md-3 col-12 text-end pe-3">
          <span class="date_end_reel_<?=$post['id']?>">
            <?=$post['date_end']?>
          </span>
        </div>


      </div>

      <div class="col-md-2 col-6 ">

        <div class="col-md-2 col-12 text-center pt-5 pt-md-0 m-auto">
          <div class="button-absence-<?=$post['id']?> d-md-flex" id="button-absence-<?=$post['id']?>">
            <a class="btn-<?=$post['id']?>" href="views/delete.php?id=<?=$post['id']?>">
              <button type='button' class='btn btn-sm btn-outline-danger'>Supprimer</button>
            </a>
            <a class="btn-<?=$post['id']?>" href="#">
              <button type='button' id="button-absence-<?=$post['id']?>" class='btn btn-sm btn-outline-secondary '
                onclick="update('<?=$post['id']?>','<?=$post['motif']?>','<?=$post['date_start']?>','<?=$post['date_end']?>')">Modifier</button>
            </a>
          </div>
          <button type='submit' name="button-absence" value="<?=$post['id']?> " id="updateur-<?=$post['id']?>"
            class="btn btn-sm btn-outline-secondary text-uppercase " style="display:none">valider</button>
        </div>
      </div>

    </div>
  </form>
  <?php endforeach; ?>

  <?php endif;