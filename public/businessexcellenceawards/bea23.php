<?php include('header.php'); ?>
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
			<section class="about-us-section-start about-us-section-2 Services-About-us-Section overflow-hidden">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 mb-md-0 mb-4">
                            <div class="about-us-section-page" data-aos="fade-up" style="padding:54px 27px 54px 27px">
                               <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12 text-center">
                                     <!--iframe scrolling=no src="countdown.html" frameborder="0" style="width:270px; height:72px"></iframe-->
									<div class="contact-section-btn text-center mr-4" style="padding-top:36px">
                                    <a href=#done class="btn btn-primary hover-effect" style="font-weight:bold; margin-left:9px">EVENT</a>
									<a href="https://www.telugutimes.net/epaper2/2023-july-tt-business-excellence-awards" target="_blank" class="btn btn-primary hover-effect" style="font-weight:bold; margin-left:27px">GALLERY</a>
									</div>
									<p></p>
									 <div class="about-section-img" style="padding-top:54px">
                                         <figure class="mb-0"><img src="assets/images/trophyglow.png" alt="" class="" width="333px"></figure>
                                     </div><div class="about-section-img" style="padding:54px 9px 9px 27px">
                                         <figure class="mb-0"><img src="assets/images/partners.png" alt="" class="" width="270px"></figure>
                                     </div>
                                </div>
								<div class="col-lg-9 col-md-9 col-sm-12 text-center" style="padding-left:36px; padding-right:0px;"> 
                                    <img src="assets/images/bea23-title.png"><br><br>
									<h4 class="text-white artificial-text">A FIRST OF ITS KIND EVENT TO CELEBRATE TELUGU ENTREPREURSHIP</h4>
									<p class="text-white banner-paragraphtt">Awards presentation to Winners from various fields by eminent<br>Govt & Business Leaders</p>
									<div class="container"><div class="row">
										<div class="col-lg-4 col-md-4 col-sm-12 mb-md-0 mb-4 text-center text-white"><center>CHIEF GUEST<br>
											<div class="about-us-content" style="padding:0px; margin:0px; width:108px; height:108px" data-aos="fade-up">
												<div class="icons-rounded-box mr-3" style="margin-bottom:0px">
													<figure class="mb-0"><img src="assets/images/panel/g1-consul.jpg"
															  style="width:90px; border-radius:9px; border: 1px solid #fff;"></figure>
												</div>
											</div>
											<p class="security-services-p"><b>Dr T V Nagendra Prasad</b><br>Consul General of India - SFO</p>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12 mb-md-0 mb-4 text-center text-white"><center>GUEST OF HONOR<br>
											<div class="about-us-content" style="padding:0px; margin:0px; width:108px; height:108px" data-aos="fade-up">
												<div class="icons-rounded-box mr-3" style="margin-bottom:0px">
													<figure class="mb-0"><img src="assets/images/panel/g2-ponnala.jpg"
															  style="width:90px; border-radius:9px; border: 1px solid #fff;"></figure>
												</div>
											</div>
											<p class="security-services-p"><b>Sri Ponnala Lakshmaiah</b><br>Former Minister of IT-C, Govt of AP</p>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12 mb-md-0 mb-4 text-center text-white"><center>GUEST OF HONOR<br>
											<div class="about-us-content" style="padding:0px; margin:0px; width:108px; height:108px" data-aos="fade-up">
												<div class="icons-rounded-box mr-3" style="margin-bottom:0px">
													<figure class="mb-0"><img src="assets/images/panel/g3-komati.jpg"
															  style="width:90px; border-radius:9px; border: 1px solid #fff;"></figure>
												</div>
											</div>
											<p class="security-services-p"><b>Sri Jayaram Komati</b><br>Former Resident Representative for North America, Govt of AP</p>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12 mb-md-0 mb-4 text-center text-white"><center>GUESTS OF HONOR</div>
										<div class="col-lg-4 col-md-4 col-sm-12 mb-md-0 mb-4 text-center text-white"><center>
											<div class="about-us-content" style="padding:0px; margin:0px; width:108px; height:108px" data-aos="fade-up">
												<div class="icons-rounded-box mr-3" style="margin-bottom:0px">
													<figure class="mb-0"><img src="assets/images/panel/g4-mayor1.jpg"
															  style="width:90px; border-radius:9px; border: 1px solid #fff;"></figure>
												</div>
											</div>
											<p class="security-services-p"><b>Ms Carman Montano</b><br>Mayor - City of Milpitas</p>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12 mb-md-0 mb-4 text-center text-white"><center>
											<div class="about-us-content" style="padding:0px; margin:0px; width:108px; height:108px" data-aos="fade-up">
												<div class="icons-rounded-box mr-3" style="margin-bottom:0px">
													<figure class="mb-0"><img src="assets/images/panel/g5-mayor2.jpg"
															  style="width:90px; border-radius:9px; border: 1px solid #fff;"></figure>
												</div>
											</div>
											<p class="security-services-p"><b>Ms Lisa Gillmor</b><br>Mayor - City of Santaclara</p>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12 mb-md-0 mb-4 text-center text-white"><center>
											<div class="about-us-content" style="padding:0px; margin:0px; width:108px; height:108px" data-aos="fade-up">
												<div class="icons-rounded-box mr-3" style="margin-bottom:0px">
													<figure class="mb-0"><img src="assets/images/panel/g6-mayor3.jpg"
															  style="width:90px; border-radius:9px; border: 1px solid #fff;"></figure>
												</div>
											</div>
											<p class="security-services-p"><b>Mr Larry Klein</b><br>Mayor - City of Sunnyvale</p>
										</div>
									</div><div class="row" style="padding-top:36px">										
										<div class="col-lg-3 col-md-3 col-sm-6 mb-md-0 mb-4 text-white"><center>
											<div class="about-us-content" style="padding:0px; margin:0px; width:108px; height:108px" data-aos="fade-up">
												<div class="icons-rounded-box mr-3" style="margin-bottom:0px">
													<figure class="mb-0"><img src="assets/images/bea23-1nw.png"
															  style="width:90px; border-radius:9px; border: 1px solid #fff;"></figure>
												</div>
											</div>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-6 mb-md-0 mb-4 text-white" style="border-right:1px solid white">
											<p class="security-services-p"><br><b>SOCIAL HOUR</b><br>4:30PM-5:30PM</p>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12 mb-md-0 mb-4 text-center text-white"><center>
											<p class="security-services-p" align="center"><i>KEY NOTE ADDRESS</i><br>Building and scaling up businesses
											<br><br><b>Mr. Bhaskara Sunkara</b><br>Technologist & CEO - BicycleIO</p>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 mb-md-0 mb-4 text-center text-white"><center>
											<div class="about-us-content" style="padding:0px; margin:0px; width:108px; height:108px" data-aos="fade-up">
												<div class="icons-rounded-box mr-3" style="margin-bottom:0px">
													<figure class="mb-0"><img src="assets/images/panel/g7-sunkara.jpg"
															  style="width:90px; border-radius:9px; border: 1px solid #fff;"></figure>
												</div>
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12 mb-md-0 mb-4 text-center text-white" style="padding-top:36px"><center>FIRE SIDE CHAT - Experiences of Silicon Valley Entrepreneurs</div>
										<div class="col-lg-3 col-md-3 col-sm-6 mb-md-0 mb-4 text-center text-white"><center>
											<div class="about-us-content" style="padding:0px; margin:0px; width:108px; height:108px" data-aos="fade-up">
												<div class="icons-rounded-box mr-3" style="margin-bottom:0px">
													<figure class="mb-0"><img src="assets/images/panel/g8-rkoduri.jpg"
															  style="width:90px; border-radius:9px; border: 1px solid #fff;"></figure>
												</div>
											</div>
											<p class="security-services-p"><b>Mr Raja Koduri</b><br>Executive VP - Intel</p>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 mb-md-0 mb-4 text-center text-white"><center>
											<div class="about-us-content" style="padding:0px; margin:0px; width:108px; height:108px" data-aos="fade-up">
												<div class="icons-rounded-box mr-3" style="margin-bottom:0px">
													<figure class="mb-0"><img src="assets/images/panel/1-rajur.jpg"
															  style="width:90px; border-radius:9px; border: 1px solid #fff;"></figure>
												</div>
											</div>
											<p class="security-services-p"><b>Mr Raju Reddy</b><br>Founder CEO - Sierra Atlantic</p>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 mb-md-0 mb-4 text-center text-white"><center>
											<div class="about-us-content" style="padding:0px; margin:0px; width:108px; height:108px" data-aos="fade-up">
												<div class="icons-rounded-box mr-3" style="margin-bottom:0px">
													<figure class="mb-0"><img src="assets/images/panel/g9-mchirala.jpg"
															  style="width:90px; border-radius:9px; border: 1px solid #fff;"></figure>
												</div>
											</div>
											<p class="security-services-p"><b>Mr Murali Chirala</b><br>CEO - Falcon X</p>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 mb-md-0 mb-4 text-center text-white"><center>
											<div class="about-us-content" style="padding:0px; margin:0px; width:108px; height:108px" data-aos="fade-up">
												<div class="icons-rounded-box mr-3" style="margin-bottom:0px">
													<figure class="mb-0"><img src="assets/images/panel/2-jp.jpg"
															  style="width:90px; border-radius:9px; border: 1px solid #fff;"></figure>
												</div>
											</div>
											<p class="security-services-p"><b>Mr J P Vejendla</b><br>CEO - Forsys Inc</p>
										</div>
									</div></div>
									
									<h4 class="text-white artificial-text">Entry for Business Professionals by
									<a onclick="document.getElementById('fname').focus();" style="font-size:20px; color:#34ace0; cursor:pointer">
									Registration</a> ONLY </h4><!--p class="text-white banner-paragraphtt">(Dress Code: Formals/ Business Casuals)</p-->
								</div>
                               </div>
                            </div>
                        </div>
						<div class="about-section-form about-us-section-page contact-us-section" style="margin:18px; padding:36px; width:100%">
							<div id="done" class="form-group contact-form-margin contact-content">
								<iframe width="90%" height="540px" src="https://youtube.com/embed/videoseries?list=PL7kIjBApihczL-mQtx1OGVvMQSDSlgQfn" title="Telugu Times Business Excellence Awards" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen=""></iframe>
								<?php //if (isset($_GET['registered'])) { 
																		
									//$message = "Thank you, " . $fname . ", for expressing interest to attend Telugu Times Business Excellence Awards 2023.<br>"; 
									//$message .="You should receive a confirmation soon on your email as well as phone.<br>Keep that handy...<br><br>";
									//$message .="Look forward to seeing you on 24-JUNE-23 at FalconX!";
									
									//$maplocn = '<iframe width="450" height="333" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"';
									//$maplocn .=' src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.6799986267674!2d-121.89585722468696!3d37.4210378720767!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fcecf20a315db%3A0x3afac6fb3496ac1d!2s691%20S%20Milpitas%20Blvd%2C%20Milpitas%2C%20CA%2095035%2C%20USA!5e0!3m2!1sen!2sin!4v1686518343570!5m2!1sen!2sin"></iframe>';
																		
									//echo '<div class="row"><div class="col-lg-6 col-md-6 col-sm-12 mb-md-0 mb-4" style="padding:18px">';
									//echo '<span id="dresscode" class="contact-content contact-title">DRESSCODE - Formals/ Business Casuals';
									//echo '<br><img src="assets/images/dresscode.png"></span></div>';
									//echo '<div class="col-lg-6 col-md-6 col-sm-12 mb-md-0 mb-4" style="padding:18px">';
									//echo '<span id="location" class="contact-content contact-title">LOCATION<br>' . $maplocn . '</span></div></div>';
									
								//}
								//else {
								?>
								<!--form id="register" name="regform" action="javascript:SubForm();">
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
								</form-->
								<?php //} ?>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('footer.php'); ?>