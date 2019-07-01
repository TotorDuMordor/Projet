<?php
ini_set("SMTP", "smtp.live.com");
ini_set("172.0.0.1", 25);// sachant que le port ressemblera sûrement à quelquechose comme 8025


$name = stripcslashes($_POST['name']);
$email = stripcslashes($_POST['email']);
$objet = stripcslashes($_POST['objet']);
$message = stripcslashes($_POST['message']);



$mailto = 'victor.tahon13@gmail.com'; 
$objet = $objet; 

$error_message = 'Une erreur est survenue'; 
$success_message = 'Message envoyé'; 




$message = "Name: $name\r\nEmail: $email\r\nMessage: $message";

$headers = "From: $name <$email>" . "\r\n" . "Reply-To: $email" . "\r\n" . "X-Mailer: PHP/" . phpversion();

function validateEmail($email) {
   if(preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
	  return true;
   else
	  return false;
}

if((strlen($name) < 1 ) || (strlen($email) < 1 ) || (strlen($message) < 1 ) || validateEmail($email) == FALSE ) {

	echo($error_message);

} else {

	if( mail($mailto, $objet, $message, $headers) ) {
		
		echo($success_message);

	} else {

		echo($error_message);

	}

}