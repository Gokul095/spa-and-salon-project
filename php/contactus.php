<?php
// // Connect to the MySQL database

include ('db.php');


// Form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];


// Insert data into MySQL
$sql = "INSERT INTO `contact` (`name`, `phone`, `email`, `subject`, `message`)
VALUES ('$name', '$phone', '$email','$subject', '$message')";

if ($conn->query($sql) === TRUE) {
   echo '<div class="alert alert-success">Submitted Successfully..</div>';
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

require 'PHPMailer/vendor/phpmailer/src/Exception.php';
require 'PHPMailer/vendor/phpmailer/src/PHPMailer.php';
require 'PHPMailer/vendor/phpmailer/src/SMTP.php';
require 'PHPMailer/vendor/autoload.php';


  //Create an instance; passing `true` enables exceptions

  $mail = new PHPMailer(true);
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
   
   
    $body = "<table><tr><td>Name:</td><td>$name</td></tr><tr><td>Phone Number:</td><td>$phone</td></tr><tr><td>Email Id:</td><td>$email</td></tr><tr><td>Message:</td><td>$message</td></tr></table>";
   
   
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


     $mail->addAddress(address:'gokulsaran059@gmail.com');       //Add a recipient
     
   
   
       //Content
       $mail->isHTML(true);                                  //Set email format to HTML
       $mail->Subject = $subject;
       $mail->Body    = $body;
       $mail->send()
    
   
   




// if (mysqli_query($conn, $sql)) {
// echo "New record created successfully";
// header("Location: \alicespa/index.html");
   
// } else {
// echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// // header("Location: \alicespa/index.html ");
    
// }


?>



