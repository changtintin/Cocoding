<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    if(isset($_POST['recover_submit'])){
        $to_mail = $_POST['forgot_email_submit'];
        $to_username = $_POST['forgot_username_submit'];     
        
        $message = "
            <!DOCTYPE html>
            <html>
            <head>
            </head>
            <body>
                <table rules='all' border='1' style='border-color: #666;' cellpadding='10'>
                    <tr style='background: #eee;'><td colspan='2'><strong>COCODING - Forgot Password</strong> </td></tr>
                    <tr>
                        <td><strong>To:</strong></td>
                        <td>".$to_username."</td>
                    </tr>
                    <tr>
                        <td><strong>Click to reset your password</strong></td>
                        <td>
                            <a href = 'http://tatianachang.com/Cocoding/reset.php?email={$to_mail}&token={$token}'>Reset your password</a>
                        </td>
                    </tr>                   
                </table>
            </body>
            </html>
        ";   
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        //Server settings
        ############################
        //Enable verbose debug output -> DEBUG_SERVER, DEBUG_CLIENT,DEBUG_CONNECTION, DEBUG_LOWLEVEL
        $mail -> SMTPDebug = SMTP::DEBUG_SERVER;     
        //Send using SMTP
        $mail -> isSMTP();           

        //Set the SMTP server to send through
        $mail -> Host = Config::SMTP_HOST;

        //Enable SMTP authentication
        $mail -> SMTPAuth = true;                                   

        //SMTP username
        $mail -> Username = Config::SMTP_USER;   

        //SMTP password
        $mail -> Password = Config::SMTP_PASS; 

        //Enable tls encryption                           
        $mail -> SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;    
        
        //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail -> Port = Config::SMTP_PORT;                  

        // for different language
        $mail -> CharSet = "UTF-8";
        
        
        //Recipients
        #####################
        $mail -> setFrom("cocoding@tatianachang.com", "Cocoding System");
        $mail -> addAddress($to_mail, $to_username);     //Add a recipient
        // $mail -> addAddress('ellen@example.com');               //Name is optional
        $mail -> addReplyTo("cocoding@tatianachang.com", "Cocoding System");
        // $mail -> addCC('cc@example.com');
        // $mail -> addBCC('bcc@example.com');

        //Attachments
        #####################
        //Add attachments
        // $mail -> addAttachment('/var/tmp/file.tar.gz');   
        //Optional name     
        // $mail -> addAttachment('/tmp/image.jpg', 'new.jpg');                
        
        //Content
        #####################
        //Set email format to HTML
        $mail -> isSendmail();                                  
        $mail -> Subject = "Cocoding - Reset Password";
        $mail -> Body    = $message;
        $mail -> AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->DKIM_domain = "tatianachang.com";
        // Make sure to protect the key from being publicly accessible!
        $mail->DKIM_private = dirname(__FILE__)."/secure/private.key"; 
        $mail->DKIM_selector = "default";
        $mail->DKIM_identity = $mail->From;
        
        // if($mail -> send()){
        //     $msg = "Go check your mailbox";                            
        // }
        // else{
        //     $msg = "Somthing went wrong, please <a href = '/Cocoding/contact.php'>Contact us</a>";                           
        // }
        // header("Location: ./forgot.php?confirm_msg={$msg}&forgot=1", TRUE, 301);
        // exit();       
        if($mail -> send()){
            echo "OK";
        }
        else{
            echo "Neh";                         
        }          

    }
?>

