var tabla;
var tabla_nombre = "#tabla";
var controlador = "usuario/";
var boton = "#boton_multiuso";
var formulario = "#modal_usuario";

function limpiar_usuario() {
	$("#usuario_documento").val("");
	$("#usuario_nombres").val("");
	$("#usuario_apellidos").val("");
	$("#usuario_usuario").val("");
	$("#usuario_clave").val("");
	$("#rol_id").val("1");
	$("#estado_id").val("1");
}

function validacion(campo, valor) {
	if ($.trim(campo) == "" || $.trim(campo) == null) {
		$(valor).css("border", "1px solid red");
		$(valor).focus();
		return false;
	}
}

function nuevo_usuario() {
	let cabecera = "#msg_cabecera";
	let codigo = "#usuario_codigo";
	let inicial_codigo = "USU";
	let mensaje = "NUEVO USUARIO";
	limpiar_usuario();
	$(boton).attr("disabled", false);
	$.ajax({
		url: baseurl + controlador + "filas",
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
			$(formulario).unbind();
			$(formulario).modal({ backdrop: "static", keyboard: false });
			$(formulario).modal("show");
			$(boton).attr("onclick", "guardar_usuario()");
			$(cabecera).html(mensaje);
			$(boton).html("<i class='fa fa-check'></i>&nbsp;GUARDAR");
		},
	});
}

function guardar_usuario() {
	var usuario_codigo = $("#usuario_codigo").val();
	var usuario_documento = $("#usuario_documento").val();
	var usuario_nombres = $("#usuario_nombres").val();
	var usuario_apellidos = $("#usuario_apellidos").val();
	var usuario_usuario = $("#usuario_usuario").val();
	var usuario_clave = $("#usuario_clave").val();
	var rol_id = $("#rol_id").val();
	var estado_id = $("#estado_id").val();
	if (validacion(usuario_codigo, "#usuario_codigo") == false)
		console.log("usuario_codigo");
	else if (validacion(usuario_documento, "#usuario_documento") == false)
		console.log("usuario_documento");
	else if (validacion(usuario_nombres, "#usuario_nombres") == false)
		console.log("usuario_nombres");
	else if (validacion(usuario_apellidos, "#usuario_apellidos") == false)
		console.log("usuario_apellidos");
	else if (validacion(usuario_usuario, "#usuario_usuario") == false)
		console.log("usuario_usuario");
	else if (validacion(usuario_clave, "#usuario_clave") == false)
		console.log("usuario_clave");
	else if (validacion(rol_id, "#rol_id") == false) console.log("rol_id");
	else if (validacion(estado_id, "#estado_id") == false)
		console.log("estado_id");
	else {
		$(boton).attr("disabled", true);
		var dataString =
			"usuario_codigo=" +
			usuario_codigo +
			"&usuario_documento=" +
			usuario_documento +
			"&usuario_nombres=" +
			usuario_nombres +
			"&usuario_apellidos=" +
			usuario_apellidos +
			"&usuario_usuario=" +
			usuario_usuario +
			"&usuario_clave=" +
			usuario_clave +
			"&rol_id=" +
			rol_id +
			"&estado_id=" +
			estado_id;
		console.log(dataString);
		$.ajax({
			type: "POST",
			url: baseurl + controlador + "guardar",
			data: dataString,
			cache: false,
			success: function (result) {
				var resultado = $.trim(result);
				if (resultado == "true") {
					$(formulario).modal("hide");
					swal("Registrado!", "Se guardo correctamente.", "success");
					location.href = baseurl + controlador;
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

function cambiar_usuario(id) {
	let cabecera = "#msg_cabecera";
	let mensaje = "EDITAR USUARIO";
	$.ajax({
		url: baseurl + controlador + "obtener",
		type: "POST",
		data: { id: id },
		dataType: "JSON",
		success: function (data) {
			$(boton).attr("disabled", false);
			$("#usuario_codigo").val(data[0]["usuario_codigo"]);
			$("#usuario_documento").val(data[0]["usuario_documento"]);
			$("#usuario_nombres").val(data[0]["usuario_nombres"]);
			$("#usuario_apellidos").val(data[0]["usuario_apellidos"]);
			$("#usuario_usuario").val(data[0]["usuario_usuario"]);
			// $('#usuario_clave').val(data[0]['usuario_clave']);
			$("#rol_id").val(data[0]["rol_id"]);
			$("#estado_id").val(data[0]["estado_id"]);
			$(formulario).modal({ backdrop: "static", keyboard: false });
			$(formulario).modal("show");
			$(boton).attr("onclick", "modificar_usuario(" + id + ")");
			$(cabecera).html(mensaje + "#" + id);
			$(boton).html("<i class='fa fa-check'></i>&nbsp;ACTUALIZAR");
		},
	});
}

function modificar_usuario(id) {
	var usuario_codigo = $("#usuario_codigo").val();
	var usuario_documento = $("#usuario_documento").val();
	var usuario_nombres = $("#usuario_nombres").val();
	var usuario_apellidos = $("#usuario_apellidos").val();
	var usuario_usuario = $("#usuario_usuario").val();
	var usuario_clave = $("#usuario_clave").val();
	var rol_id = $("#rol_id").val();
	var estado_id = $("#estado_id").val();
	if (validacion(usuario_codigo, "#usuario_codigo") == false)
		console.log("usuario_codigo");
	else if (validacion(usuario_documento, "#usuario_documento") == false)
		console.log("usuario_documento");
	else if (validacion(usuario_nombres, "#usuario_nombres") == false)
		console.log("usuario_nombres");
	else if (validacion(usuario_apellidos, "#usuario_apellidos") == false)
		console.log("usuario_apellidos");
	else if (validacion(usuario_usuario, "#usuario_usuario") == false)
		console.log("usuario_usuario");
	else if (validacion(usuario_clave, "#usuario_clave") == false)
		console.log("usuario_clave");
	else if (validacion(rol_id, "#rol_id") == false) console.log("rol_id");
	else if (validacion(estado_id, "#estado_id") == false)
		console.log("estado_id");
	else {
		$(boton).attr("disabled", true);
		var dataString =
			"usuario_codigo=" +
			usuario_codigo +
			"&usuario_documento=" +
			usuario_documento +
			"&usuario_nombres=" +
			usuario_nombres +
			"&usuario_apellidos=" +
			usuario_apellidos +
			"&usuario_usuario=" +
			usuario_usuario +
			"&usuario_clave=" +
			usuario_clave +
			"&rol_id=" +
			rol_id +
			"&estado_id=" +
			estado_id +
			"&id=" +
			id;
		$.ajax({
			type: "POST",
			url: baseurl + controlador + "modificar",
			data: dataString,
			cache: false,
			success: function (result) {
				console.log(result);
				var resultado = $.trim(result);
				if (resultado == "true") {
					$(formulario).modal("hide");
					swal("Registrado!", "Tu registro ha sido actualizado.", "success");
					location.href = baseurl + controlador;
				} else {
					alert("Error!" + result);
				}
			},
			error: function (result) {},
		});
	}
}

function quitar_usuario(id) {
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
					url: baseurl + controlador + "eliminar",
					data: { id: id },
					cache: false,
					success: function (result) {
						var resultado = $.trim(result);
						if (resultado == "true") {
							swal("Eliminado!", "Tu registro ha sido eliminado.", "success");
							location.href = baseurl + controlador;
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

function configuracion_usuario() {
	var usuario_cambio = $("#usuario_cambio").val();
	var clave_nueva = $("#clave_nueva").val();
	var clave_nueva_1 = $("#clave_nueva_1").val();
	if (validacion(clave_nueva, "#clave_nueva") == false)
		console.log("clave_nueva");
	else if (validacion(clave_nueva_1, "#clave_nueva_1") == false)
		console.log("clave_nueva_1");
	if( clave_nueva == clave_nueva_1){
		var dataString =
		"usuario_cambio=" +
		usuario_cambio +
		"&clave_nueva=" +
		clave_nueva;
		$.ajax({
			type: "POST",
			url: baseurl + controlador + "renovar",
			data: dataString,
			cache: false,
			success: function (result) {
				var resultado = $.trim(result);
				if (resultado == "true") {
					$(formulario).modal("hide");
					swal("Registrado!", "Tu contraseña se ha modificada.", "success");
					$("#clave_nueva").val("");
					$("#clave_nueva_1").val("");
				} else {
					alert("Error!" + result);
				}
			},
			error: function (result) {},
		});
	}else{
		swal("Error!", "Las contraseñas no son iguales :).", "info");
	}
}