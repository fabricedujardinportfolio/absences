<?php
$msg = "";
$msgupdate = "";
if(isset($_POST['valider']))
      try {
        var_dump($_POST);
        $msgupdate="";
      if (!empty($_POST)) {
        $oldpasword = $_POST['oldpasword'];
        var_dump($oldpasword);
        $newpaswword = $_POST['newpaswword'];        
        // // Update posts table
        // $stmt = $conn->prepare('UPDATE absences_absences SET date_start = ?, date_end = ?, motif_start_id = ?, motif_end_id = ? WHERE id = ?');
        // $stmt->execute([$dateStart, $dateEndUpdate, $motif_start_id, $motif_end_id, $id]);
        // // $test = header('refresh:2; index.php');
        $msgupdate = '<spans class="alert alert-success mt-5 mt-md-0" role="alert">Mis à jour avec succés!</span>';
        // header("refresh:2; index.php");
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
include("../model/header.php");
require_once '../classes/database.php';
// if(!isset($_SESSION["user_login"]))	//check condition user login not direct back to index.php page
// {
// 	header("location: ../index.php");
// }

?>
<?php 
if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false):
    ?>
<?php
        header("refresh:0; views/login_mdp.php");
    else: 
        $psw = $_SESSION["user_psw"];
        $email = $_SESSION["user_email"];
        var_dump($email);
        // if ($psw ) {
        //     # code...
        // }
        // var_dump($psw);
?>
<div class="container d-flex">
    <div class="col-1"></div>
    <div class="col-10">    
        <div class="text-center">
            <h1><strong class="text-uppercase">Update MDP</strong></h1>
        </div>
        <form action="" method="post" >
        <h2 class="text-center"> Bonjour: <?php echo"$email" ?></h2>
            <div class="form-group">
                <label for="update_mdp" >Ancien mdp</label>
                <input type="text" placeholder="<?php echo "$psw" ?>" class="form-control" readonly value="<?php echo "$psw" ?>" name="oldpasword">
            </div>
            <div class="form-group">
                <label for="update_mdp">Nouveau mdp</label>
                <input type="text" placeholder="Nouveau mdp" class="form-control" name="newpaswword">
            </div>
            <div class="text-center  mb-3">
                <button class="btn btn-lg btn btn-primary btn-block mt-4 text-center" type="submit" name="valider" value="S'authentifier" style="background-color:#2e4f9b;color:white;">Mettre à jour</button>
            </div>
        </form>
    </div>
    <div class="col-1"></div>
</div>
<?php include("../model/footer.php");?>
<?php endif;