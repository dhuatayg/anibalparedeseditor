var controlador_estado = "estado/";
var boton = "#boton_multiuso";
var modal_estado = "#modal_estado";

function limpiar_estado() {
	$("#estado_nombre").val("");
	$("#estado_descripcion").val("");
	$("#estado_ind").val("1");
}

function nuevo_estado() {
	let cabecera = "#msg_cabecera";
	let codigo = "#estado_codigo";
	let inicial_codigo = "EST";
	let mensaje = "NUEVO ESTADO";
	limpiar_rol();
	$(boton).attr("disabled", false);
	$.ajax({
		url: baseurl + controlador_estado + "filas",
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
			$(modal_estado).unbind();
			$(modal_estado).modal({ backdrop: "static", keyboard: false });
			$(modal_estado).modal("show");
			$(boton).attr("onclick", "guardar_estado()");
			$(cabecera).html(mensaje);
			$(boton).html("<i class='fa fa-check'></i>&nbsp;GUARDAR");
		},
	});
}

function guardar_estado() {
	var estado_codigo = $("#estado_codigo").val();
	var estado_nombre = $("#estado_nombre").val();
	var estado_descripcion = $("#estado_descripcion").val();
	var estado_ind = $("#estado_ind").val();
	console.log(estado_codigo, estado_descripcion, estado_nombre, estado_ind);
	if (validacion(estado_nombre, "#estado_nombre") == false) {
		console.log("estado_nombre");
	} else if (validacion(estado_descripcion, "#estado_descripcion") == false) {
		console.log("estado_descripcion");
	} else {
		$(boton).attr("disabled", true);
		var dataString =
			"estado_codigo=" +
			estado_codigo +
			"&estado_nombre=" +
			estado_nombre +
			"&estado_descripcion=" +
			estado_descripcion +
			"&estado_ind=" +
			estado_ind;
		console.log(dataString);
		$.ajax({
			type: "POST",
			url: baseurl + controlador_estado + "guardar",
			data: dataString,
			cache: false,
			success: function (result) {
				var resultado = $.trim(result);
				if (resultado == "true") {
					$(modal_estado).modal("hide");
					swal("Registrado!", "Se guardo correctamente.", "success");
					location.href = baseurl + controlador_estado;
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

function cambiar_estado(id) {
	let cabecera = "#msg_cabecera";
	let mensaje = "EDITAR ESTADO";
	limpiar_rol();
	$.ajax({
		url: baseurl + controlador_estado + "obtener",
		type: "POST",
		data: { id: id },
		dataType: "JSON",
		success: function (data) {
			$(boton).attr("disabled", false);
			$("#estado_codigo").val(data[0]["estado_codigo"]);
			$("#estado_nombre").val(data[0]["estado_nombre"]);
			$("#estado_descripcion").val(data[0]["estado_descripcion"]);
			$("#estado_ind").val(data[0]["estado_ind"]);
			$(modal_estado).modal({ backdrop: "static", keyboard: false });
			$(modal_estado).modal("show");
			$(boton).attr("onclick", "modificar_estado(" + id + ")");
			$(cabecera).html(mensaje + "#" + id);
			$(boton).html("<i class='fa fa-check'></i>&nbsp;ACTUALIZAR");
		},
	});
}

function modificar_estado(id) {
	var estado_codigo = $("#estado_codigo").val();
	var estado_nombre = $("#estado_nombre").val();
	var estado_descripcion = $("#estado_descripcion").val();
	var estado_ind = $("#estado_ind").val();
	if (validacion(estado_nombre, "#estado_nombre") == false) {
		console.log("estado_nombre");
	} else if (validacion(estado_descripcion, "#estado_descripcion") == false) {
		console.log("estado_descripcion");
	} else {
		$(boton).attr("disabled", true);
		var dataString =
			"estado_codigo=" +
			estado_codigo +
			"&estado_nombre=" +
			estado_nombre +
			"&estado_descripcion=" +
			estado_descripcion +
			"&estado_ind=" +
			estado_ind +
			"&id=" +
			id;
		$.ajax({
			type: "POST",
			url: baseurl + controlador_estado + "modificar",
			data: dataString,
			cache: false,
			success: function (result) {
				console.log(result);
				var resultado = $.trim(result);
				if (resultado == "true") {
					$(modal_estado).modal("hide");
					swal("Registrado!", "Tu registro ha sido actualizado.", "success");
					location.href = baseurl + controlador_estado;
				} else {
					alert("Error!" + result);
				}
			},
			error: function (result) {},
		});
	}
}

function quitar_estado(id) {
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
					url: baseurl + controlador_estado + "eliminar",
					data: { id: id },
					cache: false,
					success: function (result) {
						var resultado = $.trim(result);
						if (resultado == "true") {
							swal("Eliminado!", "Tu registro ha sido eliminado.", "success");
							location.href = baseurl + controlador_estado;
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
