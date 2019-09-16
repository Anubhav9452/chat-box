<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		*{
			margin: 0px;
			padding: 0px;
		}
		#main{
			width:200px;
			margin: 20px auto;
		}
	</style>


</head>
<body>
	<div id="main">
		<?php
		session_start();
		require_once("connec.php");
		if(isset($_POST['login']))
		{
			$user_name=$_POST['user_name'];
			$password=$_POST['password'];
			$q='SELECT * FROM `user` where `user_name`="'.$user_name.'" and `password`="'.$password.'"';
			$r=mysqli_query($con,$q);
			if(mysqli_num_rows($r)>0)
			{
				$_SESSION['user_name']=$user_name;
				header("location:index.php");
			}
			else
			{
				echo "your username and password do not match";
			}
		   }
		?>
		<h2 style="text-align: center">login form </h2>
		<form method="post">
			user name:<br>
			<input type="text" name="user_name" placeholder="user_name" required /><br><br>
            password:<br>
            <input type="password" name="password" placeholder="password" required /><br><br>
			<input type="submit" name="login" value="login"/>
			<a href="registration1.php">create your account </a>
		</form>
	</div>

</body>
</html>