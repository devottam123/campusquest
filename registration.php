<html>
	<head>
		<title>Virtual Tour</title>
	</head>
	<style>
		body{
		    background-color: #193e4b;
    font-family: Poppins, sans-serif;
  
}
	</style>
	<body>
		<?php
			session_start();
			echo "<center><b>University Name</b> - ".$_SESSION["uname"];
			echo "<br><b>College Name Name</b> - ".$_SESSION["cname"];
		?>
		<center><h2 style="font-size:40px;  font-family: Poppins, sans-serif; color:red"><u>-:Registration:-</u></h2>
		<hr>
		<table cellpadding="10">
			<tr>
				<td><a href="registration.php">New Registration</a>
				<td><a href="updateinfo.php">Update Information</a>
		</table>
		<hr>
		<form action="registration.php" method="post">
		<fieldset style="width : 50% ; border:3px solid grey; border-radius:25px;">
		<legend style="color:blue; font-size:25px; margin-right:70%">NEW REGISTRATION</legend>
		<center>
		<table width = "60%" cellpadding="10">
			<tr>
				<td>State
				<td><input type="text" name="t1">
			<tr>
				<td>District
				<td><input type="text" name="t2">
			<tr>
				<td>College Name
				<td><input type="text" name="t3">
			<tr>
				<td>Youtube Link
				<td><input type="text" name="t4">
			<tr>
				<td>Website Link
				<td><input type="text" name="t5">
			<tr>
				<td>College Location Link
				<td><input type="text" name="t6">
			<tr>
				<td colspan="2" align="center"><input type="submit" name="b" value="Register">
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
		$d=$_POST['t4'];
		$e=$_POST['t5'];
		$f=$_POST['t6'];
		if($a==""||$b==""||$c==""||$d==""||$e==""||$f=="")
			echo"<script>alert('Please Fill All Required Data')</script>";
		else
		{
			include("connect.php");
			$s="select * from registration where state='$a' and dist='$b' and col='$c'";
			$rs=mysqli_query($con,$s);
			$t=0;
			while($r=mysqli_fetch_array($rs))
			{
				$t=1;
			}
			
			if($t==0)
				{
					include("connect.php");
						$s="insert into registration values('$a','$b','$c','$d','$e','$f')";
					mysqli_query($con,$s);
					mysqli_close($con);
					echo"<center><table>";
					echo"<tr><td>Registration Successfull";
					echo"<tr><td><a href='index.html'>Home</a>";
				}
			else
				echo"<script>alert('Data already existed Please Update Data')</script>";
		}
}
?>	