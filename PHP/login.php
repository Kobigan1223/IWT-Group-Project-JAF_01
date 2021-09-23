<?php
if(isset($_POST['submit'])){
	session_start();
}
if(isset($_POST['submit'])){
	require'config.php';
	$email=$_POST['email'];		
	$password=$_POST['password'];
	//echo $email."<br>". $password."  end<br>";
	$check = "select userid,password from user_credentials where email='$email'";
	$result=$con->query($check);
	//echo $result->num_rows;
	$con->close();
	$_SESSION['inpemail']=$email;
	if ($result->num_rows == 1) 		
	{
		//while($row = $result->fetch_assoc())
		$row = $result->fetch_assoc();
		//echo "ID: " . $row["userid"]. "<br>";
		if($row["password"]===$password){
			$_SESSION['user_id']=$row["userid"];		
			header('location:Home.php');	
		}
		else{
			echo "<script>alert('Password Wrong!');</script>";									
		}			
	}else
	{
		echo "<script>alert('Not a registered Email!');</script>";					
	}
}
?>

<html >
  <head>
    
	<title>Login Page</title>
    <link rel="stylesheet" href="..\css\mylogin.css">
	<link rel="stylesheet" href="..\css\default2.css">
  
	
 
 </head>
 
  <body>
  
  <hr class="hrline1">
  
  <header>
	
     
	 <div class="navbar">
	    <div>
		    <a href="home.php"><img src="../images/default/logo.png" width="35" height="35"></a>
	        <h3 style="float:left" > <i><u>VK-QubE </u></i> </h3>
		</div>
		<div class="but">
				<button class="button navbdisabled" onclick="document.location='cmrProfile.php'">My Account</button>
				<button class="button navbdisabled" onclick="document.location='Wishlist.php'">Wishlist</button>
				<button class="button navbdisabled" onclick="document.location='My Cart.php'">My Cart</button>
				<button class="button navbdisabled" onclick="alert('You\'ve been successfully Logged out!');document.location='Home.php';">Log Out</button>
				<button class="button navbdisabled" onclick="document.location='Login.php';">Log in</button>
		</div>
		
	 </div>
		
		<hr class="hrline1">
		<div class="navbar scnd">
			<a  href="Home.php" >Home</a>
			<a  href="About.php">About-Us</a>
			
		</div>
		
		
   </header>

        <br>
	
	<div class="box">
		<form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>">
    
	         <a href="home.php"><img src="../images/default/logo.png" width="35" height="35"></a>
	         <h1>login</h1>
	   
	         <input type="text" id="Email" name="email" placeholder="Email-ID" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9]+\.[a-z]{2,3}" value="<?php if(isset($_SESSION['inpemail'])){echo $_SESSION['inpemail'];}?>" required>
	         <input type="password" id="password" name="password" placeholder="password" pattern="[a-zA-Z0-9@]{5,15}" required >
	         
	         <input type="submit" name="submit" value="login"> 
	   </form>
	
	         <h3>New User?</h3>	  
	         <input type="button" name="sbutton" value="Register" onclick="document.location='signup.php'" >

	
	</div>
	   	  
		   
<footer class="footer-distributed">
		<div class="footer-left">
			<h3>VK<span>Qube</span></h3>
			<p class="footer-links">
				<a href="Home.php">Home</a>
				·
				<a href="About.php">About</a>
				·
				<a href="terms.php">Terms&amp;conditions</a>
			</p>

			<p class="footer-company-name">VKQUBE &copy; 2020</p>
		</div>

		<div class="footer-center">

			<div>
				<i class="icon"><img src="../images/icons/map-marker.png" alt=""></i>
				<p><span>Main Street</span> Jaffna, Sri-lanka</p>
			</div>

			<div>
				<i class="icon"><img src="../images/icons/phone.png" alt=""></i>
				<p>+021 222 2121</p>
			</div>

			<div>
				<i class="icon envelope"><img src="../images/icons/envelope.png" alt=""></i>
				<p><a href="mailto:support@VKQUBE.com">contact@VKQUBE.com</a></p>
			</div>

		</div>

		<div class="footer-right">

			<p class="footer-company-about">
				<span>About the company</span>
				VKQUBE is a Online Shopping Mall in jaffna.
			</p>

			<div class="footer-icons">
				<a href="www.facebook.com" class="icon"><img src="../images/icons/facebook.png" alt=""></a>
				<a href="www.twitter.com" class="icon"><img src="../images/icons/twitter.png" alt=""></a>
				<a href="www.linkdin.com" class="icon"><img src="../images/icons/linkedin.png" alt=""></a>
				<a href="www.instagram.com" class="icon"><img src="../images/icons/instagram.png" alt=""></a>
			</div>

		</div>

	</footer>
	
	
  </body>
</html>