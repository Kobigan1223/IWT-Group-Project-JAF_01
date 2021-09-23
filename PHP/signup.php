<?php
		if(isset($_POST['submit'])){
			session_start();
			require'config.php';
			$email=$_POST['email'];
			$uName=$_POST['uName'];		
			$password=$_POST['password'];
			$check = "select userid,password from user_credentials where email='$email'";
			$result=$con->query($check);

			$_SESSION['inpemail']=$email;
			$_SESSION['inpuName']=$uName;
			if($result->num_rows != 1) 		
			{
				$check = "select userid from user_details WHERE userid like 'CMR%' ORDER BY userid ASC" ;
				$result=$con->query($check);
				while($row = $result->fetch_assoc()) 
				{
					$lastid = $row['userid'];
				}
				$newIDno = substr($lastid, 3)+1;
				$newIDno=str_pad($newIDno, 3, '0', STR_PAD_LEFT);
				$newID="CMR".$newIDno;
				$adduser ="INSERT INTO user_details (userId,userName) VALUES('".$newID."','".$uName."');";				
				if($con->query($adduser)){
					$adduser ="INSERT INTO user_credentials (userId, email, password) VALUES('".$newID."', '".$email."', '".$password."');";
					if(!$con->query($adduser)){
						echo "<br>".$con->error;
						$deletedata ="DELETE FROM user_details where userId='".$newID."';";
						$con->query($deletedata);
					}
					header('location:login.php');
					echo "<script>alert('New User-Registration-Successfully');</script>";

				}
				else{
					echo "<br>".$con->error;
				}

				$con->close();			
			}else
			{
				$con->close();
			echo "<script>alert('already registered Email!'');</script>";					
			}

		}
		?>


<html>
  <head>
    
	<title>Sign-Up Page</title>
    <link rel="stylesheet" href="..\css\mysignup.css">
	<link rel="stylesheet" href="..\css\default2.css">
    
	
	 <script src="..\js/login.js" type="text/javascript"></script>
	
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
				<button class="button " onclick="document.location='Login.php';">Log in</button>
			</div>
		
	 </div>
		
		<hr class="hrline1">
		
		

		<div class="navbar scnd">
			<a   href="home.php" >Home</a>
			
			<a  href="About.php">About-Us</a>
			
		</div>
		
		
	</header>
	<br>
	
	
    <div>
           
            <form class="box" method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" onsubmit="return register()">	
	             <a href="home.php"><img src="../images/default/logo.png" width="35" height="35"></a>
	            <h1>Sign-Up</h1>
	            <input type="text" id="Email" name="email" placeholder="Email-ID" value="<?php if(isset($_SESSION['inpemail'])){echo $_SESSION['inpemail'];}?>" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9]+\.[a-z]{2,3}" required>

	            <input type="text" id="Username" name="uName" value="<?php if(isset($_SESSION['inpuName'])){echo $_SESSION['inpuName'];}?>" placeholder="Username"  pattern="[a-zA-Z0-9\s._,]+" required>

				<input type="password" id="password" name="password" placeholder="password" pattern="[a-zA-Z0-9@]{5,15}" required>

				<input type="password"id="repassword"  placeholder="Re-enter-password" pattern="[a-zA-Z0-9@]{5,15}" required>
			    
			    <h3>Accept Privacy policy and terms</h3>
			    <br>
				<input type="checkbox" id="policy" name="policy" >
				<input type="submit" name="submit" value="Register" >

	
	        </form>
	
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
				<i class="icon"><img src="..\images/icons/map-marker.png" alt=""></i>
				<p><span>Main Street</span> Jaffna, Sri-lanka</p>
			</div>

			<div>
				<i class="icon"><img src="..\images/icons/phone.png" alt=""></i>
				<p>+021 222 2121</p>
			</div>

			<div>
				<i class="icon envelope"><img src="..\images/icons/envelope.png" alt=""></i>
				<p><a href="mailto:support@VKQUBE.com">contact@VKQUBE.com</a></p>
			</div>

		</div>

		<div class="footer-right">

			<p class="footer-company-about">
				<span>About the company</span>
				VKQUBE is a Online Shopping Mall in jaffna.
			</p>

			<div class="footer-icons">
				<a href="www.facebook.com" class="icon"><img src="..\images/icons/facebook.png" alt=""></a>
				<a href="www.twitter.com" class="icon"><img src="..\images/icons/twitter.png" alt=""></a>
				<a href="www.linkdin.com" class="icon"><img src="..\images/icons/linkedin.png" alt=""></a>
				<a href="www.instagram.com" class="icon"><img src="..\images/icons/instagram.png" alt=""></a>
			</div>

		</div>

	</footer>
  </body>
</html>