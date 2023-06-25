
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



//Load Composer's autoloader
require 'autoload.php';
require './class/send_config.php';

if(isset($_POST['contact_submit'])){
    $name = esc($_POST['name'], $connect);
    $from_email = $_POST['mail'];
    $message = $_POST['content'];
    $subject = esc($_POST['subject'], $connect);    
    $message = wordwrap($message, 70, "\r\n");
    $message = "
        <!DOCTYPE html>
        <html>
        <head>
        </head>
        <body>
            <table rules='all' border='1' style='border-color: #666;' cellpadding='10'>
                <tr style='background: #eee;'><td colspan='2'><strong>COCODING - User Report</strong> </td></tr>
                <tr>
                    <td><strong>From:</strong></td>
                    <td>".$name."</td>
                </tr>
                <tr>
                    <td><strong>Email:</strong></td>
                    <td>".$from_email."</td>
                </tr>
                <tr>
                    <td><strong>Subject:</strong></td>
                    <td>".$subject."</td>
                </tr>
            
                <tr>
                    <td><strong>Message:</strong></td>
                    <td>".$message."</td>
                </tr>
            </table>
        </body>
        </html>
    ";
    


    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = sendConfig::SMTP_HOST;                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = sendConfig::SMTP_USER;                     //SMTP username
    $mail->Password   = sendConfig::SMTP_PASS;                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = sendConfig::SMTP_PORT;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer'=> false,
            'verify_peer_name'=> false,
            'allow_self_signed'=> true
        )
    );
    //Recipients
    $mail->setFrom($from_email, $name);
    $mail->addAddress('cocoding@tatianachang.com', 'Cocoding System');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isSendmail();                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

?>

