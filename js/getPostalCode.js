function getPostalcode() {
  const cad = /[a-zA-Z][0-9][a-zA-Z]-[0-9][a-zA-Z][0-9]/g;
  const us = /[0-9]{5}/g;

  let code = document.getElementById("inputCountry").value;
  let zip = document.getElementById("inputPostalcode").value;
  let result;

  if (zip != "") {
    if (code == "Canada") {
      result = cad.test(zip);
    } else if (code == "United-States") {
      result = us.test(zip);
    }

    if (!result) {
      document.getElementById("inputPostalcode").classList.add("is-invalid");
      event.preventDefault();
    } else {
      document.getElementById("inputPostalcode").classList.remove("is-invalid");
    }
  }
}
