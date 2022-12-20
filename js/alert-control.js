$(document).ready(function () {
  $("#alert-danger")
    .fadeTo(3000, 1)
    .slideUp(1000, function () {
      $("#alert-danger").alert("close");
    });

  $("#alert-success")
    .fadeTo(3000, 1)
    .slideUp(1000, function () {
      $("#alert-success").alert("close");
    });
});
