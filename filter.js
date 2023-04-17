// $(document).ready(function () {
//   $("#filter-form").submit(function (e) {
//     e.preventDefault();
//     var filter = $('input[name="filter"]:checked').val();
//     $.ajax({
//       type: "POST",
//       url: "employee/filter",
//       data: { filter: filter },
//       success: function (response) {
//         var total_employees = response.total_employees;
//         $("h1").text("Total Employees: " + total_employees);
//       },
//       error: function (xhr, status, error) {
//         console.log(xhr.responseText);
//       },
//     });
//   });
// });
$(document).ready(function () {
  $(".dropdown-item").on("click", function (event) {
    event.preventDefault();
    var filter = $(this).data("filter");

    $.ajax({
      url: "Controller/employee-controller.php",
      method: "POST",
      data: { filter: filter },
      success: function (response) {
        $("#employee-count").html(response);
      },
    });
  });
});
