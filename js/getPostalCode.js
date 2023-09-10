function checkPostalCode() {
  const cad = /[A-Z][0-9][A-Z]-[0-9][A-Z][0-9]/g;
  const us = /[0-9]{5}/g;

  let code = document.getElementById("inputCountry").value;
  let zip = document.getElementById("inputPostalCode").value;
  let result;

  if (zip != "") {
    if (code == "Canada") {
      result = cad.test(zip);
    } else if (code == "United-States") {
      result = us.test(zip);
    }

    if (!result) {
      event.preventDefault();
      document.getElementById("inputPostalCode").classList.add("is-invalid");
    } else {
      document.getElementById("inputPostalCode").classList.remove("is-invalid");
    }
  }
}
