<?php
 //Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;

require('vendor/phpmailer/src/PHPMailer.php');
require('vendor/phpmailer/src/Exception.php');
require('vendor/phpmailer/src/SMTP.php');

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "omar.faruque967@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "kpvsaawbjwufewdy";
//Set who the message is to be sent from
$mail->setFrom('sdsd@sd.com', 'sdsd');
//Set who the message is to be sent to
$mail->addAddress('batista420@yahoo.com', 'First Last');
//Set the subject line
$mail->Subject = 'PHPMailer GMail SMTP test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//Replace the plain text body with one created manually
$mail->AltBody = 'sdsdsad';
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}
//Section 2: IMAP
//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
//You can use imap_getmailboxes($imapStream, '/imap/ssl', '*' ) to get a list of available folders or labels, this can
//be useful if you are trying to get this working on a non-Gmail IMAP server.
function save_mail($mail)
{
    //You can change 'Sent Mail' to any other folder or tag
    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";
    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);
    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);
    return $result;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
    $message = trim(filter_input(INPUT_POST, "message", FILTER_SANITIZE_SPECIAL_CHARS));
    if ($name == '' || $email == '' || $message == '') {
        echo "Please fill out the form correctly.";
        exit;
    }


    header('location: suggest.php?status=thankyou');
}
?>
<?php include('inc/header.php'); ?>
<?php
if (isset($_GET['status']) == 'thankyou') {
    echo "
        <div class='valign-wrapper' style='min-height: 60vh;'>
        <div class='container'>
            <h3 class='blue-text text-darken-1 center-align'>Thank You</h3>
            <p class='center-align'>We have recieved your message and will notify you shortly.</p>
        </div>
        </div>
    ";
} else if (isset($_GET['status']) == 'error') {
    echo "<div class='container'>
    <h3 class='blue-text text-darken-1'>Send us some suggestions</h3>
    <div class='row' style='margin-top: 50px; margin-bottom: 50px;'>
        <form class='col s12' action='suggest.php' method='POST'>
            <h5 class='red-text'>Please fill out the required field(s)</h5>
            <div class='row'>
                <div class='flow-text red-text'>*</div>
                <div class='input-field col s12'>
                    <i class='material-icons prefix' style='color: #1e88e5;'>person</i>
                    <input id='name' type='text' name='name' class='validate'>
                    <label for='name'>Name</label>
                </div>
            </div>
            <div class='row'>
                <div class='flow-text red-text'>*</div>
                <div class='input-field col s12'>
                    <i class='material-icons prefix' style='color: #1e88e5;'>email</i>
                    <input id='email' type='email' name='email' class='validate'>
                    <label for='email'>Email</label>
                </div>
            </div>
            <div class='row'>
                <div class='flow-text red-text'>*</div>
                <div class='input-field col s12'>
                    <i class='material-icons prefix' style='color: #1e88e5;'>textsms</i>
                    <textarea id='textarea1' class='materialize-textarea' name='message'></textarea>
                    <label for='textarea1'>Message</label>
                </div>
            </div>
            <button class='btn waves-effect waves-light blue darken-1' type='submit'>Submit
                <i class='material-icons right'>send</i>
            </button>
        </form>
    </div>
</div>";
} else {
    echo "<div class='container'>
    <h3 class='blue-text text-darken-1'>Send us some suggestions</h3>
    <div class='row' style='margin-top: 50px; margin-bottom: 50px;'>
        <form class='col s12' action='suggest.php' method='POST'>
            <div class='row'>
                <div class='input-field col s12'>
                    <i class='material-icons prefix' style='color: #1e88e5;'>person</i>
                    <input id='name' type='text' name='name' class='validate'>
                    <label for='name'>Name</label>
                </div>
            </div>
            <div class='row'>
                <div class='input-field col s12'>
                    <i class='material-icons prefix' style='color: #1e88e5;'>email</i>
                    <input id='email' type='email' name='email' class='validate'>
                    <label for='email'>Email</label>
                </div>
            </div>
            <div class='row'>
                <div class='input-field col s12'>
                    <i class='material-icons prefix' style='color: #1e88e5;'>textsms</i>
                    <textarea id='textarea1' class='materialize-textarea' name='message'></textarea>
                    <label for='textarea1'>Message</label>
                </div>
            </div>
            <button class='btn waves-effect waves-light blue darken-1' type='submit'>Submit
                <i class='material-icons right'>send</i>
            </button>
        </form>
    </div>
</div>";
}
?>
<?php include('inc/footer.php'); ?> 