$(document).ready(function () {
    // Initialize DataTables for all tables
    var tables = {
        home: $("#home_table"),
        benefit: $("#benefit_table"),
        medical: $("#medical_table"),
        discipline: $("#discipline_table"),
        hiring: $("#hiring_table"),
        immigration: $("#immigration_table"),
        investigation: $("#investigation_table"),
        personal: $("#personal_table"),
        training: $("#training_table"),
        unclassified: $("#unclassified_table"),
        work: $("#work_table"),
    };

    tables.home.DataTable({
        responsive: {
            details: {
                type: "column",
                target: "tr",
            },
        },
    });


    // Function to initialize DataTable for a given table ID
    function initializeDataTable(tableId) {
        if (tables[tableId] && !$.fn.dataTable.isDataTable(tables[tableId])) {
            tables[tableId].DataTable({
                responsive: {
                    details: {
                        type: "column",
                        target: "tr",
                    },
                },
            });
        }
    }

    // Handle tab button clicks
    $('button[data-bs-toggle="tab"]').on("shown.bs.tab", function (e) {
        var targetTab = $(e.target).data("bs-target");
        var targetTableId = targetTab.substring(1); // Remove the "#" from the tab ID
        initializeDataTable(targetTableId); // Initialize the DataTable for the target tab
    });
});
