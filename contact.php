<!-- PHP MAILER START HERE -->
<?php
session_start();
ob_start();
require "phpmailer/PHPMailerAutoload.php";
// echo "hello" .$_POST['schoolName'];
// echo die;

if (isset($_POST['email'])) {
    function died($error)
    {
        // your error code can go here
        $_SESSION['error_message'] = $error;
    }

    // validation expected data exists
    if (
        !isset($_POST['email']) ||
        !isset($_POST['full_name'])
    ) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }


    $fullName = $_POST['full_name']; // required
    $contact = $_POST['mobile_no']; // required
    $emailid = $_POST['email']; // required
    $subject = $_POST['subject']; // required
    $txtmessage = $_POST['message']; // not required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
    if (!preg_match($email_exp, $emailid)) {
        $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
    }
    $string_exp = "/^[A-Za-z .'-]+$/";
    if (!preg_match($string_exp, $fullName)) {
        $error_message .= 'The Name you entered does not appear to be valid.<br />';
    }

    if (strlen($error_message) > 0) {
        died($error_message);
    }

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message = '';

    $email_message = '
    <html>
    <head>
        <meta content="width=device-width" name="viewport">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <link href="||SITE_URL||assets/images/social/" rel="stylesheet" type="text/css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300&display=swap" rel="stylesheet">
    </head>
    <style type="text/css">
        body {
            font-family: "Poppins", sans-serif; color: #444444;
        }
    </style>
    <body style="background: #f1f1f1; margin: 0px auto; padding: 0px; font-family: \'Poppins\', sans-serif;">
        <div style="background-color: #fff; margin: 0px auto; max-width: 800px; height: auto;">
            <div style="padding: 40px 40px 3px;">
                <div style="width: 100%; display: block; margin-bottom: 10px;">
                    <div style="font-size: 16px; color: #000;">
                        <p>Dear Team WhitePanda,</p>
                    </div>
                </div>
                <div style="width: 100%; margin-bottom: 30px;">
                    <div style="font-size: 16px; color: #000;">
                        <p style="margin-bottom: 0px;">You have received an enquiry from ' . clean_string($fullName) . '</p>
                        <p style="margin-top: 0px; margin-bottom: 5px;">The details are as mentioned below:</p>
                    </div>
                </div>
                <div style="width: 100%; margin-bottom: 30px;">
                    <div style="font-size: 16px; color: #000;">
                        <p style="margin-bottom: 0px; margin-top: 5px;"><b>Name –</b> ' . clean_string($fullName) . '</p>
                        <p style="margin-bottom: 0px; margin-top: 5px;"><b>Mobile Number – </b> ' . clean_string($contact) . '</p>
                        <p style="margin-bottom: 0px; margin-top: 5px;"><b>Email – </b> ' . clean_string($emailid) . '</p>
                        <p style="margin-bottom: 0px; margin-top: 5px;"><b>Subject – </b>' . clean_string($subject) . '</p>
                    </div>
                </div>
                <div style="width: 100%; margin-bottom: 30px;">
                    <div style="font-size: 16px; color: #000;">
                        ' . clean_string($txtmessage) . '
                    </div>
                </div>
            </div>
            <div style="width: 100%; background: #6965c6; background-repeat: no-repeat; height: 10px;"></div>
        </div>
    </body>
    </html>
    ';

    $mail = new PHPMailer;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'aakash.s.aes@gmail.com';   /* enter email address */
    $mail->Password = 'Aes@2024';          /* enter password */
    $mail->setFrom('aakash.s.aes@gmail.com');
    $mail->addAddress('akashraj608@gmail.com');
    $mail->isHTML(true);
    $mail->Subject = 'Enquiry from ';
    $mail->Body = $email_message;

    if (!$mail->send()) {
        // echo $result="not send";
        $message = 'Your message could not be delivered.!';

        $_SESSION['message'] = $message;
        $_SESSION['status'] = 'error';
    } else {
        // echo $result="send";
        $message = 'Your enquiry has been sent successfully!';
        $_SESSION['message'] = $message;
        $_SESSION['status'] = 'success';
    }
}
?>
<!-- PHP MAILER END HERE -->



<!-- Header started here -->
<?php include('include/header.php'); ?>
<?php include('include/navbar.php'); ?>
<!-- Header ended here -->

<!-- Start Toptech Breadcumb Area -->
<div class="breadcumb-area contact-breadcumb-area">
    <div class="breadcumb-overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcumb-content">
                        <h4>Contact Us</h4>
                        <p><b>Ready to take the next step? </b> Contact us today to discuss your specific needs and explore how our solutions can benefit your business. Our team is committed to providing exceptional customer service and finding the perfect fit for your goals. <br><br> <b>Reach out to us through the form below, or give us a call.</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Toptech Breadcumb Area -->

<!-- Start Toptech Contact Style Three-->
<div class="contact-area style-three inner">
    <div class="container">
        <div class="row add-white-bg align-items-center">
            <div class="col-lg-8 col-md-12">
                <div class="single-contact-box">
                    <div class="contact-contetn">
                        <h4>Write to Us Anytime</h4>
                    </div>
                    <form action="" method="POST" id="contact-us-form">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="single-input-box">
                                    <input type="text" name="full_name" placeholder="Your Name" required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-input-box">
                                    <input type="text" name="email" placeholder="Enter E-Mail" required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-input-box">
                                    <input type="text" oninput="this.value=this.value.replace(/[^0-9 ]/g,'');" maxlength="10" pattern="[0-9]{10}" name="mobile_no" placeholder="Mobile No" aria-label="Mobile Number" required />
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="single-input-box">
                                    <input type="text" name="subject" required placeholder="Subject" required />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="single-input-box">
                                    <textarea name="message" required placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="message-sent-button">
                                    <button type="submit" id="contact-submit">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="single-contact-info-box">
                    <div class="info-content">
                        <h4>Don’t Forget to Contact Us</h4>
                    </div>
                    <div class="contact-info-box">
                        <div class="contact-info-icon">
                            <i class="bi bi-telephone-fill"></i>
                        </div>
                        <div class="contact-info-content">
                            <p>Call Us</p>
                            <h4>+61 466 792 994</h4>
                        </div>
                    </div>
                    <div class="contact-info-box">
                        <div class="contact-info-icon">
                            <i class="bi bi-envelope-open-fill"></i>
                        </div>
                        <div class="contact-info-content">
                            <p>Send E-Mail</p>
                            <h4>info@whitepanda.com.au</h4>
                        </div>
                    </div>
                    <div class="contact-info-box">
                        <div class="contact-info-icon">
                            <i class="bi bi-map"></i>
                        </div>
                        <div class="contact-info-content">
                            <p>Location</p>
                            <h4>4 Bindo St <br>
                                THE PONDS <br> NSW 2769, <br> AUSTRALIA</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Toptech Contact Area Style Three-->

<!-- Start Toptech Google map Area Style Two-->
<div class="google-map">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3782.1920610867196!2d73.76644327579766!3d18.56537796780295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bf94c44576f3%3A0x797deefe4f83d755!2sDigitrack%20Sports%20India%20Pvt.%20Ltd.!5e0!3m2!1sen!2sin!4v1724131130236!5m2!1sen!2sin"></iframe> -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3578.36418090628!2d150.89419531154002!3d-33.707333473177435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b129edd58b9002d%3A0x46d280e7d32738f6!2s4%20Bindo%20St%2C%20The%20Ponds%20NSW%202769%2C%20Australia!5e1!3m2!1sen!2sin!4v1724327140377!5m2!1sen!2sin"></iframe>
            </div>
        </div>
    </div>
</div>
<!-- End Toptech Google map Area Style Two-->




<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 4000);
</script>

<!-- mail sent successfull start -->
<?php if (isset($_SESSION['message'])) { ?>
    <div class="msg_div">
        <?php if ($_SESSION['status'] == 'success' && !empty($_SESSION['status'])) { ?>
            <div class="err-msg2" style="position: absolute;right: 5px;bottom: 1px;z-index: 1000000; display:block;">
                '<div class="alert alert-success alert-dismissable" style="position: fixed;bottom: 10px;right: 100px;z-index:9999; font-size: 14px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" style="margin-left: 5px;">×</a>
                    <strong><?php echo $_SESSION['status']; ?> !</strong> <?php echo $_SESSION['message'];
                                                                            unset($_SESSION['message']);
                                                                            unset($_SESSION['status']);
                                                                            ?>
                </div>
            </div>
        <?php } ?>
        <?php if ($_SESSION['status'] == 'error' && !empty($_SESSION['status'])) { ?>
            <div class="err-msg2" style="position: absolute;right: 5px;bottom: 1px;z-index: 1000000; display:block;">
                '<div class="alert alert-success alert-dismissable" style="position: fixed;bottom: 10px;right: 100px;z-index:9999; font-size: 14px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" style="margin-left: 5px;">×</a>
                    <strong><?php echo $_SESSION['status']; ?> !</strong> <?php echo $_SESSION['message'];
                                                                            unset($_SESSION['message']);
                                                                            unset($_SESSION['status']);
                                                                            ?>

                </div>
            </div>


        <?php } ?>
    </div>
<?php } ?>
<!-- mail sent successfull end -->


<!-- Footer started here -->
<?php include('include/footer-box.php'); ?>
<?php include('include/footer.php'); ?>
<!-- Footer ended here -->