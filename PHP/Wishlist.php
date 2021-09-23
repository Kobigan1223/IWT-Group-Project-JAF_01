<?php 
session_start();
require 'config.php';
if(isset($_SESSION['user_id'])){
	$user_id = $_SESSION['user_id'];
    $sql = "SELECT p.productImage1Loc,p.productName,p.productPrice,p.productQty,p.productID, wp.wishlistid FROM product_details p , wishlist_products wp WHERE p.productID=wp.productID AND p.productID IN (SELECT productID FROM wishlist_products WHERE wishlistid =(SELECT wishlistid FROM wishlist_user WHERE userID = '$user_id'))";
    if($result=$con->query($sql))
	{
		$con->error;
	}
	$prdarray=array();
	$index = 0;
	//echo $result->num_rows;
	while($productdata = $result->fetch_assoc()){
		foreach ($productdata as $names=>$values) 
		{
			$prdarray[$index][$names] =$values;										
		}
		$index++;
	}
	$prdobj=$prdarray;
	if(isset($_POST['remprdid']))
	{
		$prdremquery = "DELETE FROM wishlist_products WHERE productID = '".$_POST['remprdid']."' AND wishlistid = '".$prdobj[0]['wishlistid']."'";
		//echo $prdremquery;
		if($con->query($prdremquery))
		{
			echo "<script>alert('Wishlist Product Deleted Successfully!');document.location='wishlist.php';</script>";
		}
		else
		{
			echo $con->error;
		}
	}    
?>
<html>
	<head>
		<title> wishlist </title>
		 <link rel="stylesheet" type="text/css" href="../CSS/default2.css">
		 <link rel="stylesheet" href="../CSS/cart.css">
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
				<button class="button navbactive" onclick="document.location='Wishlist.php'">Wishlist</button>
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
		
<?php
	
	//print_r($prdobj);
	$prdobjlen= count($prdarray);
	if($prdobjlen>0){
        ?>
        
        <center>
			<div class="cart-page">
		<table>
			<tr>
			  
				<th class="abc1"><center><b>Product</b></center></th>
				<th class="abc2"><center><b>Name</b><center></th>
				<th class="abc3"><center><b>Price</b></center></th>
				<th class="abc3"><center><b>Stock-Status</b></center></th>
				
			  
			</tr>
					<?php 
		for($x=0;$x<$prdobjlen;$x++){									
					?>

					<tr id = "pro1">
						<td>
							<div class="cart">
                                 <hr class="hrline1">

								<img src="<?php echo $prdobj[$x]['productImage1Loc']; ?>" style="width: 250px;height: 300px;">
								 <div class="read"> 
						    <br><br>
						     <a class="button" href="product.php?Product=<?php echo $prdobj[$x]['productID'];?>"> view </a>
							<br><br>
							<button class="button" onclick="removewish_data('<?php echo $prdobj[$x]['productID'];?>')"> Remove </button>
							
						   </div>
					</div>
				</td>
				    <td>
                    <center><b> <h5><?php echo $prdobj[$x]['productName']; ?> </h5></b></center>
				</td>

                <td>
                    <center><h5>RS <?php echo $prdobj[$x]['productPrice']; ?></h5></center>
				</td>
				<td>
                    <center><h5><?php if($prdobj[$x]['productQty']){echo "in Stock";}else{ echo "Out of Stock";} ?></h5></center>
				</td>
			</tr>
					<?php
		          }
					?>
				</table>						
						
			 <hr class="hrline1">
			 <?php
	}
	else{
				?>
				<div>
				<center>
					<h3>No wishlist Products Available!!</h3>
                </center>
                <div style="margin : 300px 0;">
                
                </div>
                    
       

				<?php
	}
				?>
				<form id="remprderm" method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>">
					<input type="hidden" id="remprdid" name="remprdid">
				</form>
			</div>
		
		
	 </div>


    </div>
</center>
	<script>
        var remprderm = document.getElementById("remprderm");
var remprdidmem = document.getElementById("remprdid");
function removewish_data(prdid) {
	remprdidmem.value = prdid;
	remprderm.submit();
}

		  </script>
		
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
