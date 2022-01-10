<?php
/*
Template Name: Pleine largeur saiqe
*/
 
// Votre code ici
// $db_host = "localhost";
$db_username = "root";
$db_password = "58Lj9pqJNHAabK9O";
$db_name="giep-master-databass";	//database name

try {
    $conn = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_username, $db_password);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  };


get_header(); ?>

<?php 
 try {                              
    $pole_service = "pole_service";
    $stmt = $conn->prepare('SELECT agents.poles_services_id,agents.name,agents.first_name,DATE_FORMAT(date_start, "%d-%m-%Y") AS `date_start`,DATE_FORMAT(date_end, "%d-%m-%Y") AS `date_end`,motif_start,motif_end,motif_start_id,motif_end_id,absences_absences.id,poles_services.name_pole_service FROM `absences_absences`,`poles_services`,`agents`,`absences_motif_start`,`absences_motif_end` WHERE motif_start_id= absences_motif_start.idmotif_start AND motif_end_id= absences_motif_end.idmotif_end AND agents_id=agents.id AND date_start<=CURRENT_DATE AND CURRENT_DATE < date_end AND poles_services.id=agents.poles_services_id ORDER BY poles_services.name_pole_service, agents.name , absences_absences.date_start,"%Y/%m/%d"');
    $stmt->execute([]);
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
?>

<main>
    <!-- Si il y a des article alors affiche des articles -->
    <?php while(have_posts()) : the_post() ;?>  
    <!-- Contenue complet de la page  -->
    <?php the_post_thumbnail(); ?>
    <?php the_content(); ?>
	
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
                    <div class="col-md-2  "> Créneau</div>
                    <div class="col-md-2 "> Fin de l'absence</div>
                    <div class="col-md-2  ">Créneau</div>
                </div>
                 <?php foreach ($posts as $post): ?>
                <div class="col-md-12  d-flex pt-2 pb-2 border">
                    <div class="col-12 col-md-12 d-md-flex text-center">
                        <div class="col-md-1 col-12 ps-md-1 fw-bold text-uppercase  align-self-center" style="font-size: 0.634em;">
                            <?=$post['name_pole_service']?>
                        </div>
                        <div class="col-md-1 col-12 align-self-center">
                            <?=$post['name']?>
                        </div>
                        <div class="col-md-2 col-12 align-self-center">
                            <?=$post['first_name']?>
                        </div>
                        <div class="col-md-2 col-12 align-self-center">
                            <span class="date_start_reel_<?=$post['id']?>">
                                <?=$post['date_start']?>
                            </span>
                        </div>
                        <div class="col-md-2 col-12 align-self-center">
                            <span class="date_end_reel_<?=$post['id']?>">
                            <?=$post['motif_start']?>
                            </span>
                        </div>
                        <div class="col-md-2 col-12 align-self-center">
                            <span class="motif_end_reel<?=$post['id']?>">
                                <?=$post['date_end']?>
                            </span>
                        </div>
                        <div class="col-md-2 col-12 align-self-center">
                            <span class="motif_start_reel<?=$post['id']?> ">
                                <?=$post['motif_end']?>
                            </span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </form>
        </div>
        <div class="col-md-1"></div>
    </div>
    <!-- Extrain de la page  --> 
    <!-- <?php the_excerpt(); ?> -->
    <?php endwhile;?><!-- Une boucle while se fini toujours par un endwhile -->
</main>		
<?php get_footer(); ?>
