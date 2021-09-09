var controlador_rol = "rol/";
var boton = "#boton_multiuso";
var modal_rol = "#modal_rol";

function limpiar_rol() {
	$("#rol_nombre").val("");
	$("#rol_descripcion").val("");
	$("#estado_id").val("1");
}

function nuevo_rol() {
	let cabecera = "#msg_cabecera";
	let codigo = "#rol_codigo";
	let inicial_codigo = "ROL";
	let mensaje = "NUEVO ROL";
	limpiar_rol();
	$(boton).attr("disabled", false);
	$.ajax({
		url: baseurl + controlador_rol + "filas",
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
			$(modal_rol).unbind();
			$(modal_rol).modal({ backdrop: "static", keyboard: false });
			$(modal_rol).modal("show");
			$(boton).attr("onclick", "guardar_rol()");
			$(cabecera).html(mensaje);
			$(boton).html("<i class='fa fa-check'></i>&nbsp;GUARDAR");
		},
	});
}

function guardar_rol() {
	var rol_codigo = $("#rol_codigo").val();
	var rol_nombre = $("#rol_nombre").val();
	var rol_descripcion = $("#rol_descripcion").val();
	var estado_id = $("#estado_id").val();
	console.log(rol_codigo, rol_descripcion, rol_nombre, estado_id);
	if (validacion(rol_nombre, "#rol_nombre") == false) {
		console.log("rol_nombre");
	} else if (validacion(rol_descripcion, "#rol_descripcion") == false) {
		console.log("rol_descripcion");
	} else {
		$(boton).attr("disabled", true);
		var dataString =
			"rol_codigo=" +
			rol_codigo +
			"&rol_nombre=" +
			rol_nombre +
			"&rol_descripcion=" +
			rol_descripcion +
			"&estado_id=" +
			estado_id;
		console.log(dataString);
		$.ajax({
			type: "POST",
			url: baseurl + controlador_rol + "guardar",
			data: dataString,
			cache: false,
			success: function (result) {
				var resultado = $.trim(result);
				if (resultado == "true") {
					$(modal_rol).modal("hide");
					swal("Registrado!", "Se guardo correctamente.", "success");
					location.href = baseurl + controlador_rol;
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

function cambiar_rol(id) {
	let cabecera = "#msg_cabecera";
	let mensaje = "EDITAR ROL";
	limpiar_rol();
	$.ajax({
		url: baseurl + controlador_rol + "obtener",
		type: "POST",
		data: { id: id },
		dataType: "JSON",
		success: function (data) {
			$(boton).attr("disabled", false);
			$("#rol_codigo").val(data[0]["rol_codigo"]);
			$("#rol_nombre").val(data[0]["rol_nombre"]);
			$("#rol_descripcion").val(data[0]["rol_descripcion"]);
			$("#estado_id").val(data[0]["estado_id"]);
			$(modal_rol).modal({ backdrop: "static", keyboard: false });
			$(modal_rol).modal("show");
			$(boton).attr("onclick", "modificar_rol(" + id + ")");
			$(cabecera).html(mensaje + "#" + id);
			$(boton).html("<i class='fa fa-check'></i>&nbsp;ACTUALIZAR");
		},
	});
}

function modificar_rol(id) {
	var rol_codigo = $("#rol_codigo").val();
	var rol_nombre = $("#rol_nombre").val();
	var rol_descripcion = $("#rol_descripcion").val();
	var estado_id = $("#estado_id").val();
	if (validacion(rol_nombre, "#rol_nombre") == false) {
		console.log("rol_nombre");
	} else if (validacion(rol_descripcion, "#rol_descripcion") == false) {
		console.log("rol_descripcion");
	} else {
		$(boton).attr("disabled", true);
		var dataString =
			"rol_codigo=" +
			rol_codigo +
			"&rol_nombre=" +
			rol_nombre +
			"&rol_descripcion=" +
			rol_descripcion +
			"&estado_id=" +
			estado_id +
			"&id=" +
			id;
		$.ajax({
			type: "POST",
			url: baseurl + controlador_rol + "modificar",
			data: dataString,
			cache: false,
			success: function (result) {
				console.log(result);
				var resultado = $.trim(result);
				if (resultado == "true") {
					$(modal_rol).modal("hide");
					swal("Registrado!", "Tu registro ha sido actualizado.", "success");
					location.href = baseurl + controlador_rol;
				} else {
					alert("Error!" + result);
				}
			},
			error: function (result) {},
		});
	}
}

function quitar_rol(id) {
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
					url: baseurl + controlador_rol + "eliminar",
					data: { id: id },
					cache: false,
					success: function (result) {
						var resultado = $.trim(result);
						if (resultado == "true") {
							swal("Eliminado!", "Tu registro ha sido eliminado.", "success");
							location.href = baseurl + controlador_rol;
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
