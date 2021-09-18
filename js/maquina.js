var controlador_maquina = "maquina/";
var boton = "#boton_multiuso";
var modal_maquina = "#modal_maquina";

function limpiar_maquina() {
	$("#maquina_nombre").val("");
	$("#maquina_descripcion").val("");
	$("#estado_id").val("1");
}

function nuevo_maquina() {
	let cabecera = "#msg_cabecera";
	let codigo = "#maquina_codigo";
	let inicial_codigo = "MAQ";
	let mensaje = "NUEVA MAQUINA";
	limpiar_rol();
	$(boton).attr("disabled", false);
	$.ajax({
		url: baseurl + controlador_maquina + "filas",
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
			$(modal_maquina).unbind();
			$(modal_maquina).modal({ backdrop: "static", keyboard: false });
			$(modal_maquina).modal("show");
			$(boton).attr("onclick", "guardar_maquina()");
			$(cabecera).html(mensaje);
			$(boton).html("<i class='fa fa-check'></i>&nbsp;GUARDAR");
		},
	});
}

function guardar_maquina() {
	var maquina_codigo = $("#maquina_codigo").val();
	var maquina_nombre = $("#maquina_nombre").val();
    var maquina_descripcion = $("#maquina_descripcion").val();
    var maquina_cantidad = $("#maquina_cantidad").val();
	var area_id = $("#area_id").val();
	var estado_id = $("#estado_id").val();
	if (validacion(maquina_nombre, "#maquina_nombre") == false) 
		console.log("maquina_nombre");
	else if (validacion(maquina_descripcion, "#maquina_descripcion") == false) 
        console.log("maquina_descripcion");
    else if (validacion(maquina_cantidad, "#maquina_cantidad") == false) 
		console.log("maquina_cantidad");
	else {
		$(boton).attr("disabled", true);
		var dataString =
			"maquina_codigo=" +
			maquina_codigo +
			"&maquina_nombre=" +
			maquina_nombre +
			"&maquina_descripcion=" +
            maquina_descripcion +
            "&maquina_cantidad=" +
			maquina_cantidad +
			"&area_id=" +
			area_id +
			"&estado_id=" +
			estado_id;
		console.log(dataString);
		$.ajax({
			type: "POST",
			url: baseurl + controlador_maquina + "guardar",
			data: dataString,
			cache: false,
			success: function (result) {
				var resultado = $.trim(result);
				if (resultado == "true") {
					$(modal_maquina).modal("hide");
					swal("Registrado!", "Se guardo correctamente.", "success");
					location.href = baseurl + controlador_maquina;
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

function cambiar_maquina(id) {
	let cabecera = "#msg_cabecera";
	let mensaje = "EDITAR MAQUINA";
	limpiar_rol();
	$.ajax({
		url: baseurl + controlador_maquina + "obtener",
		type: "POST",
		data: { id: id },
		dataType: "JSON",
		success: function (data) {
			$(boton).attr("disabled", false);
			$("#maquina_codigo").val(data[0]["maquina_codigo"]);
			$("#maquina_nombre").val(data[0]["maquina_nombre"]);
            $("#maquina_descripcion").val(data[0]["maquina_descripcion"]);
            $("#maquina_cantidad").val(data[0]["maquina_cantidad"]);
			$("#area_id").val(data[0]["area_id"]);
			$("#estado_id").val(data[0]["estado_id"]);
			$(modal_maquina).modal({ backdrop: "static", keyboard: false });
			$(modal_maquina).modal("show");
			$(boton).attr("onclick", "modificar_maquina(" + id + ")");
			$(cabecera).html(mensaje + "#" + id);
			$(boton).html("<i class='fa fa-check'></i>&nbsp;ACTUALIZAR");
		},
	});
}

function modificar_maquina(id) {
	var maquina_codigo = $("#maquina_codigo").val();
	var maquina_nombre = $("#maquina_nombre").val();
    var maquina_descripcion = $("#maquina_descripcion").val();
    var maquina_cantidad = $("#maquina_cantidad").val();
	var area_id = $("#area_id").val();
	var estado_id = $("#estado_id").val();
	if (validacion(maquina_nombre, "#maquina_nombre") == false) 
		console.log("maquina_nombre");
	else if (validacion(maquina_descripcion, "#maquina_descripcion") == false) 
        console.log("maquina_descripcion");
    else if (validacion(maquina_cantidad, "#maquina_cantidad") == false) 
		console.log("maquina_cantidad");
	else {
		$(boton).attr("disabled", true);
		var dataString =
			"maquina_codigo=" +
			maquina_codigo +
			"&maquina_nombre=" +
			maquina_nombre +
			"&maquina_descripcion=" +
            maquina_descripcion +
            "&maquina_cantidad=" +
			maquina_cantidad +
			"&area_id=" +
			area_id +
			"&estado_id=" +
			estado_id +
			"&id=" +
			id;
		$.ajax({
			type: "POST",
			url: baseurl + controlador_maquina + "modificar",
			data: dataString,
			cache: false,
			success: function (result) {
				console.log(result);
				var resultado = $.trim(result);
				if (resultado == "true") {
					$(modal_maquina).modal("hide");
					swal("Registrado!", "Tu registro ha sido actualizado.", "success");
					location.href = baseurl + controlador_maquina;
				} else {
					alert("Error!" + result);
				}
			},
			error: function (result) {},
		});
	}
}

function quitar_maquina(id) {
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
					url: baseurl + controlador_maquina + "eliminar",
					data: { id: id },
					cache: false,
					success: function (result) {
						var resultado = $.trim(result);
						if (resultado == "true") {
							swal("Eliminado!", "Tu registro ha sido eliminado.", "success");
							location.href = baseurl + controlador_maquina;
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
