$(document).ready(function () {
  $("#emp_table").DataTable({
    responsive: true,
    columnDefs: [
      {
        responsivePriority: 1,
        targets: 0,
      },
      {
        responsivePriority: 2,
        targets: -1,
      },
    ],
    select: true,
  });

  var table = document.getElementById("emp_table"),
    rIndex;

  // table rows
  for (var i = 1; i < table.rows.length; i++) {
    // row cells
    // for (var j = 0; j < table.rows[i].cells.length; j++) {
    table.rows[i].onclick = function () {
      rIndex = this.rowIndex;
      // cIndex = this.cellIndex + 1;
      // console.log("Row : " + rIndex + " , Cell : " + cIndex);
      console.log("Row : " + rIndex);
    };
    // }
  }
});
