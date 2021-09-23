<?php 
session_start();
require 'config.php';


if(isset($_POST['wishaddProduct'])){
	$sql="SELECT wishlistid FROM wishlist_user "
		." WHERE userid='".$_SESSION['user_id']."'";
	$result = $con->query($sql);
	$wishid=$result->fetch_assoc();	
	if(!$result->num_rows)
	{
		$check ="SELECT wishlistid FROM wishlist_user "
			." ORDER BY wishlistid ASC";
		$result=$con->query($check);
		$lastid=null;
		while($row = $result->fetch_assoc()) 
		{
			$lastid = $row['wishlistid'];
		}
		$newIDno = substr($lastid, 3)+1;
		$newIDno=str_pad($newIDno, 3, '0', STR_PAD_LEFT);
		$newID="WSH".$newIDno;
		$sql="INSERT INTO wishlist_user (wishlistid, userid) "
			." VALUES ('".$newID."', '".$_SESSION['user_id']."')";
		if(!$result = $con->query($sql))
		{
			echo $con->error;       
		}
		else{
			$wishid['wishlistid']=$newID;
		}

	}
	$sql="INSERT INTO wishlist_products (wishlistid, productid) "
		." VALUES ('".$wishid['wishlistid']."', '".$_POST['wishaddProduct']."')";
	if(!$result = $con->query($sql))
	{
		echo "<script>alert('Already added to Wishlist!!')</script>";
	}
	else
	{
		echo "<script>alert('Added to Wishlist!!')</script>";
	}
}

if(isset($_POST['cartchoice'])){
	$sql="SELECT cartId FROM cart_user "
		." WHERE userID ='".$_SESSION['user_id']."'";
	$result = $con->query($sql);
	$cartid=$result->fetch_assoc();	
	if(!$result->num_rows)
	{
		$check ="SELECT cartId FROM cart_user "
			." ORDER BY cartId ASC";
		$result=$con->query($check);
		$lastid=null;
		while($row = $result->fetch_assoc()) 
		{
			$lastid = $row['cartId'];
		}
		$newIDno = substr($lastid, 3)+1;
		$newIDno=str_pad($newIDno, 3, '0', STR_PAD_LEFT);
		$newID="CRT".$newIDno;
		$sql="INSERT INTO cart_user (cartId, userID) "
			." VALUES ('".$newID."', '".$_SESSION['user_id']."')";
		if(!$result = $con->query($sql))
		{
			echo $con->error;       
		}
		else
		{
			$cartid['cartId']=$newID;
		}

	}

	$insertsql="INSERT INTO cart_products (cartId, productID ,cartquantity ";
	$valuessql=" VALUES ('".$cartid['cartId']."', '".$_POST['cartproductid']."',".$_POST['quantity']."";
	if(isset($_POST['color'])){
		$insertsql.=",cartcolor";
		$valuessql.=",'".$_POST['color']."'";
	}

	$insertsql.=") ";
	$valuessql.=");";
	$sql=$insertsql.$valuessql;
	if(!$result = $con->query($sql))
	{
		echo "<script>alert('Already added to Cart!!')</script>";
	}
	else
	{
		echo "<script>alert('Added to Cart!!')</script>";
		if($_POST['cartchoice']==2){
			echo "<script>document.location='My cart.php';</script>";
			
		}
	}








}



if(isset($_REQUEST['Product'])){
	$sql = "SELECT * FROM product_details pd "
		." WHERE pd.productid='".$_REQUEST['Product']."' AND availability='Available'";
	$result = $con->query($sql);
	$prd=$result->num_rows;
}
if(isset($_REQUEST['Product'])&&$prd){

	$product_id = $_REQUEST['Product'];
	$sql = "SELECT pd.* , sp.shopid FROM product_details pd, shop_products sp WHERE sp.productid=pd.productid AND pd.productid='".$product_id."'";
	$result = $con->query($sql);
	$prddata = $result->fetch_assoc();

	//Get color data
	$sql = "SELECT color"
		. " FROM product_color"
		. " WHERE productid ='".$product_id."' ORDER BY color";
	if(!$result = $con->query($sql)){
		echo $con->error;
	}
	if($result->num_rows>0){
		$prdcoldata = $result->fetch_all();
		$prdcoldatalen= count($prdcoldata);			
	}

?>


<!DOCTYPE html>
<html>

	<head>
		<title><?php echo $prddata['productName']; ?></title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Header and footer-->
		<link rel="stylesheet" type="text/css" href="../CSS/default2.css" />
		<!-- Own Page-->
		<link rel="stylesheet" type="text/css" href="../CSS/product.css">

	</head>

	<body>
		<header>
			<hr class="hrline1">

			<div class="navbar">
				<div>
					<a href="Home.php"><img src="../images/default/logo.png" width="35" height="35"></a>
					<h3 style="float:left"> <i><u>VK-QubE </u></i> </h3>
				</div>
				<div class="but">
					<?php if(isset($_SESSION['user_id'])){ ?>
					<button class="button" onclick="document.location='userselector.php'">My Account</button>
					<button class="button" onclick="document.location='Wishlist.php'">Wishlist</button>
					<button class="button" onclick="document.location='My Cart.php'">My Cart</button>
					<button class="button" onclick="document.location='logout.php'")>Log Out</button>
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
				<a  style="float:right;" href="search.php">Search</a>
			</div>
		</header>



		<!-- The Modal -->
		<div id="myModal" class="modal">

			<!-- Modal content -->
			<div class="modal-content">
				<span class="close">&times;</span>
				<img class="modalimg" src="<?php echo $prddata['productImage1Loc']; ?>">
			</div>

		</div>


		<div class="wrapper">
			<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" id="addcartfrm" method="post" onsubmit="return false;">
				<input type="hidden" name="cartchoice">
				<input type="hidden" name="cartproductid" value="<?php echo $prddata['productid']; ?>">
				<div class="wtop">		
					<div class="left">
						<div class="left-top">
							<div class="left-col1">
								<img class="simg" src="<?php echo $prddata['productImage1Loc']; ?>" onmouseover="imgchg(0)" onmouseout="imgchg(4)" onclick="imgchg(0+5)">
								<br>
								<img class="simg" src="<?php echo $prddata['productImage2Loc']; ?>" onmouseover="imgchg(1)" onmouseout="imgchg(4)" onclick="imgchg(1+5)">
								<br>
								<img class="simg" src="<?php echo $prddata['productImage3Loc']; ?>" onmouseover="imgchg(2)" onmouseout="imgchg(4)" onclick="imgchg(2+5)">
								<br>
								<img class="simg" src="<?php echo $prddata['productImage4Loc']; ?>" onmouseover="imgchg(3)" onmouseout="imgchg(4)" onclick="imgchg(3+5)">
								<br>
							</div>
							<div class="left-col2">
								<img class="bimg" src="">
							</div>
						</div>

						<div class="left-bottom">
							<button id="addcart" onclick="<?php if(!isset($_SESSION['user_id'])){ ?>document.location='login.php'<?php }else { ?>sendcartf(1)<?php } ?>">Add to Cart</button>
							<button id="Buynow" onclick="<?php if(!isset($_SESSION['user_id'])){ ?>document.location='login.php'<?php }else { ?>sendcartf(2)<?php } ?>">Buynow</button>
						</div>
					</div>
					<div class="right">
						<div class="info">
							<h1 id="prod_name"><?php echo $prddata['productName']; ?></h1>
							<div class="info_data">
								<div class="data prdcd">
									<h4>Product code:</h4>
									<p><?php echo $prddata['productid']; ?></p>
								</div>
								<div class="data price">
									<h4>Price:</h4>
									<p><?php echo $prddata['productPrice']; ?></p>
								</div>
								<div class="data avail">
									<h4>Availability:</h4>
									<p><?php if($prddata['productQty']){echo "in Stock";}else{ echo "Out of Stock";} ?></p>
								</div>
								<?php if($prddata['productQty']){?>
								<div class="data quantitypan">
									<h4 for="quantity">Quantity:&nbsp;</h4>								
									<input type="number" id="quantity" value="1" name="quantity" min='1' max='<?php echo $prddata['productQty'];?>' onchange="qtychg(this);">
									<p>Available(<?php echo $prddata['productQty'];?>)</p>
								</div>
								<?php }?>
								<?php if(isset($prdcoldatalen)){?>
								<div class="data colorpan">
									<h4 for="color">Color: &nbsp;</h4>
									<select name="color">
										<?php for($i=0;$i<$prdcoldatalen;$i++){?>
										<option><?php echo $prdcoldata[$i][0];?></option>
										<?php }?>
									</select>
								</div>
								<?php }?>
								<div class="data seller">
									<h4>Seller:</h4>
									<p><?php echo $prddata['shopid']; ?></p>
								</div>
								<div class="data">
									<button onclick="<?php if(!isset($_SESSION['user_id'])){ ?>document.location='login.php'<?php }else { ?>addwish('<?php echo $prddata['productid']; ?>')<?php } ?>" id="addwlist" class="addwatchlist addwishlistbtn">&#x2661; Add to Wishlist</button>
								</div>

							</div>
						</div>
						<div class="info description">
							<h3>description</h3>
							<p><?php echo $prddata['productDescription']; ?></p>
						</div>
					</div>

				</div>
			</form>

			<h1 class="sitems">Similar Items</h1>
			<div class="similaritems">
				<main>
					<div class="list" id="list">
						<?php
	$sql = "SELECT productName,productid,productPrice,productImage1Loc "
		." FROM product_details "
		." WHERE availability='Available' AND productQty>0 AND productid IN (SELECT productID "
		."FROM shop_products "
		." WHERE shopid='".$prddata['shopid']."')";
	$result = $con->query($sql);
	$prdarray=array();
	$index = 0;
	while($productdata = $result->fetch_assoc()){
		foreach ($productdata as $names=>$values) 
		{
			$prdarray[$index][$names] =$values;										
		}
		$index++;
	}
	$prdobj=$prdarray;
	//print_r($prdobj);
	$prdobjlen= count($prdarray);

	if($prdobjlen>0){
		$used = array();
		$used[0] = -1;
		$check = 0;
		for($x=0;$x<4;$x++){									
			$random = rand(0,$prdobjlen-1);
			if($prdobj[$random]['productid']==$product_id){
				$x--;
				continue;
			}
			for ($j = 0; $j < $x; $j++) {
				if ($used[$j] == $random) {
					$check = 1;
					break;
				}
			}
			if ($check == 1) {
				$x--;
				$check = 0;
				continue;
			}
			$used[$x] = $random;
						?>
						<div class="simi-data">					
							<div class="sleft">
								<img width="50px" src="<?php echo $prdobj[$random]['productImage1Loc']; ?>">
							</div>
							<div class="sright">
								<div class="scol1">
									<h3 id="pName"><?php echo $prdobj[$random]['productName']; ?></h3>
									<div class="data">
										<h4 id="price">Price:</h4>
										<p><?php echo $prdobj[$random]['productPrice']; ?></p>
									</div>
									<div class="saddwatchlist">
										<button onclick="<?php if(!isset($_SESSION['user_id'])){ ?>document.location='login.php'<?php }else { ?>addwish('<?php echo $prdobj[$random]['productid']; ?>')<?php } ?>" class="addwishlistbtn">&#x2661; Add to Wishlist</button>
									</div>
								</div>
								<div class=scol2>
									<button id="View More" onclick="openprd('<?php echo $prdobj[$random]['productid']; ?>')" class="buttons0">View More</button>
								</div>
							</div>
						</div>


						<?php
		}
	}
	else{
						?>
						<div>
							<h3>No Similar Products Available!!</h3>
						</div>
						<?php
	}
						?>

					</div>
				</main>
				<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" id="openprd" method="get">
					<input type="hidden" name="Product">
				</form>	
				<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" id="wishprd" method="post">
					<input type="hidden" name="wishaddProduct">
				</form>	
			</div>
		</div>


		<script type="text/javascript" src="../JS/product.js"></script>


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
							$con->close();
}
else if(isset($prd)){
	echo "Product not Available!!<br>";
?>
<input value="Home" type="button" onclick="document.location='home.php'">
<?php
}
else
{
	echo "Session Out!!<br>";
?>
<input value="Home" type="button" onclick="document.location='home.php'">
<?php	
}
?>

