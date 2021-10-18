<?php
require_once('../header.php');
$pagePath =  $base_path . "user/contact.php";

if (!isset($_SESSION['fyp_userData'])) {
  header("location:" . $base_path . "login.php");
}

?>


<body style="background-color: grey">
    <?php include("nav.php"); ?>

    <div class="page-content p-5" id="content">
        <!-- <div class="card" style="text-align: center;">
		<div class="card-header" style="text-align: center; font-weight: bold;">Contact Us</div>
		<div class="card-body">
			<form action="#" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				<div class="form-group">
					
				</div>
			</form>		
		</div>
	</div> -->


        <link href="../css/icofont/icofont.min.css" rel="stylesheet">
        <section id="contact" class="contact">
            <div class="container bg-light">

                <div class="row justify-content-center" data-aos="fade-up" style="color: white">

                    <div class="col-lg-10">

                        <div class="info-wrap">
                            <div class="row">
                                <div class="col-lg-4 info text-info">
                                    <b>
                                        <i class="icofont-google-map"></i>
                                        <h4>Location:</h4>
                                        <p>University of Dodoma<br>Informatics, (CIVE)</p>
                                    </b>
                                </div>

                                <div class="col-lg-4 info mt-4 mt-lg-0 text-info">
                                    <i class="icofont-envelope"></i>
                                    <h4>Email:</h4>
                                    <p>kisvanGroup@gmail.com<br></p>
                                </div>

                                <div class="col-lg-4 info mt-4 mt-lg-0 text-info">
                                    <i class="icofont-phone"></i>
                                    <h4>Call:</h4>
                                    <p>+255 652144794<br></p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <hr>
                <div class="row mt-5 justify-content-center" data-aos="fade-up">
                    <div class="col-lg-10">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" data-rule="minlen:4"
                                        data-msg="Please enter at least 4 chars" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" data-rule="email"
                                        data-msg="Please enter a valid email" />
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" data-rule="minlen:4"
                                    data-msg="Please enter at least 8 chars of subject" />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required"
                                    data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validate"></div>
                            </div>
                            <!-- <div class="mb-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div> -->
                            <div class="text-center mb-3">
                                <button type="submit" class="btn btn-info">Send Message</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </div>
</body>
<?php require_once('../footer.php'); ?>