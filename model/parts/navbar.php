<?php
  $root = "http://localhost/applications/absence/";
  $login_path = $root . "views/login.php";
  $logout_path = $root . "views/logout.php";
  $register_path = $root . "views/registration.php";
  $dashboard_path = $root . "views/dashboard.php";
?>
<!-- SCRIPT ICI -->
</head>
<body>
<div class="container-fluid">
<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="<?php echo $root . "index.php" ?>"
        class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <span class="fs-4">GIEP-NC ABSENCES</span>
    </a>
    <ul class="nav nav-pills">
        <li class="nav-item"><a href="http://intranet/" class="nav-link active">Intranet</a></li>
        <li class="nav-item"><a href="<?php echo $logout_path; ?>" class="nav-link text-uppercase">Déconnexion</a></li>
    </ul>
</header>