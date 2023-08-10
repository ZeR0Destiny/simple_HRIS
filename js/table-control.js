$(document).ready(function () {
  $("#emp_table, #emp_file_table, #file_table").DataTable({
    responsive: {
      details: {
        type: "column",
        target: "tr",
      },
    },
  });

  var table = $("#emp_table").DataTable();
  var table2 = $("#emp_file_table").DataTable();
  var table3 = $("#file_table").DataTable();

  var table4 = $("#file_table_benefit").DataTable();
  var table5 = $("#file_table_medical").DataTable();
  var table6 = $("#file_table_discipline").DataTable();
  var table7 = $("#file_table_hiring").DataTable();
  var table8 = $("#file_table_immigration").DataTable();
  var table9 = $("#file_table_investigation").DataTable();
  var table8 = $("#file_table_personal").DataTable();
  var table8 = $("#file_table_training").DataTable();
  var table9 = $("#file_table_unclassified").DataTable();
  var table8 = $("#file_table_work").DataTable();

  $("#emp_table tbody").on("click mouseover", "tr", function () {
    var data = table.row(this).data();

    $("button").unbind("click");
    $("button").click(function () {
      if (Array.isArray(data)) {
        id_emp = data[0];
      }
      console.log(id_emp);

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
