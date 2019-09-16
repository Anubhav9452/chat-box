<!DOCTYPE html>
<html>
<head>
	<style>
		*{
			margin:0px;
			padding: 0px;
		}
		#main{
			border: 2px solid red;
			width:600px;
			height:500px;
			margin:25px auto;
			left:10px;
		}
		#messages{
width:99%;
border:1px solid black ;
height:450px;

		}
	</style>
	<title></title>
</head>
<body>
<?php session_start();
if(isset($_SESSION['user_name']))
{
echo 'welcome ' .$_SESSION['user_name'];
echo '<a href="logout.php"> <br>log out</a>';
}
else
{
	header("location:login.php");
}
?>
<div id="main">
	<div id="messages">
	<?php
		require_once("connec.php");
		$q1="select * from `message`";
		$r1=mysqli_query($con,$q1);
		while($row=mysqli_fetch_assoc($r1))
		{
			$message=$row['message'];
			$user_name=$row['user_name'];
			echo '<h4 style="color:red">'.$user_name.'</h4>';
			echo '<p>'.$message.'</p>';
		}
		if(isset($_POST['submit']))
     {
     	$message=$_POST['message'];
     	$q='INSERT INTO `message` (`id`,`message`,`user_name`)
     	VALUES("","'.$message.'","'.$_SESSION['user_name'].'")';

     	if(mysqli_query($con,$q))
     	{
     		echo '<h4 style="color:red">'.$_SESSION['user_name'].'</h4>';
     		echo '<p> '.$message.'</p>';
     		echo '<hr>';
     	}

    }


	?>
	</div>
		<form method="post">
			<input type="text" name="message" style ="width:490px ;height:40px;" placeholder="type ur messge"/>
			<input type="submit" name="submit" style ="width:100px ;height:40px; placeholder="message"/>
		</form>


	</div>
</body>
</html>