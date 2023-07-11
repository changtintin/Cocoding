
<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';

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

        // $Amy = new Student(true);
        // $Amy->ini("Amy chang", 23);
        // echo $Amy->name."<br>";

        //Server settings

        //Enable verbose debug output -> DEBUG_SERVER, DEBUG_CLIENT,DEBUG_CONNECTION, DEBUG_LOWLEVEL
        $mail -> SMTPDebug = SMTP::DEBUG_OFF;     

        //Send using SMTP
        $mail -> isSMTP();           

        //Set the SMTP server to send through
        $mail -> Host       = Config::SMTP_HOST;

        //Enable SMTP authentication
        $mail -> SMTPAuth   = true;                                   

        //SMTP username
        $mail -> Username   = Config::SMTP_USER;   

        //SMTP password
        $mail -> Password   = Config::SMTP_PASS; 

        //Enable implicit TLS encryption                           
        $mail -> SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;    
        
        //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail -> Port       = Config::SMTP_PORT;                  

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
        $mail -> setFrom($from_email, $name);
        $mail -> addAddress('cocoding@tatianachang.com', 'Cocoding System');     //Add a recipient
        // $mail -> addAddress('ellen@example.com');               //Name is optional
        // $mail -> addReplyTo('info@example.com', 'Information');
        // $mail -> addCC('cc@example.com');
        // $mail -> addBCC('bcc@example.com');

        //Attachments

        //Add attachments
        // $mail -> addAttachment('/var/tmp/file.tar.gz');   

        //Optional name     
        // $mail -> addAttachment('/tmp/image.jpg', 'new.jpg');    

        //Content
        #####################
        //Set email format to HTML
        $mail -> isSendmail();                                  
        $mail -> Subject = $subject;
        $mail -> Body    = $message;
        $mail -> AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail -> send(); 
        $msg = "We've receive your option, please wait for our reply.";
        header("Location: ./contact.php?confirm_msg={$msg}", TRUE, 301);       
    }
?>

