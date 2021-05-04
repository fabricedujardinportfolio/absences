<?php
include("../model/header.php");
require_once '../dbconfig.php';

session_start();

if(isset($_SESSION["user_login"]))	//check condition user login not direct back to index.php page
{
	header("location: index.php");
}

if(isset($_REQUEST['valider']))	//button name is "btn_login"
{
	$email		=strip_tags($_REQUEST["txt_email"]);	//textbox name "txt_username_email"
	$password	=strip_tags($_REQUEST["txt_password"]);		//textbox name "txt_password"
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
			$select_stmt=$conn->prepare("SELECT * FROM Users WHERE email=:uemail"); //sql select query
			$select_stmt->execute(array(':uemail'=>$email));	//execute query with bind parameter
			$row=$select_stmt->fetch(PDO::FETCH_ASSOC);			
			if($select_stmt->rowCount() > 0)	//check condition database record greater zero after continue
			{
				if($email==$row["email"]) //check condition user taypable "email" is match from database "email" after continue
				{
					if(password_verify($password, $row["password"])) //check condition user taypable "password" is match from database "password" using password_verify() after continue
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
        <form>
            <div class="row justify-content-md-center">
                <div class="col-4 text-center">
                    <div class="title">
                        <h1>Identification</h1>
                    </div>
                </div>
            </div>

            <div class="row bg-light">
                <div class="row justify-content-md-center p-5">
                    <div class="col-md-3">
                        <label for="inputFirstName" class="form-label">NOM</label>
                        <input type="text" class="form-control" placeholder="First name" aria-label="First name">
                    </div>
                    <div class="col-md-3">
                        <label for="inputLastName" class="form-label">PRENOM</label>
                        <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
                    </div>
                    <div class="col-md-3">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword4">
                    </div>
                </div>
                <div class="row justify-content-md-center p-5 pt-0">
                    <div class="col-2 text-center">
                        <button class="btn btn-primary" type="submit">Connexion</button>
                    </div>
                </div>
                
            </div>
        </form>


    </div>
</div>