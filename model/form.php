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
<!-- ************Formulair de saisi***************** -->

<form class="container bg-light p-5">

  <div class="title row justify-content-center text-center mb-5">
      <div class="col-md-6">
        <h2>Formulaire de Saisi</h2>
      </div>
    </div>

  <div class="col-md-12 d-flex text-center">
    <div class="col-md-12">
      <div class="col-md-12 d-flex">
        <div class="col-md-4">
          <label for="inputLastName" class="form-label">NOM </label>
        </div>
        <div class="col-md-8">
          <input type="text" class="form-control" placeholder="Nom" aria-label="name" id="name" onkeyup="autocomplet()">
          <span><ul id="name_list"></ul></span>
          <span><ul id="first_name_list"></ul></span>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-12 d-flex text-center my-5">
    <div class="col-md-6">
      <div class="col-md-12 d-flex">
        <div class="col-md-4">
          <label for="inputLastName" class="form-label">DATE DE DÉBUT</label>
        </div>
        <div class="col-md-8">
          <input type="date" id="dayNow" class="form-control" name="test" value="<?php echo date('Y-m-d'); ?>">
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="col-md-12 d-flex">
        <div class="col-md-4">
          <label for="inputLastName" class="form-label">DATE DE FIN</label>
        </div>
        <div class="col-md-8">
          <input type="date" class="form-control" name=" ">
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-6 justify-content-center">
      <div class="input-group mb-3">
        <select class="form-select" id="inputGroupSelect01">
          <option selected>Motif...</option>
          <option value="1">AM</option>
          <option value="2">AT</option>
          <option value="3">CP</option>
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 mt-3 text-center">
      <button type="button" class="btn btn-primary">VALIDER</button>
    </div>
  </div>
</form>

<!-- ************Table de récap***************** -->
<?php 
                    try {                              
                        $Users_id = $_SESSION["user_login"];
                        $Users_id_int = (int)$Users_id;
                        // var_dump($Users_id_int);SELECT * FROM `absences_absences`,`agents` WHERE agents_id ORDER BY pole_service
                        $stmt = $conn->prepare('SELECT * FROM `absences_absences`,`agents`,`absences_arguments` WHERE agents_id=? ORDER BY pole_service AND name');
                        $stmt->execute([$Users_id_int]);
                        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    }catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    ?>   

<div class="pole col-3 border border-1 border-dark mt-5 mb-1 text-center" style="background-color:#CFE2FF">
<h3>Agents Absents</h3>
</div>
<!-- <?php echo"<br> Utilisateur :"?>
<?=$post['agents_id']?>
<?php echo"<br> Id du post :"?>
<?=$post['id']?>
<?php echo"<br> id du motif :"?>
<?=$post['motifs_id']?>
<?php echo"<br> date départ : "?>
<?=$post['date_start']?>
<?php echo"<br> date fin : "?>
<?=$post['date_end']?>
<?php echo"<br>"?> -->
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
      <td><?=$post['motifs_id']?></td>
      <td></td>
    </tr>    
<?php endforeach; ?>
</table>


<?php endif;