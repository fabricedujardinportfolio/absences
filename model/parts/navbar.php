
<?php
  $root = "http://absences/";
  $login_path = $root . "views/login.php";
  $logout_path = $root . "views/logout.php";
  $register_path = $root . "views/registration.php";
  $dashboard_path = $root . "views/dashboard.php";
?>
<!-- SCRIPT ICI -->
<script>
function myFunction() {
  var r = confirm("Attention vous allez quitter l’application pour ouvrir l’application « mot de passe »");
  
  if (r == true) {
    // location.replace("http://ressources/logout");
    var open = window.open('http://mot-de-passe/');
    var urlList = [
    "http://absences/views/logout.php"
  ];
    for( var i in urlList ){
      window.location.href = urlList[i];
        i++;
    }
  } else {
    open = "";
    return open;
  }
  window.open(open);
}
</script>
<style>
.maxHeight {
    max-height : 43px;
}
p {
    margin-top: 25px;
    margin-bottom: 1rem;
}

</style>
</head>

<body>
<?php 
if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false):
    ?>
<div class="alert alert-danger">
  <!-- <strong>
  </strong> -->
</div>
<?php
        header("refresh:2; views/login.php");
    else: 
?>

<div class="container-fluid">
<header class="col-md-12 m-auto d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom d-flex">
    <a href="<?php echo $root . "index.php" ?>"
        class="col-md-6 col-12 d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none flex-wrap ms-md-3 justify-content-center justify-content-md-start">
        <span class="fs-4">GIEP-NC ABSENCES</span>        
    </a>
    <ul class="nav nav-pills">
        <li class="nav-item" ><a href="http://intranet/agents-absents/" class="nav-link active" style="background-color:#2e4f9b;" target="_blank">Intranet</a></li>
        <li class="nav-item"><a href="<?php echo $logout_path; ?>" class="nav-link text-uppercase" style="color:#2e4f9b;">Déconnexion</a></li>
    </ul>
    <div class="col-12 ms-5">    
    <ul class="nav nav-pills">
        <li class="nav-item"><a href="#" class="nav-link active" style="background-color:#2e4f9b;" target="_blank" onclick="myFunction()">Changer de mot de passe</a></li>
    </ul>
    </div>
</header>

<?php endif;