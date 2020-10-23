<?php
    if($_SERVER["REQUEST_METHOD"]=="GET")
    {

        $fname = $_GET["fname"];
        $lname = $_GET["lname"];
        $email = $_GET["email"];
        $subject = $_GET["subject"];
        $message = $_GET["message"];
        $recipient = "info@ubuntuengineering.com";
        // $alt_recipient = $_GET["alt_recipient"];
        $temp = "info@ubuntuengineering.com";

        // $headers = "From:  \r\n";
        // "CC: $alt_recipient";
        // $headers .= "MIME-Version: 1.0\r\n";

        // $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $headers = "From: " . strip_tags($email) . "\r\n";

        $headers .= "Reply-To: ". strip_tags($email) . "\r\n";
        // $headers .= "CC: $alt_recipient\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $subject = "Dolphins Namibia - email from website";

        $txt = '<html><body>';
        $txt.= " <h3>Sent by: $fname ." ". $lname </h3>";
        $txt.="<p style='border: 1px solid #f1f1f1; padding:15px;'>".$message."</p><b>Contact $fname at </b>";
        $txt.="<b>Email:</b>".$email;

        $txt.= "<br><br><hr> Sent from Website";
        $txt.= '</body></html>';

        $success = mail($recipient,$subject,$txt,$headers);
        if ($success) {
          # Set a 200 (okay) response code.
          http_response_code(200);
          echo "Thank You! Your message has been sent to Ubuntu Engineering";
        } else {
            # Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong, we couldn't send your message.";

        }

    }

?>
