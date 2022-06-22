<html>
	<head>
		<title>Virtual Tour</title>
	</head>
	<style>
	body{
		    background-color: #193e4b;
    font-family: Poppins, sans-serif;
  
}
u{
	color:white;
}
td{
	color:white;
}
b{
	color:white;
}
</style>
	<body>
		<?php
			session_start();
			echo "<center><b>University Name</b> - ".$_SESSION["uname"];
			echo "<br><b>College Name Name</b> - ".$_SESSION["cname"];
		?>
		<center><h2 style="font-size:40px;color:red"><u>-:Registration:-</u></h2>
		<hr>
		<table cellpadding="10">
			<tr>
				<td><a style="color:red;"href="user-map.php">New Registration</a>
				<td><a style="color:red;" href="updateinfo.php">Update Information</a>
		</table>
		<hr>
		<form action="updateinfo.php" method="post">
		<fieldset style="width : 50% ; border:3px solid grey; border-radius:25px;">
		<legend style="color:white; font-size:25px; margin-right:70%">UPDATE INFORMATION</legend>
		<center>
		<table width = "60%" cellpadding="10">
			<tr>
				<td>Virtual Tour Link
				<td><input type="text" name="t1">
			<tr>
				<td>Website Link
				<td><input type="text" name="t2">
			<tr>
				<td>Photos Link
				<td><input type="text" name="t3">
			<tr>
				<td colspan="2" align="center"><input type="submit" name="b" value="Update">
		</table>
		</form>
	</body>
</html>
<?php
if(isset($_POST['b']))
{
		$a=$_POST['t1'];
		$b=$_POST['t2'];
		$c=$_POST['t3'];
		if($a==""||$b==""||$c=="")
			echo"<script>alert('Please Fill All Required Data')</script>";
		else
		{
			$d=$_SESSION["cname"];
			include("connect.php");
			$s="select * from locations where college='$d'";
			$rs=mysqli_query($con,$s);
			$t=0;
			while($r=mysqli_fetch_array($rs))
			{
				$t=1;
			}
			
			if($t==0)
				{
					include("connect.php");
						$s="update locations set youtube='$a',website='$b',location='$c' where college='$d'";
					mysqli_query($con,$s);
					mysqli_close($con);
					echo"<center><table>";
					echo"<tr><td>Update Successfull";
					echo"<tr><td><a href='index.html'>Home</a>";
				}
			else
				echo"<script>alert('Data already existed Please Update Data')</script>";
		}
}
?>