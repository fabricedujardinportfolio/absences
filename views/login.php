<?php
include("../model/header.php");
require_once '../classes/database.php';

session_start();

if(isset($_SESSION["user_login"]))	//check condition user login not direct back to index.php page
{
	header("location: index.php");
}

if(isset($_REQUEST['valider']))	//button name is "btn_login"
{
	$email		= strip_tags($_REQUEST["email"]);	//textbox name "txt_username_email"
	$password	= strip_tags($_REQUEST["passwords"]);		//textbox name "txt_password"
	if(empty($email)){
		$errorMsg[]="please enter your email";	//check "email" textbox not empty
	}
	else if(empty($password)){
		$errorMsg[]="please enter your password";	//check "passowrd" textbox not empty
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
                    echo "ok";
					if($password==$row["passwords"]) //check condition user taypable "password" is match from database "password" using password_verify() after continue
					{
						$_SESSION["user_login"] = $row["id"];	//session name is "user_login"
                        $_SESSION["loggedIn"] = true;
						$loginMsg = "Successfully Login...";		//user login success message
						header("refresh:2; ../index.php");			//refresh 2 second after redirect to "welcome.php" page
					}
					else
					{
						$errorMsg[]="wrong password";
					}
				}
				else
				{
					$errorMsg[]="wrong email";
				}
			}
			else
			{
				$errorMsg[]="wrong email";
			}
		}
		catch(PDOException $e)
		{
			$e->getMessage();
		}		
	}
}
?>
<body>
    <div class="container d-flex mt-4 h-mini-90">
        <div class="col-lg-12">
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
                    <img  src="../public/images/man-logo.svg" alt="" width="72" height="72">
                </div>
                <div class="text-center">
                <h1><strong>PROJECT BLOG</strong></a></h1>
                </div>
                <h2 class="h3 mb-3 font-weight-normal text-center">Veuillez vous connecter<hr></h2>
                <div class="form-group">
                    <label for="loginEmail" class="pb-1"><strong>Email :</strong></label>
                    <input type="text" class="form-control" id="loginEmail"  placeholder="Enter votre email" name="email">
                </div>
                <div class="form-group pt-2">
                    <label for="Passwordid" class="pb-1"><strong>Password :</strong></label>
                    <input type="password" class="form-control" id="Passwordid" placeholder="Enter votre mots de pass" name="passwords">
                </div>
                <div class="text-center  mb-3">
                <button class="btn btn-lg btn-facebook-b btn-block mt-4 text-center" type="submit" name="valider" value="S'authentifier">S'identifier</button>
                </div> <span><a href="../index.php" class="text-decoration-none">Retour à l'accueil</a></span><span  class="ms-4 "><a href="registration.php" class="text-decoration-none">Vous n'avez pas de compte ? Créez vous un compte</a> </span>
            </form>
        </div>
    </div>
</body>
<?php include("../model/footer.php");?>