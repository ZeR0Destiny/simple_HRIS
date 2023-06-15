function checkAge() {
  // let todayDate = new Date();

  // let dob = document.getElementById("inputDob").value;
  // let todayDate2 = new Date(dob);

  // let milisec_diff = todayDate - todayDate2;
  // let age = Math.floor(milisec_diff / (1000 * 60 * 60 * 24 * 365));

  // if (age < 16) {
  //   event.preventDefault();
  //   document.getElementById("inputDob").classList.add("is-invalid");
  // } else {
  //   document.getElementById("inputDob").classList.remove("is-invalid");
  // }

  let dob = document.getElementById("inputDob").value;
  let todayDate = new Date();
  todayDate.setHours(0, 0, 0, 0); // Set time to 0

  let dobDate = new Date(dob);
  dobDate.setHours(0, 0, 0, 0); // Set time to 0

  let age = todayDate.getFullYear() - dobDate.getFullYear();
  let monthDiff = todayDate.getMonth() - dobDate.getMonth();

  // Check if the current month is earlier than the birth month,
  // or if it's the same month but the current day is earlier than the birth day
  if (monthDiff < 0 || (monthDiff === 0 && todayDate.getDate() < dobDate.getDate())) {
    age--;
  }

  if (age < 16) {
    event.preventDefault();
    document.getElementById("inputDob").classList.add("is-invalid");
  } else {
    document.getElementById("inputDob").classList.remove("is-invalid");
  }

}
