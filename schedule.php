<!--
Date: September 16, 2018
Author:Paul Andrew Samson
Client: Yumi Xyra Samson
-->
<?php
echo '
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Beauty By Yumi</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <link rel="stylesheet" href="css/calendar.css" type="text/css">
    </head>';
?>
<?php
echo '
    <body>
        <header>
            <img src="img/logo.jpg" alt="Beauty By Yumi" class="logo">
            <nav class="nav-bottombar nav-topbar nav-border-blush">
                <ul>
                    <li><a href="index.php">Home</a></li> <!-- About and Services -->
                    <li><a href="gallery.html">Gallery</a></li>
                    <li><a href="#">Schedule</a></li>
                    <li><a href="faqs.html">FAQs</a></li>
                </ul>
            </nav>
        </header>
';
?>
<?php
echo '
        <section class="schedule-main">
            <div class="container">
                <p>Please fill-in and select the appropriate options in the form below to schedule an appointment.</p>
            </div>
        </section>

        <section class="schedule-app">
            <div class="container">                
';
require 'post_firstscheduler.php';
echo '
                <div class="form">
                    <div id="first-clientForm" class="schedule-form" >
                        <p>The form below will be an agreement that will remain in effect for this scheduled appointment and all future follow-ups conducted by the certified eyelash extention professional, Yumi Xyra Samson. You will receive a call from Yumi to confirm your appointment. Signatures will be required upon first visitation.</p>
                        <form method="POST" id="usrform" autocomplete="on" action="'. htmlspecialchars($_SERVER["PHP_SELF"]) .'">
                            <fieldset>
                                <!-- Calendar -->
                                <div id="scheduler-calendar" class="calendar">
                                    <div class="calendar-month">
                                        <i class="material-icons md-36" onclick="monthChange(\'left\')">chevron_left</i>
                                        <div class="monthHead" id="month"></div>
                                        <i class="material-icons md-36" onclick="monthChange(\'right\')">chevron_right</i>
                                    </div>
                                    <div class="calendar-days" id="calendar-days" ></div>
                                </div>
                                <!-- Calendar end -->
                                <div class="form-inputs">
                                    <input type="checkbox" name="cb-master" onClick="checkAll(this)" >Check Here for regular appointment<br>
                                    
                                    <div class="row">
                                    First and Last Name:<br> <!-- auto focus when user clicks button -->
                                    <input type="text" name="fschedule-name" placeholder="First Lastname" value="'. $name .'" autocomplete="on" required>
                                    <span class="error">* '. $nameErr .'</span><br>
                                    </div>
                                    <div class="row">
                                    Email address:<br>
                                    <input type="email" name="fschedule-email" placeholder="beautybyyx@gmail.com" value="'. $email.'" autocomplete="on" required>
                                    <span class="error">* '. $emailErr.'</span><br>
                                    </div>
                                    <div class="row">
                                    Phone number:<br>
                                    <input type="tel" name="fschedule-phone" placeholder="123-456-7890" value="'. $phone .'" autocomplete="on" required>
                                    <span class="error">* '. $phoneErr .'</span><br>                              
                                    </div>
                                    <div id="conditions" class="row">Please inform the technician about any of the conditions listed below<br>
                                    <textarea name="fschedule-conditions" form="usrform" value="'. $conditions .'" placeholder="Please type NONE for no conditions "></textarea>
                                    <span class="error">* '. $conditionsErr .'</span><br>
                                    </div>
                                    <div class="row" id="dateRow" hidden>
                                    Appointment Date
                                    <input type="text" id="fschedule-date" name="fschedule-date" value="'. $appointment .'" readonly>
                                    <span class="error">* '. $appointmentErr .'</span><br>
                                    </div>
                                </div>
                                <div id="terms">
                                    <p>Please read throughly and check through the listed conditions by clicking the checkboxes</p>
                                    <input type="checkbox" name="cb" value="yes" required> Current use of contact lenses which I may be asked to remove during the procedure<br>
                                    <input type="checkbox" name="cb" value="yes" required> Current use of anything such as oil-containing sunscreen or moisturizers around the eyes<br>
                                    <input type="checkbox" name="cb" value="yes" required> Current use of eye drops of any kind, prescription or over-the-counter<br>
                                    <input type="checkbox" name="cb" value="yes" required> Current allergies or sensitivities<br>
                                    <input type="checkbox" name="cb" value="yes" required> History of recurrent eye or tear duct infections<br>
                                    <input type="checkbox" name="cb" value="yes" required> History or dry eyes or Sjorgen\'s Syndrome<br>
                                    <input type="checkbox" name="cb" value="yes" required> Recent history of Chemotherapy<br>
                                    <input type="checkbox" name="cb" value="yes" required> Other medicinal conditions which would prohibit or compromise placement and retention of eyelash extentions<br>

                                    <p>Please read throughly and check through the following eyelash extention follow-up and maintenance instructions by clicking the checkboxes.</p>
                                    <input type="checkbox" name="cb" value="yes" required> No waterproof mascara<br>
                                    <input type="checkbox" name="cb" value="yes" required> No oil based products around the eye area<br>
                                    <input type="checkbox" name="cb" value="yes" required> No water can come in contact with the eye area for 24 hours after the application<br>
                                    <input type="checkbox" name="cb" value="yes" required> No tinting or perming of eyelash extentions<br>
                                    <input type="checkbox" name="cb" value="yes" required> No pulling or rubbing of eyelash extentions<br>
                                    <input type="checkbox" name="cb" value="yes" required> Should any kind of eye drops be necessary extra care should be taken to prevent moisture from coming into contact with the eyelash extentions<br>


                                    <p>Please read <a href="">Consent Form</a> before submitting appointment</p>
                                    <!-- enable submit button after consent form is clicked AND checkboxes are checked -->
                                                                    
                                    <input type="checkbox" name="cb" value="yes" required>Please read and check the checkboxes to agree and submit form<br>
                                    <input type="checkbox" name="cb" value="yes" required>I have read and agree to the <a href="">Consent Form</a> that is provided for me<br>
                                    <input type="checkbox" name="cb" value="yes" required>I can read English and understand that this consent agreement is legal and binding<br>
                                    <input type="checkbox" name="cb" value="yes" required>I have read and fully understand all information in this agreement<br>
                                    <input type="checkbox" name="cb" value="yes" required>I am over 18 years of age and consent to the agreement and to the eyelash extention application procedure<br>
                                    <!-- notify client that there will be signatures required before first procedure,  all parts must be approved before submission -->
                                </div>
                                <div id="submitBtn" class="row">
                                    <input type="submit" name="submit" value="Submit">
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </section>
';
?>
<?php
echo '
        <section class="social">
            <div class="container">
                <a href="" class="social-button">Facebook</a>
                <a href="" class="social-button">Gmail</a>
                <a href="" class="social-button">Instagram</a>                
            </div>
        </section>
        <footer>


            <div class="col-1">
                <ul class="unstyled-list">
                    <li><strong>Web Links</strong></li>
                    <li>item one</li>
                    <li>item two</li>
                    <li>item three</li>
                    <li>item four</li>
                </ul>
            </div>

            <div class="col-1">
                <ul class="unstyled-list">
                    <li><strong>Credits</strong></li>
                    <li>item one</li>
                    <li>item two</li>
                    <li>item three</li>
                    <li>item four</li>
                </ul>
            </div>

        </footer>
        
        <script src="js/yumijs.js"></script>
        <script src="js/schedulerCalendar.js"></script>
        
        <!--
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        -->
    </body>
</html>
';
?>