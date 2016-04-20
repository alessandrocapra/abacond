<?php
/**
 * Created by PhpStorm.
 * User: ale
 * Date: 27/03/16
 * Time: 20:59
 */

$errorMSG = "";

// NOME E COGNOME
if (empty($_POST["name"])) {
    $errorMSG = "Nome e cognome sono obbligatori";
} else {
    $name = $_POST["name"];
}

// RESIDENZA
if (empty($_POST["residenza"])) {
    $errorMSG .= "La residenza è obbligatoria";
} else {
    $residenza = $_POST["residenza"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "La email è obbligatoria";
} else {
    $email = $_POST["email"];
}

// TITOLO
if (empty($_POST["titolo"])) {
    $errorMSG .= "Il titolo di studio è obbligatorio";
} else {
    $titolo = $_POST["titolo"];
}

// COMPETENZE
if (empty($_POST["competenze"])) {
    $errorMSG .= "Le competenze sono obbligatorie";
} else {
    $message = $_POST["competenze"];
}

$EmailTo = "condomini@abacond.com";
$Subject = "Nuovo messaggio da form collaboratori Abacond";

// prepare email body text
$Body = '<html><body>';
$Body .= "<h2>Nome e cognome</h2>: ";
$Body .= $name;
$Body .= "\n";
$Body .= "<h2>Residenza</h2>: ";
$Body .= "<p>";
$Body .= $residenza;
$Body .= "</p>";
$Body .= "\n";
$Body .= "<h2>Email</h2>: ";
$Body .= "<p>";
$Body .= $email;
$Body .= "</p>";
$Body .= "\n";
$Body .= "<h2>Titolo di studio</h2>: ";
$Body .= "<p>";
$Body .= $titolo;
$Body .= "</p>";
$Body .= "\n";
$Body .= "<h2>Competenze</h2>: ";
$Body .= "<p>";
$Body .= $message;
$Body .= "</p>";
$Body .= "\n";
$Body .= "</body></html>";

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
        echo "Qualcosa è andato storto :(";
    } else {
        echo $errorMSG;
    }
}
