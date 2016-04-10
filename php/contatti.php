<?php
/**
 * Created by PhpStorm.
 * User: ale
 * Date: 27/03/16
 * Time: 20:59
 */

$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Il nome è obbligatorio";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "La email è obbligatoria";
} else {
    $email = $_POST["email"];
}

// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Il messaggio è obbligatorio ";
} else {
    $message = $_POST["message"];
}


$EmailTo = "condomini@abacond.com";
$Subject = "Nuovo messaggio da form contatti Abacond";

// prepare email body text
$Body = "";
$Body .= "Nome: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Messaggio: ";
$Body .= $message;
$Body .= "\n";

$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$headers .= "From: $email \r\n";
$headers .= "Reply-To: condomini@abacond.com \r\n";
$headers .= "Return-Path: condomini@abacond.com\r\n";
$headers .= "X-Mailer: PHP \r\n";

// send email
$success = mail($EmailTo, $Subject, $Body, $headers);

// redirect to success page
if ($success && $errorMSG == ""){
    echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}
