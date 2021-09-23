<?php
session_start();
require 'config.php';
?>
<?php

if(isset($_SESSION['user_id'])&&isset($_SESSION['shopid'])){

	function options($catid){		
		$sql = "SELECT * " 
			."FROM product_category"
			." ORDER BY categoryid ASC";
		if(!$result = $GLOBALS['con']->query($sql)){
			echo $con->error;
		}	
		$GLOBALS['options']="";
		while($prddata = $result->fetch_assoc()){
			if($prddata['categoryid']===$catid){
				$GLOBALS['options'].="<option value=".$prddata['categoryid']." selected>".$prddata['categoryName']."</option>";
			}
			else{
				$GLOBALS['options'].="<option value=".$prddata['categoryid'].">".$prddata['categoryName']."</option>";			

			}
		}
	}
	$color ="";

	if(isset($_REQUEST['Product'])){
		$recproduct = true;
		$prdID=$_REQUEST['Product'];
		$Heading="CONFIG PRODUCT";
		
		
		
		if(isset($_POST['prddetfrmsub'])){
			$sqlm = "UPDATE product_details ";
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
					echo "<script>alert('Product Details Updated!!');
			</script>";
					$GLOBALS['runmdg'] = false;
				}
			}
			if($_SESSION['productName']!==$_POST['pName']){
				$set.="productName = '".$_POST['pName']."' ";
				$change=true;
			}
			if($_SESSION['productPrice']!==$_POST['pPrice']){
				separate();
				$set.="productPrice = '".$_POST['pPrice']."' ";
				$change=true;
			}
			if($_SESSION['productQty']!==$_POST['pQuantity']){
				separate();
				$set.="productQty = '".$_POST['pQuantity']."' ";
				$change=true;
			}
			if($_SESSION['productCat']!==$_POST['pcat']){
				separate();
				$set.="productCat = '".$_POST['pcat']."' ";
				$change=true;
			}
			if($_SESSION['productDescription']!==$_POST['pDescription']){
				separate();
				$set.="productDescription = '".$_POST['pDescription']."' ";
				$change=true;
			}
			if(isset($_POST['pcolor'])&&($_SESSION['productcolor']!==$_POST['pcolor'])){
				if(!empty($_POST['colchk'])) {					
					$sql ="DELETE FROM product_color "
						." WHERE productid ='".$prdID."'";
					if(!$con->query($sql)){
						echo $con->error;
					}

					$text =$_POST['pcolor'];
					$valuet = explode(',', $text);
					$myArray =array_map('trim', $valuet);
					$arraylen = count($myArray);
					$sql ="INSERT INTO product_color (productid,color) VALUES ";
					$skip =false;
					for($i=0;$i<$arraylen;$i++){
						if($myArray[$i]!==""){
							if($skip){
								$sql.=" , ";
							}
							$sql.="('".$prdID."', '".$myArray[$i]."')";
							$skip =true;
						}

					}
					if(!$con->query($sql)){
						echo $con->error;
					}else{
					}

				}
			}
			if(isset($_POST['pkeywords'])&&$_SESSION['productkeywords']!==$_POST['pkeywords']){
				$sql ="DELETE FROM product_keywords "
					." WHERE productid ='".$prdID."'";
				if(!$con->query($sql)){
					echo $con->error;
				}

				$text =$_POST['pkeywords'];
				$valuet = explode(',', $text);
				$myArray =array_map('trim', $valuet);
				$arraylen = count($myArray);
				$sql ="INSERT INTO product_keywords (productid,keywords) VALUES ";
				$skip =false;
				for($i=0;$i<$arraylen;$i++){
					if($myArray[$i]!==""){
						if($skip){
							$sql.=" , ";
						}
						$sql.="('".$prdID."', '".$myArray[$i]."')";
						$skip =true;
					}

				}
				if(!$con->query($sql)){
					echo $con->error;
				}else{
				}
			}

			if($change){
				$sql=$sqlm.$set." WHERE productid ='".$prdID."'";
				if(!$con->query($sql)){
					echo $con->error;
				}
				else{
					updatemsg();
				}
			}
			for($index=1;$index<5;$index++){
				if(!$_POST['rem'.$index]){
					if($_FILES["file-ip-".$index]['tmp_name']!=null){
						$target_dir = "../images/Products/".$prdID;
						$a = is_dir($target_dir);
						if(!$a){
							mkdir($target_dir);			
						}
						if(move_uploaded_file($_FILES["file-ip-".$index]['tmp_name'], $target_dir."/img".$index.".jpg")){
							$sql ="UPDATE product_details
								SET productImage".$index."Loc ='".$target_dir."/img".$index.".jpg'
								WHERE productid ='".$prdID."'";
							if(!$con->query($sql)){
								echo $con->error;
							}else{
								updatemsg();
							}
						}

					}
				}
				else
				{
					$sql ="UPDATE product_details "
						." SET productImage".$index."Loc = '../images/Products/noimage.jpg' "
						." WHERE productid ='".$prdID."'";
					if($con->query($sql)){
						unlink("../images/Products/".$prdID."/img".$index.".jpg");

					}
					else{
						echo $con->error;
					}			
				}

			}			
			echo "<script>window.location = 'shopOwnerProfile.php?viewproducts';
			</script>";

		}


		//Product details
		$sql = "SELECT productName, productPrice , productQty, productCat, productDescription,productImage1Loc,productImage2Loc,productImage3Loc,productImage4Loc"
			. " FROM product_details"
			. " WHERE productid ='".$prdID."'";
		if(!$result = $con->query($sql)){
			echo $con->error;
		}
		$prddata = $result->fetch_assoc();

		foreach($prddata as $key=>$keyvalue){
			$_SESSION[$key]=$keyvalue;
		}
		$title = $prddata['productName'];

		options($prddata['productCat']);
		//Get color data
		$sql = "SELECT color"
			. " FROM product_color"
			. " WHERE productid ='".$prdID."' ORDER BY color";
		if(!$result = $con->query($sql)){
			echo $con->error;
		}
		if($result->num_rows>0){
			$prdcoldata = $result->fetch_all();
			$prdcoldatalen= count($prdcoldata);			
			for($i=0;$i<$prdcoldatalen;$i++){
				if($i!=0){
					$color.=","."\n";
				}
				$color.=$prdcoldata[$i][0];

			}

		}
		$_SESSION['productcolor']=$color;


		//Get keywords data
		$sql = "SELECT keywords "
			."FROM product_keywords "
			."WHERE productid = '".$prdID."'";
		if(!$result = $con->query($sql)){
			echo $con->error;
		}
		$keywords ="";
		if($result->num_rows>0){
			$prdkeywordsdata = $result->fetch_all();
			$prdkeywordsdatalen= count($prdkeywordsdata);
			for($i=0;$i<$prdkeywordsdatalen;$i++){
				//echo $prdcoldata[$i][0];
				if($i!=0){
					$keywords.=","."\n";
				}
				$keywords.=$prdkeywordsdata[$i][0];

			}

		}
		$_SESSION['productkeywords']=$keywords;
	
	}
	else{
		options(false);
		// NEW PRODUCT
		$recproduct = false;
		$check = "select productid from product_details ORDER BY productid ASC" ;
		$result=$con->query($check);
		while($row = $result->fetch_assoc()) 
		{
			$lastproductid = $row['productid'];
		}
		$newproductIDno = substr($lastproductid, 3)+1;
		$newproductIDno=str_pad($newproductIDno, 3, '0', STR_PAD_LEFT);
		$newID="PRD".$newproductIDno;
		$prdID= $newID;
		$title = "Add New Product";
		$Heading="New Product";
		if(isset($_POST['prddetfrmsub'])){



			$sql ="INSERT INTO product_details (productid, productName, productPrice , productQty, productCat, productDescription) VALUES ('".$prdID."', '".$_POST['pName']."', '".$_POST['pPrice']."', '".$_POST['pQuantity']."', '".$_POST['pcat']."', '".$_POST['pDescription']."')";
			if(!$con->query($sql)){
				echo $con->error;
			}
			$sql ="INSERT INTO shop_products (shopid, productID) VALUES ('".$_SESSION['shopid']."', '".$prdID."')";
			if(!$con->query($sql)){
				echo $con->error;
			}
			if(!empty($_POST['colchk'])) {
				$text =$_POST['pcolor'];
				$valuet = explode(',', $text);
				$myArray =array_map('trim', $valuet);
				$arraylen = count($myArray);
				$sql ="INSERT INTO product_color (productid,color) VALUES ";
				$skip =false;
				for($i=0;$i<$arraylen;$i++){
					if($myArray[$i]!==""){
						if($skip){
							$sql.=" , ";
						}
						$sql.="('".$prdID."', '".$myArray[$i]."')";
						$skip =true;
					}

				}
				if(!$con->query($sql)){
					echo $con->error;
				}

			}
			if(isset($_POST['pkeywords'])){
				$text =$_POST['pkeywords'];
				$valuet = explode(',', $text);
				$myArray =array_map('trim', $valuet);
				$arraylen = count($myArray);
				$sql ="INSERT INTO product_keywords (productid,keywords) VALUES ";
				$skip =false;
				for($i=0;$i<$arraylen;$i++){
					if($myArray[$i]!==""){
						if($skip){
							$sql.=" , ";
						}
						$sql.="('".$prdID."', '".$myArray[$i]."')";
						$skip =true;
					}

				}
				if(!$con->query($sql)){
					echo $con->error;
				}
			}
			for($index=1;$index<5;$index++){
				if($_FILES["file-ip-".$index]['tmp_name']!=null){
					$target_dir = "../images/Products/".$prdID;
					$a = is_dir($target_dir);
					if(!$a){
						mkdir($target_dir);			
					}
					if(move_uploaded_file($_FILES["file-ip-".$index]['tmp_name'],"../images/Products/".$prdID."/img".$index.".jpg")){
						$sql ="UPDATE product_details
								SET productImage".$index."Loc ='".$target_dir."/img".$index.".jpg'
								WHERE productid ='".$prdID."'";
						if(!$con->query($sql)){
							echo $con->error;
						}
					}
				}
			}
			echo "<script>alert('Product added!!');
			window.location = 'shopOwnerProfile.php?viewproducts';
			</script>";

		}
	}











?>
<!DOCTYPE html>
<html>

	<head>
		<title><?php echo $title?></title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Header and footer-->
		<link rel="stylesheet" type="text/css" href="../CSS/default2.css" />
		<!-- Own Page-->
		<link rel="stylesheet" type="text/css" href="../CSS/modifyProduct.css">

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
					<button class="button" onclick="document.location='shopOwnerProfile.php'">My Account</button>
					<button class="button" onclick="document.location='Wishlist.php'">Wishlist</button>
					<button class="button" onclick="document.location='My Cart.php'">My Cart</button>
					<button class="button" onclick="document.location='logout.php';">Log Out</button>
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
		<div class="wrapper">

			<div class="container">
				<h1 class="title"><?php echo $Heading;?></h1>
				<div class="set">
					<form class="prdfrm" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" onsubmit="return false;" onreset="editc();" enctype="multipart/form-data">
						<div class="prpiccontainer">
							<div class="prpicdata">
								<div class="prpic">
									<h3 class="title">Image 1</h3>
									<img class="proimg" src="<?php if(!$recproduct){echo "../images/Products/noimage.jpg";}else{echo $prddata['productImage1Loc'];}?>" alt="no image">
									<label id="pinstruction">Upload only square (.jpeg) image</label>
								</div>
								<div class="btn">
									<input class="remind" type="hidden" name="rem1" value=0>
									<button class="fbutton removeimg" onclick="removedit(0)" disabled>Remove</button>
									<label class="fbutton dis uploadimg" for="file-ip-1">Upload image</label>
									<button class="fbutton cancelimg" onclick="cancimg(0)" disabled>Reset</button>
									<button class="fbutton editimg" onclick="editp(0);return false;">Edit Image</button>
									<input class="fbutton uplimg" name="file-ip-1" id="file-ip-1" type="file" accept="image/jpeg" onchange="showPreview(event,0);">
								</div>
							</div>
							<div class="prpicdata">
								<div class="prpic">
									<h3 class="title">Image 2</h3>
									<img class="proimg" src="<?php if(!$recproduct){echo "../images/Products/noimage.jpg";}else{echo $prddata['productImage2Loc'];}?>" alt="no image">
									<label id="pinstruction">Upload only square (.jpeg) image</label>
								</div>
								<div class="btn">
									<input class="remind" type="hidden" name="rem2" value=0>
									<button class="fbutton removeimg" onclick="removedit(1)" disabled>Remove</button>
									<label class="fbutton dis uploadimg" for="file-ip-2">Upload image</label>
									<button class="fbutton cancelimg" onclick="cancimg(1)" disabled>Reset</button>
									<button class="fbutton editimg" onclick="editp(1);return false;">Edit Image</button>
									<input class="fbutton uplimg" name="file-ip-2" id="file-ip-2" type="file" accept="image/jpeg" onchange="showPreview(event,1);">
								</div>
							</div>
						</div>
						<div class="prpiccontainer">
							<div class="prpicdata">
								<div class="prpic">
									<h3 class="title">Image 3</h3>
									<img class="proimg" src="<?php if(!$recproduct){echo "../images/Products/noimage.jpg";}else{echo $prddata['productImage3Loc'];}?>" alt="no image">
									<label id="pinstruction">Upload only square (.jpeg) image</label>
								</div>
								<div class="btn">
									<input class="remind" type="hidden" name="rem3" value=0>
									<button class="fbutton removeimg" onclick="removedit(2)" disabled>Remove</button>
									<label class="fbutton dis uploadimg" for="file-ip-3">Upload image</label>
									<button class="fbutton cancelimg" onclick="cancimg(2)" disabled>Reset</button>
									<button class="fbutton editimg" onclick="editp(2);return false;">Edit Image</button>
									<input class="fbutton uplimg" name="file-ip-3" id="file-ip-3" type="file" accept="image/jpeg" onchange="showPreview(event,2);">
								</div>
							</div>
							<div class="prpicdata">
								<div class="prpic">
									<h3 class="title">Image 4</h3>
									<img class="proimg" id="img4" src="<?php if(!$recproduct){echo "../images/Products/noimage.jpg";}else{echo $prddata['productImage4Loc'];}?>" alt="no image">
									<label id="pinstruction">Upload only square (.jpeg) image</label>
								</div>
								<div class="btn">
									<input class="remind" type="hidden" name="rem4" value=0>
									<button class="fbutton removeimg" onclick="removedit(3)" disabled>Remove</button>
									<label class="fbutton dis uploadimg" for="file-ip-4">Upload image</label>
									<button class="fbutton cancelimg" onclick="cancimg(3)" disabled>Reset</button>
									<button class="fbutton editimg" onclick="editp(3);return false;">Edit Image</button>
									<input class="fbutton uplimg" name="file-ip-4" id="file-ip-4" type="file" accept="image/jpeg" onchange="showPreview(event,3);">
								</div>
							</div>
						</div>
						<div class="prod_info">
							<div class="data id">
								<h4>Product ID </h4>
								<p><?php echo $prdID;?></p>
							</div>

							<div class="data">
								<h3>Name </h3>
								<input class="textb inputfield" type="text" value="<?php if($recproduct){ echo $prddata['productName'];}?>" id="pName" name="pName" pattern="[a-zA-Z0-9\s]+" placeholder="Name" required>
							</div>
							<div class="data">
								<h3>Price</h3>
								<input class="textb inputfield" name="pPrice" type="number" value="<?php if($recproduct){ echo $prddata['productPrice'];}?>" pattern="[0-9]+" placeholder="Price" id="pemail" required>
							</div>
							<div class="data">
								<h3>Quantity </h3>
								<input class="textb inputfield" name="pQuantity" type="number" value="<?php if($recproduct){ echo $prddata['productQty'];}?>" placeholder="Quantity" id="pmobNo" pattern="[0-9]{1,3}" required>
							</div>
							<div class="data">
								<h3>Category </h3>
								<select class="textb inputfield" value="" id="selcat" name="pcat" required>
									<option value="not selected">Select One</option>
									<?php echo $options;?>
								</select>
								<?php if($recproduct){ echo "<script>document.getElementById('selcat').value='".$prddata['productCat']."';</script>";}?>
							</div>
							<div class="data">
								<h3>Description </h3>
								<textarea class="textb inputfield descfield" name="pDescription" id="paddress" cols="30" rows="5" placeholder="Product Description" required><?php if($recproduct){ echo $prddata['productDescription'];}?></textarea>
							</div>
							<div class="data">
								<h3>Color </h3>
								<label id="pinstruction" class="colins">Separete Colors with coma","</label>
								<input class="textb colorchk" name="colchk[]" type="checkbox" onchange="endcol()" <?php if($color){echo "checked";} ?>><br>
								<div class="datain">
									<textarea class="textb inputfield colorfield" name="pcolor" cols="25" rows="5" placeholder="Product Colors            eg:-RED,BLUE" required><?php if(isset($color)){echo $color;} ?></textarea>

								</div>
							</div>
							<div class="data">
								<h3>Meta Keywords </h3>
								<label id="pinstruction">Separete kewords with coma","</label>
								<textarea class="textb inputfield" name="pkeywords" placeholder="Product related key words for ease search.eg:-Mobile,Phone" cols="30" rows="5" required><?php if(isset($keywords)){echo $keywords;} ?></textarea>
							</div>
							<div class="fbuttoncont">
								<input type="reset" class="fbutton Reset" value="Reset" disabled>
								<button class="fbutton Edit" onclick="edit();">Edit</button>
								<!--								<button class="fbutton Save" disabled>Save Changes</button>-->
								<input name="prddetfrmsub" class="fbutton Submit" type="submit" value="Submit" disabled>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>


		<script type="text/javascript" src="../JS/modifyProduct.js"></script>

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
