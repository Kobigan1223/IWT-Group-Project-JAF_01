<?php 
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>About-VKQube</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Header and footer-->
	<link rel="stylesheet" type="text/css" href="../CSS/default2.css" />
	<link rel="stylesheet" href="../CSS/about.css">
	<link rel="stylesheet" href="../CSS/popup.css">


		 
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

            <a href="About.php" class="menuactive">About-Us</a>
            <a style="float:right;" href="search.php"><b>Search</b></a>

        </div>


    </header>
	<br> <br>
	
	<div class="slider_container">
<div class="about-section">
  <h1>About Us</h1> <br>
	<p style="text-align:center">Welcome to VK Qube, your number one source for all things [Home essentials, Fashion products, Groceries, Electronics and more]. We're dedicated to giving you the very best of products, with a focus on quality products, customer service and secured shopping.
		VK Qube Founded in 2017 by Kobigan K, and it has come a long way from its beginnings in Jaffna. We now serve customers all over the island, and are thrilled to be a part of the quirky, eco-friendly, fair trade wing of the Online shopping platform.
	<br></p>
 
</div>
<br><br>
<h2 style="text-align:center">Our Team</h2><br>
<div class="row">
  <div class="column">
    <div class="card">
      <div class="container">
        <h2>Kobigan K</h2><br>
        <p class="title">Founder</p><br>
	 <p   style="text-align:justify">Kobigan is the founder promoter of VK Qube and brings with him over three years of experience in Human Resource Management.</p> <br> <br> <br>
       <p>kobi18@gmail.com</p> 
		<div class="boxbtn">
        <p><button class="button2"><a href="www.gmail.com">Contact</a></button></p>
		</div>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
        <div class="container">
        <h2>Viththagan R N</h2><br>
        <p class="title">Managing Director</p><br>
        <p style="text-align:justify">Developing and executing VK Qube's business strategies. Providing strategic advice to the board. Preparing and implementing comprehensive business plans to facilitate achievement.</p> 
        <br><p>vith06@yahoo.com</p>
		<div class="boxbtn">
        <p><button class="button2"><a href="www.gmail.com">Contact</a></button></p>
		</div>
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
          <div class="container">
        <h2>Kajansika S</h2> <br>
        <p class="title">Administrator</p> <br>
        <p style="text-align:justify">Responsible for both the behind-the-scenes operations of a retail shopping center. Include negotiating handling maintenance requests, or contracting security agencies.</p> <br> <br>
       <p>kaja29@gmail.com</p>
	   <div class="boxbtn">
        <p><button class="button2"><a href="www.gmail.com">Contact</a></button></p>
		</div>
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
          <div class="container">
        <h2>Kumaran S</h2> <br>
        <p class="title">Designer</p> <br>
         <p style="text-align:justify">Understanding both graphic design and computer programming. Helps with maintenance and additions to the website. Creating back up files and Solving code problems</p> <br> <br>
        <p>kumar14@gmail.com</p> 
       <div class="boxbtn">
        <p><button class="button2"><a href="www.gmail.com">Contact</a></button></p>
		</div>
      </div>
    </div>
  </div>

<div class="popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <h1>Chat</h1>

    <label for="msg"><b>Message</b></label>
    <textarea placeholder="Type message.." name="msg" required></textarea>

    <button type="submit" class="btn">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

	<script src = "../JS/popup.js"> </script>


<h2 style = "text-align: center;">Find VK Qube</h2>
<img id="myImg" src="../images/about/locate.jpg" alt="VK Qube" width="300" height="300">

<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

	<script src = "../JS/locateimage.js"> </script>
<br><br><br><br><br>


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
