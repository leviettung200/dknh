$(document).ready(function() {
    $("#datatable").DataTable();
    var a = $("#datatable-buttons").DataTable({
        // lengthChange: !1,
        buttons: ["excel"]
    });
    $("#key-table").DataTable({
        keys: !0
    }), $("#responsive-datatable").DataTable(), $("#selection-datatable").DataTable({
        select: {
            style: "multi"
        }
    }), a.buttons().container().appendTo(".page-title-right:eq(0)")
});
