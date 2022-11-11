<?php 
include("include/connaction.php");
include("header.php");

?>



   

<?php
$result_contact=$connectiondb->query("SELECT *  FROM contact_footer");
?>






    <!-- Page Header Start -->
    <div class="container-fluid page-header2 py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Contact</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid bg-light overflow-hidden px-lg-0" style="margin: 6rem 0;">
        <div class="container contact px-lg-0">
            <div class="row g-0 mx-lg-0">
            <?php 
	if(isset($_POST['submit_form']))
			{ 
       $name=$_POST['name']; 
       $email=$_POST['email']; 
       $subject=$_POST['subject']; 
       $msg=$_POST['message']; 
       $FromName="STAR BUILDICON";
       
$FromEmail="suryaubsoftev@gmail.com";
$ReplyTo=$email;
$toemail="suryavnshishivam.000@gmail.com";
$subject="Star Buildcon Contact form "; 
$message='Name:-'.$name.'<br><br>Email :-' .$email.'<br><br> Subject:-'.$subject.'<br><br> Message:-'.$msg;
$headers .= "Content-type: text/html; charset=iso-8859-1n";
$headers .= "From: ".$FromName." <".$FromEmail.">n";
$headers .= "Reply-To: ".$ReplyTo."n";
$headers .= "X-Sender: <".$FromEmail.">n";
$headers .= "X-Mailer: PHPn";
$headers .= "X-Priority: 1n";
$headers .= "Return-Path: <".$FromEmail.">n";

	if(mail($toemail, $subject, $message, $headers,'-f'.$FromEmail) ){

        $hide=2;
         echo '<div class="success"><center><span style="font-size:100px;">&#9989;</span></center> <br> Thank you <strong>'.$name.',</strong> Your message has been sent. We will reply soon as possible. </div> '; 
	      
	} else {
		echo "The server failed to send the message. Please try again later or Make sure , you are using live server for email.";
} 
			}
		?>
		<?php if(!isset($hide)) { ?> 
                <div class="col-lg-6 contact-text py-5 wow fadeIn" data-wow-delay="0.5s">
                <?php
                    while ($ccc = mysqli_fetch_assoc($result_contact)) {
                    ?> 
                    <div class="p-lg-5 ps-lg-0">
                        <div class="section-title text-start">
                            <h1 class="display-5 mb-4"><?php echo $ccc['title']; ?></h1>
                        </div>
                        <p class="mb-4"><?php echo $ccc['heading']; ?></p>
                        <?php } ?>
                        <form action="" method="POST">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject">
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="message" placeholder="Leave a message here" id="message" style="height: 100px"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" name="submit_form" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <iframe class="position-absolute w-100 h-100"src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14966.98973005958!2d72.969704!3d20.3107188!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbcd4da09d4191725!2z4KS44KWN4KSf4KS-4KSwIOCkrOCkv-CksuCljeCkoeCksOCljeCkuCAoIOCkuOCljeCkn-CkvuCksCDgpKzgpL_gpLLgpY3gpKHgpJXgpYngpKggKQ!5e0!3m2!1shi!2sin!4v1655880483591!5m2!1shi!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
    <?php }?> 
    <?php include('footer.php');?>
   