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
  <form class="container-fluid bg-light p-5">

    <!-- <div class="title row justify-content-center">
      <div class="col-6">
        <h2 class="card-title">Formulaire de Saisi</h2>
      </div>
    </div> -->
  
    <div class="col-12 d-flex text-center">

      <div class="col-6">
        <div class="col-md-12 d-flex">
          <div class="col-4">
            <label for="inputFirstName" class="form-label">NOM </label>
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" placeholder="Nom" aria-label="First name" name=" ">
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="col-md-12 d-flex">
          <div class="col-4">
            <label for="inputLastName" class="form-label">PRENOM </label>
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" placeholder="Prénom" aria-label="First name" name=" ">
          </div>
        </div>
      </div>
    </div>


    <div class="col-12 d-flex text-center my-5">

      <div class="col-6">
        <div class="col-md-12 d-flex">
          <div class="col-4">
            <label for="inputLastName" class="form-label">DATE DE DÉBUT</label>
          </div>
          <div class="col-md-8">
            <input type="date" class="form-control" name=" ">
          </div>
        </div>
      </div>

      <div class="col-6">
        <div class="col-md-12 d-flex">
          <div class="col-4">
            <label for="inputLastName" class="form-label">DATE DE FIN</label>
          </div>
          <div class="col-md-8">
            <input type="date" class="form-control" name=" ">
          </div>
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-6 justify-content-center">
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

    </div>



  </form>
  <?php endif;