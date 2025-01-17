<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

$path = '/var/www/html/public/counter/epaper.txt';

// Opens txt file to read the number of hits.
if ( file_exists($path) ) {

$file = fopen($path, "rb");
$content = fgets( $file, 1000 );
fclose( $file );

}

// Update the count.
$count = abs( intval( $content ) ) + 1;
//echo $count;

// Opens txt file again to change new hit number.
if ( file_exists($path) ) {

$file = fopen($path, "w");
fwrite( $file, $count );
fclose( $file );

}

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/businessexcellenceawards/assets/css/bootstrap.min.css"/>
<style>
html, body {
  height: 100%;
  width:100%;
}

body {
  align-items: center;
  text-align: center;
  color: #0000dd;
  font-size: 13px;
  font-weight: 540;
  font-family: -apple-system, 
    BlinkMacSystemFont, 
    "Segoe UI", 
    Roboto, 
    Oxygen-Sans, 
    Ubuntu, 
    Cantarell, 
    "Helvetica Neue", 
    sans-serif;
}

input, select {
    border:1px solid #dee;
	border-radius:1px;
    vertical-align:middle;
    height:36px;
}

.mobileshow { 
    display: none; 
  }

@media only screen AND (max-width: 736px) {  
  .dontshow { 
    display: none; 
  }
  
  .mobileshow {
	display: inline;
  }
}
</style>
<script
	src="https://code.jquery.com/jquery-3.4.1.js"
	integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
	crossorigin="anonymous"></script>
<script>
	function SubForm (){
		$.ajax({
			url:"https://api.apispreadsheets.com/data/PqCcYbdPDBsMk6vv/",
			type:"post",
			data:$("#epaper").serializeArray(),
			success: function(){
				alert("Thank you. You will now start receicing Telugu Times ePaper directly to your email every fortnight!")
				location.reload();
			},
			error: function(){
				alert("There was an error :(")
			}
		});
	}
</script>
</head>
<body>
	<form id="epaper" name="epaper" class="dontshow" action="javascript:SubForm();">
		<div class="container" style="width:99%"><div class="row" style="width:99%">
			<div class="col-lg-12 col-md-12 col-sm-12 mb-md-0 mb-4" style="padding-bottom:-45px">
				Did you know that Telugu Times issues comes out every fortnight? 
				Do you want to receive the ePaper directly to your email and/or whatsapp?
				Please share your details below!
			</div>
			
			<div class="col-lg-2 col-md-2 col-sm-6 mb-md-0 mb-4" style="padding:9px">
				<input type="text" id="name" class="form-control input-text" placeholder="Full Name" name="Name" required>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 mb-md-0 mb-4" style="padding:9px">
				<input type="text" id="email" class="form-control input-text" placeholder="Email Address" name="Email" required>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-6 mb-md-0 mb-4" style="padding:9px; text-align:right;">
				<select name="CountryCode" id="CountryCode">
					<option data-CountryCode="US" value="1" Selected>US +1</option>
					<option data-CountryCode="CA" value="1">CA +1</option>
					<option data-CountryCode="IN" value="91">IN +91</option>
					<option data-CountryCode="UK" value="44">UK +44</option>
					<option data-CountryCode="AU" value="61">AU +61</option>
					<option data-CountryCode="XX" value="XX">Other</option>
				</select>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-6 mb-md-0 mb-4" style="padding:9px; text-align:left">
				<input type="text" id="phone" class="form-control input-text" placeholder="Phone Number" name="Phone">
			</div>
			<div class="col-lg-2 col-md-2 col-sm-6 mb-md-0 mb-4" style="padding:9px">
				<input type="text" id="city" class="form-control input-text" placeholder="City, State" name="City">
			</div>
			<div class="col-lg-1 col-md-1 col-sm-6 mb-md-0 mb-4" style="padding:9px">
				<input type="submit" id="submitbtn" name="submitbtn" value="SUBMIT" class="btn btn-primary hover-effect">
			</div>
		</div></div>
	</form>
	<div class="mobileshow">Telugu Times ePaper is best viewed on Laptop/Desktop or on "Landscape" mode in tabs and cell phones.
	Rotate your device now for a good reading experience!</div>
</body>
</html>