<?php 
session_start();
require 'config.php';

if(isset($_POST['amount'])){
	//echo $_POST['amount'];


	if(isset($_SESSION['user_id'])){
		//echo $_SESSION['user_id'];
		$sql = "SELECT cp.cartquantity,cp.cartcolor,cp.cartId ,p.productID ,p.productQty "
			."FROM product_details p , cart_products cp  "
			." WHERE p.productID=cp.productID AND p.productID=cp.productID AND cp.cartId =(SELECT cartId FROM cart_user WHERE userID = '".$_SESSION['user_id']."')";
		//echo $sql;
		//$sql="SELECT * FROM cart_products";
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
		//print_r($prdarray);
		//echo count($prdarray);
		$check ="SELECT paymentId FROM payment_details "
			." ORDER BY paymentId ASC";
		$result=$con->query($check);
		$lastid=null;
		while($row = $result->fetch_assoc()) 
		{
			$lastid = $row['paymentId'];
		}
		$newIDno = substr($lastid, 3)+1;
		$newIDno=str_pad($newIDno, 3, '0', STR_PAD_LEFT);
		$newID="PMT".$newIDno;
		//echo "nw ".$newID;
		$sql="INSERT INTO payment_details (paymentId, amount) "
			." VALUES ('".$newID."', '".$_POST['amount']."')";
		if(!$result = $con->query($sql))
		{
			echo $con->error;       
		}

		$check ="SELECT orderId  FROM order_products "
			." ORDER BY orderId  ASC";
		if(!$result=$con->query($check))
		{
			echo $con->error;       
		}
		//echo $result->num_rows;
		$lastid=null;
		while($row = $result->fetch_assoc()) 
		{
			$lastid = $row['orderId'];
		}
		$newIDno = substr($lastid, 3)+1;
		$newIDno=str_pad($newIDno, 3, '0', STR_PAD_LEFT);
		$newIDo="ORD".$newIDno;
		//echo "asdasd".$lastid;
		//echo "232".$newIDo;

		$sql="INSERT INTO order_details (orderId, customerID,paymentId ) "
			." VALUES ('".$newIDo."', '".$_SESSION['user_id']."', '".$newID."')";
		if(!$result = $con->query($sql))
		{
			echo $con->error;       
		}


		$sqlord="INSERT INTO order_products (orderId, productID ,ordquantity ,ordcolor) "
			." VALUES ";
		print_r($prdarray);
		for($i=0;$i<count($prdarray);$i++){
			if($i!=0){
				$sqlord.=" , "; 
			}
			$sqlord.="('".$newIDo."', '".$prdarray[$i]['productID']."', '".$prdarray[$i]['cartquantity']."', '".$prdarray[$i]['cartcolor']."')";
		}
		//echo $sqlord;
		if(!$result = $con->query($sqlord))
		{
			echo $con->error;       
		}
		else{
			for($i=0;$i<count($prdarray);$i++){
				$qtyu=$prdarray[$i]['productQty']-$prdarray[$i]['cartquantity'];
				$sqlprd = "UPDATE product_details SET productQty=".$qtyu." WHERE productid  ='".$prdarray[$i]['productID']."'";
				if(!$result = $con->query($sqlprd))
				{
					echo $con->error;       
				}

			}
			//echo $prdarray[0]['cartId'];
			$sql = "DELETE FROM cart_products WHERE cartId ='".$prdarray[0]['cartId']."'";
			if(!$result=$con->query($sql))
			{
				echo $con->error;
			}

		}
		?>
		
<form action="paymentreceipt.php" id='dord' method="post">
	<input type="hidden" name="status">
	<input type="hidden" name="ordid">

</form>
<script>
	function sub(){
		document.getElementsByName('status')[0].value = 'Accept';
		document.getElementsByName('ordid')[0].value = '<?php echo $newIDo?>';
		document.getElementById('dord').submit();
	}
</script>
		
		<?php
		sleep(2);
		echo '<script>sub();</script>';


	}
}
?>
