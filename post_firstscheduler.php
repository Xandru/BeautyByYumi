<?php
// define variables and set to empty values
$nameErr = $emailErr = $phoneErr = $appointmentErr = $conditionsErr = "";
$name = $email = $phone = $appointment = $conditions = "";
$nameBoolean = $emailBoolean = $phoneBoolean = $appointmentBoolean = $conditionsBoolean = false;

// next step print/saved and grab form

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
  
function validate_phone_number($phone) {
    // Allow +, - and . in phone number
    $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
    // Remove "-" from number
    $phone_to_check = str_replace("-", "", $filtered_phone_number);
    // Check the lenght of number
    // This can be customized if you want phone number from a specific country
    if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 10) {
        return false;
    } else {
        return true;
    }
    // if (strlen($phone_to_check) == 10) {
    //     return true;
    // } else {
    //     return false;
    // }
} 


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    if (empty($_POST["fschedule-name"])){
        $nameErr = "Name is required";
        $nameBoolean = false;
    } else {
        $name = test_input($_POST["fschedule-name"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed"; 
            $nameBoolean = false;
        } else {
            $nameBoolean = true;
        }
    }

    if (empty($_POST["fschedule-email"])) {
        $emailErr = "Email is required";
        $emailBoolean = false;
    } else {
        $email = test_input($_POST["fschedule-email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $emailBoolean = false;
        } else {
            $emailBoolean = true;
        }
    }

    if (empty($_POST["fschedule-phone"])) {
        $phoneErr = "Phone number is required";
        $phoneBoolean = false;
    } else {
        $phone = test_input($_POST["fschedule-phone"]);
        if (!validate_phone_number($phone)) {
            $phoneErr = "Invalid phone format, +, - and . are acceptable"; 
            $phoneBoolean = false;
        } else {
            $phoneBoolean = true;
        }
    }

    if (empty($_POST["fschedule-date"])) {
        $appointmentErr = "Appointment date is required";
        $appointmentBoolean = false;
    } else {
        $appointment = test_input($_POST["fschedule-date"]);
        $appointmentBoolean = true;
    }

    if (empty($_POST["fschedule-conditions"])) {
        $conditionsErr = "Conditions are required, type NONE if no conditions";
        $conditionsBoolean = false;
    } else {
        $conditions = test_input($_POST["fschedule-conditions"]);
        $conditionsBoolean = true;
    }
} else {
    debug_to_console("Form process incomplete: Sever request is not post OR submit is unset");
}

// Send email

$to = "yumi.xyra@gmail.com";
$subject = "BBYX Appointment";
$message = "<html><head><title>New Client Appointment</title></head><body>";
$message .= "<table><tr><th>Firstname</th><th>Phone-Number</th><th>Appointment</th><th>Conditions</th></tr><tr>";
$message .= "<td>".$name."</td><td>".$phone."</td><td>".$appointment."</td><td>".$conditions."</td></tr></table>";
$message .= "</body></html>";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: '. $email . "\r\n";
//$headers .= 'Cc: ' . "\r\n";

if ($nameBoolean && $emailBoolean && $phoneBoolean && $appointmentBoolean && $conditionsBoolean) {
    mail($to,$subject,$message,$headers);
    //email successful, NOW send user to index.html
    debug_to_console("Initiate send email!");
    echo '<script type="text/javascript">alert("Thank you, '. $name .', for being a first time client! Yumi Xyra will contact you ASAP");</script>';
    header('Location: http://localhost:1234/BeautyByYumi/public_html/index.php'); // change on live to website
    //echo "<script src=\"js/yumijs.js\">processPHP(" .$name. ");</script>";
} else {
    debug_to_console("variable(s) $[name]Boolean is false");
    //email fail, send user to schedule form
    //echo "<script src=\"js/yumijs.js\">processPHPerror(" .$nameErr. "," .$emailErr. "," .$phoneErr. "," .$appointmentErr. "," .$conditionsErr. ");</script>";
}


function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}

?>