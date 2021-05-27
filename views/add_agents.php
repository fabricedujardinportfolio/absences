<?php require '../classes/database.php';?>
<?php include("../model/header.php");?>
<!-- SCRIPT ICI -->


</head>

<body>
<?php
$msg = "";
  if (isset($_POST["valider"]))
      # code...
      try {
        $msg = '';
        // echo "test";
        // var_dump($_POST);
        $name = $_POST["name"];
        // var_dump($name);
        $first_name = $_POST["first_name"];
        // var_dump($first_name);
        $pole_service = $_POST["pole_service"];  
        // var_dump($pole_service);      
        $function = $_POST["function"];
        // var_dump($function);
        $passwords = $_POST["passwords"];
        // var_dump($passwords);
        $active = $_POST["active"];
        // var_dump($active);
        $email = $_POST["email"];
        // var_dump($email);
        $connexion_absences = $_POST["connexion_absences"];
        // var_dump($connexion_absences);

        $stmt = $conn->prepare('INSERT INTO `agents` VALUES ("",?, ?, ?, ?, ?, ? ,? , ? )');
        $stmt->execute([$name,$first_name,$pole_service,$function,$passwords,$active,$email, $connexion_absences]);  
        $msg = '<div class="alert alert-success" role="alert">
        Créer avec succès!
      </div>';
      header("refresh:2; add_agents.php");
    } catch (PDOException $e) {
          //throw $th;
          echo "
          <div class='alert alert-warning text-center' role='alert'>
          <strong>Utiliser un des utilisateurs que vous proposent l'auto-complétions du tableau.</strong>
          </div>
          " ;
        }
        else {
          // echo"test";
        }
      
  ?>
<?php if ($msg): ?>
  <p><?=$msg?></p>
  <?php endif; ?>
<form action="add_agents.php" method="POST" class="container">
    <div class="col-12">
        <label for="name" class="form-label">Nom</label>
        <input id="name" type="text" name="name" placeholder="Le nom de l'agent SVP" class="form-control">
    </div>
    <div class="col-12">
        <label for="first_name" class="form-label">Prénom</label>
        <input id="first_name" type="text" name="first_name" placeholder="Le Prénom de l'agent SVP" class="form-control">
    </div>
    <div class="col-12">
        <label for="pole_service" class="form-label">Pôle service</label>
        <input id="pole_service" type="text" name="pole_service" placeholder="Pôle service de l'agent SVP" class="form-control">
    </div>
    <div class="col-12">
        <label for="function" class="form-label">Fonction</label>
        <input id="function" type="text" name="function" placeholder="Fonction de l'agent SVP" class="form-control">
    </div>
    <div class="col-12">
        <label for="passwords" class="form-label">Passwords</label>
        <input id="passwords" type="password" name="passwords" value="123456" readonly class="form-control">
    </div>
    <div class="col-12">
        <label for="active" class="form-label">Présence de l'agent dans l'entreprise"</label>
        <select name="active" id="active" class="form-select">
            <option value="1">Oui</option>
            <option value="2">Non</option>
        </select>
    </div>
    <div class="col-12">
        <label for="email" class="form-label">Email</label>
        <input id="email" type="text" name="email" placeholder="Email de l'agent SVP" class="form-control">
    </div>
    <div class="col-12 ">
        <label for="connexion_absences" class="form-label">Connexion authorisée à l'APP absence</label>
        <select name="connexion_absences" id="connexion_absences" class="form-select">
            <option value="1">Oui</option>
            <option value="2">Non</option>
        </select>
    </div>
    <div class="col-md-12 mt-3 text-center pb-5">
        <button type="submit" name="valider" class="btn btn-primary" style="background-color:#2e4f9b">VALIDER</button>
    </div>
</form>