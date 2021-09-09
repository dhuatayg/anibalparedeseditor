var tabla;
var tabla_nombre = "#tabla";

$(document).ready(function () {
	$(function () {
		tabla = $(tabla_nombre).DataTable({
			dom:
				"<'row'<'col-sm-6'B><'col-sm-6'f>>" +
				"<'row'<'col-sm-12'tr>>" +
				"<'row'<'col-sm-4'i><'col-sm-8'p>>",
			buttons: [
				{
					extend: "pdfHtml5",
					orientation: "portrait",
					pageSize: "A4",
				},
				{
					extend: "excelHtml5",
					customize: function (xlsx) {
						var sheet = xlsx.xl.worksheets["sheet1.xml"];
						$('row c[r*="1"]', sheet).attr("s", "47");
						$('row c[r*="2"]', sheet).attr("s", "42");
					},
				},
			],
			language: {
				processing: "Procesando...",
				lengthMenu: "Mostrar _MENU_ registros",
				zeroRecords: "No se encontraron resultados",
				emptyTable: "Ningún dato disponible en esta tabla",
				info:
					"Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
				infoFiltered: "(filtrado de un total de _MAX_ registros)",
				infoPostFix: "",
				search: "Buscar:",
				url: "",
				infoThousands: ",",
				loadingRecords: "Cargando...",
				paginate: {
					first: "Primero",
					last: "Último",
					next: "Siguiente",
					previous: "Anterior",
				},
			},
		});

		$(".buttons-pdf").hide();
		$("#btn_pdf").click(function () {
			$(".buttons-pdf").click();
		});

		$(".buttons-excel").hide();
		$("#btn_excel").click(function () {
			$(".buttons-excel").click();
		});

		$(".search-input-text").on("keyup click", function () {
			var i = $(this).attr("data-column");
			var v = $(this).val();
			tabla.columns(i).search(v).draw();
		});

		$(".search-input-select").on("change", function () {
			var i = $(this).attr("data-column");
			var v = $(this).val();
			tabla.columns(i).search(v).draw();
		});
	});
});

$(".mayusculas").click(function () {
	$(".mayusculas").keyup(function () {
		this.value = this.value.toUpperCase();
	});
});

function validacion(campo, valor) {
	if ($.trim(campo) == "" || $.trim(campo) == null) {
		$(valor).css("border", "1px solid red");
		$(valor).focus();
		return false;
	}
}
