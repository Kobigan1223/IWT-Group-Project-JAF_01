<?php 
session_start();
require 'config.php';

if(isset($_SESSION['user_id'])){
	$user_id = $_SESSION['user_id'];
	$sql = "SELECT p.productImage1Loc,p.productName,p.productPrice,p.productQty,p.availability,cp.cartquantity,cp.cartcolor,cp.cartId,p.productID FROM product_details p , cart_products cp WHERE p.productID=cp.productID AND p.productID=cp.productID AND cp.cartId =(SELECT cartId FROM cart_user WHERE userID = '$user_id')";
   
	if(!$result=$con->query($sql))
	{
		$con->error;
	}
    else{
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
    $prdobjlen= count($prdarray);
        for($x=0;$x<$prdobjlen;$x++){
            if(($prdobj[$x]['productQty']<1)||($prdobj[$x]['availability']!='Available'))
            {
                $prdremquery = "DELETE FROM cart_products WHERE productID = '".$prdobj[$x]['productID']."' AND cartId = '".$prdobj[$x]['cartId']."' AND cartcolor = '".$prdobj[$x]['cartcolor']."'";
                if($con->query($prdremquery))
                {
                    header('location:My Cart.php');
                }
            }
            
        }
        
        
	}
                

    
	
	if(isset($_POST['remprdid']))
	{
		$prdremquery = "DELETE FROM cart_products WHERE productID = '".$_POST['remprdid']."' AND cartId = '".$prdobj[0]['cartId']."' AND cartcolor = '".$_POST['prdcolor']."'";
        
		if($con->query($prdremquery))
		{
			echo "<script>alert('Cart Product Deleted Successfully!');document.location='my cart.php';</script>";
		}
		else
		{
			echo $con->error;
		}
	}    
    if(isset($_POST['upid']))
	{
        
		$prdremquery = "UPDATE cart_products SET cartquantity = ".$_POST['num']." WHERE productID = '".$_POST['upid']."' AND cartId = '".$prdobj[0]['cartId']."' AND cartcolor = '".$_POST['num1']."'";
        
		if($con->query($prdremquery))
		{
			echo "<script>document.location='my cart.php';</script>";
		}
		else
		{
			echo $con->error;
		}
	}    
?>



<html>

<head>
    <title> Add to Cart</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/default2.css">
    <link rel="stylesheet" type="text/css" href="../CSS/cart.css">
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
				<button class="button navbactive" onclick="document.location='My Cart.php'">My Cart</button>
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
	
	$prdobjlen= count($prdarray);
	if($prdobjlen>0){
        ?>

    <center>
        <div class="cart-page">
            <table>
                <tr>
                    <th class="abc1">
                        <center><b>Product</b></center>
                    </th>
                    <th class="abc2">
                        <center><b>Quantity</b></center>
                    </th>
                    <th class="abc3">
                        <center><b>Sub-Total</b></center>
                    </th>
                </tr>
                <?php 
		for($x=0;$x<$prdobjlen;$x++){									
					?>

                <tr>
                    <td>
                        <div class="cart">

                            <img src="<?php echo $prdobj[$x]['productImage1Loc']; ?>">

                            <div class="read">
                                <p><b> <?php echo $prdobj[$x]['productName']; ?> </b></p>
                                <p><b>Price : <span id="<?php echo"p".($x+1); ?>"><?php echo $prdobj[$x]['productPrice']; ?> </span>Rs</b></p>
                                <p><b>Color : <?php echo $prdobj[$x]['cartcolor']; ?> </b></p>
                                <br>
                                <button class="button" onclick="removeprd_data('<?php echo $prdobj[$x]['productID'];?>','<?php echo $prdobj[$x]['cartcolor'];?>')"> Remove </button>
                            </div>
                        </div>
                    </td>
                    <td>
                        <center>
                            <input type="number" value="<?php echo $prdobj[$x]['cartquantity']; ?>" min="1" max='<?php echo $prdobj[$x]['productQty'];?>' id="<?php echo "j".($x+1);?>" onchange="priceadd(<?php echo ($x+1); ?>);caltotal();qtychg(this);update_data('<?php echo $prdobj[$x]['productID'];?>','<?php echo $prdobj[$x]['cartcolor'];?>','<?php echo ($x+1); ?>')">
                        </center>

                    </td>

                    <td>

                        <center>
                            <h2>RS.<span id="<?php echo "k".($x+1);?>" class="dis">00</span></h2>
                        </center>
                    </td>
                </tr>
                <input type="hidden" id="len" value="<?php echo $prdobjlen; ?>">


                <?php
		}
					?>
            </table>
            <div class="total">
                <table>
                    <tr>
                        <td>Sub Total</td>
                        <td>RS.<span id="a1">0000</span></td>
                    </tr>
                    <tr>
                        <td>discount(10%)</td>
                        <td>RS.<span id="a2">000</span></td>
                    </tr>
                    <tr>
                        <td>Total price</td>
                        <td>RS.<span id="a3">000</span></td>
                    </tr>
                </table>
            </div>
            <div class="pay" style="float:right; margin-right:150px;">
                <button class="button" onclick="sendamt();">
                    <h2>Payment Proceed </h2>
                </button>
                <button class="button" onclick="document.location='home.php'">
                    <h2> cancel </h2>
                </button>
            </div>
            <?php
	}
	else{
				?>
            <div>
                <center>
                    <h3>No Cart Products Available!!</h3>
                </center>
                <div style="margin : 200px 0;">

                </div>



                <?php
	}
				?>
                <form id="remprderm" method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>">
                    <input type="hidden" id="remprdid" name="remprdid">
                    <input type="hidden" id="prdcolor" name="prdcolor">
                </form>
                <form id="totamt" method="post" action="paymentform.php">
                    <input type="hidden" name="amount">
                </form>
                
                <form id="update" method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>">
                    <input type="hidden" id="upid" name="upid">
                    <input type="hidden" id="prdcolor" name="prdcolor1">
                    <input type="hidden" id = "num" name="num">
                    <input type="hidden" id = "num1" name="num1">
                </form>
                
            </div>


            <br>
        </div>
    </center>
    <br><br><br><br><br><br><br>

    <script src="../js/cart.js"> </script>
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
