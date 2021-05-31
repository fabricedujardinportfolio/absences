
<?php
  $root = "http://absences/";
  $login_path = $root . "views/login.php";
  $logout_path = $root . "views/logout.php";
  $register_path = $root . "views/registration.php";
  $dashboard_path = $root . "views/dashboard.php";
?>
<link rel="icon" type="image/ico" href="http://absences/giep-nc.ico" />
<link rel="icon" type="image/ico" href="giep-nc.ico" />
<!-- SCRIPT ICI -->
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
  <strong><?php echo "LOGIN FIRST"; ?></strong>
</div>
<?php
        header("refresh:2; views/login.php");
    else: 
        if ($_SESSION["user_pole"] === "COMMUNICATION / DOCUMENTATION​") {            
            echo"
            <div class='container-fluid d-flex mt-2 align-self-center'>
            <h6 class='mt-3 ms-2 mt-auto'>ADMIN PANEL COMMUNICATION / DOCUMENTATION​ :</h6>
            <ul class='nav nav-pills ms-2'>
                <li class='nav-item'> <a href='http://absences/views/add_agents.php' style='background-color:#2e4f9b;' target='_blank' class='nav-link active'> RAJOUTER UN AGENT</a></li>
            </ul>
            </div>";
            }
?>

<div class="container-fluid">
<header class="col-md-12 m-auto d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom d-flex">
    <a href="<?php echo $root . "index.php" ?>"
        class="col-md-6 col-12 d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none flex-wrap justify-content-center">
        <span class="fs-4">GIEP-NC ABSENCES</span>
    </a>
    <ul class="nav nav-pills">
        <li class="nav-item" ><a href="http://intranet/agents-absents/" class="nav-link active" style="background-color:#2e4f9b;" target="_blank">Intranet</a></li>
        <li class="nav-item"><a href="<?php echo $logout_path; ?>" class="nav-link text-uppercase" style="color:#2e4f9b;">Déconnexion</a></li>
    </ul>
</header>

<?php endif;