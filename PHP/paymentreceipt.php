<?php
session_start();
require 'config.php';
if(isset($_SESSION['user_id'])&&isset($_POST['status'])){
    
?>
<html>

<head>
    <title>Receipt-VKQube</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Header and footer-->
    <link rel="stylesheet" type="text/css" href="../CSS/default2.css" />
    <link rel="stylesheet" href="../CSS/receipt.css">
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


    <br><br><br>
    <?php
        if($_POST['status']=='Accept'){
	$user_id = $_SESSION['user_id'];
	//echo $_POST['ordid'];
    $sql = "SELECT prd.productName,prd.productPrice,ord.ordquantity FROM product_details prd, order_products ord WHERE prd.productid = ord.productID AND ord.orderid = '".$_POST['ordid']."'";
    if($result=$con->query($sql))
	{
		$con->error;
	}
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
    $sql1 = "SELECT paymentId FROM order_details WHERE orderId ='".$_POST['ordid']."'";
    if($result=$con->query($sql1))
	{
		$con->error;
	}
    $got=$result->fetch_all();
        ?>
    <div id="PaymentReciept">
        <center id="top">
            <div class="logo"></div>
            <div class="info">
                <h2>VK Qube</h2> <br>
                <h4> Payment-ID-No:<?php echo $got[0][0];?></h4><br>
            </div>
            <!--End Info-->
        </center>
        <!--End InvoiceTop-->


        <center>
            <?php
	
	$prdobjlen= count($prdarray);
	if($prdobjlen>0){
        ?>

            <div id="bot">


                <div id="table">
                    <table>
                        <tr class="tabletitle">
                            <td class="item">
                                <h2>Item</h2>
                            </td>
                            <td class="qty">
                                <h2>Qty</h2>
                            </td>
                            <td class="subtot">
                                <h2>Sub Total</h2>
                            </td>
                        </tr>
                        <?php 
		for($x=0;$x<$prdobjlen;$x++){									
					?>


                        <tr class="service">
                            <td class="tableitem">
                                <p class="itemtext"><?php echo $prdobj[$x]['productName']; ?></p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext"><span id='<?php echo"qua".($x+1); ?>'><?php echo $prdobj[$x]['ordquantity']; ?></span></p>
                            </td>
                            <input type='hidden' id='<?php echo "pro".($x+1); ?>' value='<?php echo $prdobj[$x]['productPrice']; ?>'>
                            <td class="tableitem">
                                <p class="itemtext"> RS.<span id='<?php echo"cha".($x+1); ?>' class="tota">00</span></p>
                            </td>
                        </tr>

                            
                        <?php
		          }
					?>
<input type="hidden" id="len" value="<?php echo $prdobjlen; ?>">
                        <tr class="tabletitle">
                            <td></td>
                            <td class="amount">
                                <h4>Amount</h4>
                            </td>
                            <td class="payment1">
                                <h4>Rs.<span id="amou">00</span></h4>
                            </td>
                        </tr>


                        <tr class="tabletitle">
                            <td></td>
                            <td class="discount">
                                <h4>Discount</h4>
                            </td>
                            <td class="payment2">
                                <h4>Rs&nbsp;&nbsp;&nbsp;<span id="disc">00</span></h4>
                            </td>
                        </tr>

                        <tr class="tabletitle">
                            <td></td>
                            <td class="total">
                                <h4>Total</h4>
                            </td>
                            <td class="payment3">
                                <h4>Rs.<span id="finalamo">00</span></h4>
                            </td>
                        </tr>

                    </table>
                    <?php
	
    }
				?>

                    --------------------------------------------------------<br>
                </div>
                <!--End Table-->

                <div id="legalcopy">
                    <p class="legal"><strong>Thank you for Shopping With Us!</strong> 
                    </p>
                </div>

            </div>
            <!--End InvoiceBot-->
            <div id="down">
                <div class="down">

                    <p>
                        --------------------------------------------------------<br>
                        <b>Contact Us</b><br>
                        --------------------------------------------------------<br>

                        Address&nbsp; :&nbsp; Main Street, Jaffna</br>
                        Email&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; vkqube@gmail.com</br>
                        Phone&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; +94 021 222 2121</br>
                        --------------------------------------------------------<br>
                        --------------------------------------------------------<br>
                    </p>
                </div>
            </div>
            <!--End Invoice down-->
        </center>
    </div>
    <!--End Invoice-->
    <?php
}
        else if($_POST['status'] == 'Decline' )
        {
            ?>
    <div id="PaymentReciept">
        <h1 style="Color:#ff0031">PAYMENT FAILED!!</h1>
        <div id="down">
            <div class="down">

                <p>
                    --------------------------------------------------------<br>
                    <b>Contact Us</b><br>
                    --------------------------------------------------------<br>

                    Address&nbsp; :&nbsp; Main Street, Jaffna</br>
                    Email&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; vkqube@gmail.com</br>
                    Phone&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; +94 021 222 2121</br>
                    --------------------------------------------------------<br>
                    --------------------------------------------------------<br>
                </p>
            </div>
        </div>
    </div>
    <?php
        }

?>




    <center> <button class="print-button" onclick="printJS('docs/printjs.pdf')"> <span class="print-icon"></span></button> </center>
<script src="../JS/receipt.js"></script>

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
    header('location:Home.php');
}
    ?>
