<!--PHP-File,that takes data from "contact.html" and sends them as a email.-->
<!--Project:ecoSense - Website-->
<!--Author:Harli Laçej-->
<!--Date: 26/10/2022-->
<?php
/*taking values from form in "contact.html"*/
if (isset($_POST['email'])) {
   /*if the user cliked to send the email this part of code is exectued*/
   /*Variables that contain the values from form and the email address of the email-reciever*/
  $email_to = "harlac17@htl-shkoder.com";
  $email_subject = "User Question - ecoSense";
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email_from = $_POST['email'];
  $telephone = $_POST['telephone'];
  $comments = $_POST['comments'];


/*Checking the user data through Regular Expressions(RegEx) */
  $error_message = "";
  $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if (!preg_match($email_exp, $email_from)) {

    $error_message .= '<li><p>Incrrect email<p></li>';
  }

  $string_exp = "/^[A-Za-z .'-]+$/";

  if (!preg_match($string_exp, $first_name)) {

    $error_message .= '<li><p>Incorrect Fastname written</p></li>';
  }

  if (!preg_match($string_exp, $last_name)) {

    $error_message .= '<li><p>Incorrect Lastname written</p></li>';
  }


  /*Function to delete not wanted string that appear in the user data,to increase security and display only what is needed*/
  function clean_string($string)
  {

    $notwanted = array("bcc", "to:", "cc:", "href");

    return str_replace($notwanted, "", $string);
  }



  $email_message .= "First Name: " . clean_string($first_name) . "\n";

  $email_message .= "Last Name: " . clean_string($last_name) . "\n";

  $email_message .= "Email Adress: " . clean_string($email_from) . "\n";

  $email_message .= "Telephone: " . clean_string($telephone) . "\n";

  $email_message .= "Comments: " . clean_string($comments) . "\n";


  /*Setting header,subject and reciever and sending email with PHP*/
  $headers = 'From: ' . $email_from . "\r\n" .

    'Reply-To: ' . $email_from . "\r\n" .

    'X-Mailer: PHP/' . phpversion();

  @mail($email_to, $email_subject, $email_message, $headers);
   /*Redirecting to "contact.html"*/
  header("Location:contact.html")

?>
 

<?php

}

?>