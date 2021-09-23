<?php
session_start();
require 'config.php';

if(isset($_POST['order_id'])){
	$ordstatusquery = "UPDATE order_products SET ordstatus='".$_POST['order_status']."' WHERE orderId ='".$_POST['order_id']."' AND productID ='".$_POST['ord_st_prdid']."'";
	if($con->query($ordstatusquery))
	{
	echo "<script>
		alert('Status Changed Successfully!');
	</script>";
	}
	else{
		$con->error;
	}
}



if(isset($_POST['pimgsub'])){	
	if(!$_POST['rem']){
		move_uploaded_file($_FILES['pimg']['tmp_name'],"../images/userprofpics/".$_SESSION['user_id'].".jpg");
		$check = "UPDATE user_details
			SET profImgLoc = '../images/userprofpics/".$_SESSION['user_id'].".jpg'
			WHERE userid ='".$_SESSION['user_id']."'";
		$con->query($check);
	}
	else
	{
		$check = "UPDATE user_details
			SET profImgLoc = '../images/userprofpics/no_avatar.jpg'
			WHERE userid ='".$_SESSION['user_id']."'";
		$con->query($check);
		unlink("../images/userprofpics/".$_SESSION['user_id'].".jpg");
	}	
}
if(isset($_POST['detfrmsub'])){	
	$check = "UPDATE user_details ";
	$set = "SET ";
	$change = false;
	function separate(){
		if($GLOBALS['change']){
			$GLOBALS['set'].=" , ";
		}
	}
	$runmdg = true;
	function updatemsg(){
		if($GLOBALS['runmdg']){
			echo "<script>alert('"."Details Update Failed!!".'\n'."Try again!'".");</script>";
			$GLOBALS['runmdg'] = false;
		}
	}
	
	if($_SESSION['userName']!==$_POST['frmuName']){
		//echo 34;
		$set.="userName = '".$_POST['frmuName']."' ";
		$change=true;
	}
	if($_SESSION['email']!==$_POST['frmemail']){
		$mailquery = "SELECT email FROM user_credentials WHERE email ='".$_POST['frmemail']."'";		
		$result=$con->query($mailquery);
		if($result->num_rows == 1){
			echo "<script>alert('"."Email already registered!!".'\n'."Try again!'".");</script>";
		}
		else{
			$mailquery = "UPDATE user_credentials SET email='".$_POST['frmemail']."' WHERE email ='".$_SESSION['email']."'";	
			if(!$con->query($mailquery)){
				updatemsg();
			}
		}

	}
	if($_SESSION['mob_no']!==$_POST['frmmob_no']){
		//echo 34;
		separate();
		$set.="mob_no = '".$_POST['frmmob_no']."' ";
		$change=true;
	}
	if($_SESSION['address']!==$_POST['frmaddress']){
		//echo 34;
		separate();
		$set.="address = '".$_POST['frmaddress']."' ";
		$change=true;
	}
	if($change){
		$check.=$set." WHERE userid ='".$_SESSION['user_id']."'";
		//echo $check;
		if(!$con->query($check)){
			updatemsg();
		}
	}
}

if(isset($_POST['pwdchg'])){
	$uCpwd = $_POST['uCpwd'];
	$uNpwd = $_POST['uNpwd'];
	$pwdquery = "SELECT userid FROM user_credentials WHERE userid ='".$_SESSION['user_id']."' AND password='".$_POST['uCpwd']."'";		
	$result=$con->query($pwdquery);
	if($result->num_rows == 1){
		$pwdquery = "UPDATE user_credentials SET password='".$_POST['uNpwd']."' WHERE userid ='".$_SESSION['user_id']."'";	
		if($con->query($pwdquery))
		{				
			echo "<script>alert('Password Changed Successfully!');</script>";
		}
		else{
			echo $con->error;
		}
	}
	else{	
		echo "<script>alert('"."Incorrect Current Password!!".'\n'."Try again!'".");</script>";
	}


}
?>
<?php
$usercheck = false;
if(isset($_SESSION['user_id'])){
	$usercheck = substr($_SESSION['user_id'], 0,3)=="SOW";
}
if(isset($_SESSION['user_id'])&&$usercheck){
	$user_id = $_SESSION['user_id'];
	$check = "select sd.shopName,sd.shopid,uc.userid,uc.email,ud.userName,ud.profImgLoc,ud.mob_no,ud.address
			from shop_details sd, user_credentials uc ,user_details ud
			where sd.shopid = (select soc.shopid
								from shop_ownership soc
								where soc.ownerid = '$user_id')
				 	AND uc.userid ='$user_id' AND ud.userid='$user_id'";
	$result = $con->query($check);
	$userdata = $result->fetch_assoc();
	foreach($userdata as $key=>$keyvalue){
		$_SESSION[$key]=$keyvalue;
	}
?>
<!DOCTYPE html>
<html>

<head>
	<title>My Account</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Header and footer-->
	<link rel="stylesheet" type="text/css" href="../CSS/default2.css">
	<!-- Own Page-->
	<link rel="stylesheet" type="text/css" href="../CSS/Showprofile.css">
	
	<script>
		function SetupPageination(items, wrapper, rows_per_page, current_page, pagemem, sendpgfrm) {
			console.log(sendpgfrm);
			wrapper.innerHTML = "";
			var page_count = Math.ceil(items / rows_per_page);
			for (let i = 1; i < page_count + 1; i++) {
				var btn = PaginationButton(i, rows_per_page, wrapper, current_page, pagemem, sendpgfrm);

				wrapper.appendChild(btn);
			}
		}

		function PaginationButton(page, rows_per_page, wrapper, current_page, pagemem, sendpgfrm) {
			var button = document.createElement('button');
			button.innerText = page;
			if (current_page == page) {
				button.classList.add('active');
			}
			button.addEventListener('click', function() {
				pagemem.value = page;
				sendpgfrm.submit();
			});
			return button;
		}
	</script>
	
	
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
				<button class="button navbactive" onclick="document.location='shopOwnerProfile.php'">My Account</button>
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
	<div class="content">
		<aside class="sidebar">
			<h1>Account <span class="close"><i class="fa fa-times"></i></span></h1>
			<div class="user-side">
				<div class="user-pic">
					<img width="100px" src="<?php echo $userdata['profImgLoc'];?>" alt="">
				</div>
				<div class="user-info">
					<span class="name"><?php echo $userdata['userName'];?></span>
					<span class="mail"><?php echo $userdata['email'];?></span>
					<span class="cmrid"><?php echo $userdata['userid'];?></span>
				</div>
			</div>
			<div class="side-nav">
				<h2>General</h2>
				<nav>
					<ul>
						<li class="active" onclick="show(0,1)">
							<span class="icon"><img src="../images/icons/tachometer.png" alt=""></span>
							<h3>Dashboard</h3>
						</li>
						<li onclick="show(1,1)">
							<span class="icon"><img src="../images/icons/cog.png" alt=""></span>
							<h3>Settings</h3>
						</li>
						<li onclick="show(2,1)">
							<span class="icon"><img src="../images/icons/product-hunt.png" alt=""></span>
							<h3>Products</h3>
						</li>
						<li onclick="document.location='modifyProduct.php'">
							<span class="icon"><img src="../images/icons/plus-circle.png" alt=""></span>
							<h3>Add Product</h3>
						</li>
						<li onclick="show(3,1)">
							<span class="icon"><img src="../images/icons/truck.png" alt=""></span>
							<h3>Orders</h3>
						</li>
						<li onclick="document.location='My Cart.php'">
							<span class="icon"><img src="../images/icons/shopping-cart.png" alt=""></span>
							<h3>My Cart</h3>
						</li>
						<li onclick="document.location='Wishlist.php'">
							<span class="icon"><img src="../images/icons/heart.png" alt=""></span>
							<h3>Wishlist</h3>
						</li>
						<li onclick="alert('You\'ve been successfully Logged out!');document.location='logout.php';">
							<span class="icon"><img src="../images/icons/sign-out.png" alt=""></span>
							<h3>Logout</h3>
						</li>
					</ul>
				</nav>
			</div>
		</aside>
		<div class="main">
			<div class="wrapper">
				<div class="container account">
					<h1 class="title">Account details</h1>
					<div class="profilepic">
						<form class="pimgfrm" method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" onreset="cancimg();" enctype="multipart/form-data">
							<img id="profimg" src="<?php echo $userdata['profImgLoc'];?>" alt="no image">
							<label id="pinstruction">Upload only square (.jpeg) image</label>
							<div class="btn">
								<input id="remind" type="hidden" name="rem" value=0>
								<input type="button" value="Remove" name="rem" class="fbutton" id="removeimg" onclick="removedit()" disabled>
								<label class="fbutton dis" id="uploadimg" for="file-ip-1">Upload image</label>
								<input type="reset" class="fbutton" id="cancelimg" disabled>
								<button class="fbutton" id="editimg" onclick="editp();return false;">Edit Image</button>
								<input class="fbutton uplimg" name="pimg" id="file-ip-1" type="file" accept="image/jpeg" onchange="showPreview(event);">
								<input class="fbutton" id="submitimg" type="submit" name="pimgsub" disabled>
							</div>
						</form>
					</div>
					<div class="prof-info">
						<div class="data id">
							<h4>ID </h4>
							<p><?php echo $userdata['userid'];?></p>
						</div>
						<div class="data id">
							<h4>ShopID </h4>
							<p><?php echo $userdata['shopid'];?></p>
						</div>
						<div class="data id">
							<h4>Shop Name </h4>
							<p><?php echo $userdata['shopName'];?></p>
						</div>
						<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" class="fprofdetail" onreset="editc();">
							<div class="data">
								<h3>Name </h3>
								<input class="textb" name="frmuName" type="text" value="<?php echo $userdata['userName'];?>" id="pName" pattern="[a-zA-Z0-9\s._,]+" placeholder="Name" autofocus required disabled>
							</div>
							<div class="data">
								<h3>Email </h3>
								<input class="textb" name="frmemail" type="text" value="<?php echo $userdata['email'];?>" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9]+\.[a-z]{2,3}" id="pemail" required disabled>
							</div>
							<div class="data">
								<h3>Mobile Number </h3>
								<input class="textb" name="frmmob_no" type="tel" value="<?php echo $userdata['mob_no'];?>" placeholder="Mobile No" id="pmobNo" pattern="[0-9]{10}" required disabled>
							</div>
							<div class="data">
								<h3>Address </h3>
								<textarea class="textb" name="frmaddress" id="paddress" cols="30" rows="5" placeholder="Address" disabled><?php echo $userdata['address'];?></textarea>
							</div>
							<div class="fbuttoncont">
								<input class="fbutton Reset" type="reset" value="Cancel" disabled>
								<button class="fbutton Edit" onclick="edit();">Edit</button>
								<input class="fbutton Submit" name="detfrmsub" type="submit" value="Submit" disabled>
							</div>
						</form>
					</div>
				</div>
				<div class="container settings">
					<h1 class="title">Account Settings</h1>
					<div class="set">
						<h2>Change Password</h2>
						<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" class="cpwd" onsubmit="return checkPassword(0)">
							<div class="data">
								<h3>Enter Current Password</h3>
								<input name="uCpwd" class="textb pwdc" type="password" pattern="[a-zA-Z0-9@]{5,15}" value="" required>
								<span class="icon"><img title="Show password" onclick="shpwd(0,this)" src="../images/icons/eye.png" alt=""></span>
							</div>
							<div class="data">
								<h3>Enter New Password</h3>
								<input name="uNpwd" class="textb Pwd pwdc" type="password" pattern="[a-zA-Z0-9@]{5,15}" value="" required>
								<span class="icon"><img title="Show password" onclick="shpwd(1,this)" src="../images/icons/eye.png" alt=""></span>

							</div>
							<div class="data">
								<h3>Re-enter New Password</h3>
								<input class="textb rePwd pwdc" type="password" pattern="[a-zA-Z0-9@]{5,15}" value="" required>
								<span class="icon"><img title="Show password" onclick="shpwd(2,this)" src="../images/icons/eye.png" alt=""></span>

							</div>
							<div class="btn">
								<input name="pwdchg" class="fbutton Change" type="submit" value="Change">
								<input name="pwdreset" class="fbutton cancel" type="reset" value="Cancel">
							</div>
						</form>
						<?php if(isset($_POST['pwdchg'])){ ?> <script>
						for(var i=0;i<3;i++){
							if(i!=0){
								document.getElementsByClassName("pwdc")[i].value=<?php echo "'".$_POST['uNpwd']."'";?>;
							}else{
								document.getElementsByClassName("pwdc")[i].value=<?php echo "'".$_POST['uCpwd']."'";?>;
							}
							
						}
						</script> <?php }?>
					</div>
				</div>
				<div class="container Products">
					<h1 class="title">Products</h1>
					<div class="productitems">
						<main>
							<form id="prdpgsend" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="get">
								<input type="hidden" name="productspage">
							</form>
							<div class="list" id="list">
								<?php
								if(isset($_POST['remprdid'])){


								$prdremquery = "UPDATE product_details SET availability='Removed' WHERE productid ='".$_POST['remprdid']."'";
									if($con->query($prdremquery))
									{
									echo "<script>
										alert('Product Deleted Successfully!');
									</script>";
									}
									else{
										echo $con->error;
									}
								}
	
	
								$sql = "SELECT pd.productid,productName,productPrice,productImage1Loc 
								FROM product_details pd,shop_products sp 
								WHERE pd.productid=sp.productid AND pd.	availability = 'Available' AND sp.shopid = '".$userdata['shopid']."'";
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
								$prdarraylen= count($prdarray);
								if(!isset($_SESSION['prdarray'])){
									$_SESSION['prdarray']=$prdarray;
								}								
								$prdobj =$prdarray;
								$prdobjlen = count($prdobj);
								if(isset($_REQUEST['productspage'])){
									$page=$_REQUEST['productspage'];
								}
								else{
									$page=1;
								}								
								$page--;
								$rows_per_page=4;
								$start = $rows_per_page * $page;
								$end = $start + $rows_per_page;
								if ($end > $prdobjlen) {
									$end = $prdobjlen;
								}
								if($prdobjlen>0){
								for($x=$start;$x<$end;$x++){
										?>
								<div class="prod-data">
									<div class="prleft">
										<img width="50px" src="<?php echo $prdobj[$x]["productImage1Loc"];?>">
									</div>
									<div class="prright">
										<div class="scol1">
											<h3><?php echo $prdobj[$x]["productName"];?></h3>
											<div class="data">
												<h4>Price:</h4>
												<p><?php echo $prdobj[$x]["productPrice"];?></p>
											</div>
										</div>
										<input type="hidden" id="prdidcont">
										<div class="scol2">
											<button class="buttons0 removeb" onclick="removeprd_data('<?php echo $prdobj[$x]["productid"];?>')">Remove</button>
											<button class="buttons0" onclick="viewprd('<?php echo $prdobj[$x]["productid"];?>')">Edit</button>
										</div>
									</div>
								</div>


								<?php
									}
								}
								else{
									?>
								<div>
									<h3>No Products Available!!</h3>
								</div>
								<?php
								}
									?>

							</div>
							<div class="pagenumbers" id="pagination">

								<script>
									var pagination_element = document.getElementById("pagination");
									var current_page1 = <?php if(isset($_REQUEST['productspage'])){ echo $_REQUEST['productspage'];}else echo 1;?>;
									SetupPageination(<?php echo $prdobjlen;?>, pagination_element, <?php echo $rows_per_page;?>,current_page1,document.getElementsByName('productspage')[0],document.getElementById('prdpgsend'));
								</script>


							</div>							
						</main>
						<form id="remprderm" method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>">
							<input type="hidden" id="remprdid" name="remprdid">
						</form>
						<form id="viewprdfrm" method="get" action="modifyProduct.php">
							<input type="hidden" id="viewprdid" name="Product">
						</form>
					</div>
				</div>
				<div class="container Orders">
					<h1 class="title">Orders</h1>
					<div class="productitems">
						<main>
							<form id="ordpgsend" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="get">
								<input type="hidden" name="orderspage">
							</form>
							<div class="list" id="orderlist">
								<?php
								
								$sql = "SELECT pd.productImage1Loc, pd.productName , ud.address, od.orderDate ,od.customerId,op.orderid,op.productID,op.ordquantity,op.ordcolor,op.ordstatus "
								." FROM order_products op,order_details od,user_details ud,product_details pd "
								." where od.customerID=ud.userId AND od.orderId=op.orderId AND op.productID=pd.productid AND op.productID in "
								." (SELECT productID FROM shop_products WHERE shopid='".$userdata['shopid']."')"
								." ORDER BY ordstatus";
								$result = $con->query($sql);
								$ordarray=array();
								$index = 0;
								while($orderdata = $result->fetch_assoc()){
									foreach ($orderdata as $names=>$values) 
									{
										$ordarray[$index][$names] =$values;										
									}
									$index++;
								}
								$ordarraylen= count($ordarray);
								$serordobj = $ordarray;
								if(!isset($_SESSION['ordarray'])){
									$_SESSION['ordarray']=$serordobj;
								}								
								$ordobj =$serordobj;
								$ordobjlen = count($ordobj);
								if(isset($_REQUEST['orderspage'])){
									$page=$_REQUEST['orderspage'];
								}
								else{
									$page=1;
								}								
								$page--;
								$o_rows_per_page=3;
								$start = $o_rows_per_page * $page;
								$end = $start + $o_rows_per_page;
								if ($end > $ordobjlen) {
									$end = $ordobjlen;
								}
								if($ordobjlen>0){
								for($x=$start;$x<$end;$x++){
										?>
								<div class="prod-data">
									<div class="prleft">
										<img width="50px" src="<?php echo $ordobj[$x]["productImage1Loc"];?>">
									</div>
									<div class="prright">
										<div class="scol1">
											<h3> <?php echo $ordobj[$x]["orderid"];?> </h3>
											<div class="data">
												<h4>Product:</h4>
												<p><?php echo $ordobj[$x]["productName"];?></p>
											</div>
											<?php if($ordobj[$x]["ordcolor"]!="None"){?>
											<div class="data">
												<h4>Color:</h4>
												<p><?php echo $ordobj[$x]["ordcolor"];?> </p>
											</div>
											<?php } ?>
											<div class="data">
												<h4>Quantity:</h4>
												<p><?php echo $ordobj[$x]["ordquantity"];?> </p>
											</div>
											<div class="data">
												<h4>Order Date:</h4>
												<p><?php echo $ordobj[$x]["orderDate"];?></p>
											</div>
											<div class="data address">
												<h4>Delivery Address:</h4>
												<p><?php echo $ordobj[$x]["address"];?></p>
											</div>
										</div>
										<div class="scol2">										
											<select class="select" onchange="stchg('<?php echo $ordobj[$x]["orderid"];?>',this.value, '<?php echo $ordobj[$x]["productID"];?>');">
											<?php if($ordobj[$x]["ordstatus"]=="Processing"){?>
												<option value="Processing" selected>Processing</option>
												<option value="shipped">Shipped</option>
											<?php } else{?>
												<option value="Processing">Processing</option>
												<option value="shipped" selected>Shipped</option>
											<?php }?>
												
											</select>
										</div>
									</div>									
								</div>


								<?php
									}
								}
								else{
									?>
								<div>
									<h3>No Orders Available!!</h3>
								</div>
								<?php
								}
									?>


								</div>
							<div class="pagenumbers" id="orderpagination">
								
								<script>
									var pagination_element1 = document.getElementById("orderpagination");
									var current_pageo = <?php if(isset($_REQUEST['orderspage'])){ echo $_REQUEST['orderspage'];}else echo 1;?>;
									SetupPageination(<?php echo $ordobjlen;?>, pagination_element1, <?php echo $o_rows_per_page;?>,current_pageo,document.getElementsByName('orderspage')[0],document.getElementById('ordpgsend'));
								</script>
								
								
							</div>
						</main>
						<form id="stschgfrm" method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>">
							<input type="hidden" name="order_id">
							<input type="hidden" name="order_status">
							<input type="hidden" name="ord_st_prdid">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../JS/Showprofile.js"></script>
	<?php if(isset($_POST['pwdchg'])){ ?> <script>
		show(1,0);
	</script> <?php }?>
	<?php if(isset($_POST['remprdid'])||isset($_REQUEST['productspage'])){ ?> <script>
		show(2,0);
	</script> <?php }?>
	<?php if(isset($_REQUEST['orderspage'])||isset($_POST['order_id'])){ ?> <script>
		show(3,0);
	</script> <?php }?>
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
		else
		{
			echo "Session Out!!<br>";
?>
<input value="Home" type="button" onclick="document.location='home.php'">
<?php	
		}
?>
