<?php include('header.php'); ?>
    <!-- BANNER-SECTION -->
    <div class="home-banner-section overflow-hidden">
        <div class="banner-container-box" style="padding-top:36px">
			<div class="container">
				<div class="row">
					<!--div class="col-lg-12 col-md-12 col-sm-12 mb-md-0 mb-4 text-center">
						<h4 class="text-white artificial-text">Recognizing and Celebrating Telugu Business Excellence</h4>
						<p></p><p></p>
						<p class="text-white banner-paragraphtt text-justify">
							A First of its kind event with an objective of identifying and awarding Telugu Entrepreneurs operating in the USA and who have achieved exceptional success and made a positive impact in their industries and communities.
						</p>			
					</div-->
					<div class="col-lg-6 col-md-6 col-sm-12 mb-md-0 mb-4 text-center">
						<div id="welcome" style="display:none;">
							<p align="right">
								<input type="button" style="background:transparent; font-size:12px; font-weight:bold; color:#dee;" 
									   id="closewelcome" value="X" onclick=switchtomain();><br>
								<img src="assets/images/welcome.jpg" onclick=switchtomain(); 
									 style="width:100%; height:540px; border-radius:18px; border-top-right-radius:0px;">
							</p>
						</div>
						<div id="main">
							<div class="d-flex justify-content-center flex-column h-100" data-aos="fade-up">
								<h4 class="text-white artificial-text">Recognizing and Celebrating</h4>
								<h3 class="text-white">Telugu Business Excellence</h3>
								<p></p><p></p>
								<p class="text-white banner-paragraphtt text-justify">
									Business Excellence Awards is a first of its kind concept with an objective of identifying and awarding Telugu Entrepreneurs operating in the USA and who have achieved exceptional success, made a positive impact in their industries and communities.
								</p>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 mb-md-0 mb-4 text-center">
						<h4 class="text-white banner-paragraphtt text-center padding-top:18px">After a grand inaugural BEA '23 at San Jose last year,<br><b>
						BEA '24 is now coming up at Dallas on Saturday, 15-JUNE</b></h4><br><p><img src="assets/images/bea24-partners.png"></p>
					</div>
				</div>
				<div class="row" style="padding-top:36px">
					<div class="col-lg-4 col-md-4 col-sm-12 justify-content-center">
						<h4 class="text-white">BEA'23 Event Highlights</h4><br>
						<iframe scrolling=no src="bea23-sliders.html" frameborder="0" style="width:360px; height:200px"></iframe>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 justify-content-center" style="padding-left:36px">
						<h4 class="text-white">Gear Up for BEA'24</h4><br>
						<iframe width="100%" height="150px" src="https://www.youtube.com/embed/eRspei9y8fc?si=TmBUJkvqv8iL9Ax5" title="Telugu Times Business Excellence Awards" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen=""></iframe>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 justify-content-center" style="padding-left:36px">
						<!--iframe scrolling=no src="home-timeline.html" frameborder="0" style="width:360px; height:600px"></iframe-->
						<h4 class="text-white">BEA'23 Award Winners</h4><br>
						<iframe scrolling=no src="bea23-winners.html" frameborder="0" style="width:360px; height:200px"></iframe>
					</div>
				</div>
            </div>
        </div>
    </div>
	<script>		
		function switchtomain() {
            if (document.getElementById('welcome')) {

                if (document.getElementById('welcome').style.display == 'none') {
                    document.getElementById('welcome').style.display = 'block';
                    document.getElementById('main').style.display = 'none';
                }
                else {
                    document.getElementById('welcome').style.display = 'none';
                    document.getElementById('main').style.display = 'block';
                }
            }
		}
	</script>
    <!-- ABOUT-TEAM-SECTION -->
    <section class="about-us-section-start about-teams-section overflow-hidden">
        <div class="about-right-icon position-relative" data-aos="fade-up-right">
            <figure class="whyus-icon"><img src="assets/images/about-us-section-right-icon.png"
                                            alt="TT-business-excelence-tv9-bata"
                                            class="img-fluid">
            </figure>
        </div>
    <!-- COMMUNITY PARTERNS 
	<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="text-center text-white" data-aos="fade-up">Community Partners</h4>
                </div>
            </div>
            <div class="row" style="padding-top:18px;">
                <div class="col-lg-1 col-md-1 col-sm-2">
                    <div class="about-teams-inner" data-aos="fade-up">
                        <div class="about-team">
                            <div class="icons-rounded-box">
                                <img src="assets/images/community-tana.jpg"
                                                          alt="TT-BEA-Community Partners"
                                                          class="img-fluid teams-img-border">                              
                            </div>
                        </div>	
                    </div>
                </div>
				<div class="col-lg-1 col-md-1 col-sm-2"></div>
				<div class="col-lg-1 col-md-1 col-sm-2">
                    <div class="about-teams-inner" data-aos="fade-up">
                        <div class="about-team">
                            <div class="icons-rounded-box">
                                <img src="assets/images/community-ata.jpg"
                                                          alt="TT-BEA-Community Partners"
                                                          class="img-fluid teams-img-border">
                                </div>
                        </div>                        
                    </div>
                </div>
				<div class="col-lg-1 col-md-1 col-sm-2"></div>
				<div class="col-lg-1 col-md-1 col-sm-2">
                    <div class="about-teams-inner" data-aos="fade-up">
                        <div class="about-team">
                            <div class="icons-rounded-box">
                                <img src="assets/images/community-nata.jpg"
                                                          alt="TT-BEA-Community Partners"
                                                          class="img-fluid teams-img-border">
                            </div>
                        </div>                        
                    </div>
                </div>
				<div class="col-lg-1 col-md-1 col-sm-2"></div>
				<div class="col-lg-1 col-md-1 col-sm-2">
                    <div class="about-teams-inner" data-aos="fade-up">
                        <div class="about-team">
                            <div class="icons-rounded-box">
                                <img src="assets/images/community-nats.jpg"
                                                          alt="TT-BEA-Community Partners"
                                                          class="img-fluid teams-img-border">
                                </div>
                        </div>                        
                    </div>
                </div>
				<div class="col-lg-1 col-md-1 col-sm-2"></div>
				<div class="col-lg-1 col-md-1 col-sm-2">
                    <div class="about-teams-inner" data-aos="fade-up">
                        <div class="about-team">
                            <div class="icons-rounded-box">
                                <img src="assets/images/community-tata.jpg"
                                                          alt="TT-BEA-Community Partners"
                                                          class="img-fluid teams-img-border">
                                </div>
                        </div>                        
                    </div>
                </div>
				<div class="col-lg-1 col-md-1 col-sm-2"></div>
				<div class="col-lg-1 col-md-1 col-sm-2">
                    <div class="about-teams-inner" data-aos="fade-up">
                        <div class="about-team">
                            <div class="icons-rounded-box">
                                <img src="assets/images/community-tdf.jpg"
                                                          alt="TT-BEA-Community Partners"
                                                          class="img-fluid teams-img-border">
                                </div>
                        </div>                        
                    </div>
                </div>
				<div class="col-lg-1 col-md-1 col-sm-2"></div>
            </div>
			<div class="row" style="margin-top:-36px">
                <div class="col-lg-12">
                    <a href=partners.php><p class="text-right text-white" data-aos="fade-up" style="padding-right:54px;">More Partners ...</p></a>
                </div>
            </div>
        </div>
		<p></p>
	<!-- PHOTO GALLERY >
		<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="text-center text-white" data-aos="fade-up" style="padding-top:90px">GALLERY</h4>
                    <p class="text-center" data-aos="fade-up-left">A quick peek at the website launch of BEA'23 at Consul General's office - SFO <br>and the Board room discussion at NATS Conference - New Jersey</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="about-teams-inner" data-aos="fade-up">
                        <div class="about-team">
                            <div class="icons-rounded-box">
                                <figure class="mb-0"><img src="assets/images/gallery/launch1.png"
                                                          alt="TT-business-excelence-tv9-bata"
                                                          class="img-fluid teams-img-border">
                                </figure>
                            </div>
						</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="about-teams-inner" data-aos="fade-up">
                        <div class="about-team">
                            <div class="icons-rounded-box">
                                <figure class="mb-0"><img src="assets/images/gallery/launch2.png"
                                                          alt="TT-business-excelence-tv9-bata"
                                                          class="img-fluid teams-img-border">
                                </figure>
                            </div>
						</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="about-teams-inner" data-aos="fade-up">
                        <div class="about-team">
                            <div class="icons-rounded-box">
                                <figure class="mb-0"><img src="assets/images/gallery/nats2.jpg"
                                                          alt="TT-business-excelence-tv9-bata"
                                                          class="img-fluid teams-img-border">
                                </figure>
                            </div>
						</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="about-teams-inner" data-aos="fade-up">
                        <div class="about-team">
                            <div class="icons-rounded-box">
                                <figure class="mb-0"><img src="assets/images/gallery/nats1.jpg"
                                                          alt="TT-business-excelence-tv9-bata"
                                                          class="img-fluid teams-img-border">
                                </figure>
                            </div>
						</div>
                    </div>
                </div>
            </div>
        </div-->
	<!-- TELUGU TIMES -->    
		<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="text-center text-white" data-aos="fade-up" style="padding-top:90px">Telugu Times Media Inc., USA</h4>
                    <p class="text-center" data-aos="fade-up-left  text-justify">Telugu Timess, The First Global Telugu
                        News Publication, published in San Francisco for the past 20 years, serves the NRI Telugu
                        community as a community tool and the Advertising world as a media vehicle, among many other
                        purposes.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="about-teams-inner" data-aos="fade-up">
                        <div class="about-team">
                            <div class="icons-rounded-box">
                                <figure class="mb-0"><img src="assets/images/about-tt-epaper.png"
                                                          alt="TT-business-excelence-tv9-bata"
                                                          class="img-fluid teams-img-border">
                                </figure>
                            </div>
                        </div> <div class="social-icons teams-social-icons">
                            <ul class="list-unstyled">
                                <li><a href="https://telugutimes.net/epaper2/2023-march-16-31-20th-anniv-special" target="_blank"
                                       class="text-decoration-none">
                                        <i class="fa-sharp fa-solid fa-newspaper"></i></a></li>
                            </ul>
                        </div>
                        <h4 class="about-team-members-h4">Print Edition / ePaper <br> <br> (2003)</h4>
                      
						
                        <p class="teams-section-p"> Telugu Times was launched in 2003 by Former Vice President of India, Sri M Venkaiah Naidu, the
                            then President of BJP National Party </p>
                       
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="about-teams-inner" data-aos="fade-up">
                        <div class="about-team">
                            <div class="icons-rounded-box">
                                <figure class="mb-0"><img src="assets/images/about-tt-website.png"
                                                          alt="TT-business-excelence-tv9-bata"
                                                          class="img-fluid teams-img-border">
                                </figure>
                            </div>
                        </div><div class="social-icons teams-social-icons">
                            <ul class="list-unstyled">
                                <li><a href="https://telugutimes.net/" target="_blank" class="text-decoration-none"><i
                                                class="fa-solid fa-globe"></i></a></li>
                            </ul>
                        </div>
                        <h4 class="about-team-members-h4">Web Portal  <br>  <br>  (2013) </h4> 
						
                        <p class="teams-section-p"> Portal was redone and launched in 2013 by Sri PonnalaLakshmayya, the
                            then Minister for IT & C, Govt of Andhrapradesh and Ms.Sage Moor , Vice Consul , American
                            Consulate, Hyderabad </p>

                       

                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="about-teams-inner" data-aos="fade-up">
                        <div class="about-team">
                            <div class="icons-rounded-box">
                                <figure class="mb-0"><img src="assets/images/about-tt-app.png"
                                                          alt="TT-business-excelence-tv9-bata"
                                                          class="img-fluid teams-img-border">
                                </figure>
                            </div>
                        </div><div class="social-icons teams-social-icons">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="https://play.google.com/store/apps/details?id=net.telugutimes.news&hl=en_US"
                                       target="_blank" class="text-decoration-none"><i class="fa-brands fa-android"></i></a>
                                </li>
                                <li><a href="https://apps.apple.com/app/telugu-times-news-usa-ap-ts/id1671038367" target="_blank" class="text-decoration-none"><i
                                                class="fa-brands fa-apple"></i></a></li>
                            </ul>
                        </div>
                        <h4 class="about-team-members-h4">Mobile App  <br>  <br> (2021)</h4> 
						
                        <p class="teams-section-p"> Mobile App was launched in 2021 by Sri SajjalaaRamakrishna Reddy,
                            Advisor – Public Policy, Gov tof AP </p> 
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="about-teams-inner" data-aos="fade-up">
                        <div class="about-team">
                            <div class="icons-rounded-box">
                                <figure class="mb-0"><img src="assets/images/about-tt-yt.png"
                                                          alt="TT-business-excelence-tv9-bata"
                                                          class="img-fluid teams-img-border">
                                </figure>
                            </div>
                        </div><div class="social-icons teams-social-icons">
                            <ul class="list-unstyled">
                                <li><a href="https://www.youtube.com/@telugutimesyoutube" target="_blank"
                                       class="text-decoration-none"><i class="fa-brands fa-youtube"></i></a></li>
                            </ul>
                        </div>
                        <h4 class="about-team-members-h4">YouTube Channel <br>  <br>  (2023)</h4> 
						
                        <p class="teams-section-p"> YouTube Channel was launched in 2022 by Padmasri P Suseela , popular
                            Playback singer </p>
                        
                    </div>
                </div>

				<div class="col-lg-6 col-md-6 col-sm-6">
					<a href="./ttusa.php"><p class="text-left text-white" data-aos="fade-left" style="padding-left:27px;">Telugu Community in USA</p></a>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<a href="./ttbusa.php"><p class="text-right text-white" data-aos="fade-right" style="padding-right:27px;">Telugu Business Community in USA</p></a>
				</div>
            </div>
        </div>
    </section>
	<!-- AWARD CATEGORIES SECTION -->
    <section id="awardcategories" class="blogs-section-starts form-section-starts overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 mb-md-0 mb-4">
                    <div class="about-us-section-page" data-aos="fade-up">
						<div class="about-banner-text" style="margin-bottom:-9px" data-aos="fade-up">
                            <h3 class="text-center text-white" data-aos="flip-left">Award Categories</h3>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-12">
                                <h5 data-aos="zoom-out-left" style="color:#36ccf9">ELIGIBILITY</h5>
								<p></p>								
								<p>Any individual of Telugu origin or group with a running business entity in the USA, being registered in one of the 50 states.</p>
								<p></p>
								<p>Entry by Nominations ONLY !!!</p>
								<p></p>
								<div class="about-section-img" style="margin-top:27px; padding-left:36px">
                                    <figure class="mb-0"><img class="img-fluid banner-img-width" src="assets/images/categories-bl.jpg"
                                     style="width: 360px;" alt="TT-business-excelence-tv9-bata"/></figure>
                                </div>
								<div class="contact-section-btn text-center mr-4" style="padding-top:36px">
                                    <a href=# target="_blank" class="btn btn-primary hover-effect" style="font-weight:bold" 
										onclick="window.open('bea23nominations.php', '', 'toolbar=no,scrollbars=yes,resizable=yes,location=no,status=no');">
									NOMINATE NOW</a>
                                </div>
                            </div>
							<div class="col-lg-2 col-md-2 col-sm-12"></div>
							<div class="col-lg-5 col-md-5 col-sm-12">
								<h5 style="color:#36ccf9" data-aos="zoom-out-right">INDUSTRIES</h5>
								<p></p>
								<p>All eligible Entrepreneurs from the following business areas may send in their Nominations</p>
								<p></p>
								<p><span style="font-weight:bold; font-style:italic;">Business Category</span></p>
								<p></p>
								<ul style="color:white">
									<li>IT Solutions/Services</li><li>IT Staffing</li><li>Technology Startup</li>
									<li>Restaurant/Food & Hospitality</li><li>Healthcare</li><li>Manufacturing/ Pharma</li>
									<li>Banking/ Financial/ Inurance/ Tax</li><li>Real Estate/ Construction</li><li>Cinema/ Entertainment</li>
								</ul>
								<p></p>
								<p><span style="font-weight:bold; font-style:italic;">Business Size</span></p>
								<p></p>
								<p>All businesses are broadly divided on the basis of their turnover into:</p>
								<ul style="color:white"><li>Upto $25Mn</li><li>$25Mn & above</li></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<!-- SELECTION SECTION -->
    <section id="ttbeaselection" class="blogs-section-starts form-section-starts overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 mb-md-0 mb-4">
                    <div class="about-us-section-page" data-aos="fade-up">
                        <div class="about-banner-text" style="margin-bottom:-9px" data-aos="fade-up">
                            <h3 class="text-center text-white" data-aos="fade-up">Selection Process</h3>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 text-justify" style="padding-top:27px">
                                <p>1. Entrepreneurs should send their Nominations ONLINE by submitting the Enrolment form 
									<a href=# target="_blank" onclick="window.open('bea23nominations.php', '', 'toolbar=no,scrollbars=yes,resizable=yes,location=no,status=no');">
									here</a> or with help of our assistant at the bottom right. Nominations by self or by others are accepted.</p>
								<p></p>
								<p>2. Nominations received shall be verified and if necessary additional information may be asked and Nominees are obliged 
								to furnish the required details such as IT Returns, Proof of Awards and Certificates received etc.</p>
								<p></p>
								<p>3. Nominations not found suitable or with insufficient information shall not be considered for review and further process. 
								<span style="font-weight:bold; color:#36ccf9">LAST DATE for receiving nominations is June 10, 2023</span></p>
								<p></p>
								<p>4. After verification, the nominations are submitted to the <a href="advisory-panel.php">BEA'23 Advisory Panel / Selection committee</a> for a detailed review</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="about-section-img" style="margin-top:9px; padding-left:36px">
                                    <figure class="mb-0"><img src="assets/images/selection-team.png"
                                                              alt="TT-business-excelence-tv9-bata" class="">
                                    </figure>
                                </div>
                            </div>
							<div class="col-lg-12 col-md-12 col-sm-12 text-justify">
								<p>5. Selection Committee members would then independently or jointly review the Nominations and finalize the Names for honoring with an Award (Timeline: June 1-15, 2023)</p>
								<p>6. Selection committee may either increase the Awards if participating companies are good to get honored 
								OR remove the award if no deserving company is found in the Nominations</p>
								<p></p>
								<p>7. Selection committee may also consider certain other parameters like Visibility on Social standing, Community service etc. 
								for companies depending upon the situation and number of Nominations received under a category.</p>
								<p></p>
								<p>8. Category and Size of the company also be considered while comparing the Nominees in any category and if necessary 
								additional Award also be recommended by the Selection team.</p>
								<p></p>
								<p>9. Decisions taken by the Selection team are FINAL and not negotiable or debatable.</p>
								<p></p>
								<p>10. No Nominating company or Individual will participate in any stage of the selection.</p>
								<p></p>
								<p>11. Only public information such as broad turn over, market share etc. would be announced and all other details 
								provided via the Nomination process would strictly be maintained as confidential</p>
								<p></p>
								<p>12. The final list of scrutinized Nominees are then intimated about being considered for the award and are requested to attend the Award Ceremony</p>
								<p></p>
								<p>13. Selected Companies may furnish a 30sec or 60 sec PROMO (made by them at their cost) be given for display/ telecast during the Awards ceremony</p>
								<p></p>
								<p>14. Companies participating in the Awards ceremony shall do so on their cost only.</p>
								<p></p>
								<p>15. Either Telugu Times Media Inc, its event Partners OR the Selection committee members are not liable for any kind of disputes</p>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include('footer.php'); ?>