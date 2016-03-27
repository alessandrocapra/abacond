$("#condominiForm").on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "Hai completato correttamente i campi?");
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm();
    }
});


function submitForm(){
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
        url: "php/process.php",
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

function formSuccess(){
    $("#condominiForm")[0].reset();
    submitMSG(true, "Messaggio inviato!")
}

function formError(){
    $("#condominiForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        $(this).removeClass();
    });
}

function submitMSG(valid, msg){
    if(valid){
        var msgClasses = "h3 text-center tada animated text-success";
    } else {
        var msgClasses = "h3 text-center text-danger";
    }
    $("#msgSubmitCondomini").removeClass().addClass(msgClasses).text(msg);
}