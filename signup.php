<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <style>
        /* header */
        header{
    border-bottom-right-radius: 31px;
    width: 100%;
    background-color: gradient;
    /* background-color: #3e3152;  */
    background: linear-gradient(1deg, #5fa59c, #8eb32a00);
   /* position:fixed; */
    border-radius: 10px;
}
.headerBlock{
    display: flex;
    min-width: 100%;
margin-bottom: 8px;
}
/* .container{
    max-width: 1500px;
    margin: auto;
} */
/*for logo and navigation*/
.container1{
    display: flex;
    /* min-width: 68%; */
    flex-basis: 75%;
}
.logoHeader {
    width: 10%;
}
.logoHeader a{
     display: block;
     height: 60px; 
   
}
.logoHeader img {
       margin-left: 11px;
       margin-top: 7px;
       max-width: 59%;
       size: 20px;
       width: 50px;
       height: 45px;
}
/* img{
} */
nav.navBar {
    width: 70%;
    margin: 6px -5px 6px 4px;
}
.navUl {
    display: flex;
    list-style: none;
    margin-top: 9px;
    /* justify-content: space-evenly; */
}
/* .navUl li {
    margin: 12px;
} */
.navUl li{
    margin-left: 26px;
}
.navUl li a{
     text-decoration: none;
    color: white;
    font-weight: bolder;
    font-size: 21px;
}
.navUl li a:hover {
    background-color: #fdfdfd;
    color: black;
    padding: 3px;
    border-radius: 10px;
    transition: 0.3s;
   
}
/*For search and login/Up*/
.container2{
    display: inline-flex;
    /* min-width: 30%; */
    flex-direction: column-reverse;
    flex-basis: 30%;
}
/* LoginUp Buttons */
.btnContainer {
        /* height: 37px; */
        display: flex;
        align-items: center;
        /* margin: auto; */
        flex-direction: row-reverse;
        /* margin-bottom: 12px; */
        flex-basis: 100%;
    }

.btn{
    margin: 6px;
    padding: 10px 20px;
    background-color: #f8f9fc;
    color: #121111;
    font-family: Poppins, sans-serif;
    border: none;
    border-radius: 12px;
    /* width: 23%; */
    min-width: 29%;
    height: 38px;
}

.btn:hover{

background-color: #76b2f7;

color: #ffffff;
cursor: pointer;
border: wheat;
transition: 0.35s;
}
/* header */
        body{
            background-color: #193e4b;
            font-family: Poppins, sans-serif;
            font-size: large;
            width: 100%;
            margin: 0px;
        }
        .container{
            height: 500px;
            width: 700px;
            background-color: white;
            text-align: center;
            padding: 20px;
            margin:110px auto;
            border-top-left-radius: 203px ;
            border-bottom-right-radius:203px ;
        }
        .box{
            background-color: rgba(128, 128, 128, 0.418);
            cursor: pointer;
        }
        
        
        .btnak{
            color: white;
            background-color: rgb(40, 163, 211);
            margin: 20px;
            width: 110px;
            padding: 3px;
            cursor: pointer;
    
        }
        .btnak:hover{
            background-color: skyblue;
            color:black;
        }

        @media (max-width: 770px) {
       .container{
           width: 500px;
           margin-top: 140px;
       }
    }
       @media (max-width: 570px) {
       .container{
           width: 400px;
           margin-top: 140px;
       }
  }
.akk{
    width: 100%;
}
.jack{
    width: 100%;
}
/* td{
    color: white;
    padding: 20px;
    margin:20px;
}
a{
    color: red;
    padding: 20px;
    margin:20px; 
} */
    </style>
</head>
<body>
    <!-- <div class="ak"> -->
        <div class="akk">
            <header>
   
                <div class="container55">
                  <div class="headerBlock">
                    <!-- Container--1 -->
                    <div class="container1">
                      <div class="logoHeader">
                        <a href="index.html"><img src="Image/Logo.png" alt="logo"></a>
                      </div>
                      <nav class="navBar">
                        <ul class="navUl">
                          <li><a href="index.html" class="active">Home</a></li>
                          <li><a href="teamFinal.html">About Us</a></li>
                          <li><a href="cont.html">Contact Us</a></li>
                          <!-- <li><a href="Project 2/index2.html">Ask Your Queries</a></li> -->
                        </ul>
                      </nav>
                    </div>
                    <div class="container2">
                    
                      <div class="btnContainer">
                        <a href="login.php"><button class="btn" id="btn1">Login</button></a>
                        <a href="signup.php"><button class="btn" id="btn2" >Sign Up</button></a>
                      </div>
                    </div>
                    <!-- Container-2 -->
                  </div>
                </div>
              </header>
        </div>
        <div class="jac">

            <div class="container">
                <h1>Sign Up</h1>
            <div>Please fill in this form to create an account!</div>
            <hr>
            <form action="signup.php" method="post">
                <div>
                    State:            <input type="text" name="t1" class="box">
                </div>
                <br>
                <div>
                    District:         <input type="text" name="t2" class="box">
                </div>
                <br> 
                <div>
                    University Name:  <input type="text" name="t3" class="box">
                </div>
                <br>
                <div>
                    College Name:     <input type="text" name="t4" class="box">
                </div>
                <br>
                <div>
                    Contact Number:   <input type="text" name="t5" class="box">
                </div>
                <br>
                <div>
                    E-mail:           <input type="text" name="t6" class="box">
                </div>
                <br>
                <div>
                    Password:         <input type="password" name="t7" class="box">
                </div>
                <br> 
                <input class="btnak" type="submit" name="b" value="Sign Up">
                
                
            </form>
        </div>
    <!-- </div> -->
    </div>
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
		$g=$_POST['t7'];
		if($a==""||$b==""||$c==""||$d==""||$e==""||$f==""||$g=="")
			echo"<script>alert('Please Fill All Required Data')</script>";
            else
            {
			include("connect.php");
			$s="select * from login where uni='$c' and col='$d'";
			$rs=mysqli_query($con,$s);
			$t=0;
			while($r=mysqli_fetch_array($rs))
			{
				$t=1;
			}
			
			if($t==0)
				{
                    include("connect.php");
                    $s="insert into login values('$a','$b','$c','$d','$e','$f','$g')";
					mysqli_query($con,$s);
					mysqli_close($con);
					echo"<center><table>";
					echo"<tr><td>Sign Up Successfully";
					echo"<tr><td><a href='index.html'>Home</a>";
				}
                else
				echo"<script>alert('This college in entered university is already existed')</script>";
		}
}
?>