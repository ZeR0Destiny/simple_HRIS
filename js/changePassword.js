$(document).ready(function () {
    $('.editbtn').click(function () {
        var userId = $(this).attr('id');
        $('#userId').val(userId);
    });

    $('#changePassForm').submit(function (event) {
        // event.preventDefault(); // Prevent the default form submission.

        // Capture the new password input
        var newPassword = $('#changePassword').val();

        // Get the user ID from the hidden input
        var userId = $('#userId').val();

        // Send the data to the server using AJAX
        $.ajax({
            type: 'POST',
            url: 'Controller/account-controller.php', // Replace with the actual URL of your server-side script.
            data: {
                userId: userId,
                changePassword: newPassword
            },
            success: function (response) {
                // Handle the response from the server (if needed).
            },
            error: function (xhr, status, error) {
                // Handle AJAX error (if needed).
            }
        });
    });
});