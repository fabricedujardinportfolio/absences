<?php require '../classes/database.php';?>
<?php include("../model/header.php");?>
<!-- SCRIPT ICI -->


</head>

<body>

    <?php 
  try {                              
    $pole_service = "pole_service";
    $stmt = $conn->prepare('SELECT pole_service, name,first_name,DATE_FORMAT(date_start, "%d-%m-%Y") AS `date_start`,DATE_FORMAT(date_end, "%d-%m-%Y") AS `date_end`,motif_start,motif_end,absences_absences.id FROM `absences_absences`,`agents`,`absences_motif_start`,`absences_motif_end` WHERE motif_start_id= absences_motif_start.idmotif_start AND motif_end_id= absences_motif_end.idmotif_end AND agents_id=agents.id AND date_start<=CURRENT_DATE AND CURRENT_DATE <= date_end ORDER BY pole_service=? , name , absences_absences.date_start,"%Y/%m/%d"');
    $stmt->execute([$pole_service]);
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
?>
    <div class="container-fluid d-flex">
        <div class="col-md-1"></div>
        <div class="container" style="font-family:system-ui">
            <div class="pole col-12 d-md-none border border-1 border-dark rounded-top mt-5 mb-0 text-center"
                style="background-color:#2e4f9b;color:white;">
                <h3>Liste des agents absents du GIEP-NC</h3>
            </div>
            <form action="">
                <div class="col-12 d-md-flex d-none py-2 px-0 text-uppercase text-center"
                    style="background-color:#2e4f9b;color:white; font-size: 1.2em;">
                    <div class="col-md-1 "> Pôle </div>
                    <div class="col-md-1 "> Nom </div>
                    <div class="col-md-2 "> Prénom </div>
                    <div class="col-md-2 "> Début de l'absence </div>
                    <div class="col-md-2  "> De...</div>
                    <div class="col-md-2  "> A...</div>
                    <div class="col-md-2 "> Fin de l'absence </div>
                </div>
                <?php foreach ($posts as $post): ?>
                <div class="col-md-12  d-flex pt-2 pb-2 border">
                    <div class="col-12 col-md-12 d-md-flex text-center">
                        <div class="col-md-1 col-12 ps-md-1 fw-bold text-uppercase">
                            <?=$post['pole_service']?>
                        </div>
                        <div class="col-md-1 col-12">
                            <?=$post['name']?>
                        </div>
                        <div class="col-md-2 col-12">
                            <?=$post['first_name']?>
                        </div>
                        <div class="col-md-2 col-12">
                            <span class="date_start_reel_<?=$post['id']?>">
                                <?=$post['date_start']?>
                            </span>
                        </div>
                        <div class="col-md-2 col-12">
                            <span class="date_end_reel_<?=$post['id']?>">
                            <?=$post['motif_start']?>
                            </span>
                        </div>
                        <div class="col-md-2 col-12">
                            <span class="motif_start_reel<?=$post['id']?> ">
                                <?=$post['motif_end']?>
                            </span>
                        </div>
                        <div class="col-md-2 col-12">
                            <span class="motif_end_reel<?=$post['id']?>">
                                <?=$post['date_end']?>
                            </span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </form>
        </div>
        <div class="col-md-1"></div>
    </div>