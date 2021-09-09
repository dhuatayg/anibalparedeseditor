var controlador_area = "area/";
var boton = "#boton_multiuso";
var modal_area = "#modal_area";

function limpiar_area() {
	$("#area_nombre").val("");
	$("#area_descripcion").val("");
	$("#estado_id").val("1");
}

function nuevo_area() {
	let cabecera = "#msg_cabecera";
	let codigo = "#area_codigo";
	let inicial_codigo = "ARE";
	let mensaje = "NUEVA ÁREA";
	limpiar_rol();
	$(boton).attr("disabled", false);
	$.ajax({
		url: baseurl + controlador_area + "filas",
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
			$(modal_area).unbind();
			$(modal_area).modal({ backdrop: "static", keyboard: false });
			$(modal_area).modal("show");
			$(boton).attr("onclick", "guardar_area()");
			$(cabecera).html(mensaje);
			$(boton).html("<i class='fa fa-check'></i>&nbsp;GUARDAR");
		},
	});
}

function guardar_area() {
	var area_codigo = $("#area_codigo").val();
	var area_nombre = $("#area_nombre").val();
    var area_descripcion = $("#area_descripcion").val();
	var estado_id = $("#estado_id").val();
	if (validacion(area_nombre, "#area_nombre") == false) 
		console.log("area_nombre");
	else if (validacion(area_descripcion, "#area_descripcion") == false) 
        console.log("area_descripcion");
	else {
		$(boton).attr("disabled", true);
		var dataString =
			"area_codigo=" +
			area_codigo +
			"&area_nombre=" +
			area_nombre +
			"&area_descripcion=" +
            area_descripcion +
			"&estado_id=" +
			estado_id;
		console.log(dataString);
		$.ajax({
			type: "POST",
			url: baseurl + controlador_area + "guardar",
			data: dataString,
			cache: false,
			success: function (result) {
				var resultado = $.trim(result);
				if (resultado == "true") {
					$(modal_area).modal("hide");
					swal("Registrado!", "Se guardo correctamente.", "success");
					location.href = baseurl + controlador_area;
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

function cambiar_area(id) {
	let cabecera = "#msg_cabecera";
	let mensaje = "EDITAR ÁREA";
	limpiar_rol();
	$.ajax({
		url: baseurl + controlador_area + "obtener",
		type: "POST",
		data: { id: id },
		dataType: "JSON",
		success: function (data) {
			$(boton).attr("disabled", false);
			$("#area_codigo").val(data[0]["area_codigo"]);
			$("#area_nombre").val(data[0]["area_nombre"]);
            $("#area_descripcion").val(data[0]["area_descripcion"]);
			$("#estado_id").val(data[0]["estado_id"]);
			$(modal_area).modal({ backdrop: "static", keyboard: false });
			$(modal_area).modal("show");
			$(boton).attr("onclick", "modificar_area(" + id + ")");
			$(cabecera).html(mensaje + "#" + id);
			$(boton).html("<i class='fa fa-check'></i>&nbsp;ACTUALIZAR");
		},
	});
}

function modificar_area(id) {
	var area_codigo = $("#area_codigo").val();
	var area_nombre = $("#area_nombre").val();
    var area_descripcion = $("#area_descripcion").val();
	var estado_id = $("#estado_id").val();
	if (validacion(area_nombre, "#area_nombre") == false) 
		console.log("area_nombre");
	else if (validacion(area_descripcion, "#area_descripcion") == false) 
        console.log("area_descripcion");
	else {
		$(boton).attr("disabled", true);
		var dataString =
			"area_codigo=" +
			area_codigo +
			"&area_nombre=" +
			area_nombre +
			"&area_descripcion=" +
            area_descripcion +
			"&estado_id=" +
			estado_id +
			"&id=" +
			id;
		$.ajax({
			type: "POST",
			url: baseurl + controlador_area + "modificar",
			data: dataString,
			cache: false,
			success: function (result) {
				console.log(result);
				var resultado = $.trim(result);
				if (resultado == "true") {
					$(modal_area).modal("hide");
					swal("Registrado!", "Tu registro ha sido actualizado.", "success");
					location.href = baseurl + controlador_area;
				} else {
					alert("Error!" + result);
				}
			},
			error: function (result) {},
		});
	}
}

function quitar_area(id) {
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
