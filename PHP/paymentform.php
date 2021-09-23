<?php
session_start();
require'config.php';
if(isset($_SESSION['user_id'])){
	$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>

<head>
	<title>Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Header and footer-->
	<link rel="stylesheet" type="text/css" href="../CSS/default2.css" />
	<link rel="stylesheet" href="../CSS/payment.css">
	<script src = "../JS/cardval.js"> </script>
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
				<button class="button" onclick="document.location='userselector.php'">My Account</button>
				<button class="button" onclick="document.location='Wishlist.php'">Wishlist</button>
				<button class="button" onclick="document.location='My Cart.php'">My Cart</button>
				<button class="button" onclick="document.location='logout.php'">Log Out</button>
			</div>

		</div>

		<hr class="hrline1">



		<div class="navbar scnd">
			<a href="home.php">Home</a>
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
			<a style="float:right;" href="search.php">Search</a>
		</div>
	</header> 
  <br>
			
    <center> <h2 style= "color: #00008b;">Payment Checkout </h2> </center><br> <br>

<div class="row">
  <div class="col-75">
    <div class="container">
      <form id="details" method="post" action="bank.php">
          <?php 
          if(isset($_POST['amount'])){
              ?>
          <input type="hidden" value = "<?php echo $_POST['amount']; ?>" name ="totalamount" id="totalamount">
          <?php 
          }
          ?>
      
        <div class="row">
         <div class="col-50">
            <h2 style= "color: #00008b;">Billing Address</h2> <br>
			
            <label for="fname"> Full Name</label>
            <input type="text" id="fname" name="fullname" onchange="validate();" placeholder="Zara Joseph" autofocus required>
			<script src = "../JS/nameval.js"> </script>
		
			
            <label for="email"> Email</label>
            <input type="text" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9]+\.[a-z]{2-3}" id="email" name="email" placeholder="zara12@example.com" required>
							
            <label for="adr"> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 Main Street" required>

            <label for="city"> City</label>
            <input type="text" pattern="[A-Za-z\s]+" id="city" name="city" placeholder="Jaffna" required>
			
			<label for="phone"> Phone No </label>
            <input type="text" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" id="phone" name="phone" placeholder="077-456-7890" required>

            <div class="row">
              <div class="col-50">
                <label for="state">Province</label>
                <input type="text" pattern="[A-Za-z\s]+" id="state" name="state" placeholder="Nothern" required>
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" pattern="[0-9]{5}" id="zip" name="zip" placeholder="40000" required>
              </div>
            </div>
          </div>

          <div class="col-50">
            <h2 style= "color: #00008b;">Payment</h2> <br>
            <label for="fname">Accepted Cards <br> <b>Visa &nbsp; Master</b> </label>
            
            <label for="cname">Name on Card</label>
            <input type="text" pattern="[A-Za-z\s]+" id="cname" name="cardname" placeholder="Name on Card" required>
            <label for="ccnum">Credit card number</label>
            <input type="text" pattern="[0-9\s]{19}" id="ccnum" name="cardnumber" oninput="cardchk(this);" placeholder="1111-2222-3333-4444"><img id="visa" style="width:60px;display:none;"src="../images/payment/visa.png"><img style="width:60px;display:none;;" id="master" src="../images/payment/master.png" required>
			<label for="cvv">CVV</label>
                <input type="text" pattern="[0-9]{3}" id="cvv" name="cvv" placeholder="352" required>
            <label for="expmonth">Expiry &nbsp;
			   <select id="month" name="month" required>
	
	<option value="0">January</option>
	<option value="1">February</option>
	<option value="2">March</option>
	<option value="3">April</option>
	<option value="4">May</option>
	<option value="5">June</option>
	<option value="6">July</option>
	<option value="7">August</option>
	<option value="8">September</option>
	<option value="9">October</option>
	<option value="10">November</option>
	<option value="11">December</option>
	</select>  
            

            <div class="row">
              <div class="col-50">
                
	<select id="year" name="year" required>
	
	<option value="0">2020</option>
	<option value="1">2021</option>
	<option value="2">2022</option>
	<option value="3">2023</option>
	<option value="4">2024</option>
	<option value="5">2025</option>
	<option value="6">2026</option>
	<option value="7">2027</option>
	<option value="8">2028</option>
	<option value="9">2029</option>
	<option value="10">2030</option>

</select> 
                </div>
                </div>
                </label>
                
              </div>
              
            </div>
          
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
          <button type="submit" class="btnsubmit" name="btnsubmit" ><b>Continue to checkout</b></button>
		
		<a type="cancel" class="btncancel" href='paymentfailed.php'><b>Cancel</b></a>
      </form>
    </div>
  </div>

</div>
 <br><br>
	   	  
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
else{
    header('location:login.php');
}
?>
