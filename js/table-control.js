$(document).ready(function () {
  // $("#emp_table").DataTable({
  //   responsive: {
  //     details: {
  //       display: $.fn.dataTable.Responsive.display.modal({
  //         header: function (row) {
  //           var data = row.data();
  //           return "Details for " + data[1];
  //         },
  //       }),
  //       renderer: $.fn.dataTable.Responsive.renderer.tableAll({
  //         tableClass: "table",
  //       }),
  //     },
  //   },
  // });

  $("#emp_table").DataTable({
    responsive: true,
    columnDefs: [
      { responsivePriority: 1, targets: 1 },
      { responsivePriority: 2, targets: -1 },
    ],
    selector: false,
  });
});
