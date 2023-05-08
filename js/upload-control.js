// get the row id and employee UID
// const uploadButtons = document.querySelectorAll('tbody button[title="Upload"]');
// uploadButtons.forEach(button => {
//     button.addEventListener('click', () => {
//         const uid = button.closest('tr').dataset.uid;
//         console.log(uid);
//         document.querySelector('#employeeUID').value = uid;
//     });
// });
if (window.location.href.includes('table-file-manager.php')) {
    // Upload file using the button on each rows
    const uploadButtons = document.querySelectorAll('tbody button[title="Upload"]');
    uploadButtons.forEach(button => {
        button.addEventListener('click', () => {
            const uid = button.closest('tr').dataset.uid;
            console.log(uid);
            document.querySelector('#employeeUID').value = uid;
            // check if employeeUID is not set
            if (!document.querySelector('#employeeUID').value) {
                // get employeeUID from URL
                const searchParams = new URLSearchParams(window.location.search);
                const employeeUID = searchParams.get('employee_UID');
                console.log(employeeUID);
                document.querySelector('#employeeUID').value = employeeUID;
            }
        });
    });
}

if (window.location.href.includes('table-file.php')) {
    // Single upload button in the table-file.php 
    const uploadButton = document.querySelector('button[name="SingleUpload"]');
    if (uploadButton) { // check if button exists on the page
        uploadButton.addEventListener('click', () => {
            const searchParams = new URLSearchParams(window.location.search);
            const employeeUID = searchParams.get('employee_UID');
            console.log(employeeUID);
            document.querySelector('#employeeUID').value = employeeUID;
        });
    }
}

// toastr message options
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
                $('#uploadModal').modal('hide');
                if (response.success) {
                    toastr.success(response.message);
                } else {
                    toastr.warning(response.message);
                }
                // Reload the page
                setTimeout(function () {
                    location.reload();
                }, 3000);
            },
            error: function (xhr, status, error) {
                // Display error toastr message
                toastr.error('There was an error uploading the file.');
                // Reload the page
                setTimeout(function () {
                    location.reload();
                }, 3000);
            }
        });
    });
});
