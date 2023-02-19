$(document).ready(function () {
  $("#emp_table").DataTable({
    responsive: {
      details: {
        type: "column",
        target: "tr",
      },
    },
  });

  var table = $("#emp_table").DataTable();

  $("#emp_table tbody").on("click mouseover", "tr", function () {
    var data = table.row(this).data();
    $("#id_button").click(function () {
      id_emp = data[0];
      $.ajax({
        url: "emp_info.php",
        type: "post",
        data: {
          emp_id: id_emp,
        },
        success: function (get_employee) {
          $(".modal-body").html(get_employee);
          $("#exampleModal").modal("show");
        },
      });
    });
  });
});
