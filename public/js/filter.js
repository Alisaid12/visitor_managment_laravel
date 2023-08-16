$(document).ready(function() {
    $('#global').click(function() {
        $('#dateInput, #visiteur-fields, #responsable-fields ,#objet-visite-fields,#periode-fields').hide();
    });

    $('#date').click(function() {
        $('#global').prop('checked', false);
        $('#visiteur-fields, #responsable-fields , #objet-visite-fields,#periode-fields').hide();
        $('#dateInput').show();
    });

    $('#visiteur').click(function() {
        $('#global').prop('checked', false);
        $('#dateInput, #responsable-fields , #objet-visite-fields,#periode-fields').hide();
        $('#visiteur-fields').show();
    });

    $('#responsable').click(function() {
        $('#global').prop('checked', false);
        $('#dateInput, #visiteur-fields , #objet-visite-fields,#periode-fields').hide();
        $('#responsable-fields').show();
    });
    $('#objet_visite').click(function() {
        $('#global').prop('checked', false);
        $('#dateInput, #visiteur-fields,#responsable-fields,#periode-fields ').hide();
        $('#objet-visite-fields').show();
    });
    $('#periode').click(function() {
        $('#global').prop('checked', false);
        $('#dateInput, #objet-visite-fields,#visiteur-fields,#responsable-fields').hide();
        $('#periode-fields').show();
    });
});