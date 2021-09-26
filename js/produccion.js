var controlador_produccion = "produccion/";
var boton = "#boton_multiuso";
var modal_produccion = "#modal_produccion";

function limpiar_produccion() {
	$("#producto_id").val("1");
	$("#produccion_inicio").val("");
    $("#produccion_fin").val("");
    $("#produccion_cantidad").val("");
	$("#estado_id").val("1");
}

function nuevo_produccion() {
	let cabecera = "#msg_cabecera";
	let codigo = "#produccion_codigo";
	let inicial_codigo = "OSI";
	let mensaje = "NUEVA PRODUCCION";
	limpiar_produccion();
	$(boton).attr("disabled", false);
	$.ajax({
		url: baseurl + controlador_produccion + "filas",
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
			$(modal_produccion).unbind();
			$(modal_produccion).modal({ backdrop: "static", keyboard: false });
			$(modal_produccion).modal("show");
			$(boton).attr("onclick", "guardar_produccion()");
			$(cabecera).html(mensaje);
			$(boton).html("<i class='fa fa-check'></i>&nbsp;GUARDAR");
		},
	});
}

function guardar_produccion() {
	var produccion_codigo = $("#produccion_codigo").val();
	var producto_id = $("#producto_id").val();
    var produccion_inicio = $("#produccion_inicio").val();
    var produccion_fin = $("#produccion_fin").val();
    var produccion_cantidad = $("#produccion_cantidad").val();
	var estado_id = $("#estado_id").val();
	if (validacion(produccion_cantidad, "#produccion_cantidad") == false) 
		console.log("produccion_cantidad");
	else {
		$(boton).attr("disabled", true);
		var dataString =
			"produccion_codigo=" +
			produccion_codigo +
			"&producto_id=" +
			producto_id +
			"&produccion_inicio=" +
            produccion_inicio +
            "&produccion_fin=" +
            produccion_fin +
            "&produccion_cantidad=" +
            produccion_cantidad +
			"&estado_id=" +
			estado_id;
		console.log(dataString);
		$.ajax({
			type: "POST",
			url: baseurl + controlador_produccion + "guardar",
			data: dataString,
			cache: false,
			success: function (result) {
				var resultado = $.trim(result);
				if (resultado == "true") {
					$(modal_produccion).modal("hide");
					swal("Registrado!", "Se guardo correctamente.", "success");
					location.href = baseurl + controlador_produccion;
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

function cambiar_produccion(id) {
	let cabecera = "#msg_cabecera";
	let mensaje = "EDITAR ÁREA";
	limpiar_rol();
	$.ajax({
		url: baseurl + controlador_produccion + "obtener",
		type: "POST",
		data: { id: id },
		dataType: "JSON",
		success: function (data) {
			$(boton).attr("disabled", false);
			$("#produccion_codigo").val(data[0]["produccion_codigo"]);
			$("#produccion_nombre").val(data[0]["produccion_nombre"]);
            $("#produccion_descripcion").val(data[0]["produccion_descripcion"]);
			$("#estado_id").val(data[0]["estado_id"]);
			$(modal_produccion).modal({ backdrop: "static", keyboard: false });
			$(modal_produccion).modal("show");
			$(boton).attr("onclick", "modificar_produccion(" + id + ")");
			$(cabecera).html(mensaje + "#" + id);
			$(boton).html("<i class='fa fa-check'></i>&nbsp;ACTUALIZAR");
		},
	});
}

function modificar_produccion(id) {
	var produccion_codigo = $("#produccion_codigo").val();
	var produccion_nombre = $("#produccion_nombre").val();
    var produccion_descripcion = $("#produccion_descripcion").val();
	var estado_id = $("#estado_id").val();
	if (validacion(produccion_nombre, "#produccion_nombre") == false) 
		console.log("produccion_nombre");
	else if (validacion(produccion_descripcion, "#produccion_descripcion") == false) 
        console.log("produccion_descripcion");
	else {
		$(boton).attr("disabled", true);
		var dataString =
			"produccion_codigo=" +
			produccion_codigo +
			"&produccion_nombre=" +
			produccion_nombre +
			"&produccion_descripcion=" +
            produccion_descripcion +
			"&estado_id=" +
			estado_id +
			"&id=" +
			id;
		$.ajax({
			type: "POST",
			url: baseurl + controlador_produccion + "modificar",
			data: dataString,
			cache: false,
			success: function (result) {
				console.log(result);
				var resultado = $.trim(result);
				if (resultado == "true") {
					$(modal_produccion).modal("hide");
					swal("Registrado!", "Tu registro ha sido actualizado.", "success");
					location.href = baseurl + controlador_produccion;
				} else {
					alert("Error!" + result);
				}
			},
			error: function (result) {},
		});
	}
}

function quitar_produccion(id) {
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
					url: baseurl + controlador_produccion + "eliminar",
					data: { id: id },
					cache: false,
					success: function (result) {
						var resultado = $.trim(result);
						if (resultado == "true") {
							swal("Eliminado!", "Tu registro ha sido eliminado.", "success");
							location.href = baseurl + controlador_produccion;
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

function terminar_planificacion(id) {
	swal(
		{
			title: "Deseas confirmar la planificaciòn?",
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
					url: baseurl + controlador_area + "eliminar",
					data: { id: id },
					cache: false,
					success: function (result) {
						var resultado = $.trim(result);
						if (resultado == "true") {
							swal("Eliminado!", "Tu registro ha sido eliminado.", "success");
							location.href = baseurl + controlador_area;
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