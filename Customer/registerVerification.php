<?php
// session_start();
include('../config/dbcon.php');
include('functions/userfunctions.php'); //bawal mawala

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sendemail_verify($username,$email,$verify)
{
        $mail = new PHPMailer(true);
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'pytclaire21@gmail.com';                     //SMTP username--ETO YUNG EMAIL NA GAGAMITIN PANG SEND
        $mail->Password   = 'bxavlleltupmjsbv';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
       // $mail = "CUPCKAE";
       $mailer = "CUPCAKE";
        $mail->setFrom('pytclaire21@gmail.com', $mailer);
        $mail->addAddress($email);     //Add a recipient
        

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Verification From CUPcake';
        
        $email_template = "
        <center style='width: 100%; background-color: #f3f3f3;'>
    <table
      style='width: 100%; max-width: 640px; background-color: #ffffff; border: 1px solid #E0E4E6; border-collapse: collapse;'>
      <tr>
        <td style='padding: 32px 10px;'>
        <div
        style='background-color: #ffffff; border-bottom: 0px; border-radius: 12px 12px 0 0; height: 80px; text-align: center;'>
        
      </div>
          <div
            style='background-color: #ffffff; border: 1px solid #E0E4E6; padding: 40px; padding-bottom: 52px; padding-top: 41px;'>
            <h1
              style='font-size: 24px; font-weight: 600; color: #2f3334; letter-spacing: 0.5px; margin: 0; text-align: center;'>
              Verify Email</h1>
            <p
              style='margin: 0; color: #757778; font-weight: 300; font-size: 16px; line-height: 150%; text-align: center;'>
              Thank you for using CUPCAKE! We are glad to
              have you with us! To continue, please verify your email address by clicking the button below.
            </p>
          
            <p
              style='margin: 0; color: #757778; font-weight: 300; font-size: 16px; line-height: 150%; margin-top: 32px; text-align: center;'>
              <a href='http://localhost/CUPcake/Customer/verify-email.php?token=$verify'
                style='color: #ffffff; display: inline-block; background-color: #00A651; border-radius: 12px; width: 204px; text-decoration: none; font-size: 14px; text-align: center; height: 44px; font-weight: 600; letter-spacing: 0.5px; line-height: 44px; margin: 0 auto;'>
                Verify Email Address
              </a>
            </p>
          </div>
          <div
            style='border-color: #E0E4E6; border-style: solid; border-width: 0 1px 1px 1px; text-align: center; background: #F7F7F7; border-radius: 0 0 12px 12px; margin-bottom: 32px; padding: 24px 16px; font-family: Arial, sans-serif;'>
            <p style='margin: 0; color: #A8ADB0; font-weight: 300; font-size: 12px; margin-bottom: 20px;'>This is a
              system-generated email. Please do not reply.</p>
            <div style='font-size: 14px; padding: 0 32px; max-width: 640px; margin: auto; line-height: 21px;'>
              <p style='margin: 0; color: #737A7D; font-weight: 300;'>
                Connect with us! Follow CUPCAKE on
                <span style='display: inline-block;'>
                  <a href='https://www.facebook.com'
                    style='color: #00A651; text-decoration: none;'>Facebook</a> and
                  <a href='https://twitter.com'
                    style='color: #00A651; text-decoration: none;'>Twitter</a>
                </span>
              </p>
              <p style='margin: 0; color: #737A7D; font-weight: 300;'>
                If you have any questions, email
                <a href='mailto:cupcakesysinfo@gmail.com' style='color: #00A651; text-decoration: none;'>Customer
                  Service</a>
              </p>
            </div>
            <div style='padding-top: 24px; font-size: 12px;'>
              <p style='margin: 0; color: #A8ADB0; font-weight: 300;'>&copy; Copyright CUPCAKE. All Rights Reserved.</p>
            </div>
          </div>
        </td>
      </tr>
    </table>
  </center>
        ";

        $mail->Body = $email_template;
        $mail->send();
        //echo 'Message has been sent';
}

if(isset($_POST['btn_register']))
{
    
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $number = preg_match('@[0-9]@', $password);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

   
    
    $verify = md5(rand());
    
    sendemail_verify("$username","$email","$verify");
    // echo"send or not";

    //CHECKING IF EMAIL EXIST OR NOT
    $check_email_query ="SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email_query_run = mysqli_query($con,$check_email_query);
   

    if(mysqli_num_rows($check_email_query_run)>0)
    {
        $_SESSION['message'] = "Email ID already Exists";
        header("Location: register.php");
    }
    
    elseif($password!=$cpassword){
        $_SESSION['message'] = "Password do not match";
        header("Location: register.php");
    }

    else
    {
        if($uppercase && $lowercase && $number && $specialChars && strlen($password) > 8)
        {
        //INSERT USER
            $sha1Password = sha1($password);
            $query = "INSERT INTO users (username,phone,email,password,verify) VALUES('$username','$phone','$email','$sha1Password','$verify')";
            $query_run = mysqli_query($con, $query);
        
            if($query_run)
            {
                sendemail_verify("$username","$email","$verify");

                $_SESSION['message'] = "Registration Successful! Please verify your Email Address";
                header("Location: register.php");
            }
            else
            {
                $_SESSION['message'] = "Registration Failed";
                header("Location: register.php");
            }
        }
        else
        {
            $_SESSION['message'] = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
            header("Location: register.php");
        }
    } 

}


?>
