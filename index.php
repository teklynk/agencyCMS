<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		include 'db/dbsetup.php'; //contains DB connection string and global variables

		$sqlSetup = mysql_query("SELECT title, author, keywords, description, headercode, googleanalytics, portfolioheading, portfoliointro, portfoliooutro, servicesheading, servicesintro, servicesoutro, teamheading, teamintro, teamoutro FROM setup");
		$rowSetup  = mysql_fetch_array($sqlSetup);
	?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $rowSetup["description"];?>">
    <meta name="keywords" content="<?php echo $rowSetup["keywords"];?>">
    <meta name="author" content="<?php echo $rowSetup["author"];?>">

    <title><?php echo $rowSetup["title"];?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
	<?php
	if ($customCss_url !="") {
		echo "<link href='".$customCss_url."' rel='stylesheet' type='text/css'>";
	}
	?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php
	echo $rowSetup["headercode"]."\n"; //custom js or embeded css can show here

	if ($rowSetup["googleanalytics"]) {
		$googleID = $rowSetup["googleanalytics"];
	?>
		<script type="text/javascript">
			
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', '<?php echo $googleID ?>']);
			_gaq.push(['_trackPageview']);
			
			(function() {
			  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
			
		</script>
	<?php 
	} 
	?>
</head>

<body id="page-top" class="index">
	<?php 
		$sqlLanding = mysql_query("SELECT heading, intro, skills, image FROM landing");
		$rowLanding = mysql_fetch_array($sqlLanding);
		
		$sqlAbout = mysql_query("SELECT heading, intro, content FROM aboutus");
		$rowAbout = mysql_fetch_array($sqlAbout);
		
		$sqlFooter = mysql_query("SELECT heading, content FROM footer");
		$rowFooter = mysql_fetch_array($sqlFooter);
		
		$sqlContact = mysql_query("SELECT heading, intro, email, sendtoemail, address, city, state, zipcode, phone FROM contactus");
		$rowContact = mysql_fetch_array($sqlContact);
		
		$sqlSocial = mysql_query("SELECT heading, facebook, twitter, linkedin, google, github FROM socialmedia");
		$rowSocial = mysql_fetch_array($sqlSocial);
	?>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"><?php echo $rowLanding["heading"];?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services"><?php echo $rowSetup["servicesheading"];?></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio"><?php echo $rowSetup["portfolioheading"];?></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about"><?php echo $rowAbout["heading"];?></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#team"><?php echo $rowSetup["teamheading"];?></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact"><?php echo $rowContact["heading"];?></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in"><?php echo $rowLanding["intro"];?></div>
                <div class="intro-heading"><?php echo $rowLanding["skills"];?></div>
                <a href="#services" class="page-scroll btn btn-xl">Tell Me More</a>
            </div>
        </div>
    </header>

    
<!-- TODO: add functionality to allow this section to be turned on/off or to only show if content is added-->
    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><?php echo $rowSetup["servicesheading"];?></h2>
                    <h3 class="section-subheading text-muted"><?php echo $rowSetup["servicesintro"];?></h3>
                </div>
            </div>
            <div class="row text-center">
			      <?php
							$sqlServices = mysql_query("SELECT id, title, thumbnail, content, active, datetime FROM services WHERE active=1 ORDER BY datetime DESC");
							while ($rowServices  = mysql_fetch_array($sqlServices)) {
						?>
			        <div class="col-md-4" style="margin-bottom: 30px;">
			            <span class="fa-stack fa-4x">
			            <?php 
										if ($rowServices["thumbnail"] != "") {
											echo "<img src='uploads/".$rowServices["thumbnail"]."' class='img-responsive' title='".$rowServices["title"]."' alt='".$rowServices["title"]."'>";
										} else {
											echo "<img src='img/portfolio/startup-framework.png' class='img-responsive' title='".$rowServices["title"]."' alt='".$rowServices["title"]."'>";
										}
									?>
			            </span>
			            <?php 
										if ($rowServices["title"] != "") {
											echo "<h4 class='service-heading'>".$rowServices["title"]."</h4>";
										}
									?>
			            <div class="text-muted"><?php echo $rowServices["content"];?></div>
			        </div>
						<?php 
							}
						?>
            </div>
             <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted"><?php echo $rowSetup["servicesoutro"];?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><?php echo $rowSetup["portfolioheading"];?></h2>
                    <h3 class="section-subheading text-muted"><?php echo $rowSetup["portfoliointro"];?></h3>
                </div>
            </div>
            <div class="row">
      <?php
				$sqlPages = mysql_query("SELECT id, title, thumbnail, content, active, datetime FROM pages WHERE active=1 ORDER BY datetime DESC");
				while ($rowPages  = mysql_fetch_array($sqlPages)) {
			?>
          <div class="col-md-4 col-sm-6 portfolio-item">
              <a href="#portfolioModal<?php echo $rowPages["id"];?>" class="portfolio-link" data-toggle="modal">
                  <div class="portfolio-hover">
                      <div class="portfolio-hover-content">
                          <i class="fa fa-plus fa-3x"></i>
                      </div>
                  </div>
		          <?php 
								if ($rowPages["thumbnail"] != "") {
									echo "<img src='uploads/".$rowPages["thumbnail"]."' class='img-responsive' title='".$rowPages["title"]."' alt='".$rowPages["title"]."'>";
								} else {
									echo "<img src='img/portfolio/startup-framework.png' class='img-responsive' title='".$rowPages["title"]."' alt='".$rowPages["title"]."'>";
								}
							?>
              </a>
              <div class="portfolio-caption">
              		<?php 
										if ($rowPages["title"] != "") {
											echo "<h4>".$rowPages["title"]."</h4>";
										}
									?>
                  <p class="text-muted"></p>
              </div>
          </div>
			<?php 
				}
			?>
            </div>
             <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted"><?php echo $rowSetup["portfoliooutro"];?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><?php echo $rowAbout["heading"];?></h2>
                    <h3 class="section-subheading text-muted"><?php echo $rowAbout["intro"];?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-lg-offset-0 text-center">  
                	<?php echo $rowAbout["content"];?>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><?php echo $rowSetup["teamheading"];?></h2>
                    <h3 class="section-subheading text-muted"><?php echo $rowSetup["teamintro"];?></h3>
                </div>
            </div>
            <div class="row">
      <?php
				$sqlTeam = mysql_query("SELECT id, name, title, thumbnail, content, active, datetime FROM team WHERE active=1 ORDER BY datetime DESC");
				while ($rowTeam  = mysql_fetch_array($sqlTeam)) {
			?>
          <div class="col-sm-4">
              <div class="team-member">
		              <?php 
										if ($rowTeam["thumbnail"] != "") {
											echo "<img src='uploads/".$rowTeam["thumbnail"]."' class='img-responsive img-circle' title='".$rowTeam["name"]."' alt='".$rowTeam["name"]."'>";
										} else {
											echo "<img src='img/portfolio/startup-framework.png' class='img-responsive img-circle' title='".$rowTeam["name"]."' alt='".$rowTeam["name"]."'>";
										}
										
										if ($rowTeam["name"] != "") {
											echo "<h4>".$rowTeam["name"]."</h4>";
										}
									?>
                  <p class="text-muted"><?php echo $rowTeam["title"];?></p>
                  <ul class="list-inline social-buttons">
                      <li><a href="#"><i class="fa fa-twitter"></i></a>
                      </li>
                      <li><a href="#"><i class="fa fa-facebook"></i></a>
                      </li>
                      <li><a href="#"><i class="fa fa-linkedin"></i></a>
                      </li>
                  </ul>
              </div>
          </div>
      <?php 
				}
			?>          
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted"><?php echo $rowSetup["teamoutro"];?></p>
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><?php echo $rowContact["heading"];?></h2>
                    <h3 class="section-subheading text-muted"><?php echo $rowContact["intro"];?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" method="post" action="mail/contact_me.php">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" name="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" id="email" name="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" name="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" id="message" name="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <input type="hidden" name="sendToEmail" value="<?php echo $rowContact["sendtoemail"];?>"/>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
            <?php
							if ($_GET["msgsent"]=="thankyou") {
								echo "<div id='success'><div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true' onclick=\"window.location.href='index.php#contact'\">×</button><strong>Your message has been sent. </strong></div></div>";
							} else if ($_GET["msgsent"]=="error") {
								echo "<div id='success'><div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true' onclick=\"window.location.href='index.php#contact'\">×</button><strong>An error occured while sending your message. </strong></div></div>";
							}
						?>
                                <button type="submit" class="btn btn-xl">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3>Location</h3>
                    <p>
                    <?php
                    	if (!empty($rowContact["address"])) {
                    		echo $rowContact["address"]."<br>";
                    	}
                      if (!empty($rowContact["city"])) {
                      	echo $rowContact["city"].", ";
                      }
                      if (!empty($rowContact["state"])) {
                      	echo $rowContact["state"]."<br>";
                      }
                      if (!empty($rowContact["phone"])) {
                      	echo $rowContact["phone"]."<br>";
                      }
                      if (!empty($rowContact["email"])) {
                      	echo $rowContact["email"];
                      }
                    ?>
                    </p>
                </div>
                <div class="col-md-4">
                <h3><?php echo $rowSocial["heading"];?></h3>
                    <ul class="list-inline social-buttons">
								<?php
									if (!empty($rowSocial["facebook"])){
										echo "<li><a href=".$rowSocial["facebook"]." class='btn-social btn-outline'><i class='fa fa-fw fa-facebook'></i></a></li>";
									}

									if (!empty($rowSocial["google"])){
										echo "<li><a href=".$rowSocial["google"]." class='btn-social btn-outline'><i class='fa fa-fw fa-google-plus'></i></a></li>";
									}

									if (!empty($rowSocial["github"])){
										echo "<li><a href=".$rowSocial["github"]." class='btn-social btn-outline'><i class='fa fa-fw fa-github'></i></a></li>";
									}

									if (!empty($rowSocial["twitter"])){
										echo "<li><a href=".$rowSocial["twitter"]." class='btn-social btn-outline'><i class='fa fa-fw fa-twitter'></i></a></li>";
									}

									if (!empty($rowSocial["linkedin"])){
										echo "<li><a href=".$rowSocial["linkedin"]." class='btn-social btn-outline'><i class='fa fa-fw fa-linkedin'></i></a></li>";
									}
								?>
                    </ul>
                </div>
                <div class="col-md-4">
                   <h3><?php echo $rowFooter["heading"];?></h3>
                   <p><?php echo $rowFooter["content"];?></p>
                </div>
               <span class="copyright">Copyright &copy; <?php echo $_SERVER['HTTP_HOST']."&nbsp;".date("Y");?></span>
            </div>
        </div>
    </footer>
<?php
	$sqlPages = mysql_query("SELECT id, title, thumbnail, content, active FROM pages WHERE active=1");
	while ($rowPages  = mysql_fetch_array($sqlPages)) {
?>
    <!-- Portfolio Modals -->
    <!-- Use the modals below to showcase details about your portfolio projects! -->
    <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $rowPages["id"];?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2><?php echo $rowPages["title"];?></h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <?php 
	                            if ($rowPages["thumbnail"] != "") {
	                                echo "<img src='uploads/".$rowPages["thumbnail"]."' class='img-responsive img-centered' alt=''>";
	                            } else {
	                                echo "<img src='img/portfolio/roundicons-free.png' class='img-responsive' alt=''>";
	                            }
                            ?>
                            <p><?php echo $rowPages["content"];?></p>
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
	} 
?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>

</body>
</html>
<?php
	//close all db connections
	mysql_close($db_conn);
	die();
?>
