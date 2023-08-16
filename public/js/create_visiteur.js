var objet_visite = document.getElementById("objet_visite");
var rendezvous_type = document.getElementById("rendezvous_type");;
var document_administratifs_type = document.getElementById("document_administratifs_type");
var guichets_type = document.getElementById("guichets_type");
var demande_information = document.getElementById("demande_information_type");
var autres = document.getElementById("autres");

objet_visite.addEventListener("change", function() {
    if (objet_visite.value === "Rendez-vous") {
        rendezvous_type.style.display = "block";
    } else {
        rendezvous_type.style.display = "none";
    }
    if (objet_visite.value === "Document-administratifs") {
        document_administratifs_type.style.display = "block";
    } else {
        document_administratifs_type.style.display = "none";
    }
    if (objet_visite.value === "Guichets") {
        guichets_type.style.display = "block"
    } else {
        guichets_type.style.display = "none"
    }
    if (objet_visite.value === "demande_information") {
        demande_information.style.display = "block";
    } else {
        demande_information.style.display = "none";
    }
    if (objet_visite.value === "autres") {
        autres.style.display = "block";
    } else {
        autres.style.display = "none";
    }

});
const autresInput = document.querySelector("#autresInput");
const autresRadio = document.querySelector("#autresRadio");

autresInput.addEventListener("change", () => {
    autresRadio.value = `Autre à préciser : ${autresInput.value}`;
});

function toggleAutresInput() {
    autresInput.disabled = !autresInput;
    if (!autresInput.disabled) {
        autresInput.focus();
    }
}
const demandeInformationInput = document.querySelector("#demandeInformationInput");
const demandeInformationRadio = document.querySelector("#demandeInformationRadio");

function toggleDemandeInformationInput() {
    demandeInformationInput.disabled = !demandeInformationInput;
    if (!demandeInformationInput.disabled) {
        demandeInformationInput.focus();
    }
}
demandeInformationInput.addEventListener("change", () => {
    demandeInformationRadio.value = `Demande d'informations : ${demandeInformationInput.value}`;
});
$(document).ready(function() {


    $('#demandeInformationRadio').click(function() {
        // $('#global').prop('checked', false);
        $('#aute_input')
            .hide();
        $('#demende_input').show();
    });

    $('#autresRadio').click(function() {
        // $('#global').prop('checked', false);
        $('#demende_input').hide();
        $('#aute_input').show();
    });
    $('#Accompagnement').click(function() {
        // $('#global').prop('checked', false);
        $('#aute_input,#demende_input').hide();

    });
    $('#Annuaire').click(function() {
        // $('#global').prop('checked', false);
        $('#aute_input,#demende_input').hide();

    });
    $('#Reservation').click(function() {
        // $('#global').prop('checked', false);
        $('#aute_input,#demende_input').hide();

    });
    $('#guichets_type').click(function() {
        // $('#global').prop('checked', false);
        $('#aute_input,#demende_input').hide();

    });
    $('#document_administratifs_type').click(function() {
        // $('#global').prop('checked', false);
        $('#aute_input,#demende_input').hide();

    });
    $('#rendezvous_type').click(function() {
        // $('#global').prop('checked', false);
        $('#aute_input,#demende_input').hide();

    });


});