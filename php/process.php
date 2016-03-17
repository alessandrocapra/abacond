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
    $telefono = $_POST["message"];
}

// NOME CONDOMINIO
if (empty($_POST["nomeCondominio"])) {
    $errorMSG .= "Message is required ";
} else {
    $nomeCondominio = $_POST["nomeCondominio"];
}

// INDIRIZZO CONDOMINIO
if (empty($_POST["indirizzoCondominio"])) {
    $errorMSG .= "Message is required ";
} else {
    $indirizzoCondominio = $_POST["indirizzoCondominio"];
}

// COMUNE CONDOMINIO
if (empty($_POST["comuneCondominio"])) {
    $errorMSG .= "Message is required ";
} else {
    $comuneCondominio = $_POST["comuneCondominio"];
}

// PROVINCIA CONDOMINIO
if (empty($_POST["provinciaCondominio"])) {
    $errorMSG .= "Message is required ";
} else {
    $provinciaCondominio = $_POST["provinciaCondominio"];
}

// UNITA CONDOMINIO
if (empty($_POST["unitaCondominio"])) {
    $errorMSG .= "Message is required ";
} else {
    $unitaCondominio = $_POST["unitaCondominio"];
}

// ASCENSORI CONDOMINIO
if (empty($_POST["ascensoriCondominio"])) {
    $errorMSG .= "Message is required ";
} else {
    $ascensoriCondominio = $_POST["ascensoriCondominio"];
}

// SCALE CONDOMINIO
if (empty($_POST["scaleCondominio"])) {
    $errorMSG .= "Message is required ";
} else {
    $scaleCondominio = $_POST["scaleCondominio"];
}

// RISCALDAMENTO CONDOMINIO
if (empty($_POST["riscaldamento"])) {
    $errorMSG .= "Message is required ";
} else {
    $riscaldamento = $_POST["riscaldamento"];
}

$EmailTo = "alessandrocpr@gmail.com";
$Subject = "Nuova richiesta di preventivo - condominio";

// prepare email body text
$Body = "REFERENTE";
$Body .= "\n";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Cognome: ";
$Body .= $cognome;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Telefono: ";
$Body .= $telefono;
$Body .= "\n";
$Body .= "\n";
$Body = "CONDOMINIO";
$Body .= "\n";
$Body .= "\n";
$Body .= "Nome: ";
$Body .= $nomeCondominio;
$Body .= "\n";
$Body .= "Indirizzo: ";
$Body .= $indirizzoCondominio;
$Body .= "\n";
$Body .= "Comune: ";
$Body .= $comuneCondominio;
$Body .= "\n";
$Body .= "Provincia: ";
$Body .= $provinciaCondominio;
$Body .= "\n";
$Body .= "Numero unità: ";
$Body .= $unitaCondominio;
$Body .= "\n";
$Body .= "Numero ascensori: ";
$Body .= $ascensoriCondominio;
$Body .= "\n";
$Body .= "Numero scale: ";
$Body .= $scaleCondominio;
$Body .= "\n";
$Body .= "Riscaldamento centralizzato: ";
$Body .= $riscaldamento;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);
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