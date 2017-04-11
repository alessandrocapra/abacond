<?php
$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $name = $_POST["name"];
}

// COGNOME
if (empty($_POST["cognome"])) {
    $errorMSG .= "Cognome is required ";
} else {
    $cognome = $_POST["cognome"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["email"];
}

// TELEFONO
if (empty($_POST["telefono"])) {
    $errorMSG .= "Telefono is required ";
} else {
    $telefono = $_POST["telefono"];
}

// NOME CONDOMINIO
if (empty($_POST["nomeCondominio"])) {
    $errorMSG .= "Nome condominio is required ";
} else {
    $nomeCondominio = $_POST["nomeCondominio"];
}

// INDIRIZZO CONDOMINIO
if (empty($_POST["indirizzoCondominio"])) {
    $errorMSG .= "Indirizzo condominio is required ";
} else {
    $indirizzoCondominio = $_POST["indirizzoCondominio"];
}

// COMUNE CONDOMINIO
if (empty($_POST["comuneCondominio"])) {
    $errorMSG .= "Comune condominio is required ";
} else {
    $comuneCondominio = $_POST["comuneCondominio"];
}

// PROVINCIA CONDOMINIO
if (empty($_POST["provinciaCondominio"])) {
    $errorMSG .= "Provincia condominio is required ";
} else {
    $provinciaCondominio = $_POST["provinciaCondominio"];
}

// UNITA CONDOMINIO
if (empty($_POST["unitaCondominio"])) {
    $errorMSG .= "Numero unità is required ";
} else {
    $unitaCondominio = $_POST["unitaCondominio"];
}

// ASCENSORI CONDOMINIO
if (empty($_POST["ascensoriCondominio"])) {
    $ascensoriCondominio = "Valore non specificato";
} else {
    $ascensoriCondominio = $_POST["ascensoriCondominio"];
}

// SCALE CONDOMINIO
if (empty($_POST["scaleCondominio"])) {
    $scaleCondominio = "Valore non specificato";
} else {
    $scaleCondominio = $_POST["scaleCondominio"];
}

// RISCALDAMENTO CONDOMINIO
//if (strcmp($_POST["riscaldamento"],"undefined")!==0) {
//    $riscaldamento = "Valore non specificato";
//} else {

    $riscaldamento = $_POST["riscaldamento"];

//}

$EmailTo = "condomini@abacond.com";
$Subject = "Nuova richiesta di preventivo - sito Abacond";

// prepare email body text
$Body = '<html><body>';
$Body .= "<h1>Nuova richiesta di preventivo da sito Abacond</h1>";
$Body .= "\n";
$Body .= "<h2>Referente</h2>";
$Body .= "<p>Nome: ";
$Body .= $name;
$Body .= "</p>";
$Body .= "\n";
$Body .= "<p>Cognome: ";
$Body .= $cognome;
$Body .= "</p>";
$Body .= "\n";
$Body .= "<p>Email: ";
$Body .= $email;
$Body .= "</p>";
$Body .= "\n";
$Body .= "<p>Telefono: ";
$Body .= $telefono;
$Body .= "</p>";
$Body .= "\n";
$Body .= "<h2>Condominio</h2>";
$Body .= "<p>Nome: ";
$Body .= $nomeCondominio;
$Body .= "</p>";
$Body .= "\n";
$Body .= "<p>Indirizzo: ";
$Body .= $indirizzoCondominio;
$Body .= "</p>";
$Body .= "\n";
$Body .= "<p>Comune: ";
$Body .= $comuneCondominio;
$Body .= "</p>";
$Body .= "\n";
$Body .= "<p>Provincia: ";
$Body .= $provinciaCondominio;
$Body .= "</p>";
$Body .= "\n";
$Body .= "<p>Numero unita': ";
$Body .= $unitaCondominio;
$Body .= "</p>";
$Body .= "\n";
$Body .= "<p>Numero ascensori: ";
$Body .= $ascensoriCondominio;
$Body .= "</p>";
$Body .= "\n";
$Body .= "<p>Numero scale: ";
$Body .= $scaleCondominio;
$Body .= "</p>";
$Body .= "\n";
$Body .= "<p>Riscaldamento centralizzato: ";
$Body .= $riscaldamento;
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
?>