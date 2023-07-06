function allowExpiration() {
    const checkbox = document.getElementById("gridCheck1");
    const expiration = document.getElementById("inputSinExpiration");

    if (checkbox.checked) {
        expiration.removeAttribute("disabled");
    } else {
        expiration.setAttribute("disabled", "disabled");
    }
}

function checkExpiration() {
    const date = document.getElementById("inputSinExpiration").value;
    const todayDate = new Date();
    const checkbox = document.getElementById("gridCheck1");

    if (checkbox.checked) {
        if (date !== "") {
            // Convert the input date string to a Date object
            let inputDate = new Date(date);

            // Set the time to 00:00:00 to compare only the dates
            inputDate.setHours(0, 0, 0, 0);
            todayDate.setHours(0, 0, 0, 0);

            if (inputDate.getTime() <= todayDate.getTime()) {
                event.preventDefault();
                // The input date is equal to or in the past compared to today's date
                document.getElementById("inputSinExpiration").classList.add("is-invalid");
            } else {
                // The input date is in the future
                document.getElementById("inputSinExpiration").classList.remove("is-invalid");
            }
        }
    } else {
        date = "N/A";
    }
    // console.log(date);
}

function checkedData() {
    const check = document.querySelectorAll('input[name="language"]:checked');

    let checkedData = [];
    check.forEach(function(checkbox) {
    checkedData.push(checkbox.value);
    });
    // console.log(checkedData);
}