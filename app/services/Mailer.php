<?php

namespace App\services;

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer {
    public function sendEmail( string $emailto, string $nameto,string $subject,string $body, array $attachments = [], string $withCopy = '' ) {
        //Create an instance;
        //passing `true` enables exceptions
        $mail = new PHPMailer( true );

        try {
            //Server settings
            if(DEBUG==1){
                $mail->SMTPDebug = SMTP::DEBUG_OFF;
            }else{
                $mail->SMTPDebug =  SMTP::DEBUG_SERVER;
            }
            //Enable verbose debug output
            $mail->isSMTP();
            //Send using SMTP
            $mail->Host       = MAILER_HOST;
            //Set the SMTP server to send through
            $mail->SMTPAuth   = true;
            //Enable SMTP authentication
            $mail->Username   = MAILER_USERNAME;
            //SMTP username
            $mail->Password   = MAILER_PASSWORD;
            //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            //Enable implicit TLS encryption
            $mail->Port       = 465;
            //TCP port to connect to;
            //use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom( MAILER_FROM, MAILER_FROM_NAME );
            $mail->addAddress( $emailto, $nameto );
            //Add a recipient
            //Name is optional
            // $mail->addReplyTo( 'info@example.com', 'Information' );
            if ( $withCopy != '' ) {
                $mail->addCC( $withCopy );
            }
            if ( MAILER_COPY_BBC != '' ) {
                $mail->addBCC( MAILER_COPY_BBC );
            }
            //Attachments
            if ( count( $attachments )>0 ) {
                $num = 0;
                foreach ( $attachments as $attachment ) {
                    $mail->addAttachment( $attachment[ 'path' ], $attachment[ 'name' ]??'' );
                    //Add attachments
                }
            }
            //Content
            $mail->isHTML( true );
            //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
           // echo 'Message has been sent';
        } catch ( Exception $e ) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}