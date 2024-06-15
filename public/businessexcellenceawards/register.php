<?php

if(isset($_POST['submitbtn'])) {

	$fname = trim($_POST['fname']);
	$email = trim($_POST['email']);
	$phone = trim($_POST['phone']);
	$cmpny = trim($_POST['cmpny']);
	$desig = trim($_POST['desig']);
	$rdate = date("Y/m/d");
	
	if(empty($fname)||empty($email)) {
	
		echo "<html><body><script>alert('Name and email are mandatory!');</script></body></html>";
		header('Location: bea23.php');
		exit;
	}
	$send_to = "ttbea@telugutimes.net";
	$subject = "BEA23 - NEW REGISTRATION";
	$message = "Name :" . $fname . "\nEmail:" . $email . "\nPhone:" . $phone . "\nWork : " . $cmpny . "\nRole: " . $desig;
	$thnkyou = "Thank you," . $fname . ", for expressing interest to attend Telugu Times Business Excellence Awards 2023. \nYou should receive a confirmation soon on your email as well as phone. \nKeep that handy... \n\nLook forward to seeing you on 24-JUNE-23!\nDo remember that the dress code is Formals/ Business Casuals.";
	
	$headers = "From: $fname <$email>\r\n";
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	mail($send_to, $subject, $message, $headers);
	
	echo "<html><body><script type='text/javascript'>";
	echo "alert('" . $thnkyou . "')</script>";
	header('Location: bea23.php');
	exit;

}

?>