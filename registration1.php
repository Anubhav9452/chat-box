<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		*{
			margin:0px;
			padding: 0px;
		}
		#main{
			border: 1px solid black;
			width: 400px;
			margin:30px auto;
		}


	</style>
	<title>this is my application</title>
</head>
<body>
<?php
require_once("connec.php");
if(isset($_POST['register']))
{
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$user_name=$_POST['user_name'];
	$password=$_POST['password'];
	if($first_name!="" and $last_name!="" and $user_name!="" and $password!="")
	{
		$q="INSERT INTO  `user`(`id`,`first_name`,`last_name`,`user_name`,`password`)
		VALUES('','".$first_name."','".$last_name."','".$user_name."','".$password."')
		";
		if(mysqli_query($con, $q))
            {  
         	echo "you are successfully registered";
              }
        else
    	{
    		echo $q;
    	}
    }
	else
	{
		echo "please fill all boxes";

	}
}
?>



	<div id="main">
		<h2 align="center" >registration</h2>
		<form method="post">
			first name :<br>
			<input type="text" name="first_name" placeholder="first name"/><br><br>
           last name :<br>
			<input type="text" name="last_name" placeholder="last name"/><br><br>
			user name:<br>
			<input type="text" name="user_name" placeholder="user name"/><br><br>
			password:<br><br>
			<input type="password" name="password" placeholder="password"/><br><br>
			submit:<br>
			<input type="submit" name="register" value="register"/>

		</form>
	</div>
</body>
</html>