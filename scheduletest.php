<?php echo include 'schedule_head.php';?>
<?php echo include 'schedule_head.php';?>

    <body>
        <header>
            <img src="img/logo.jpg" alt="Beauty By Yumi" class="logo">
            <nav class="nav-bottombar nav-topbar nav-border-blush">
                <ul>
                    <li><a href="index.html">Home</a></li> <!-- About and Services -->
                    <li><a href="gallery.html">Gallery</a></li>
                    <li><a href="#">Schedule</a></li>
                    <li><a href="faqs.html">FAQs</a></li>
                </ul>
            </nav>
        </header>

        <section class="schedule-main">
            <div class="container">
                <p>Please fill-in and select the appropriate options in the form below to schedule an appointment.</p>
            </div>
        </section>

        <section class="schedule-app">
            <div class="container">
                <p>Please select the appropriate button below for your type of schedule</p>
                <div class="client-btn"> <!-- switch form -->
                    <button class="first-btn" onclick="showForm('firstClient')">First Time Client</button> <!-- onclick show form -->
                    <button class="regular-btn" onclick="showForm('regularClient')">Regular Client</button><!-- onclick show form -->
                </div>
                <div class="form">
                    <?php include 'php/post_firstschedule.php';?>
                    <div id="first-clientForm" class="schedule-form" hidden>
                        <p>The form below will be an agreement that will remain in effect for this scheduled appointment and all future follow-ups conducted by the certified eyelash extention professional, Yumi Xyra Samson. Signatures will be required upon first visitation</p>
                        <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                            <fieldset>
                                First and Last Name:<br> <!-- auto focus when user clicks button -->
                                <input type="text" name="fschedule-name" placeholder="First Lastname" value="<?php echo $name;?>" autocomplete="on" required>
                                <span class="error">* <?php echo $nameErr;?></span><br>
                                Email address (email address will act as password for regular scheduling):<br>
                                <input type="email" name="fschedule-email" placeholder="beautybyyx@gmail.com" value="<?php echo $email;?>" autocomplete="on" required>
                                <span class="error">* <?php echo $emailErr;?></span><br>
                                Phone number:
                                <input type="tel" name="fschedule-phone" placeholder="123-456-7890" value="<?php echo $phone;?>" autocomplete="on" required>
                                <span class="error">* <?php echo $phoneErr;?></span><br>
                                
                                <!-- Calendar -->
                                <div id="scheduler-calendar" class="calendar">
                                    <div class="calendar-month">
                                        <i class="material-icons md-36" onclick="monthChange('left')">chevron_left</i>
                                        <div class="monthHead" id="month"></div>
                                        <i class="material-icons md-36" onclick="monthChange('right')">chevron_right</i>
                                    </div>
                                    <div class="calendar-days" id="calendar-days" ></div>
                                </div>
                                <!-- Calendar end -->

                                <input type="text" id="fschedule-date" value="" readonly><!-- accpet JS date value(s) -->
                                <span class="error">* <?php echo $appointmentErr;?></span><br>

                                Please inform the technician about any of the conditions listed below
                                <textarea name="fschedule-conditions" form="usrform" value="<?php echo $conditions;?>"></textarea>
                                <span class="error">* <?php echo $conditionsErr;?></span><br>

                                <p>Please read throughly and check through the listed conditions by clicking the checkboxes</p>
                                <input type="checkbox" required> Current use of contact lenses which I may be asked to remove during the procedure
                                <input type="checkbox" required> Current use of anything such as oil-containing sunscreen or moisturizers around the eyes
                                <input type="checkbox" required> Current use of eye drops of any kind, prescription or over-the-counter
                                <input type="checkbox" required> Current allergies or sensitivities
                                <input type="checkbox" required> History of recurrent eye or tear duct infections
                                <input type="checkbox" required> History or dry eyes or Sjorgen's Syndrome
                                <input type="checkbox" required> Recent history of Chemotherapy
                                <input type="checkbox" required> Other medicinal conditions which would prohibit or compromise placement and retention of eyelash extentions

                                <p>Please read throughly and check through the following eyelash extention follow-up and maintenance instructions by clicking the checkboxes.</p>
                                <input type="checkbox" required> No waterproof mascara
                                <input type="checkbox" required> No oil based products around the eye area
                                <input type="checkbox" required> No water can come in contact with the eye area for 24 hours after the application
                                <input type="checkbox" required> No tinting or perming of eyelash extentions
                                <input type="checkbox" required> No pulling or rubbing of eyelash extentions
                                <input type="checkbox" required> Should any kind of eye drops be necessary extra care should be taken to prevent moisture from coming into contact with the eyelash extentions


                                <p>Please read <a href="">Consent Form</a> before submitting appointment</p>
                                <!-- enable submit button after consent form is clicked AND checkboxes are checked -->
                                
                                <p>Please read and check the checkboxes to agree and submit form.</p>
                                <input type="checkbox" required>
                                <p>I have read and agree to the <a href="">Consent Form</a> that is provided for me.</p>
                                <input type="checkbox" required>
                                <p>I can read English and understand that this consent agreement is legal and binding. </p>
                                <input type="checkbox" required>
                                <p>I have read and fully understand all information in this agreement.</p>
                                <input type="checkbox" required>
                                <p>I am over 18 years of age and consent to the agreement and to the eyelash extention application procedure.</p>
                                <!-- notify client that there will be signatures required before first procedure
                                     all parts must be approved before submission -->
                                <input type="submit" name="submit" value="Submit">
                            </fieldset>
                        </form>
                    </div>
                    
                    <div id="regular-clientForm" class="schedule-form" hidden>
                        <form action="/post_schedule.php" method="POST" autocomplete="on">
                            <fieldset>
                                First and Last Name:<br> <!-- auto focus when user clicks button -->
                                <input type="text" name="fschedule-name" placeholder="First Lastname" autocomplete="on" required><br>
                                Email address:<br>
                                <input type="email" name="fschedule-email" placeholder="beautybyyx@gmail.com" autocomplete="on" required><br>
                                3 appointment dates that will best fit your schedule:
                                <!-- JS -->
                                <input type="hidden" name="fschedule-dates" value=""><!-- accpet JS date value(s) -->
                                
                                <!-- confirm all inputs match one of regular client database -->
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </section>

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
