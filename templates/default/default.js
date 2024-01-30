$(document).ready(function() {

    $('.modal').modal();
    $('#backButton').on('click', function() {
        window.history.back();
    });

    $('#publish').on('click', function() {
        event.preventDefault();
        var formStatus = new FormData();
        formStatus.append('userId', 1); 
        formStatus.append('status', 1); 
        formStatus.append('action', "setStatus");

        $.ajax({
            url: '../../src/Devfolio/Create/Status.php',
            type: 'POST',
            processData: false,
            contentType: false,
            data: formStatus,
            success: function(data) {
                let statusMsg = "Your Devfolio project is published!";
                location.href = "dashboard.php?statusMsg="+statusMsg;
                console.log("visualization to dashboard");
                
            },
            error: function(error) {
                console.log("Publish button not good!")
            }
        });
    });
});