<?php
session_start();
require 'config.php';
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
		separate();
		$set.="mob_no = '".$_POST['frmmob_no']."' ";
		$change=true;
	}
	if($_SESSION['address']!==$_POST['frmaddress']){
		separate();
		$set.="address = '".$_POST['frmaddress']."' ";
		$change=true;
	}
	if($change){
		$check.=$set." WHERE userid ='".$_SESSION['user_id']."'";
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
			$_POST['pwdchg']=null;				
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
if(isset($_POST['delacc'])){
	$uCpwd = $_POST['uCpwd'];
	$pwdquery = "SELECT userid FROM user_credentials WHERE userid ='".$_SESSION['user_id']."' AND password='".$_POST['uCpwd']."'";		
	$result=$con->query($pwdquery);
	if($result->num_rows == 1){		
		$deletequery = "DELETE FROM user_credentials WHERE userId='".$_SESSION['user_id']."';";	
		if($con->query($deletequery))
		{
			$check = "UPDATE user_details
			SET profImgLoc = '../images/userprofpics/no_avatar.jpg'
			WHERE userid ='".$_SESSION['user_id']."'";
			$con->query($check);
			unlink("../images/userprofpics/".$_SESSION['user_id'].".jpg");
			echo "<script>alert('Account Deleted Successfully!'); "
			." window.location = 'logout.php'; </script>";


		}
		else
		{
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
	$usercheck = substr($_SESSION['user_id'], 0,3)=="CMR";
}
if(isset($_SESSION['user_id'])&&$usercheck){
	$user_id = $_SESSION['user_id'];
	$check = "select uc.userid,uc.email,ud.userName,ud.profImgLoc,ud.mob_no,ud.address
			from shop_details sd, user_credentials uc ,user_details ud
			where uc.userid ='$user_id' AND ud.userid='$user_id'";

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
		<link rel="stylesheet" type="text/css" href="../CSS/cmrProfile.css">
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
					<button class="button navbactive" onclick="document.location='cutomerProfile.php'">My Account</button>
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
				<h1>Account</h1>
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
								<span class="icon"><img src="../images/icons/history.png" alt=""></span>
								<h3>Order History</h3>
							</li>
							<li onclick="document.location='My Cart.php'">
								<span class="icon"><img src="../images/icons/shopping-cart.png" alt=""></span>
								<h3>My Cart</h3>
							</li>
							<li onclick="document.location='Wishlist.php'">
								<span class="icon"><img src="../images/icons/heart.png" alt=""></span>
								<h3>Wishlist</h3>
							</li>
							<li onclick="alert('You\'ve been successfully signed out!');document.location='logout.php';">
								<span class="icon"><img src="../images/icons/sign-out.png" alt=""></span>

								<h3>Signout</h3>
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

									<!--onchange="checkPassword(0)"-->
								</div>
								<div class="btn">
									<input name="pwdchg" class="fbutton Change" type="submit" value="Change">
									<input class="fbutton cancel" type="reset" value="Cancel">
								</div>
							</form>
							<?php if(isset($_POST['pwdchg'])){ ?> <script>
								for (var i = 0; i < 3; i++) {
									if (i != 0) {
										document.getElementsByClassName("pwdc")[i].value = <?php echo "'".$_POST['uNpwd']."'";?>;
									} else {
										document.getElementsByClassName("pwdc")[i].value = <?php echo "'".$_POST['uCpwd']."'";?>;
									}
								}
							</script> <?php }?>
						</div>
						<div class="set">
							<h2>Delete Account</h2>
							<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" class="dpwd" onsubmit="return checkPassword(1);">
								<div class="data">
									<h3>Enter Password</h3>
									<input name="uCpwd" class="textb Pwd pwdc" type="password" pattern="[a-zA-Z0-9@]{5,15}" value="" required>
									<span class="icon"><img title="Show password" onclick="shpwd(3,this)" src="../images/icons/eye.png" alt=""></span>

								</div>
								<div class="data">
									<h3>Re-enter Password</h3>
									<input class="textb rePwd pwdc" type="password" pattern="[a-zA-Z0-9@]{5,15}" value="" required>
									<span class="icon"><img title="Show password" onclick="shpwd(4,this)" src="../images/icons/eye.png" alt=""></span>

									<!--onchange="checkPassword(1)"-->
								</div>
								<div class="btn">
									<input name="delacc" class="fbutton delete" type="submit" value="Delete">
									<input class="fbutton cancel" type="reset" value="Cancel">
								</div>
							</form>
							<?php if(isset($_POST['delacc'])){ ?> <script>
								for (var i = 3; i < 5; i++) {
										document.getElementsByClassName("pwdc")[i].value = <?php echo "'".$_POST['uCpwd']."'";?>;
								}
							</script> <?php }?>
						</div>
					</div>
					<div class="container orderhistory">
						<h1 class="title">Order History</h1>
						<div class="Orderitems">
							<main>
							<form id="prdpgsend" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="get">
								<input type="hidden" name="productspage">
							</form>
								<div class="list" id="list">
									<?php
		
		
								if(isset($_POST['ordid'])){	
								$prdremquery = "UPDATE order_products"
									." SET customerview='Hide' "
									." WHERE productID ='".$_POST['prodid']."' AND orderId= '".$_POST['ordid']."'";
								if($con->query($prdremquery))
								{
								echo "<script>
									alert('Order Removed Successfully!');
								</script>";
								}
								else{
									echo $con->error;
								}

								}
								
								$sql = "SELECT op.productID  ,od.orderId , pd.productName , pd.productImage1Loc ,op.ordcolor, op.ordquantity , op.ordstatus , od.orderDate "
									." FROM order_details od,order_products op , product_details pd "
									." WHERE pd.productid = op.productID AND op.orderId =od.orderId AND od.customerID='".$userdata['userid']."' AND op.customerview='Show'";
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
								$prdobj = $prdarray;
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
												<h3><?php echo $prdobj[$x]["orderId"];?></h3>
												<div class="data">
													<h4>Product:</h4>
													<p><?php echo $prdobj[$x]["productName"];?></p>
												</div>
												<?php if($prdobj[$x]["ordcolor"]!='None'){ ?>
												<div class="data">
													<h4>Color:</h4>
													<p><?php echo $prdobj[$x]["ordcolor"];?></p>
												</div>
												<?php } ?>
												<div class="data">
													<h4>Quantity:</h4>
													<p><?php echo $prdobj[$x]["ordquantity"];?></p>
												</div>
												<div class="data">
													<h4>Order Date:</h4>
													<p><?php echo $prdobj[$x]["orderDate"];?></p>
												</div>
												<div class="data">
													<h4>Order Status:</h4>
													<p> <?php echo $prdobj[$x]["ordstatus"];?> </p>
												</div>
											</div>
											<div class="scol2">
												<button class="buttons0 removeb" onclick="removeprd_data('<?php echo $prdobj[$x]["orderId"];?>','<?php echo $prdobj[$x]["productID"];?>')">Remove</button>
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
								<div class="pagenumbers" id="pagination">
									
									<script>
									var pagination_element = document.getElementById("pagination");
									var current_page = <?php if(isset($_REQUEST['productspage'])){ echo $_REQUEST['productspage'];}else echo 1;?>;
									var prd_cpg = 1;
									SetupPageination(<?php echo $prdobjlen;?>, pagination_element, <?php echo $rows_per_page;?>);

									function SetupPageination(items, wrapper, rows_per_page) {
										wrapper.innerHTML = "";
										var page_count = Math.ceil(items / rows_per_page);
										for (let i = 1; i < page_count + 1; i++) {
											var btn = PaginationButton(i, rows_per_page, wrapper);

											wrapper.appendChild(btn);
										}
									}

									function PaginationButton(page, rows_per_page, wrapper) {
										var button = document.createElement('button');
										button.innerText = page;
										if (current_page == page) {
											button.classList.add('active');
											
										}
										button.addEventListener('click', function() {
											document.getElementsByName('productspage')[0].value = page;
											document.getElementById('prdpgsend').submit();
										});
										return button;
									}
								</script>
									
								</div>
							</main>
							<form id="remfrm" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
								<input type="hidden" name="ordid">
								<input type="hidden" name="prodid">
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
		<script type="text/javascript" src="../JS/cmrProfile.js"></script>
		<?php if(isset($_POST['pwdchg'])||isset($_POST['delacc'])){ ?> <script>show(1,0);</script> <?php }?>
		<?php if(isset($_POST['ordid'])||isset($_REQUEST['productspage'])){ ?> <script>show(2,0);</script> <?php }?>
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
