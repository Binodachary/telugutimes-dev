<?php
	$send_to = "ttbea@telugutimes.net";
	$subject = "BEA23 - NEW REGISTRATION";
	$content = "Name : ,Email: ,Phone: ,Work : ,Role: .\n";
	
	$headers = "From: TT <editor@telugutimes.net>\r\n";
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	if (mail($send_to, $subject, $content, $headers)) { echo "SENT?"; }
	
	$save_to = fopen("registrations.txt", "a");
	fwrite($save_to, $content) or die("FAILED");
	fclose($save_to);
?>