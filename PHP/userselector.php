<?php 
session_start();
if(isset($_SESSION['user_id'])){
	$idcat = substr($_SESSION['user_id'], 0,3);
	if($idcat==='SOW'){
		echo "shop owner<br>";
		header('location:shopOwnerProfile.php');	
	}
	else if ($idcat==='CMR'){
		echo "customer<br>";
		header('location:cutomerProfile.php');	
	}
}
else{
		header('location:login.php');
}
?>