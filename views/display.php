<?php require '../classes/database.php';?>
<?php include("../model/header.php");?>
<!-- SCRIPT ICI -->


</head>
<body>
    
<?php 
  try {                              
    $pole_service = "pole_service";
    $stmt = $conn->prepare('SELECT pole_service, absences_absences.id, name,first_name,date_start,date_end FROM `absences_absences`,`agents` WHERE agents_id=agents.id ORDER BY pole_service=? AND name');
    $stmt->execute([$pole_service]);
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
?>

<div class="container">
    
    <!-- <h1 class="col text-center">User page</h1> -->
    <div class="pole col-5 border border-1 border-dark mt-5 text-center text-white py-2 rounded-top" style="background-color:#2E4F9B">
        <h3>Liste des agents absents du GIEP-NC</h3>
    </div>

    <form action="">
        <div class="col-12 d-flex border border-1 border-dark text-white fs-4 text-uppercase py-2" style="background-color:#2E4F9B">
            <div class="col ps-2"> Pôle </div>
            <div class="col"> Nom </div>
            <div class="col"> Prénom </div>
            <div class="col"> Date de Début </div>
            <div class="col"> Date de Fin </div>
            <div class="col text-center"> Statut </div>
        </div>
        
        <?php foreach ($posts as $post): ?>

        <div class="col-12 d-flex border-bottom fs-5 py-2">
            <div class="col ps-2">
                <?=$post['pole_service']?>
            </div>
            <div class="col">
                <?=$post['name']?>
            </div>
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
            <div class="col text-danger text-center">
               Absent
            </div>
        </div>

        <?php endforeach; ?>

</div>