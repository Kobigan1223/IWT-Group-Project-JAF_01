<?php 
session_start();
require 'config.php';

if(isset($_POST['wishaddProduct'])){
	//echo "ID = ".$_POST['wishaddProduct']."<br>";
	//echo "user ID = ".$_SESSION['user_id']."<br>";

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
		//echo "nw ".$newID;
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
	//echo $wishid['wishlistid'];
	$sql="INSERT INTO wishlist_products (wishlistid, productid) "
		." VALUES ('".$wishid['wishlistid']."', '".$_POST['wishaddProduct']."')";
	if(!$result = $con->query($sql))
	{
		echo "<script>alert('Already added to Wishlist!!')</script>";
		//echo $con->error;       
	}
	else
	{
		echo "<script>alert('Added to Wishlist!!')</script>";
	}
}
         //shop 2
$sql="SELECT productImage1Loc ,productPrice,productName,productId "
	." from product_details "
	." WHERE availability = 'Available' AND productQty >0  AND productID IN (SELECT productID FROM `shop_products` WHERE shopid='SHP002')";
$result=$con->query($sql);
$shopdata2=$result->fetch_all();
	//print_r($shopdata11);
          
          //shop 1
$sql="SELECT productImage1Loc ,productPrice,productName,productId "
	." from product_details "
	." WHERE availability = 'Available' AND productQty >0  AND productID IN (SELECT productID FROM `shop_products` WHERE shopid='SHP001')";
$result=$con->query($sql);
$shopdata1=$result->fetch_all();
	//print_r($shopdata11);

          //shop 3
$sql="SELECT productImage1Loc ,productPrice,productName,productId "
	." from product_details "
	." WHERE availability = 'Available' AND productQty >0  AND productID IN (SELECT productID FROM `shop_products` WHERE shopid='SHP003')";
$result=$con->query($sql);
$shopdata3=$result->fetch_all();
	//print_r($shopdata11);

            //shop 4
$sql="SELECT productImage1Loc ,productPrice,productName,productId "
	." from product_details "
	." WHERE availability = 'Available' AND productQty >0  AND productID IN (SELECT productID FROM `shop_products` WHERE shopid='SHP004')";
$result=$con->query($sql);
$shopdata4=$result->fetch_all();
	//print_r($shopdata11);

          //shop 5
$sql="SELECT productImage1Loc ,productPrice,productName,productId "
	." from product_details "
	." WHERE availability = 'Available' AND productQty >0  AND productID IN (SELECT productID FROM `shop_products` WHERE shopid='SHP005')";
$result=$con->query($sql);
$shopdata5=$result->fetch_all();
	//print_r($shopdata11);

?>

<html>

<head>
    <title> Home Page</title>
    <link rel="stylesheet" type="text/css" href="..\CSS\style.css">
    <link rel="stylesheet" type="text/css" href="..\CSS\my.css">
    <link rel="stylesheet" type="text/css" href="..\CSS\hide.css">
    <link rel="stylesheet" type="text/css" href="..\CSS\default2.css">
    <link rel="stylesheet" type="text/css" href="..\CSS\slidershow.css">


    <script src="..\js/login.js" type="text/javascript"></script>



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
    <br>

    <br><br>



    <div>



        <center>
            <!--image slider start-->
            <div class="slider">
                <div class="slides">
                    <!--radio buttons start-->
                    <input type="radio" name="radio-btn" id="radio1">
                    <input type="radio" name="radio-btn" id="radio2">
                    <input type="radio" name="radio-btn" id="radio3">
                    <input type="radio" name="radio-btn" id="radio4">
                    <!--radio buttons end-->
                    <!--slide images start-->
                    <div class="slide first">
                        <img src="../images/Home slideshow/1.jpg" alt="">
                    </div>
                    <div class="slide">
                        <img src="../images/Home slideshow/2.jpg" alt="">
                    </div>
                    <div class="slide">
                        <img src="../images/Home slideshow/3.jpg" alt="">
                    </div>
                    <div class="slide">
                        <img src="../images/Home slideshow/4.jpg" alt="">
                    </div>
                    <!--slide images end-->
                    <!--automatic navigation start-->
                    <div class="navigation-auto">
                        <div class="auto-btn1"></div>
                        <div class="auto-btn2"></div>
                        <div class="auto-btn3"></div>
                        <div class="auto-btn4"></div>
                    </div>
                    <!--automatic navigation end-->
                </div>
                <!--manual navigation start-->
                <div class="navigation-manual">
                    <label for="radio1" class="manual-btn"></label>
                    <label for="radio2" class="manual-btn"></label>
                    <label for="radio3" class="manual-btn"></label>
                    <label for="radio4" class="manual-btn"></label>
                </div>
                <!--manual navigation end-->
            </div>
            <!--image slider end-->

            <script type="text/javascript">
                var counter = 1;
                setInterval(function() {
                    document.getElementById('radio' + counter).checked = true;
                    counter++;
                    if (counter > 4) {
                        counter = 1;
                    }
                }, 5000);

            </script>
        </center>

    </div>






    <br><br>
    <div style="width:100%;">

        <h3 style="width:100%;" class="navbar"><b>Tech-World</b></h3>
        <button onclick="myFunction2()">+</button>


        <div id="myDIV2">
            <h2>Tech-World is a one of the best store for Electrical and Electornical Products</h2>
            <h2>You Can Buy More Products Using Below link</h2>
            <a href="techworld.php">Tech World</a>
        </div>
        <br><br>
        <center>
            <div style="width:100%;">
                <?php 
		$prdobjlen=count($shopdata2);
		$used = array();
									$used[0] = -1;
									$check = 0;
								for($x=0;$x<4;$x++){									
									$random = rand(0,$prdobjlen-1);
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
                <!--box-slider---->
                <div style="display:inline-block;justify-content:center;">

                    <div class="box" style="float:left;margin-left:50px; margin-right:20;">
                        <!--images box---->
                        <div class="slide-img">
                            <img src="<?php echo $shopdata2[$random][0]; ?>" alt="product images">
                            <!--overlayer-->
                            <div class="overlay">
                                <!--buy-btn-->
                                <a href="product.php?Product=<?php echo $shopdata2[$random][3];?>" class="buy-btn"> Buy-now</a>
                                <button onclick="<?php if(!isset($_SESSION['user_id'])){ ?>document.location='login.php'<?php }else { ?>addwish('<?php echo $shopdata2[$random][3]; ?>')<?php } ?>" class="buy-btn">wishlist</button>

                            </div>
                        </div>
                        <!--detail box---->
                        <div class="detail-box">
                            <!--type--->
                            <div class="type">
                                <a href="#"><?php echo $shopdata2[$random][2];?></a>
                                <span><i>New arrival</i></span>
                            </div>
                            <!--price---->
                            <a href="#">Rs <?php echo $shopdata2[$random][1];?>/=</a>

                        </div>

                    </div>

                </div>

                <?php
									}
									?>

            </div>
        </center>


    </div>




    <div style="width:100%; display:inline-block;">
        <h3 class="navbar"><b>Dress-Mart</b></h3>
        <button onclick="myFunction1()">+</button>


        <div id="myDIV1">
            <h2>Dress-Mart is a one of A store for Men and Woman fashion</h2>
            <h2>You Can Buy More Products Using Below link</h2>
            <a href="dressmart.php">Dress Mart</a>
        </div>

        <br><br>
        <!--box-slider---->
        <center>
            <div style="width:100%;">
                <?php 
		$prdobjlen=count($shopdata1);
		$used = array();
									$used[0] = -1;
									$check = 0;
								for($x=0;$x<4;$x++){									
									$random = rand(0,$prdobjlen-1);
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
                <!--box-slider---->
                <div style="display:inline-block;justify-content:center;">
                    <div class="box" style="float:left;margin-left:50px; margin-right:20;">
                        <!--images box---->
                        <div class="slide-img">
                            <img src="<?php echo $shopdata1[$random][0]; ?>" alt="product images">
                            <!--overlayer-->
                            <div class="overlay">
                                <!--buy-btn-->
                                <a href="product.php?Product=<?php echo $shopdata1[$random][3];?>" class="buy-btn"> Buy-now</a>
                                <button onclick="<?php if(!isset($_SESSION['user_id'])){ ?>document.location='login.php'<?php }else { ?>addwish('<?php echo $shopdata1[$random][3]; ?>')<?php } ?>" class="buy-btn">wishlist</button>

                            </div>
                        </div>
                        <!--detail box---->
                        <div class="detail-box">
                            <!--type--->
                            <div class="type">
                                <a href="#"><?php echo $shopdata1[$random][2];?></a>
                                <span><i>New arrival</i></span>
                            </div>
                            <!--price---->
                            <a href="#">Rs <?php echo $shopdata1[$random][1];?>/=</a>

                        </div>
                    </div>
                </div>
                <?php
									}
									?>

            </div>
        </center>


    </div>


    <div style="width:100%; display:inline-block;">
        <h3 style="width:100%;" class="navbar">Home-Needs</h3>
        <button onclick="myFunction5()">+</button>


        <div id="myDIV5">
            <h2>Home-Needs is a one of A store for All kind of Home needs</h2>
            <h2>You Can Buy More Products Using Below link</h2>
            <a href="HomeNeeds.php">Home-Needs</a>
        </div>
        <br><br>
        <!--box-slider---->
        <center>
            <div style="width:100%;">
                <?php 
		$prdobjlen=count($shopdata3);
		$used = array();
									$used[0] = -1;
									$check = 0;
								for($x=0;$x<4;$x++){									
									$random = rand(0,$prdobjlen-1);
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
                <!--box-slider---->
                <div style="display:inline-block;justify-content:center;">
                    <div class="box" style="float:left;margin-left:50px; margin-right:20;">
                        <!--images box---->
                        <div class="slide-img">
                            <img src="<?php echo $shopdata3[$random][0]; ?>" alt="product images">
                            <!--overlayer-->
                            <div class="overlay">
                                <!--buy-btn-->
                                <a href="product.php?Product=<?php echo $shopdata3[$random][3];?>" class="buy-btn"> Buy-now</a>
                                <button onclick="<?php if(!isset($_SESSION['user_id'])){ ?>document.location='login.php'<?php }else { ?>addwish('<?php echo $shopdata3[$random][3]; ?>')<?php } ?>" class="buy-btn">wishlist</button>

                            </div>
                        </div>
                        <!--detail box---->
                        <div class="detail-box">
                            <!--type--->
                            <div class="type">
                                <a href="#"><?php echo $shopdata3[$random][2];?></a>
                                <span><i>New arrival</i></span>
                            </div>
                            <!--price---->
                            <a href="#">Rs <?php echo $shopdata3[$random][1];?>/=</a>

                        </div>

                    </div>
                </div>
                <?php
									}
									?>

            </div>
        </center>

    </div>





    <div style="width:100%; display:inline-block;">
        <h3 style="width:100%;" class="navbar">Grosery-World</h3>
        <button onclick="myFunction3()">+</button>


        <div id="myDIV3">
            <h2>Grosery-World is a one of A store for Home Grocery Products</h2>
            <h2>You Can Buy More Products Using Below link</h2>
            <a href="Grosery-World.php">Grosery-World</a>
        </div>




        <br><br>
        <!--box-slider---->
        <center>
            <div style="width:100%;">
                <?php 
		$prdobjlen=count($shopdata4);
		$used = array();
									$used[0] = -1;
									$check = 0;
								for($x=0;$x<4;$x++){									
									$random = rand(0,$prdobjlen-1);
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
                <!--box-slider---->
                <div style="display:inline-block;justify-content:center;">
                    <div class="box" style="float:left;margin-left:50px; margin-right:20;">
                        <!--images box---->
                        <div class="slide-img">
                            <img src="<?php echo $shopdata4[$random][0]; ?>" alt="product images">
                            <!--overlayer-->
                            <div class="overlay">
                                <!--buy-btn-->
                                <a href="product.php?Product=<?php echo $shopdata4[$random][3];?>" class="buy-btn"> Buy-now</a>
                                <button onclick="<?php if(!isset($_SESSION['user_id'])){ ?>document.location='login.php'<?php }else { ?>addwish('<?php echo $shopdata4[$random][3]; ?>')<?php } ?>" class="buy-btn">wishlist</button>

                            </div>
                        </div>
                        <!--detail box---->
                        <div class="detail-box">
                            <!--type--->
                            <div class="type">
                                <a href="#"><?php echo $shopdata4[$random][2];?></a>
                                <span><i>New arrival</i>i></span>
                            </div>
                            <!--price---->
                            <a href="#">Rs <?php echo $shopdata4[$random][1];?>/=</a>

                        </div>

                    </div>
                </div>
                <?php
									}
									?>

            </div>
        </center>
    </div>


    <div style="width:100%;display:inline-block;">
        <h3 style="width:100%;" class="navbar">Kids-Zone</h3>
        <button onclick="myFunction4()">+</button>


        <div id="myDIV4">
            <h2>Kids-Zone is a one of A store for kids fashion</h2>
            <h2>You Can Buy More Products Using Below link</h2>
            <a href="kidzone.php">Kids-Zone</a>
        </div>






        <br><br>
        <!--box-slider---->
        <center>
            <div style="width:100%;">
                <?php 
		$prdobjlen=count($shopdata5);
		$used = array();
									$used[0] = -1;
									$check = 0;
								for($x=0;$x<4;$x++){									
									$random = rand(0,$prdobjlen-1);
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
                <!--box-slider---->
                <div style="display:inline-block;justify-content:center;">
                    <div class="box" style="float:left;margin-left:50px; margin-right:20;">
                        <!--images box---->
                        <div class="slide-img">
                            <img src="<?php echo $shopdata5[$random][0]; ?>" alt="product images">
                            <!--overlayer-->
                            <div class="overlay">
                                <!--buy-btn-->
                                <a href="product.php?Product=<?php echo $shopdata5[$random][3];?>" class="buy-btn"> Buy-now</a>
                                <button onclick="<?php if(!isset($_SESSION['user_id'])){ ?>document.location='login.php'<?php }else { ?>addwish('<?php echo $shopdata5[$random][3]; ?>')<?php } ?>" class="buy-btn">wishlist</button>

                            </div>
                        </div>
                        <!--detail box---->
                        <div class="detail-box">
                            <!--type--->
                            <div class="type">
                                <a href="#"><?php echo $shopdata5[$random][2];?></a>
                                <span><i>New arrival</i></span>
                            </div>
                            <!--price---->
                            <a href="#">Rs <?php echo $shopdata5[$random][1];?>/=</a>

                        </div>

                    </div>
                </div>
                <?php
									}
									?>

            </div>
        </center>

    </div>

    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" id="wishprd" method="post">
        <input type="hidden" name="wishaddProduct">
    </form>


    <script>
        var addwishprdfrm = document.getElementById('wishprd');

        function addwish(prdid) {
            document.getElementsByName('wishaddProduct')[0].value = prdid;
            console.log("wish" + prdid);
            addwishprdfrm.submit();
        }

    </script>


    <hr style="width:100%;" class="hrline1">



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
                <i class="icon"><img src="..\images/icons/map-marker.png" alt=""></i>
                <p><span>Main Street</span> Jaffna, Sri-lanka</p>
            </div>

            <div>
                <i class="icon"><img src="..\images/icons/phone.png" alt=""></i>
                <p>+021 222 2121</p>
            </div>

            <div>
                <i class="icon envelope"><img src="..\images/icons/envelope.png" alt=""></i>
                <p><a href="mailto:support@VKQUBE.com">contact@VKQUBE.com</a></p>
            </div>

        </div>

        <div class="footer-right">

            <p class="footer-company-about">
                <span>About the company</span>
                VKQUBE is a Online Shopping Mall in jaffna.
            </p>

            <div class="footer-icons">
                <a href="www.facebook.com" class="icon"><img src="..\images/icons/facebook.png" alt=""></a>
                <a href="www.twitter.com" class="icon"><img src="..\images/icons/twitter.png" alt=""></a>
                <a href="www.linkdin.com" class="icon"><img src="..\images/icons/linkedin.png" alt=""></a>
                <a href="www.instagram.com" class="icon"><img src="..\images/icons/instagram.png" alt=""></a>
            </div>

        </div>

    </footer>
</body>

</html>
