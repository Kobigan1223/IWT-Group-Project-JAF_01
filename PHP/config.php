<?php
$con = new mysqli("localhost","root",'',"vkqube");
if ($con->connect_error) {
	 die('Connection failed: '. $con->connect_error);
 }

?>