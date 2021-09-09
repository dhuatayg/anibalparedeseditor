var controlador_cliente = "cliente/";
var boton = "#boton_multiuso";
var modal_cliente = "#modal_cliente";

function limpiar_cliente() {
	$("#cliente_documento").val("");
    $("#cliente_razon").val("");
    $("#cliente_telefono").val("");
	$("#cliente_correo").val("");
	$("#estado_id").val("1");
}

function nuevo_cliente() {
	let cabecera = "#msg_cabecera";
	let codigo = "#cliente_codigo";
	let inicial_codigo = "CLI";
	let mensaje = "NUEVO CLIENTE";
	limpiar_rol();
	$(boton).attr("disabled", false);
	$.ajax({
		url: baseurl + controlador_cliente + "filas",
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
			$(modal_cliente).unbind();
			$(modal_cliente).modal({ backdrop: "static", keyboard: false });
			$(modal_cliente).modal("show");
			$(boton).attr("onclick", "guardar_cliente()");
			$(cabecera).html(mensaje);
			$(boton).html("<i class='fa fa-check'></i>&nbsp;GUARDAR");
		},
	});
}

function guardar_cliente() {
	var cliente_codigo = $("#cliente_codigo").val();
	var cliente_documento = $("#cliente_documento").val();
    var cliente_razon = $("#cliente_razon").val();
    var cliente_telefono = $("#cliente_telefono").val();
    var cliente_correo = $("#cliente_correo").val();
	var estado_id = $("#estado_id").val();
	if (validacion(cliente_documento, "#cliente_documento") == false) 
		console.log("cliente_documento");
	else if (validacion(cliente_razon, "#cliente_razon") == false) 
        console.log("cliente_razon");
    else if (validacion(cliente_telefono, "#cliente_telefono") == false) 
        console.log("cliente_telefono");
    else if (validacion(cliente_correo, "#cliente_correo") == false) 
        console.log("cliente_correo");
	else {
		$(boton).attr("disabled", true);
		var dataString =
			"cliente_codigo=" +
			cliente_codigo +
			"&cliente_documento=" +
			cliente_documento +
			"&cliente_razon=" +
            cliente_razon +
            "&cliente_telefono=" +
            cliente_telefono +
            "&cliente_correo=" +
            cliente_correo +
			"&estado_id=" +
			estado_id;
		console.log(dataString);
		$.ajax({
			type: "POST",
			url: baseurl + controlador_cliente + "guardar",
			data: dataString,
			cache: false,
			success: function (result) {
				var resultado = $.trim(result);
				if (resultado == "true") {
					$(modal_cliente).modal("hide");
					swal("Registrado!", "Se guardo correctamente.", "success");
					location.href = baseurl + controlador_cliente;
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

function cambiar_cliente(id) {
	let cabecera = "#msg_cabecera";
	let mensaje = "EDITAR CLIENTE";
	limpiar_rol();
	$.ajax({
		url: baseurl + controlador_cliente + "obtener",
		type: "POST",
		data: { id: id },
		dataType: "JSON",
		success: function (data) {
			$(boton).attr("disabled", false);
			$("#cliente_codigo").val(data[0]["cliente_codigo"]);
			$("#cliente_documento").val(data[0]["cliente_documento"]);
            $("#cliente_razon").val(data[0]["cliente_razon"]);
            $("#cliente_telefono").val(data[0]["cliente_telefono"]);
            $("#cliente_correo").val(data[0]["cliente_correo"]);
			$("#estado_id").val(data[0]["estado_id"]);
			$(modal_cliente).modal({ backdrop: "static", keyboard: false });
			$(modal_cliente).modal("show");
			$(boton).attr("onclick", "modificar_cliente(" + id + ")");
			$(cabecera).html(mensaje + "#" + id);
			$(boton).html("<i class='fa fa-check'></i>&nbsp;ACTUALIZAR");
		},
	});
}

function modificar_cliente(id) {
	var cliente_codigo = $("#cliente_codigo").val();
	var cliente_documento = $("#cliente_documento").val();
    var cliente_razon = $("#cliente_razon").val();
    var cliente_telefono = $("#cliente_telefono").val();
    var cliente_correo = $("#cliente_correo").val();
	var estado_id = $("#estado_id").val();
	if (validacion(cliente_documento, "#cliente_documento") == false) 
		console.log("cliente_documento");
	else if (validacion(cliente_razon, "#cliente_razon") == false) 
        console.log("cliente_razon");
    else if (validacion(cliente_telefono, "#cliente_telefono") == false) 
        console.log("cliente_telefono");
    else if (validacion(cliente_correo, "#cliente_correo") == false) 
        console.log("cliente_correo");
	else {
		$(boton).attr("disabled", true);
		var dataString =
			"cliente_codigo=" +
			cliente_codigo +
			"&cliente_documento=" +
			cliente_documento +
			"&cliente_razon=" +
            cliente_razon +
            "&cliente_telefono=" +
            cliente_telefono +
            "&cliente_correo=" +
            cliente_correo +
			"&estado_id=" +
			estado_id +
			"&id=" +
			id;
		$.ajax({
			type: "POST",
			url: baseurl + controlador_cliente + "modificar",
			data: dataString,
			cache: false,
			success: function (result) {
				console.log(result);
				var resultado = $.trim(result);
				if (resultado == "true") {
					$(modal_cliente).modal("hide");
					swal("Registrado!", "Tu registro ha sido actualizado.", "success");
					location.href = baseurl + controlador_cliente;
				} else {
					alert("Error!" + result);
				}
			},
			error: function (result) {},
		});
	}
}

function quitar_cliente(id) {
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
					url: baseurl + controlador_cliente + "eliminar",
					data: { id: id },
					cache: false,
					success: function (result) {
						var resultado = $.trim(result);
						if (resultado == "true") {
							swal("Eliminado!", "Tu registro ha sido eliminado.", "success");
							location.href = baseurl + controlador_cliente;
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
