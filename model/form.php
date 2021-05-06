<?php 
if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false):
    ?>
<div class="alert alert-danger">
  <strong><?php echo "LOGIN FIRST"; ?></strong>
</div>
<?php
        header("refresh:2; views/login.php");
    else: 
?>

<!-- SCRIPT ICI -->
<script type="text/javascript" src="public/js/jquery.min.js"></script>
<script type="text/javascript" src="public/js/script.js"></script>
</head>

<body>
  <div class="container">
    <!-- ************Formulaire de saisi***************** -->
<?php
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
    $msg = 'Created Successfully!';
}catch(PDOException $e) {
    // echo "Error: " . $e->getMessage();
}
?>
    <form class="container bg-light p-5" action="index.php" method="post">

      <div class="title row justify-content-center text-center text-uppercase mb-5">
        <div class="col-md-6">
          <h2>Formulaire de Saisie</h2>          
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
        </div>
      </div>

      <div class="col-md-12 d-flex justify-content-center text-center">
        <div class="col-md-6">
          <span>
            <input type="text" id="nameUser" name="nameUser" style="display:none;">
          </span>
          <input type="text" class="form-control" placeholder="Nom" aria-label="name" id="name" name="name" onkeyup="autocomplet()" >
          <span>
            <ul class="text-success fst-italic ps-0 overflow-auto h-50" id="name_list"></ul>
            <ul class="text-success fst-italic ps-0 overflow-auto h-50" id="nameUserListe"></ul>
          </span>
          <!-- <span><ul id="first_name_list"></ul></span> -->
        </div>
      </div>

      <div class="col-md-12 d-flex text-center my-5">
        <div class="col-md-6">
          <div class="col-md-12 d-flex">
            <div class="col-md-4">
              <label for="inputLastName" class="form-label">DATE DE DÉBUT</label>
            </div>
            <div class="col-md-8">
              <input type="date" id="dayNow" class="form-control" name="date_start" value="<?php echo date('Y-m-d' ); ?>">
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="col-md-12 d-flex mx-auto">
            <div class="col-md-4 ">
              <label for="inputLastName" class="form-label">DATE DE FIN</label>
            </div>
            <div class="col-md-8">
              <input type="date" class="form-control" name="date_end">
            </div>
          </div>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-6 justify-content-center">
          <div class="input-group mb-3">
            <select class="form-select" id="inputGroupSelect01"  name="motifs_id">
              <option selected value="1">Motif...</option>
              <option value="2">AM</option>
              <option value="3">AT</option>
              <option value="4">CP</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-3 text-center">
          <button type="submit" class="btn btn-primary" >VALIDER</button>
        </div>
      </div>
    </form>
<!-- ************Table de récap***************** -->
<?php 
                    try {                              
                        $pole_service = "pole_service";
                        $stmt = $conn->prepare('SELECT pole_service, name,first_name,date_start,date_end,motif,absences_absences.id FROM `absences_absences`,`agents`,`absences_arguments` WHERE  motifs_id=absences_arguments.id AND agents_id=agents.id ORDER BY pole_service=? AND name');
                        $stmt->execute([$pole_service]);
                        // $stmt->execute([$pole_serviceIOEPA]);
                        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    }catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    ?>   

<div class="pole col-3 border border-1 border-dark mt-5 mb-1 text-center" style="background-color:#CFE2FF">
<h3>Agents Absents</h3>
</div>
<table class="table table-primary table-striped">
<thead>
    <tr>
      <th scope="col">Pôle</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Date de Début</th>
      <th scope="col">Date de Fin</th>
      <th scope="col">Motifs</th>
      <!-- <th scope="col">Statut</th> -->
      <th scope="col">Action</th>

    </tr>
  </thead>  
<?php foreach ($posts as $post): ?>
  <tbody>
    <tr>
      <th scope="row"><?=$post['pole_service']?></th>
      <td><?=$post['name']?></td>
      <td><?=$post['first_name']?></td>
      <td><?=$post['date_start']?></td>
      <td><?=$post['date_end']?></td>
      <td><?=$post['motif']?></td>
      <td>
          <a href="views/delete.php?id=<?=$post['id']?>"> 
              <button type='button' class='btn btn-sm btn-outline-danger'>suprimer</button>
          </a>
      </td>
    </tr>    
<?php endforeach; ?>
</table>
  <?php endif;