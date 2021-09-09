var controlador_material = "material/";
var boton = "#boton_multiuso";
var modal_material = "#modal_material";
var modal_abastecimiento = "#modal_abastecimiento";
var boton_abastecimiento = "#boton_multiuso_1";

function limpiar_material() {
	$("#material_nombre").val("");
    $("#material_descripcion").val("");
    $("#material_unidad").val("");
    $("#material_stock").val("");
    $("#material_precio").val("");
	$("#estado_id").val("1");
}

function nuevo_material() {
	let cabecera = "#msg_cabecera";
	let codigo = "#material_codigo";
	let inicial_codigo = "MAT";
	let mensaje = "NUEVO MATERIAL";
	limpiar_rol();
	$(boton).attr("disabled", false);
	$.ajax({
		url: baseurl + controlador_material + "filas",
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
			$(modal_material).unbind();
			$(modal_material).modal({ backdrop: "static", keyboard: false });
			$(modal_material).modal("show");
			$(boton).attr("onclick", "guardar_material()");
			$(cabecera).html(mensaje);
			$(boton).html("<i class='fa fa-check'></i>&nbsp;GUARDAR");
		},
	});
}

function guardar_material() {
	var material_codigo = $("#material_codigo").val();
	var material_nombre = $("#material_nombre").val();
    var material_descripcion = $("#material_descripcion").val();
    var material_unidad = $("#material_unidad").val();
    var material_stock = $("#material_stock").val();
    var material_precio = $("#material_precio").val();
	var estado_id = $("#estado_id").val();
	if (validacion(material_nombre, "#material_nombre") == false) 
		console.log("material_nombre");
	else if (validacion(material_descripcion, "#material_descripcion") == false) 
        console.log("material_descripcion");
    else if (validacion(material_unidad, "#material_unidad") == false) 
        console.log("material_unidad");
    else if (validacion(material_stock, "#material_stock") == false) 
        console.log("material_stock");
    else if (validacion(material_precio, "#material_precio") == false) 
        console.log("material_precio");
	else {
		$(boton).attr("disabled", true);
		var dataString =
			"material_codigo=" +
			material_codigo +
			"&material_nombre=" +
			material_nombre +
			"&material_descripcion=" +
            material_descripcion +
            "&material_unidad=" +
            material_unidad +
            "&material_stock=" +
            material_stock +
            "&material_precio=" +
            material_precio +
			"&estado_id=" +
			estado_id;
		console.log(dataString);
		$.ajax({
			type: "POST",
			url: baseurl + controlador_material + "guardar",
			data: dataString,
			cache: false,
			success: function (result) {
				var resultado = $.trim(result);
				if (resultado == "true") {
					$(modal_material).modal("hide");
					swal("Registrado!", "Se guardo correctamente.", "success");
					location.href = baseurl + controlador_material;
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

function abastecimiento(id) {
	let cabecera = "#msg_cabecera_abastecimiento";
	let mensaje = "ABASTECIMIENTO";
	limpiar_rol();
	$(boton).attr("disabled", false);
	$(modal_abastecimiento).unbind();
	$(modal_abastecimiento).modal({ backdrop: "static", keyboard: false });
	$(modal_abastecimiento).modal("show");
	$(boton_abastecimiento).attr("onclick", "guardar_abastecimiento(" + id + ")");
	$(cabecera).html(mensaje);
	$(boton_abastecimiento).html("<i class='fa fa-check'></i>&nbsp;GUARDAR");
}

function guardar_abastecimiento(id){
	var material_abastecimiento = $("#material_abastecimiento").val();
	if (validacion(material_nombre, "#material_abastecimiento") == false) 
		console.log("material_abastecimiento");
	else {
		$(boton).attr("disabled", true);
		var dataString =
			"material_abastecimiento=" +
			material_abastecimiento +
			"&id=" +
			id;
		$.ajax({
			type: "POST",
			url: baseurl + controlador_material + "abastecimiento",
			data: dataString,
			cache: false,
			success: function (result) {
				console.log(result);
				var resultado = $.trim(result);
				if (resultado == "true") {
					$(modal_material).modal("hide");
					swal("Registrado!", "Tu registro ha sido actualizado.", "success");
					location.href = baseurl + controlador_material;
					console.log(result);
				} else {
					alert("Error!" + result);
				}
			},
			error: function (result) {},
		});
	}
}


function cambiar_material(id) {
	let cabecera = "#msg_cabecera";
	let mensaje = "EDITAR MATERIAL";
	limpiar_rol();
	$.ajax({
		url: baseurl + controlador_material + "obtener",
		type: "POST",
		data: { id: id },
		dataType: "JSON",
		success: function (data) {
			$(boton).attr("disabled", false);
			$("#material_codigo").val(data[0]["material_codigo"]);
			$("#material_nombre").val(data[0]["material_nombre"]);
            $("#material_descripcion").val(data[0]["material_descripcion"]);
            $("#material_unidad").val(data[0]["material_unidad"]);
			$("#material_stock").val(data[0]["material_stock"]);
            $("#material_precio").val(data[0]["material_precio"]);
			$("#estado_id").val(data[0]["estado_id"]);
			$(modal_material).modal({ backdrop: "static", keyboard: false });
			$(modal_material).modal("show");
			$(boton).attr("onclick", "modificar_material(" + id + ")");
			$(cabecera).html(mensaje + "#" + id);
			$(boton).html("<i class='fa fa-check'></i>&nbsp;ACTUALIZAR");
		},
	});
}

function modificar_material(id) {
	var material_codigo = $("#material_codigo").val();
	var material_nombre = $("#material_nombre").val();
    var material_descripcion = $("#material_descripcion").val();
    var material_unidad = $("#material_unidad").val();
    var material_stock = $("#material_stock").val();
    var material_precio = $("#material_precio").val();
	var estado_id = $("#estado_id").val();
	if (validacion(material_nombre, "#material_nombre") == false) 
		console.log("material_nombre");
	else if (validacion(material_descripcion, "#material_descripcion") == false) 
        console.log("material_descripcion");
    else if (validacion(material_unidad, "#material_unidad") == false) 
        console.log("material_unidad");
    else if (validacion(material_stock, "#material_stock") == false) 
        console.log("material_stock");
    else if (validacion(material_precio, "#material_precio") == false) 
        console.log("material_precio");
	else {
		$(boton).attr("disabled", true);
		var dataString =
			"material_codigo=" +
			material_codigo +
			"&material_nombre=" +
			material_nombre +
			"&material_descripcion=" +
            material_descripcion +
            "&material_unidad=" +
            material_unidad +
            "&material_stock=" +
            material_stock +
            "&material_precio=" +
            material_precio +
			"&estado_id=" +
			estado_id +
			"&id=" +
			id;
		$.ajax({
			type: "POST",
			url: baseurl + controlador_material + "modificar",
			data: dataString,
			cache: false,
			success: function (result) {
				console.log(result);
				var resultado = $.trim(result);
				if (resultado == "true") {
					$(modal_material).modal("hide");
					swal("Registrado!", "Tu registro ha sido actualizado.", "success");
					location.href = baseurl + controlador_material;
				} else {
					alert("Error!" + result);
				}
			},
			error: function (result) {},
		});
	}
}

function quitar_material(id) {
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
					url: baseurl + controlador_material + "eliminar",
					data: { id: id },
					cache: false,
					success: function (result) {
						var resultado = $.trim(result);
						if (resultado == "true") {
							swal("Eliminado!", "Tu registro ha sido eliminado.", "success");
							location.href = baseurl + controlador_material;
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
