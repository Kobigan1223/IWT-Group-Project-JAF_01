<?php 
session_start();
require 'config.php';
if(isset($_REQUEST['SHOP'])){
$shopID = $_REQUEST['SHOP'];
if($shopID == 'SHP001')
{
    $email = 'DressMart@gmail.com';
    $phone = '+9421222233';
	$location='dressmart.php';
}
else if($shopID == 'SHP002')
{
    $email = 'Tech_World@gmail.com';
    $phone = '+9421222244';
	$location='techworld.php';
}
else if($shopID == 'SHP003')
{
    $email = 'HomeNeeds@gmail.com';
    $phone = '+9421222255';
	$location='homeneeds.php';
}
else if($shopID == 'SHP004')
{
    $email = 'GroceryWorld@gmail.com';
    $phone = '+9421222266';
	$location='groceryworld.php';
}
else if($shopID == 'SHP005'){
  $email = 'kidZone@gmail.com';
    $phone = '+9421222211'; 
	$location='kidzone.php';
}
    else{
         header('location:home.php');
    }
?>
<html>

<head>
    <title> contact-Page</title>
    <link rel="stylesheet" type="text/css" href="../CSS/default2.css" />
    <link rel="stylesheet" type="text/css" href="../CSS/contact.css">
</head>

<body>
	 <header>
	    <div class="" style="width:100%;">
         <hr class="hrline1">
     
	 <div class="navbar">
	    <div>
		<a href="home.php"><img src="../images/default/logo.png" width="35" height="35"></a>
	    <h3 style="float:left" > <i><u>VK-QubE </u></i> </h3>
		</div>
		     <div class="but">
			     <?php if(isset($_SESSION['user_id'])){ ?>
				      <button class="button" onclick="document.location='userselector.php'">My Account</button>
				      <button class="button" onclick="document.location='Wishlist.php'">Wishlist</button>
				      <button class="button" onclick="document.location='My Cart.php'">My Cart</button>
				      <button class="button" onclick="document.location='logout.php'")>Log Out</button>
				 <?php }
				  else 
				  	{ ?>
					  <button class="button" onclick="document.location='login.php'">Log in</button>
				<?php }
				 ?>
		</div>
		
	 </div>
		
		<hr class="hrline1">
		<div class="navbar scnd">
			<a   href="Home.php" >Home</a>
			<div class="drp1">
				<button class="drpbtn1" >Shop</button>
				<div class="drp1-content">
					<a href="dressmart.php">Dress-Mart</a>
					<a href="techworld.php">Tech-World</a>
					<a href="homeneeds.php">Home-Needs</a>
					<a href="groceryworld.php">Grosery-World</a>
					<a href="kidzone.php">Kids-Zone</a>
				</div>
			</div>
			
			<a  href="About.php">About-Us</a>
			<a style="float:right;" href="search.php"><b>Search</b></a>
			
		</div>
		<br><br>
		
		<div class="navbar scnd">
			<a href="<?php echo $location;?>" >HoT-Deals</a>
			<a href="Contact.php?SHOP=SHP004" class="menuactive">Contact-Us</a>
			<h3 class="navbar"  style="float:right; margin-right:250px;" ><b>.......Grocery World......</b></h3>

		
		</div>
		
		 </div>
		</header>
    <section>
        <div class="container">
            <div class="contactinfo">
                <div>
                    <h2> Contact info </h2>
                    <ul class="info">
                        <li>
                            <span> <img src="../images/icons/location.png" alt="Location"></span>
                            <span>
                                VK-QUBE<br />
                                main road<br />
                                jaffna
                            </span>
                        </li>
                        <li>
                            <span> <img src="../images/icons/mail.png" alt="Mail"></span>
                            <span> <?php echo $email ?></span>
                        </li>
                        <li>
                            <span> <img src="../images/icons/phone%20(2).png" alt="phone"></span>
                            <span> <?php echo $phone ?> </span>
                        </li>
                    </ul>
                </div>
            </div>
            <form action="mailto:contact@VKQUBE.com" method="post">
                <div class="contactForm">
                    <h2>Send a message </h2>
                    <div class="formBox">
                        <div>
                            <div class="inputBox w50">
                                <input type="text" name="" pattern="[a-zA-Z\s]+" required autofocus>
                                <span>First Name </span>
                            </div>
                            <div class="inputBox w50">
                                <input type="text" name="" pattern="[a-zA-Z\s]+" required>
                                <span>Last Name </span>
                            </div>
                        </div>
                        <div>
                            <div class="inputBox w50">
                                <input type="text" name="" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9]+\.[a-z]{2,3}" required>
                                <span>Email Address</span>
                            </div>
                            <div class="inputBox w50">
                                <input type="text" name="" pattern="[0-9]{10}" required>
                                <span>Mobile No</span>
                            </div>
                            <div class="inputBox w100">
                                <textarea name="" required></textarea>
                                <span>Write your message here....</span>
                            </div>
                            <div class="inputBox w100">
                                <input type="submit" value="send">
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </section>






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
<?php
}
else
    header('location:home.php');
?>
