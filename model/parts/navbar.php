
<?php
  $root = "http://192.168.40.77/applications/absence/";
  $login_path = $root . "views/login.php";
  $logout_path = $root . "views/logout.php";
  $register_path = $root . "views/registration.php";
  $dashboard_path = $root . "views/dashboard.php";
?>
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
?>
<div class="container-fluid">
<header class="col-md-12 m-auto d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="<?php echo $root . "index.php" ?>"
        class="col-md-6 col-12 d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none flex-wrap justify-content-center">
        <span class="fs-4">GIEP-NC ABSENCES</span>
    </a>
    <ul class="nav nav-pills">
        <li class="nav-item" ><a href="http://intranet_dev/liste-des-agents-absents-du-giep-nc/" class="nav-link active"style="background-color:#2e4f9b;" target="_blank">Intranet</a></li>
        <li class="nav-item"><a href="<?php echo $logout_path; ?>" class="nav-link text-uppercase" style="color:#2e4f9b;">Déconnexion</a></li>
    </ul>
</header>

<?php endif;