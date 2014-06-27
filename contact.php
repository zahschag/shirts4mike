<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);
    if($name == "" OR $email == "" OR $message == ""){
        $error_message = "You must specify a value for name and email address.";
    }
    if(isset($error_message)){
            foreach( $_POST as $value){
            if(stripos($value, 'Content-Type') !== FALSE){
                $error_message = "There was a problem with the information entered.";
            
            }
        }
    }
    
    if(!isset($error_message) && $_POST['address']!= ""){
        $error_message ="Your form submission was rejected";
    }

    require_once("inc/phpmailer/class.phpmailer.php");
    $mail = new PHPMailer();

    if (!isset($error_message) && !$mail->ValidateAddress($email)){
        $error_message ="You must specify a valid email address";
    }
    if(!isset($error_message)){

    
        $email_body = "";
        $email_body = $email_body . "Name: " . $name . "<\br>";
        $email_body = $email_body . "Email: ". $email . "<\br>";
        $email_body = $email_body . "Message: " . $message;

        $mail->isSendmail();
        //Set who the message is to be sent from
        $mail->setFrom($email, $name);
        //Set who the message is to be sent to
        $address("orders@shirts4mike.com");
        $mail->addAddress($address, "Shirts 4 Mike");
        //Set the subject line
        $mail->Subject = 'Shirts 4 Mike Contact From submission |' . $name;
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $mail->msgHTML($email_body);
        //send the message, check for errors
        if ($mail->send()) {
            header("Location: contact.php?status=thanks");
            exit;
        }
        else{
            $error_message =  "There was a problem sending the email: " . $mail->ErrorInfo;
        }
    }
}


?><?php
$pageTitle = "Contact Mike";
$section = "contact";
include('inc/header.php'); ?>

    <div class="section page">

        <h1>Contact</h1>
        <?php 
        if(isset($_GET['status']) AND$_GET['status'] == "thanks"){ ?>
            <p>Thanks for the email! I&rsquo;ll be in touch shortly</p>
        <?php } else{ ?>
            <?php 
                if(!isset($error_message)){
                    echo '<p>I&rsquo;d love to hear from you! Complete the form to send me an email.</p>';
                }
                    else{
                        echo '<p class="message">' . $error_message . '</p>';
                    }
            ?>
            <form method="post" action="contact.php">
                    <table>
                        <tr>
                            <th>
                                <label for="name">Name</label>
                            </th>
                            <td>
                                <input type="text" name="name" id="name" value="<?php if(isset($name)){ echo htmlspecialchars($name); } ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="email">Email</label>
                            </th>
                            <td>
                                <input type="text" name="email" id="email" value="<?php if(isset($email)){ echo htmlspecialchars($email); } ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="message">Message</label>
                            </th>
                            <td>
                                <textarea name="message" id="message" ><?php if(isset($message)){ echo htmlspecialchars($message); } ?></textarea>
                            </td>
                        </tr>
                        <tr style="display:none;">
                            <th>
                                <label for="address">Address</label>
                            </th>
                            <td>
                                <input type="address" name="address" id="address">
                                <p> Humans (and frogs): Do not fill out this field!</p>
                            </td>
                        </tr>
                        
                    </table>
                    <input type="submit" value="Send">
                </form>
        <div>
        <?php } ?>

<?php include('inc/footer.php'); ?>