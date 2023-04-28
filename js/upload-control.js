const uploadButtons = document.querySelectorAll('tbody button[title="Upload"]');
uploadButtons.forEach(button => {
    button.addEventListener('click', () => {
        const uid = button.closest('tr').dataset.uid;
        console.log(uid);
        document.querySelector('#employeeUID').value = uid;
    });
});

toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-bottom-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "2000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

// $(function () {
//     $('#uploadForm').submit(function (e) {
//         e.preventDefault();

//         var form = $(this);
//         var url = form.attr('action');
//         var formData = new FormData(form[0]);

//         // $.ajax({
//         //     type: "POST",
//         //     url: url,
//         //     data: formData,
//         //     processData: false,
//         //     contentType: false,
//         //     // success: function (response) {
//         //     //     console.log(response);
//         //     //     // Display success toastr message
//         //     //     toastr.success(response.message);
//         //     //     // Reload the page
//         //     //     // location.reload();
//         //     //     setTimeout(function(){
//         //     //         location.reload();
//         //     //     }, 10000);
//         //     // },
//         //     // error: function (response) {
//         //     //     console.log(response);
//         //     //     // Display error toastr message
//         //     //     toastr.error(response.responseJSON.message);
//         //     // }
//         //     // success: function (response) {
//         //     //     var message = $(response).find('.message').text();
//         //     //     toastr.success(message);
//         //     //     setTimeout(function () {
//         //     //         location.reload();
//         //     //     }, 2000);
//         //     // },
//         //     // error: function (response) {
//         //     //     var message = $(response.responseText).find('.message').text();
//         //     //     toastr.error(message);
//         //     // }
//         //     success: function (response) {
//         //         var jsonResponse = JSON.parse(response);
//         //         if (jsonResponse.success) {
//         //             toastr.success(jsonResponse.message);
//         //         } else {
//         //             toastr.error(jsonResponse.message);
//         //         }
//         //         setTimeout(function() { location.reload(); }, 1000);
//         //     },
            
//         // });
//     });
// });
$(function () {
    $('#uploadForm').submit(function (e) {
        e.preventDefault();

        var form = $(this);
        var url = form.attr('action');
        var formData = new FormData(form[0]);

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json", // added this line to specify the response data type
            success: function (response) {
                if (response.success) {
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message);
                }
                // Reload the page
                setTimeout(function () {
                    location.reload();
                }, 3000);
            },
            error: function (xhr, status, error) {
                e.preventDefault();
                // Display error toastr message
                toastr.error('There was an error uploading the file.');
            }
        });
    });
});
