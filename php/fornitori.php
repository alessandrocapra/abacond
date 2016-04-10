<?php
$errorMSG = "";

// NOME SOCIETA'
if (empty($_POST["nomeSocieta"])) {
    $errorMSG = "Il nome società è obbligatorio";
} else {
    $nomeSocieta = $_POST["nomeSocieta"];
}

// REFERENTE
if (empty($_POST["referente"])) {
    $referente = "-";
} else {
    $referente = $_POST["referente"];
}

// INDIRIZZO
if (empty($_POST["indirizzoSocieta"])) {
    $indirizzoSocieta = "-";
} else {
    $indirizzoSocieta = $_POST["indirizzoSocieta"];
}

// CAP
if (empty($_POST["cap"])) {
    $cap = "-";
} else {
    $cap = $_POST["cap"];
}

// COMUNE
if (empty($_POST["comuneSocieta"])) {
    $comuneSocieta = "-";
} else {
    $comuneSocieta = $_POST["comuneSocieta"];
}

// PROVINCIA
if (empty($_POST["provinciaSocieta"])) {
    $provinciaSocieta = "-";
} else {
    $provinciaSocieta = $_POST["provinciaSocieta"];
}

// EMAIL SOCIETA'
if (empty($_POST["emailSocieta"])) {
    $errorMSG .= "L'email è obbligatoria";
} else {
    $emailSocieta = $_POST["emailSocieta"];
}

// TELEFONO
if (empty($_POST["telefonoSocieta"])) {
    $errorMSG .= "Il numero di telefono è obbligatorio";
} else {
    $telefonoSocieta = $_POST["telefonoSocieta"];
}

// FAX
if (empty($_POST["faxSocieta"])) {
    $faxSocieta = "-";
} else {
    $faxSocieta = $_POST["unitaCondominio"];
}

// ZONA
if (empty($_POST["zona"])) {
    $zona = "-";
} else {
    $zona = $_POST["zona"];
}

// ATTIVITA' SVOLTE
if (empty($_POST["attivita"])) {
    $errorMSG .= "E' obbligatorio specificare le attività svolte";
} else {
    $attivita = $_POST["attivita"];
}

$EmailTo = "condomini@abacond.com";
$Subject = "Nuovo fornitore da sito Abacond";

// prepare email body text
$Body = '<html><body>';
$Body .= "<h1>Nuovo fornitore da sito Abacond</h1>";
$Body .= "\n";
$Body .= "<p>Nome Società: ";
$Body .= $nomeSocieta;
$Body .= "</p>";
$Body .= "\n";
$Body .= "<p>Referente: ";
$Body .= $referente;
$Body .= "</p>";
$Body .= "\n";
$Body .= "<p>Indirizzo: ";
$Body .= $indirizzoSocieta;
$Body .= "</p>";
$Body .= "\n";
$Body .= "<p>CAP: ";
$Body .= $cap;
$Body .= "</p>";
$Body .= "\n";
$Body .= "<p>Comune: ";
$Body .= $comuneSocieta;
$Body .= "</p>";
$Body .= "\n";
$Body .= "<p>Provincia: ";
$Body .= $provinciaSocieta;
$Body .= "</p>";
$Body .= "\n";
$Body .= "<p>Email: ";
$Body .= $emailSocieta;
$Body .= "</p>";
$Body .= "\n";
$Body .= "<p>Telefono: ";
$Body .= $telefonoSocieta;
$Body .= "</p>";
$Body .= "\n";
$Body .= "<p>Fax: ";
$Body .= $faxSocieta;
$Body .= "</p>";
$Body .= "\n";
$Body .= "<p>zona: ";
$Body .= $zona;
$Body .= "</p>";
$Body .= "\n";
$Body .= "<p>Attività svolte: ";
$Body .= $attivita;
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