$(document).ready(function() {

    $('.modal').modal();
    $('#backButton').on('click', function() {
        window.history.back();
    });
});