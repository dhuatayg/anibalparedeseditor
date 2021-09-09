var controlador_categoria = "categoria/";
var boton = "#boton_multiuso";
var modal_categoria = "#modal_categoria";

function limpiar_categoria() {
	$("#categoria_nombre").val("");
	$("#categoria_descripcion").val("");
	$("#estado_id").val("1");
}

function nuevo_categoria() {
	let cabecera = "#msg_cabecera";
	let codigo = "#categoria_codigo";
	let inicial_codigo = "CAT";
	let mensaje = "NUEVA CATEGORÍA";
	limpiar_rol();
	$(boton).attr("disabled", false);
	$.ajax({
		url: baseurl + controlador_categoria + "filas",
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
			$(modal_categoria).unbind();
			$(modal_categoria).modal({ backdrop: "static", keyboard: false });
			$(modal_categoria).modal("show");
			$(boton).attr("onclick", "guardar_categoria()");
			$(cabecera).html(mensaje);
			$(boton).html("<i class='fa fa-check'></i>&nbsp;GUARDAR");
		},
	});
}

function guardar_categoria() {
	var categoria_codigo = $("#categoria_codigo").val();
	var categoria_nombre = $("#categoria_nombre").val();
    var categoria_descripcion = $("#categoria_descripcion").val();
	var estado_id = $("#estado_id").val();
	if (validacion(categoria_nombre, "#categoria_nombre") == false) 
		console.log("categoria_nombre");
	else if (validacion(categoria_descripcion, "#categoria_descripcion") == false) 
        console.log("categoria_descripcion");
	else {
		$(boton).attr("disabled", true);
		var dataString =
			"categoria_codigo=" +
			categoria_codigo +
			"&categoria_nombre=" +
			categoria_nombre +
			"&categoria_descripcion=" +
            categoria_descripcion +
			"&estado_id=" +
			estado_id;
		console.log(dataString);
		$.ajax({
			type: "POST",
			url: baseurl + controlador_categoria + "guardar",
			data: dataString,
			cache: false,
			success: function (result) {
				var resultado = $.trim(result);
				if (resultado == "true") {
					$(modal_categoria).modal("hide");
					swal("Registrado!", "Se guardo correctamente.", "success");
					location.href = baseurl + controlador_categoria;
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

function cambiar_categoria(id) {
	let cabecera = "#msg_cabecera";
	let mensaje = "EDITAR CATEGORÍA";
	limpiar_rol();
	$.ajax({
		url: baseurl + controlador_categoria + "obtener",
		type: "POST",
		data: { id: id },
		dataType: "JSON",
		success: function (data) {
			$(boton).attr("disabled", false);
			$("#categoria_codigo").val(data[0]["categoria_codigo"]);
			$("#categoria_nombre").val(data[0]["categoria_nombre"]);
            $("#categoria_descripcion").val(data[0]["categoria_descripcion"]);
			$("#estado_id").val(data[0]["estado_id"]);
			$(modal_categoria).modal({ backdrop: "static", keyboard: false });
			$(modal_categoria).modal("show");
			$(boton).attr("onclick", "modificar_categoria(" + id + ")");
			$(cabecera).html(mensaje + "#" + id);
			$(boton).html("<i class='fa fa-check'></i>&nbsp;ACTUALIZAR");
		},
	});
}

function modificar_categoria(id) {
	var categoria_codigo = $("#categoria_codigo").val();
	var categoria_nombre = $("#categoria_nombre").val();
    var categoria_descripcion = $("#categoria_descripcion").val();
	var estado_id = $("#estado_id").val();
	if (validacion(categoria_nombre, "#categoria_nombre") == false) 
		console.log("categoria_nombre");
	else if (validacion(categoria_descripcion, "#categoria_descripcion") == false) 
        console.log("categoria_descripcion");
	else {
		$(boton).attr("disabled", true);
		var dataString =
			"categoria_codigo=" +
			categoria_codigo +
			"&categoria_nombre=" +
			categoria_nombre +
			"&categoria_descripcion=" +
            categoria_descripcion +
			"&estado_id=" +
			estado_id +
			"&id=" +
			id;
		$.ajax({
			type: "POST",
			url: baseurl + controlador_categoria + "modificar",
			data: dataString,
			cache: false,
			success: function (result) {
				console.log(result);
				var resultado = $.trim(result);
				if (resultado == "true") {
					$(modal_categoria).modal("hide");
					swal("Registrado!", "Tu registro ha sido actualizado.", "success");
					location.href = baseurl + controlador_categoria;
				} else {
					alert("Error!" + result);
				}
			},
			error: function (result) {},
		});
	}
}

function quitar_categoria(id) {
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
					url: baseurl + controlador_categoria + "eliminar",
					data: { id: id },
					cache: false,
					success: function (result) {
						var resultado = $.trim(result);
						if (resultado == "true") {
							swal("Eliminado!", "Tu registro ha sido eliminado.", "success");
							location.href = baseurl + controlador_categoria;
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
