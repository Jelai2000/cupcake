<?php
session_start();
// include('functions/userfunctions.php');
include('../config/dbcon.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


function resend_email_verify($username,$email,$verify)
{
    $mail = new PHPMailer(true);
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'pytclaire21@gmail.com';                     //SMTP username
        $mail->Password   = 'bxavlleltupmjsbv';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mailer = "CUPCAKE";
        $mail->setFrom('pytclaire21@gmail.com', $mailer);
        $mail->addAddress($email);     //Add a recipient
        

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Resend Email Verification From CUPCAKE';
        
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
}

if(isset($_POST['btn_resendEmail']))
{
    if(!empty(trim($_POST['email'])))
    {
        $email = mysqli_real_escape_string($con, $_POST['email']);

        $checkemail_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $checkemail_query_run = mysqli_query($con, $checkemail_query);

        if(mysqli_num_rows($checkemail_query_run) > 0)
        {
            $row = mysqli_fetch_array($checkemail_query_run);
            if($row['verify_status'] == "0")
            {
                $username = $row['username'];
                $email = $row['email'];
                $verify = $row['verify'];

                resend_email_verify($username,$email,$verify);

                $_SESSION['message'] = "Verification link has been sent to your email address";
                header("Location: login.php");
                exit(0);


            }
            else
            {
                $_SESSION['message'] = "Email already verified. Please Login";
                header("Location: resend_email_verification.php");
                exit(0);
            }
        }
        else
        {
            $_SESSION['message'] = "Email is not registered. Please Register Now.!";
            header("Location: register.php");
            exit(0);
        }
    }
else
{
    $_SESSION['message'] = "Please enter the email field";
    header("Location: resend_email_verification.php");
    exit(0);
}
}
?>