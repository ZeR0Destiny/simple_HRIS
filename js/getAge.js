function getAge() {
  let today_date = new Date();

  let dob = document.getElementById("inputDob").value;
  let today_date2 = new Date(dob);

  let milisec_diff = today_date - today_date2;
  let age = Math.ceil(milisec_diff / (1000 * 60 * 60 * 24 * 365));

  if (age < 16) {
    document.getElementById("inputDob").classList.add("is-invalid");
    event.preventDefault();
  } else {
    document.getElementById("inputDob").classList.remove("is-invalid");
  }
}
