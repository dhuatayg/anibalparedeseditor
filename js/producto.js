var controlador_producto = "producto/";
var boton = "#boton_multiuso";
var modal_producto = "#modal_producto";

function limpiar_producto() {
	$("#producto_nombre").val("");
    $("#producto_stock").val("");
    $("#producto_descripcion").val("");
    $("#categoria_id").val("1");
	$("#estado_id").val("1");
}

function nuevo_producto() {
	let cabecera = "#msg_cabecera";
	let codigo = "#producto_codigo";
	let inicial_codigo = "PRO";
	let mensaje = "NUEVO PRODUCTO";
	limpiar_producto();
	$(boton).attr("disabled", false);
	$.ajax({
		url: baseurl + controlador_producto + "filas",
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
			$(modal_producto).unbind();
			$(modal_producto).modal({ backdrop: "static", keyboard: false });
			$(modal_producto).modal("show");
			$(boton).attr("onclick", "guardar_producto()");
			$(cabecera).html(mensaje);
			$(boton).html("<i class='fa fa-check'></i>&nbsp;GUARDAR");
		},
	});
}

function guardar_producto() {
	var producto_codigo = $("#producto_codigo").val();
	var producto_nombre = $("#producto_nombre").val();
    var producto_descripcion = $("#producto_descripcion").val();
    var producto_stock = $("#producto_stock").val();
    var categoria_id = $("#categoria_id").val();
	var estado_id = $("#estado_id").val();
	if (validacion(producto_nombre, "#producto_nombre") == false) 
		console.log("producto_nombre");
	else if (validacion(producto_descripcion, "#producto_descripcion") == false) 
        console.log("producto_descripcion");
    else if (validacion(producto_stock, "#producto_stock") == false) 
        console.log("producto_stock");
	else {
		$(boton).attr("disabled", true);
		var dataString =
			"producto_codigo=" +
			producto_codigo +
			"&producto_nombre=" +
			producto_nombre +
			"&producto_descripcion=" +
            producto_descripcion +
            "&producto_stock=" +
            producto_stock +
            "&categoria_id=" +
            categoria_id +
			"&estado_id=" +
			estado_id;
		console.log(dataString);
		$.ajax({
			type: "POST",
			url: baseurl + controlador_producto + "guardar",
			data: dataString,
			cache: false,
			success: function (result) {
				var resultado = $.trim(result);
				if (resultado == "true") {
					$(modal_producto).modal("hide");
					swal("Registrado!", "Se guardo correctamente.", "success");
					location.href = baseurl + controlador_producto;
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

function cambiar_producto(id) {
	let cabecera = "#msg_cabecera";
	let mensaje = "EDITAR PRODUCTO";
	limpiar_producto();
	$.ajax({
		url: baseurl + controlador_producto + "obtener",
		type: "POST",
		data: { id: id },
		dataType: "JSON",
		success: function (data) {
			$(boton).attr("disabled", false);
			$("#producto_codigo").val(data[0]["producto_codigo"]);
			$("#producto_nombre").val(data[0]["producto_nombre"]);
            $("#producto_descripcion").val(data[0]["producto_descripcion"]);
            $("#producto_stock").val(data[0]["producto_stock"]);
            $("#categoria_id").val(data[0]["categoria_id"]);
			$("#estado_id").val(data[0]["estado_id"]);
			$(modal_producto).modal({ backdrop: "static", keyboard: false });
			$(modal_producto).modal("show");
			$(boton).attr("onclick", "modificar_producto(" + id + ")");
			$(cabecera).html(mensaje + "#" + id);
			$(boton).html("<i class='fa fa-check'></i>&nbsp;ACTUALIZAR");
		},
	});
}

function modificar_producto(id) {
	var producto_codigo = $("#producto_codigo").val();
	var producto_nombre = $("#producto_nombre").val();
    var producto_descripcion = $("#producto_descripcion").val();
    var producto_stock = $("#producto_stock").val();
    var categoria_id = $("#categoria_id").val();
	var estado_id = $("#estado_id").val();
	if (validacion(producto_nombre, "#producto_nombre") == false) 
		console.log("producto_nombre");
	else if (validacion(producto_descripcion, "#producto_descripcion") == false) 
        console.log("producto_descripcion");
    else if (validacion(producto_stock, "#producto_stock") == false) 
        console.log("producto_stock");
	else {
		$(boton).attr("disabled", true);
		var dataString =
			"producto_codigo=" +
			producto_codigo +
			"&producto_nombre=" +
			producto_nombre +
			"&producto_descripcion=" +
            producto_descripcion +
            "&producto_stock=" +
            producto_stock +
            "&categoria_id=" +
            categoria_id +
			"&estado_id=" +
			estado_id +
			"&id=" +
			id;
		$.ajax({
			type: "POST",
			url: baseurl + controlador_producto + "modificar",
			data: dataString,
			cache: false,
			success: function (result) {
				console.log(result);
				var resultado = $.trim(result);
				if (resultado == "true") {
					$(modal_producto).modal("hide");
					swal("Registrado!", "Tu registro ha sido actualizado.", "success");
					location.href = baseurl + controlador_producto;
				} else {
					alert("Error!" + result);
				}
			},
			error: function (result) {},
		});
	}
}

function quitar_producto(id) {
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
					url: baseurl + controlador_producto + "eliminar",
					data: { id: id },
					cache: false,
					success: function (result) {
						var resultado = $.trim(result);
						if (resultado == "true") {
							swal("Eliminado!", "Tu registro ha sido eliminado.", "success");
							location.href = baseurl + controlador_producto;
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
