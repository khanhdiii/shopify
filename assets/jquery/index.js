var table;
function initTableData() {
  table = $("#table_id").DataTable({
    processing: true,
    columns: [
      { data: "Id_supplier " },
      { data: "Supplier_Name" },
      { data: "Description" },
      { data: "PhoneNumber" },
      { data: "Email" },
      { data: "Address" },
    ],
  });
}
$(document).ready(function () {
  initTableData();
  $("#list-header").on({
    mouseenter: function () {
      $(this).css("background-color", "lightgray");
    },
    mouseleave: function () {
      $(this).css("background-color", "lightblue");
    },
  });
});
