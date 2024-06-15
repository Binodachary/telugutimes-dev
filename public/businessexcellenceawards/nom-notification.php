<?php

$fileUploadLocn = "assets/nominations/2023/"; 
//header('Location: index.php');

/*
if(isset($_POST['submit']) && isset($_POST['tnc'])
{
	global $to_email,$contents,$headers;

	$fname= $_POST['newnom-name1'];
	$lname= $_POST['newnom-name2'];
	$email= $_POST['newnom-email'];
	$phone= $_POST['newnom-phone'];
	$adrs1= $_POST['newnom-adrs1'];
	$adrs2= $_POST['newnom-adrs2'];
	$adrs3= $_POST['newnom-adrs3'];
	$adrs4= $_POST['newnom-adrs4'];
	$cname= $_POST['newnom-cname'];
	$edate= $_POST['newnom-edate'];
	$desig= $_POST['newnom-desig'];
	$bcity= $_POST['newnom-bcity'];
	$bsize= $_POST['newnom-bsize'];
	$reven= $_POST['newnom-22rev'];
	$categ= $_POST['newnom-bcatg'];
	$story= $_POST['newnom-story'];

	if(!empty($_FILES["newnom-files"]["name"])){
	
		$fileupld= $_FILES['newnom-files']['tmp-name'];
		$filename= $_FILES['newnom-files']['name'];
		$filesize= $_FILES['newnom-files']['size'];
	//	$filetype= $_FILES['newnom-files']['type'];
		$filerror= $_FILES['newnom-files']['error'];
		$filepath= $fileUploadLocn . $filename;
		$filetype= pathinfo($filepath, PATHINFO_EXTENSION);	
	//	$attchmnt= chunk_split(base64_encode(file_get_contents($fileupld)));

		if(move_uploaded_file($fileupld, $filepath)){ 
			$attchmnt = $filepath; 
		}else{ 
			$status ='Error';
			$output ="Hi" . $fname . " , Looks like there has been an issue with uploading your attachment and/or submitting your nomination.";
			$output .= "\nRequest you to try again, else pl write to us on ttbea@telugutimes.net\n\nThanks in advance!";		
		} 
	}
	
	$to_email="ttbea@telugutimes.net,cvramsushanth@telugutimes.net";
	$subject="New Nomination Received - ".$cname. "!";
	$contents= nl2br("\n\n		
	Name : ".$fname." ".$lname."\n
	Email: ".$email."\n
	Phone: ".$phone."\n\n
	Name of the Firm: ".$cname."\n
	Established Date: ".$edate."\n
	Business Address: ".$adrs1." ".$adrs2.", ".$adrs3."\n\n
	Business Category : ".$categ."\n
	Business Size [mn]: ".$bsize."\n
	Revenue for Yr2022: ".$reven."\n\n
	Success Story\n~~~~~~~~~~~~~\n".$story."\n\n
	Attachement Shared: https://telugutimes.net/businessexcellenceawards/assets/nominations/2023/".$filepath." [".$filesize."]\n\n
	User IP:".getHostByName(getHostName())."\n");
	//$contents .= $attchmnt;
	
	//Set up the email headers & multi part boundary
	$semi_rand= md5(time());  
	$mboundary= "==Multipart_Boundary_x{$semi_rand}x";

    $headers  = "From: $email \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: multipart/mixed;\r\n";
	$headers .= " boundary=\"{$mboundary}\"";

	$emailmsg = "--{$mboundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
                "Content-Transfer-Encoding: 7bit\n\n" . $contents . "\n\n";
				
	// Preparing attachment 
	if(is_file($attchmnt)){ 
		$emailmsg .= "--{$mboundary}\n"; 
		$fp = @fopen($attchmnt,"rb"); 
		$filedata = @fread($fp,filesize($attchmnt)); 
		@fclose($fp); 
		$filedata = chunk_split(base64_encode($filedata)); 
		$emailmsg .= "Content-Type: application/octet-stream; name=\"".basename($attchmnt)."\"\n" .  
		"Content-Description: ".basename($attchmnt)."\n" . 
		"Content-Disposition: attachment;\n" . " filename=\"".basename($attchmnt)."\"; size=".filesize($attchmnt).";\n" .  
		"Content-Transfer-Encoding: base64\n\n" . $filedata . "\n\n"; 
	} 
	 
	$message .= "--{$mboundary}--"; 
	$returnpath = "-f" . $email;

//  $headers .= "Message-ID: <".time().rand(1,1000)."@".$_SERVER['SERVER_NAME'].">". "\r\n";	
/*	$contents = "--".$boundary."\r\n";
	$contents .= "Content-Type: text/plain; charset=UTF-8\r\n";
	$contents .= "Content-Transfer-Encoding: base64\r\n\r\n";
	$contents .= chunk_split(base64_encode($contents));
	$contents .= "--".$boundary."\r\n";
	$contents .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n";
	$contents .= "Content-Transfer-Encoding: base64\r\n";
	$contents .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
	$contents .= $attchmnt."\r\n";
	$contents .= "--".$boundary."--"; */ /*
	
	 if(@mail($to_email, $subject, $contents, $headers, $returnpath))
		{
			$status='Success';
			//Displays the success message when email message is sent
			$output  = "Thanks ".$fname.", for sharing your details. \nOur advisory panel will review your nomination";
			$output .= "and we will reach out to you if you proceed further in the selection process.\n\nBest of Luck!";
			$output .= "\nLook forward to seeing you on 24-JUNE-23 at FalconX.";
		} 
		else 
		{
			$status='Error';
			//Displays an error message when email sending fails
			$output="Sorry, Looks like there was an error during the submission. Please try again or write to us on ttbea@telugutimes.net";
		}		
}
else{

	echo $fname;
	$status='error';
	$output="Please fill all the required fields";
	
	}
//echo json_encode(array('status'=> $status, 'msg'=>$output)); */
?>
<html><head><body><script>alert('<?php $fileUploadLocn ?>');location.href="https://telugutimes.net/businessexcellenceawards/";</script></body></html> 