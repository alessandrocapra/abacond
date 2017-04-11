// Hide the spinner
$('.spinner').hide();

// FORM CONTATTI
$("#contactForm").validator().on("submit", function (event) {
    $('.spinner').show();
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "Hai completato correttamente il form?");
    } else {
        // everything looks good!
        event.preventDefault();
        submitFormContatti();
    }
});

function submitFormContatti(){
    // Initiate Variables With Form Content
    var name = $("#name").val();
    var email = $("#email").val();
    var message = $("#message").val();

    $.ajax({
        type: "POST",
        url: "../php/contatti.php",
        data: "name=" + name + "&email=" + email + "&message=" + message,
        success : function(text){
            if (text == "success"){
                formSuccess();
            } else {
                formError();
                submitMSG(false,text);
            }
        }
    });
}

// CODICE PER FORM PREVENTIVI
$("#condominiForm").on("submit", function (event) {
    $('.spinner').show();
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "Hai completato correttamente i campi?");
    } else {
        // everything looks good!
        event.preventDefault();
        submitFormPreventivi();
    }
});


function submitFormPreventivi(){
    // Initiate Variables With Form Content
    var name = $("#name").val();
    var cognome = $("#cognome").val();
    var email = $("#email").val();
    var telefono = $("#telefono").val();
    var nomeCondominio = $("#nomeCondominio").val();
    var indirizzoCondominio = $("#indirizzoCondominio").val();
    var comuneCondominio = $("#comuneCondominio").val();
    var provinciaCondominio = $("#provinciaCondominio").val();
    var unitaCondominio = $("#unitaCondominio").val();
    var ascensoriCondominio = $("#ascensoriCondominio").val();
    var scaleCondominio = $("#scaleCondominio").val();
    var riscaldamento = $("input[name=riscaldamento]:checked").val();

    $.ajax({
        type: "POST",
        url: "../php/process.php",
        data: "name=" + name + "&cognome=" + cognome + "&email=" + email + "&telefono=" + telefono + "&nomeCondominio=" + nomeCondominio + "&indirizzoCondominio=" + indirizzoCondominio + "&comuneCondominio=" + comuneCondominio + "&provinciaCondominio=" + provinciaCondominio + "&unitaCondominio=" + unitaCondominio + "&ascensoriCondominio=" + ascensoriCondominio + "&scaleCondominio=" + scaleCondominio + "&riscaldamento=" + riscaldamento,
        success : function(text){
            if (text == "success"){
                formSuccess();
            } else {
                formError();
                submitMSG(false,text);
            }
        }
    });
}

// FORM FORNITORI
$("#fornitoriForm").on("submit", function (event) {
    $('.spinner').show();
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "Hai completato correttamente il form?");
    } else {
        // everything looks good!
        event.preventDefault();
        submitFormFornitori();
    }
});

function submitFormFornitori(){
    // Initiate Variables With Form Content
    var nomeSocieta = $("#nomeSocieta").val();
    var referente = $("#referente").val();
    var indirizzoSocieta = $("#indirizzoSocieta").val();
    var cap = $("#cap").val();
    var comuneSocieta = $("#comuneSocieta").val();
    var provinciaSocieta = $("#provinciaSocieta").val();
    var emailSocieta = $("#emailSocieta").val();
    var telefonoSocieta = $("#telefonoSocieta").val();
    var faxSocieta = $("#faxSocieta").val();
    var zona = $('input[type=checkbox]:checked').val();
    var attivita = $('#attivita').val();

    $.ajax({
        type: "POST",
        url: "../php/fornitori.php",
        data: "nomeSocieta=" + nomeSocieta + "&referente=" + referente + "&indirizzoSocieta=" + indirizzoSocieta + "&cap=" + cap + "&comuneSocieta=" + comuneSocieta + "&provinciaSocieta=" + provinciaSocieta + "&emailSocieta=" + emailSocieta + "&telefonoSocieta=" + telefonoSocieta + "&faxSocieta=" + faxSocieta + "&zona=" + zona + "&attivita=" + attivita,
        success : function(text){
            if (text == "success"){
                formSuccess();
            } else {
                formError();
                submitMSG(false,text);
            }
        }
    });
}

// FORM COLLABORATORI
$("#collaboratoriForm").validator().on("submit", function (event) {
    $('.spinner').show();
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "Hai completato correttamente il form?");
    } else {
        // everything looks good!
        event.preventDefault();
        submitFormCollaboratori();
    }
});

function submitFormCollaboratori(){
    // Initiate Variables With Form Content
    var name = $("#name").val();
    var residenza = $("#residenza").val();
    var email = $("#email").val();
    var titolo = $("#titolo").val();
    var competenze = $("#competenze").val();

    $.ajax({
        type: "POST",
        url: "../php/collaboratori.php",
        data: "name=" + name + "&residenza=" + residenza + "&email=" + email + "&titolo=" + titolo + "&competenze=" + competenze,
        success : function(text){
            if (text == "success"){
                formSuccess();
            } else {
                formError();
                submitMSG(false,text);
            }
        }
    });
}

function formSuccess(){
    $("#condominiForm,#contactForm,#fornitoriForm,#collaboratoriForm")[0].reset();
    $('.spinner').hide();

    submitMSG(true, "Messaggio inviato!")
}

function formError(){
    $('.spinner').hide();
    $("#condominiForm,#contactForm,#fornitoriForm,#collaboratoriForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        $(this).removeClass();
    });
}

function submitMSG(valid, msg){
    if(valid){
        var msgClasses = "h3 text-center tada animated text-success";
    } else {
        var msgClasses = "h3 text-center text-danger";
    }
    $("#msgSubmitCondomini,#msgSubmit,#msgSubmitFornitori,#msgSubmitCollaboratori").removeClass().addClass(msgClasses).text(msg);
}