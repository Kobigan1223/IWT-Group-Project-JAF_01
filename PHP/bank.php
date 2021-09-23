<?php 
//$_POST['btnsubmit']='val';
if(isset($_POST['btnsubmit'])){
	echo "Full Name :".$_POST['fullname']."<br>";
   echo "Card Holder Name :".$_POST['cardname']."<br>"; 
    echo "Total Bill Amount : RS.".$_POST['totalamount']."<br>";
   echo "Card No : ".$_POST['cardnumber']."<br>";
    echo "Card CVV No : ".$_POST['cvv']."<br>";
?>
<html>

<head>
    <title> bank </title>
    <script>
        function accept() {
            if (confirm("Do you want to proceed?!!!!!")) {
                document.getElementById('pord').submit();
            } else {
                decline();
            }

        }

        function decline() {
            document.getElementsByName('status')[0].value = 'Decline';
            document.getElementById('dord').submit();
        }

    </script>
</head>

<body>
    <form action="proceedorder.php" id='pord' method="post">
        <input type="hidden" value='<?php echo $_POST['totalamount'];?>' name="amount">
    </form>
    <form action="paymentreceipt.php" id='dord' method="post">
        <input type="hidden" name="status">
    </form>
    <button onclick="accept();">Accept</button>
    <button onclick="decline();">Decline</button>

</body>

</html>

<?php 
}
?>
