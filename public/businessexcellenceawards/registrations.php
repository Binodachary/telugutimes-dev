<!DOCTYPE html>
<html lang="zxx">
<head>
<style>
html, body {
  height: 100%;
  margin: 0;
}
body {
  align-items: left;
  display: flex;
  background: #fff;
  color: #eee;
}
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<?php
	if(isset($_POST["submitbtn"])) {
	
		$fname = trim($_POST['fname']);
		$email = trim($_POST['email']);
		$phone = trim($_POST['phone']);
		$cmpny = trim($_POST['cmpny']);
		$desig = trim($_POST['desig']);
		$rdate = date("Y/m/d");
		
		$rdata = $fname . "," . $email . "," . $phone . "," . $cmpny . "," . $desig;
?>
<script>
	$(document).ready(function(){
		$("#registrations").append('<li><?php echo $rdata; ?></li>');
		window.location.href = "https://www.telugutimes.net/businessexcellenceawards/bea23.php?registered=1";	
	});
</script>
<?php
	}
?>
</head>
<body>
	<ul id="registrations">
		<li>NAME, EMAIL, PHONE, WORKING AT, DESIGNATION.</li>
	</ul>
</body>
</html>