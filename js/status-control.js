function getStatus() {
  let status = document.getElementById("flexSwitchCheckDefault").checked;
  if (status == false) {
    document.getElementById("preview").innerHTML = "Inactive";
  } else {
    document.getElementById("preview").innerHTML = "Active";
  }
}
