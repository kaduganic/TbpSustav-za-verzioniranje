
function tablicaOstale() {
    $('#tablicaOstale').dataTable({
        "bPaginate": false,
        "bFilter": false,
        "bSort": true,
        "bInfo": false,
        "bAutoWidth": true
    });

}


$(document).ready(function () {

    if (document.title === "Moji projekti" || document.title === "Verzije") {
        tablicaOstale();
    }


});



