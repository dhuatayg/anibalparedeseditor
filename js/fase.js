var controlador_fase = "fase/";
var boton = "#boton_multiuso";
var modal_fase = "#modal_fase";

function limpiar_fase() {
	$("#fase_nombre").val("");
    $("#fase_descripcion").val("");
    $("#area_id").val("1");
	$("#estado_id").val("1");
}

function nuevo_fase() {
	let cabecera = "#msg_cabecera";
	let codigo = "#fase_codigo";
	let inicial_codigo = "FAS";
	let mensaje = "NUEVA FASE";
	limpiar_fase();
	$(boton).attr("disabled", false);
	$.ajax({
		url: baseurl + controlador_fase + "filas",
		type: "POST",
		dataType: "JSON",
		success: function (data) {
			final_codigo = data + 1;
			if (final_codigo <= 9) {
				$(codigo).val(inicial_codigo + "-00000" + final_codigo);
			} else if (final_codigo > 9 && final_codigo <= 99) {
				$(codigo).val(inicial_codigo + "-0000" + final_codigo);
			} else if (final_codigo > 99 && final_codigo <= 999) {
				$(codigo).val(inicial_codigo + "-000" + final_codigo);
			} else if (final_codigo > 999 && final_codigo <= 9999) {
				$(codigo).val(inicial_codigo + "-00" + final_codigo);
			} else if (final_codigo > 9999 && final_codigo <= 99999) {
				$(codigo).val(inicial_codigo + "-0" + final_codigo);
			} else {
				$(codigo).val(inicial_codigo + "-" + final_codigo);
			}
			$(modal_fase).unbind();
			$(modal_fase).modal({ backdrop: "static", keyboard: false });
			$(modal_fase).modal("show");
			$(boton).attr("onclick", "guardar_fase()");
			$(cabecera).html(mensaje);
			$(boton).html("<i class='fa fa-check'></i>&nbsp;GUARDAR");
		},
	});
}

function guardar_fase() {
	var fase_codigo = $("#fase_codigo").val();
	var fase_nombre = $("#fase_nombre").val();
    var fase_descripcion = $("#fase_descripcion").val();
    var area_id = $("#area_id").val();
	var estado_id = $("#estado_id").val();
	if (validacion(fase_nombre, "#fase_nombre") == false) 
		console.log("fase_nombre");
	else if (validacion(fase_descripcion, "#fase_descripcion") == false) 
        console.log("fase_descripcion");
	else {
		$(boton).attr("disabled", true);
		var dataString =
			"fase_codigo=" +
			fase_codigo +
			"&fase_nombre=" +
			fase_nombre +
			"&fase_descripcion=" +
            fase_descripcion +
            "&area_id=" +
            area_id +
			"&estado_id=" +
			estado_id;
		console.log(dataString);
		$.ajax({
			type: "POST",
			url: baseurl + controlador_fase + "guardar",
			data: dataString,
			cache: false,
			success: function (result) {
				var resultado = $.trim(result);
				if (resultado == "true") {
					$(modal_fase).modal("hide");
					swal("Registrado!", "Se guardo correctamente.", "success");
					location.href = baseurl + controlador_fase;
				} else {
					alert("Error!" + result);
				}
			},
			error: function (result) {
				console.log(result);
			},
		});
	}
}

function cambiar_fase(id) {
	let cabecera = "#msg_cabecera";
	let mensaje = "EDITAR ÁREA";
	limpiar_fase();
	$.ajax({
		url: baseurl + controlador_fase + "obtener",
		type: "POST",
		data: { id: id },
		dataType: "JSON",
		success: function (data) {
			$(boton).attr("disabled", false);
			$("#fase_codigo").val(data[0]["fase_codigo"]);
			$("#fase_nombre").val(data[0]["fase_nombre"]);
            $("#fase_descripcion").val(data[0]["fase_descripcion"]);
            $("#area_id").val(data[0]["area_id"]);
			$("#estado_id").val(data[0]["estado_id"]);
			$(modal_fase).modal({ backdrop: "static", keyboard: false });
			$(modal_fase).modal("show");
			$(boton).attr("onclick", "modificar_fase(" + id + ")");
			$(cabecera).html(mensaje + "#" + id);
			$(boton).html("<i class='fa fa-check'></i>&nbsp;ACTUALIZAR");
		},
	});
}

function modificar_fase(id) {
	var fase_codigo = $("#fase_codigo").val();
	var fase_nombre = $("#fase_nombre").val();
    var fase_descripcion = $("#fase_descripcion").val();
    var area_id = $("#area_id").val();
	var estado_id = $("#estado_id").val();
	if (validacion(fase_nombre, "#fase_nombre") == false) 
		console.log("fase_nombre");
	else if (validacion(fase_descripcion, "#fase_descripcion") == false) 
        console.log("fase_descripcion");
	else {
		$(boton).attr("disabled", true);
		var dataString =
			"fase_codigo=" +
			fase_codigo +
			"&fase_nombre=" +
			fase_nombre +
			"&fase_descripcion=" +
            fase_descripcion +
            "&area_id=" +
            area_id +
			"&estado_id=" +
			estado_id +
			"&id=" +
			id;
		$.ajax({
			type: "POST",
			url: baseurl + controlador_fase + "modificar",
			data: dataString,
			cache: false,
			success: function (result) {
				console.log(result);
				var resultado = $.trim(result);
				if (resultado == "true") {
					$(modal_fase).modal("hide");
					swal("Registrado!", "Tu registro ha sido actualizado.", "success");
					location.href = baseurl + controlador_fase;
				} else {
					alert("Error!" + result);
				}
			},
			error: function (result) {},
		});
	}
}

function quitar_fase(id) {
	swal(
		{
			title: "Estás seguro?",
			text: "No podrás recuperar este registro!",
			type: "warning",
			showCancelButton: true,
			confirmButtonClass: "btn-danger",
			confirmButtonText: "Sí, eliminarlo!",
			cancelButtonText: "No, cancelar!",
			closeOnConfirm: false,
			closeOnCancel: false,
		},
		function (isConfirm) {
			if (isConfirm) {
				$.ajax({
					type: "POST",
					url: baseurl + controlador_fase + "eliminar",
					data: { id: id },
					cache: false,
					success: function (result) {
						var resultado = $.trim(result);
						if (resultado == "true") {
							swal("Eliminado!", "Tu registro ha sido eliminado.", "success");
							location.href = baseurl + controlador_fase;
						} else {
							alert("Error!" + result);
						}
					},
					error: function (result) {},
				});
			} else {
				swal("Cancelado", "Tu registro esta a salvo :)", "error");
			}
		}
	);
}
