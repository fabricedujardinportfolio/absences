<?php
include("../model/header.php");
require_once '../classes/database.php';
// if(!isset($_SESSION["user_login"]))	//check condition user login not direct back to index.php page
// {
// 	header("location: ../index.php");
// }

if(isset($_REQUEST['valider']))	//button name is "btn_login"
{
	$email		= strip_tags($_REQUEST["email"]);	//textbox name "txt_username_email"
	$password	= strip_tags($_REQUEST["passwords"]);		//textbox name "txt_password"
	if(empty($email)){
		$errorMsg[]="Merci de saisir votre adresse email";	//check "email" textbox not empty
	}
	else if(empty($password)){
		$errorMsg[]="Veuillez entrer un mot de passe";	//check "passowrd" textbox not empty
	}
	else
	{
		try
		{
			$select_stmt=$conn->prepare("SELECT * FROM agents WHERE email=:uemail"); //sql select query
			$select_stmt->execute(array(':uemail'=>$email));	//execute query with bind parameter
			$row=$select_stmt->fetch(PDO::FETCH_ASSOC);			
			if($select_stmt->rowCount() > 0)	//check condition database record greater zero after continue
			{
				if($email==$row["email"]) //check condition user taypable "email" is match from database "email" after continue
				{
                    $_SESSION["user_pole"] = $row["pole_service"];
                    $role = $_SESSION["user_pole"];    
                    if ($row["connexion_absences"]=="1" && $row["active"]=="1") {
                        if($password==$row["passwords"]) //check condition user taypable "password" is match from database "password" using password_verify() after continue
                        {
                            $_SESSION["user_login"] = $row["id"];
                            $_SESSION["user_pole"] = $row["pole_service"];
                            //session name is "user_login"
                            $_SESSION["loggedIn"] = true;
                            $loginMsg = "Connexion réussie...";		//user login success message
                            header("refresh:2; ../index.php");			//refresh 2 second after redirect to "welcome.php" page
                        }
                        else{                            
						$errorMsg[]="Le mot de passe n'existe pas";
                        }
                    }
					
					else
					{
						$errorMsg[]="Vous n'avez pas les droits";
					}
				}
				else
				{
					$errorMsg[]="Adresse email invalide";
				}
			}
			else
			{
				$errorMsg[]="Veuillez entrer une adresse email valide ";
			}
		}
		catch(PDOException $e)
		{
			$e->getMessage();
		}		
	}
}
?>
<!-- SCRIPT ICI -->
</head>
<body>
<div class="container">
    <div class="container d-flex mt-4 h-mini-90">
        <div class="col-lg-6 m-auto">
            <?php
            if(isset($errorMsg))
            {
                foreach($errorMsg as $error)
                {
                ?>
                    <div class="alert alert-danger">
                        <strong><?php echo $error; ?></strong>
                    </div>
                <?php
                }
            }
            if(isset($loginMsg))
            {
            ?>
                <div class="alert alert-success">
                    <strong><?php echo $loginMsg; ?></strong>
                </div>
            <?php
            }
            ?>
            <form action="" method="post" name="fo">
                <!-- <div class="erreur"><?php echo $erreur ?></div> -->                
                <div class="text-center col-12 mt-1">
                    <img  src="../public/images/logo.png" alt="logo du giep" width="110" height="72">
                </div>
                <div class="text-center">
                <h1><strong class="text-uppercase">Saisie des absents</strong></a></h1>
                </div>
                <h2 class="h3 mb-3 font-weight-normal text-center">Veuillez vous connecter<hr></h2>
                <div class="form-group">
                    <label for="loginEmail" class="pb-1"><strong>Email :</strong></label>
                    <input type="email" class="form-control" id="loginEmail"  placeholder="Entrer votre email" name="email">
                </div>
                <div class="form-group pt-2">
                    <label for="Passwordid" class="pb-1"><strong>Mot de passe :</strong></label>
                    <input type="password" class="form-control" id="Passwordid" placeholder="Entrer votre mots de pass" name="passwords">
                </div>
                <div class="text-center  mb-3">
                <button class="btn btn-lg btn btn-primary btn-block mt-4 text-center" type="submit" name="valider" value="S'authentifier" style="background-color:#2e4f9b;color:white;">S'identifier</button>
                </div> 
            </form>
<?php include("../model/footer.php");?>
