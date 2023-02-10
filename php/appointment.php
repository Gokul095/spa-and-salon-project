<?php
error_reporting(0);
// include 'index.html';

// Connect to the MySQL database

include ('db.php');

// Form data

$service = $_POST['services'];
$date = $_POST['date'];
$time = $_POST['times'];
$name = $_POST['names'];
$phone = $_POST['phones'];
$email = $_POST['emails'];
$promo = $_POST['promo-code'];
$newsletter = $_POST['newletter'];

// Insert data into MySQL
$sql = "INSERT INTO `appointment` (`service`, `date`, `time`, `name`, `phone`, `email`, `promo`, `newsletter`)
VALUES ('$service','$date','$time','$name','$phone', '$email','$promo', '$newsletter')";

if ($conn->query($sql) === TRUE) {
   echo '<div class="done done-success">Appointment Submitted..</div>';
} else {
   echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


//Email


//////////////PHP MAILER///////////////////////////////////////////////////////////////////////

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//Load Composer's autoloader

require 'PHPMailer/vendor/phpmailer/src/Exception.php';
require 'PHPMailer/vendor/phpmailer/src/PHPMailer.php';
require 'PHPMailer/vendor/phpmailer/src/SMTP.php';
require 'PHPMailer/vendor/autoload.php';

//Create an instance; passing `true` enables exceptions

$mail = new PHPMailer(true);


$body = "<table><tr><td>Service:</td><td>$service</td></tr><tr><td>Date:</td><td>$date</td></tr><tr><td>Time:</td><td>$time</td></tr><tr><td>Name:</td><td>$name</td></tr><tr><td>Phone Number:</td><td>$phone</td></tr><tr><td>Email Id:</td><td>$email</td></tr><tr><td>Promo Code:</td><td>$promo</td></tr><tr><td>Update:</td><td>$newsletter</td></tr></table>";

       //Server settings
       $mail->isSMTP();                                            //Send using SMTP
       $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
       $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

       $mail->Username   = 'gokulsaran059@gmail.com';                     //SMTP username
       $mail->Password   = 'wniaqvwghjivtbip';                               //SMTP password       wniaqvwghjivtbip
      
       $mail->SMTPSecure   = 'ssl';            //Enable implicit TLS encryption
       $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
   
       //Recipients
       $mail->setFrom($email, $name);


       $mail->addAddress(address:'gokulsaran059@gmail.com');     //Add a recipient
      
   
   
       //Content
       $mail->isHTML(true);                                  //Set email format to HTML
       $mail->Subject = "Appointment";
       $mail->Body    = $body;
       $mail->send();
      



?>

