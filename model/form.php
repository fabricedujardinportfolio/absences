<?php
$msg = "";
$msgupdate = "";
if(isset($_POST['button-absence']))
      try {
        $msgupdate="";
      if (!empty($_POST)) {
        $id="";
        $dateStart="";
        $dateEnd="";
        $motif="";
        $id = $_POST['button-absence'] ;
        $dateStart = $_POST['date_start'];
        $dateEnd = $_POST['date_end'];
        $motif = $_POST['motif'];
        $motif_int = (int)$motif;
        // Update posts table
        $stmt = $conn->prepare('UPDATE absences_absences SET date_start = ?, date_end = ?, motifs_id = ? WHERE id = ?');
        $stmt->execute([$dateStart, $dateEnd, $motif, $id]);
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
        $Motifs_id = isset($_POST['motifs_id']) ? $_POST['motifs_id'] : '';    
        $Motifs_id_int = (int)$Motifs_id;         
        // Insert value into 
        $stmt = $conn->prepare('INSERT INTO `absences_absences` VALUES ("",?, ?, ?, ?)');
        $stmt->execute([$name_int, $Motifs_id, $Date_start_date, $Date_end_date]);  
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
    <form class="container d-flex" id="form1" action="index.php" method="post">
      <div class="col-8 formulaire m-auto">
      <div class="title row justify-content-center text-center text-uppercase mb-3">
        <div class="col-md-6 pt-5">
          <h2>Formulaire de Saisie</h2>
          <?php if ($msg): ?>
          <p><?=$msg?></p>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-md-12 d-flex justify-content-center text-center">
        <div class="col-md-4">
          <span>
            <input type="text" id="nameUser" name="nameUser" style="display:none;">
          </span>
          <input type="text" class="form-control" placeholder="Nom" aria-label="name" id="name" name="name"
            onkeyup="autocomplet()">
          <span>
            <ul class="text-success fst-italic ps-0 overflow-auto h-50" id="name_list"></ul>
            <ul class="text-success fst-italic ps-0 overflow-auto h-50" id="nameUserListe"></ul>
          </span>
          <!-- <span><ul id="first_name_list"></ul></span> -->
        </div>
      </div>
<div class="col-12 showSubmit" style="display:none">
      <div class="row justify-content-center text-center my-1">
        <div class="col-md-4">
          <div class="col-md-12 d-flex align-items-center">
            <div class="col-md-4">
              <label for="inputLastName" class="form-label m-0 fs-6">DATE DE DÉBUT</label>
            </div>
            <div class="col-md-8">
              <input type="date" id="dayNow" class="form-control" name="date_start"
                value="<?php echo date('Y-m-d' ); ?>" require>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center text-center my-1">
        <div class="col-md-4">
          <div class="col-md-12 d-flex align-items-center ">
            <div class="col-md-4 ">
              <label for="inputLastName" class="form-label m-0">DATE DE FIN</label>
            </div>
            <div class="col-md-8">
              <input type="date" class="form-control" name="date_end" require>
            </div>
          </div>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-4 justify-content-center">
          <div class="input-group mb-3">
            <select class="form-select" id="inputGroupSelect01" name="motifs_id">
              <option selected value="1">Motif...</option>
              <option value="2" >AM</option>
              <option value="3">AT</option>
              <option value="4">CP</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-3 text-center pb-5">
          <button type="submit" name="valider" class="btn btn-primary">VALIDER</button>
        </div>
      </div>
    </div>
    </div>
    </form>
    <!-- ************Table de récap***************** -->
    <?php 
  try {                              
    $pole_service = "pole_service";
    $stmt = $conn->prepare('SELECT pole_service, name,first_name,date_start,date_end,motif,absences_absences.id FROM `absences_absences`,`agents`,`absences_arguments` WHERE  motifs_id=absences_arguments.id AND agents_id=agents.id ORDER BY pole_service=? , name');
    $stmt->execute([$pole_service]);
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
?>
<?php if ($msgupdate): ?>
          <p><?=$msgupdate?></p>
          <?php endif; ?>
    <div class="pole col-3 border border-1 border-dark mt-5 mb-0 text-center" style="background-color:#2e4f9b;color:white;">
      <h3 >Agents Absents</h3>
    </div>  
    <div class="col-12 d-flex p-2 text-uppercase " style="background-color:#2e4f9b;color:white; font-size: 1.2em;">
        <div class="col">Pôle</div>
        <div class="col">Nom</div>
        <div class="col">Prénom</div>
        <div class="col">Date de Début</div>
        <div class="col"> Date de Fin</div>
        <div class="col"> Motifs</div>
        <div class="col text-center">Action</div>
      </div>    
      
      <?php foreach ($posts as $post): ?>
        <form action="" class="border" method="POST">
      <div class="col-12 d-flex pt-2 pb-1">
        <div class="col ps-1"><?=$post['pole_service']?></div>
        <div class="col"><?=$post['name']?></div>
        <div class="col">
          <?=$post['first_name']?>
        </div>
        <div class="col">
          <span class="date_start_reel_<?=$post['id']?>">
            <?=$post['date_start']?>
          </span>
        </div>
        <div class="col">
          <span class="date_end_reel_<?=$post['id']?>">
            <?=$post['date_end']?>
          </span>
        </div>
        <div class="col">
          <span class="motif_reel_<?=$post['id']?>">
            <?=$post['motif']?>
          </span>
        </div>
        <div class="col text-center">
          <div class="button-absence-<?=$post['id']?>">
            <a href="views/delete.php?id=<?=$post['id']?>">
              <button type='button' class='btn btn-sm btn-outline-danger'>suprimer</button>
            </a>
            <!-- <a href="views/update.php?id=<?=$post['id']?>"> -->
            <button type='button' id="button-absence-<?=$post['id']?>" class='btn btn-sm btn-outline-secondary '
              onclick="update('<?=$post['id']?>','<?=$post['motif']?>','<?=$post['date_start']?>','<?=$post['date_end']?>')">Modifier</button>
            <!-- </a> -->
          </div>
          <button type='submit' name="button-absence" value="<?=$post['id']?> "
            id="updateur-<?=$post['id']?>" class="btn btn-sm btn-outline-secondary text-uppercase"
            style="display:none">valider</button>            
        </div>
      </div>
    </form>
      <?php endforeach; ?>

    <?php endif;