<?php 
session_start();
?>
<html>
	<head>
		<title> Terms and conditions</title>
		 <link rel="stylesheet" type="text/css" href="../CSS/default2.css">
		 <link rel="stylesheet" type="text/css" href="../CSS/style.css"/>
	</head>
	
	<body>
<header>
        <hr class="hrline1">

        <div class="navbar">
            <div>
                <a href="home.php"><img src="../images/default/logo.png" width="35" height="35"></a>
                <h3 style="float:left"> <i><u>VK-QubE </u></i> </h3>
            </div>
            <div class="but">
                <?php if(isset($_SESSION['user_id'])){ ?>
                <button class="button" onclick="document.location='userselector.php'">My Account</button>
                <button class="button" onclick="document.location='Wishlist.php'">Wishlist</button>
                <button class="button" onclick="document.location='My Cart.php'">My Cart</button>
                <button class="button" onclick="document.location='logout.php'" )>Log Out</button>
                <?php } else { ?>

                <button class="button" onclick="document.location='login.php'">Log in</button>
                <?php } ?>
            </div>

        </div>

        <hr class="hrline1">

        <div class="navbar scnd">
            <a href="Home.php">Home</a>
            <div class="drp1">
                <button class="drpbtn1">Shop</button>
                <div class="drp1-content">
                    <a href="dressmart.php">Dress-Mart</a>
                    <a href="techworld.php">Tech-World</a>
                    <a href="homeneeds.php">Home-Needs</a>
                    <a href="groceryworld.php">Grosery-World</a>
                    <a href="kidzone.php">Kids-Zone</a>
                </div>
            </div>

            <a href="About.php">About-Us</a>
            <a style="float:right;" href="search.php"><b>Search</b></a>

        </div>


    </header>
		<br>
		 <div class="navbar">Terms and conditions</div>
		
		<center><h1><b>Privacy Policy<b></h1></center>
         <h4>We are not collecting personal data but we do use third party applications that may do.
	   Please verify their privacy policies to find out more: Google Analytics, Google Adsense, Gmail, Facebook, Youtube.
	   We might add or remove thrid party applications to the website at any time without notice.
	   Please check the source code of the site or use browser plugins to identify them.<h4>
        <br>
       <h4>Our Privacy Policy was posted on 13 September 2012 and last updated on 16 April 2018.
	  It governs the privacy terms of our Website, located at html-css-js.com.
	  Any capitalized terms not defined in our Privacy Policy, have the meaning as specified in our Terms of Use accessible above.</h4>

       <center><h1><b> Your Privacy</b></h1></center>
      <h4>HTML CSS JS follows all legal requirements to protect your privacy. 
      Our Privacy Policy is a legal statement that explains how we may collect information from you,
	  how we may share your information, and how you can limit our sharing of your information.</h4>
		
		
		
		<center><h1><b>Terms of Service </b></h1></center>
		
<h4>These HTML-CSS-JS Analytics Terms of Service (this "Agreement") are entered into by Ruwix Services SRL. ("WWWEEEBBB") and the entity executing this Agreement ("You").
 This Agreement governs Your use of this website (the "Service"). BY STAYING ON THIS WEBSITE, AND USING THE SERVICE,
 YOU ACKNOWLEDGE THAT YOU HAVE REVIEWED AND ACCEPT THIS AGREEMENT AND ARE AUTHORIZED TO ACT ON BEHALF OF, AND BIND TO THIS AGREEMENT.
 In consideration of the foregoing, the parties agree as specified below.</h4>

We may amend this Agreement at any time by posting the amended terms on our Website. We may or may not post notices on the homepage of our Website when such changes occur.

We refer to this Agreement, our Privacy Policy accessible below, and any other terms, rules, or guidelines on our Website collectively as our "Legal Terms." 
You explicitly and implicitly agree to be bound by our Legal Terms each time you access our Website. If you do not wish to be so bound, please do not use or access our Website.</h4>



		
		<center><h1><b>Limited License </b></h1></center>
		</h4>HTML CSS JS grants you a non-exclusive, non-transferable, revocable license to access and use our Website 
		in order for you to make purchases of electronic documents and related services through our Website, </h4>
		strictly in accordance with our Legal Terms.
		
		 <hr class="hrline1">
		 
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