<?php 
session_start();
require'config.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title> Search-VKQube </title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Header and footer-->
    <link rel="stylesheet" type="text/css" href="../CSS/default2.css" />

    <!--Search page -->

    <!--Search Bar-->
    <link href="../CSS/searchbar.css" rel="stylesheet" />
    <!--Search Result-->
    <link href="../CSS/searchresult.css" rel="stylesheet" >
	 <!--Search Image-->
    <link href="../CSS/searchimg.css" rel="stylesheet" >



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
            <a href="Home.php" class="menuactive">Home</a>
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

    <div>


    <!--Search Bar-->
<div class="container1">
  <div class="box">
    <img src="../images/search/drs.jpeg">
    <span>It's</span>
  </div>
  <div class="box">
    <img src="../images/search/frs.jpg">
    <span>Time</span>
  </div>
  <div class="box">
    <img src="../images/search/grs.jpg">
    <span>To</span>
  </div>
  <div class="box">
    <img src="../images/search/ad.jpg">
    <span>Shop</span>
  </div>
  <div class="box">
    <img src="../images/search/pay.jpg">
    <span>With</span>
  </div>
  <div class="box">
    <img src="../images/search/shp.jpg">
    <span>Us ! ! ! </span>
  </div>
</div>


    <div class="s010">
        <form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>">
            <div class="inner-form">
                <div class="basic-search">
                    <div class="input-field">

                        <input id="search" name="searchitem" type="text" placeholder="Search Product" required />

                        <div class="icon-wrap">
                            <button name="button" class="btn-search"><img src="../images/icons/search.png" width="50" height="50"> </button>

                        </div>

                    </div>

                </div>


            </div>
        </form>



    </div>





    <!--Search Results-->



    <!-- end product -->
    <div class="container">
        <main>
            <div class="list" id="list">
                <?php
	if(isset($_POST['button'])){
    echo $_POST['searchitem']."<br>";
    $sql = "SELECT prd.productid, prd.productImage1Loc, prd.productName, prd.productPrice,sh.shopid"
        ." FROM product_details prd,shop_products sh "
        ."where sh.productid = prd.productid AND prd.productid IN (SELECT productid FROM product_keywords WHERE keywords LIKE '%".$_POST['searchitem']."%') AND prd.availability='Available' AND prd.productQty>0";
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
								for($x=0;$x<$prdobjlen;$x++){
                                    
                                ?>
                
                <div class="col-xs-12 col-md-6">
							
								<div class="column" style="margin-bottom: 100px;">
									<div class="col-md-5 col-sm-12 col-xs-12">
										<div class="product-image"> 
											<img style="width:200px;height:200px;" src="<?php echo $prdarray[$x]['productImage1Loc'];?>"class="img-responsive">
											
										</div>
									</div>
									<div class="col-md-7 col-sm-12 col-xs-12">
										<div class="product-detail">
											<h5 class="name">
												<?php echo $prdarray[$x]['productName'];?><br>
											</h5>
											<p class="price-container">
												<span>Rs <?php echo $prdarray[$x]['productPrice'];?></span>
											</p>
											<a class="button1" style="vertical-align:middle" href='product.php?Product=<?php echo $prdarray[$x]['productid'];?>'><span>View</span></a>
										</div>
										
									</div>
								</div>
						
						</div>
                
                <?php
                                
                                }
                                }
}
?>
            </div>
            <div class="pagenumbers" id="pagination"></div>
        </main>
    </div>



    </div>
<!--Button-View--->
<style>
.button1 {
  display: inline-block;
  border-radius: 4px;
  background-color: #2a2a72;
  background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%);
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 150px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button1 span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button1 span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button1:hover span {
  padding-right: 25px;
}

.button1:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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