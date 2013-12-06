<?php
session_start();
$msg = "";
$M= new mysqli("10.0.3.135","drwest","Mexico143","myPath");



if(isset($_GET['action']))
{
	switch($_GET['action'])
	{
		case "login":


			if(!isset($_POST['username']) || !isset($_POST['password'])) { $msg = "Bad Login."; }
			else
			{
			
            $sql="Select * from tbl_salesperson where email='".$_POST['username']."' and password=password('".$_POST['password']."');";
            //echo $sql; exit;
            $res=$M->query($sql);
            $r=$res->fetch_assoc();

				if( $r['sales_group'] == 1)
				{
					$_SESSION['access'] = "true";
                    $_SESSION['admin'] = $r['admin'];
					$_SESSION['name']=$r['name'];
                    setcookie("access", "true", time()+60*60*24*30);
                    
					$_SESSION['user'] = "drwest";
					setcookie("user", "drwest", time()+60*60*24*30);
					header("Location: campaign/report/campaigns.php"); exit;
				}				
					
					
				$msg = '<div class="alert alert-error">Bad Login.</div>';
			}
		break;
		case "logout":
			session_destroy();
			setcookie("access", "false", time()-1000);
            header("Location: index.php");
		break;
	}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>theDWspot Report Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
  </head>
  <body style="background-image: url(/images/datacenter.jpg);">  
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>





<style>
.form-signin
{
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
}
.form-signin .form-signin-heading, .form-signin .checkbox
{
    margin-bottom: 10px;
}
.form-signin .checkbox
{
    font-weight: normal;
}
.form-signin .form-control
{
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.form-signin .form-control:focus
{
    z-index: 2;
}
.form-signin input[type="text"]
{
    margin-bottom: 5px;
    width: 330px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}
.form-signin input[type="password"]
{
    width: 330px;
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.account-wall
{
    margin-top: 20px;
    padding: 40px 0px 20px 0px;
    background-color: #f7f7f7;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}
.login-title
{
    color: #555;
    font-size: 18px;
    font-weight: 400;
    display: block;
}
.profile-img
{
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}
.need-help
{
    margin-top: 10px;
}
.new-account
{
    display: block;
    margin-top: 10px;
}</style>




<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">theDWspot Report Login</h1>
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">
                <form class="form-signin" method="POST" action="index.php?action=login"><?=$msg?>
                <input type="text" name="username" class="form-control" placeholder="Email" required autofocus>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Sign in</button>
                
                <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                </form>
            </div>
            <a href="http://www.thedwspot.com/myPath/campaign/ui/register.php"  target="_blank" class="text-center new-account">Create an account </a>
        </div>
    </div>
</div>
  
  </body>
  
</html>