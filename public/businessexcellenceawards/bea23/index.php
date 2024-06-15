<?php include('../header.php'); ?>
<script>
	function SubForm (){
		$.ajax({
			url:"https://api.apispreadsheets.com/data/EdhNmlLjc29BVqLG/",
			type:"post",
			data:$("#register").serializeArray(),
			success: function(){
				alert("Thank you for expressing interest to attend Telugu Times Business Excellence Awards 2023.\nYou should receive a confirmation soon on your email as well as phone.\nKeep that handy...")
				window.location.href = "https://www.telugutimes.net/businessexcellenceawards/bea23.php?registered=1#done";
			},
			error: function(){
				alert("There was an error :(")
			}
		});
	}
</script>
<!-- BANNER-SECTION -->
        <div class="home-banner-section overflow-hidden">
            <div class="banner-container-box">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 mb-md-0 mb-4">
                            <div class="about-us-section-page" data-aos="fade-up" style="padding-top:54px">
                               <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12 text-center">
                                     <iframe scrolling=no src="countdown.html" frameborder="0" style="width:270px; height:72px"></iframe>
									 <div class="about-section-img" style="padding-top:54px">
                                         <figure class="mb-0"><img src="assets/images/trophyglow.png" alt="" class="" width="333px"></figure>
                                     </div>
                                </div>
								<div class="col-lg-9 col-md-9 col-sm-12 text-center" style="padding-left:36px; padding-right:0px;"> 
                                    <figure class="mb-0"><img src="../assets/images/bea23-title.jpg"></figure><p></p>
									<h4 class="text-white artificial-text">A FIRST OF ITS KIND EVENT TO CELEBRATE</h4>
									<h4 class="text-white artificial-text">TELUGU ENTREPREURSHIP</h4>
									<p><img src="../assets/images/bea23-1nw.png" style="padding:27px">
									<img src="../assets/images/bea23-2fc.png" style="padding:45px"></p>									
									<h4 class="text-white artificial-text">Entry for Business Professionals by
									<a onclick="document.getElementById('fname').focus();" style="font-size:20px; color:#34ace0; cursor:pointer">
									Registration</a> ONLY</h4><p class="text-white banner-paragraphtt">(Dress Code: Formals/ Business Casuals)</p>
								</div>
                               </div>
                            </div>
                        </div>
						<div class="about-section-form about-us-section-page contact-us-section" style="margin:18px; padding:36px; width:100%">
							<div id="done" class="form-group contact-form-margin contact-content">
								<?php if (isset($_GET['registered'])) { 
																		
									//$message = "Thank you, " . $fname . ", for expressing interest to attend Telugu Times Business Excellence Awards 2023.<br>"; 
									//$message .="You should receive a confirmation soon on your email as well as phone.<br>Keep that handy...<br><br>";
									//$message .="Look forward to seeing you on 24-JUNE-23 at FalconX!";
									
									$maplocn = '<iframe width="450" height="333" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"';
									$maplocn .=' src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.6799986267674!2d-121.89585722468696!3d37.4210378720767!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fcecf20a315db%3A0x3afac6fb3496ac1d!2s691%20S%20Milpitas%20Blvd%2C%20Milpitas%2C%20CA%2095035%2C%20USA!5e0!3m2!1sen!2sin!4v1686518343570!5m2!1sen!2sin"></iframe>';
																		
									echo '<div class="row"><div class="col-lg-6 col-md-6 col-sm-12 mb-md-0 mb-4" style="padding:18px">';
									echo '<span id="dresscode" class="contact-content contact-title">DRESSCODE - Formals/ Business Casuals';
									echo '<br><img src="../assets/images/dresscode.png"></span></div>';
									echo '<div class="col-lg-6 col-md-6 col-sm-12 mb-md-0 mb-4" style="padding:18px">';
									echo '<span id="location" class="contact-content contact-title">LOCATION<br>' . $maplocn . '</span></div></div>';
									
								}
								else {
								?>
								<form id="register" name="regform" action="javascript:SubForm();">
									<div class="container"><div class="row">
										<div class="col-lg-2 col-md-2 col-sm-6 mb-md-0 mb-4" style="padding:18px">
											<span class="contact-content contact-title">Full Name</span>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 mb-md-0 mb-4" style="padding:18px">
											<input type="text" class="form-control input-text" 
													id="fname" placeholder="" name="fname" required>
										</div>
										<div class="col-lg-1 col-md-1"></div>
										<div class="col-lg-2 col-md-2 col-sm-6 mb-md-0 mb-4" style="padding:18px">
											<span class="contact-content contact-title">Email</span>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 mb-md-0 mb-4" style="padding:18px">
											<input type="text" class="form-control input-text" 
													id="email" placeholder="name@domain.xyz" name="email" required>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-6 mb-md-0 mb-4" style="padding:18px">
											<span class="contact-content contact-title">Working At</span>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 mb-md-0 mb-4" style="padding:18px">
											<input type="text" class="form-control input-text" 
													id="cmpny" placeholder="" name="cmpny" required>
										</div>
										<div class="col-lg-1 col-md-1"></div>
										<div class="col-lg-2 col-md-2 col-sm-6 mb-md-0 mb-4" style="padding:18px">
											<span class="contact-content contact-title">Phone</span>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 mb-md-0 mb-4" style="padding:18px">
											<input type="text" class="form-control input-text" 
													id="phone" placeholder="+1(###)###-####" name="phone" required>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-6 mb-md-0 mb-4" style="padding:18px">
											<span class="contact-content contact-title">Designation</span>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 mb-md-0 mb-4" style="padding:18px">
											<input type="text" class="form-control input-text" 
													id="desig" placeholder="" name="desig" required>
										</div>
										<div class="col-lg-1 col-md-1"></div>
										<div class="col-lg-2 col-md-2 col-sm-6 mb-md-0 mb-4" style="padding:18px">
											<input type="submit" id="submitbtn" name="submitbtn" value="REGISTER"
													class="btn btn-primary hover-effect">
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 mb-md-0 mb-4 text-center" style="padding:18px">
											<p class="text-white banner-paragraphtt" style="font-size:13px">For any queries, Contact us below</p>
										</div>
									</div></div>
								</form>
								<?php } ?>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('../footer.php'); ?>