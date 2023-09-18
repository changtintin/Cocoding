<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href = "send.php?send=1">TEST</a>

</body>
</html>
<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    if(isset($_GET['send'])){
        $to_mail = "tin871001@gmail.com";
        $to_username = "Wen";     
        
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
                        <td>You</td>
                    </tr>
                    <tr>
                        <td><strong>Click to reset your password</strong></td>
                        <td>
                            HELLO
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

        //Enable ssl encryption                           
        $mail -> SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;    
        
        //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail -> Port = Config::SMTP_PORT;                  

        // for different language
        $mail -> CharSet = "UTF-8";
        $mail -> SMTPOptions = array(
            'ssl' => array(
                'verify_peer'=> false,
                'verify_peer_name'=> false,
                'allow_self_signed'=> true
            )
        );
        
        //Recipients
        #####################
        $mail -> setFrom("cocoding@tatianachang.com", 'Cocoding System');
        $mail -> addAddress($to_mail, $to_username);     //Add a recipient
        // $mail -> addAddress('ellen@example.com');               //Name is optional
        $mail -> addReplyTo("cocoding@tatianachang.com");
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
        $mail -> Subject = "Cocoding = Reset Password";
        $mail -> Body    = $message;
        $mail -> AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->DKIM_domain = "tatianachang.com";
        // Make sure to protect the key from being publicly accessible!
        $mail->DKIM_private = dirname(__FILE__)."/secure/private.key"; 
        $mail->DKIM_selector = "ting";
        $mail->DKIM_identity = $mail->From;
        
        if($mail -> send()){
            echo "OK";
        }
        else{
            echo "Neh";                         
        }
                            
    }
?>

