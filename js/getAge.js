function getAge() {
  let today_date = new Date();

  let dob = document.getElementById("inputDob").value;
  let today_date2 = new Date(dob);

  let milisec_diff = today_date - today_date2;
  let age = Math.floor(milisec_diff / (1000 * 60 * 60 * 24 * 365));

  if (age < 16) {
    event.preventDefault();
    document.getElementById("inputDob").classList.add("is-invalid");
  } else {
    document.getElementById("inputDob").classList.remove("is-invalid");
  }
}
