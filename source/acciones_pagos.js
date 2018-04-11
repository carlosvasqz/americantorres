$(document).ready(function () {
	$('#agregar').click(function () {
		var tipo_de_servicio=$('#tipo_de_servicio').val();
		var monto_de_registro=$('#monto_de_registro').val();
		var fecha_pago=$('#fecha_pago').val();
		

		var activo_disponible = $('input[name="disponible"]:checked').val();
		

		
	

		if (tipo_de_servicio=='') {
			$("#tipo_de_servicio").attr('required',true);
			document.getElementById("tipo_de_servicio").style.border="2px solid #a94442";
			document.getElementById("tipo_de_servicio").focus();
			return false;
		} else {
			$("#tipo_de_servicio").attr('required',false);
			document.getElementById("tipo_de_servicio").style.border="2px solid #3c763d";
		}

		if (monto_de_registro=='') {
			$("#monto_de_registro").attr('required',true);
			document.getElementById("monto_de_registro").style.border="2px solid #a94442";
			document.getElementById("monto_de_registro").focus();
			return false;
		} else {
			$("#monto_de_registro").attr('required',false);
			document.getElementById("monto_de_registro").style.border="2px solid #3c763d";
		}

		if (fecha_pago=='') {
			$("#fecha_pago").attr('required',true);
			document.getElementById("fecha_pago").style.border="2px solid #a94442";
			document.getElementById("fecha_pago").focus();
			return false;
		} else {
			$("#fecha_pago").attr('required',false);
			document.getElementById("fecha_pago").style.border="2px solid #3c763d";
		}

		


		
		var data = 'tipo_de_servicio=' + tipo_de_servicio + '&monto_de_registro=' + monto_de_registro + '&fecha_pago=' + fecha_pago;
		//alert(data);
		
		$.ajax({
			
			url: "guardar_pago.php",

			data: data,

			type: "POST",			

			dataType: "html",
			
			//cache: false,
			
			//success

			success: function (data) {
				//alert(data);
				
				if (data) {
					//alert(data);
					$.notify({
						title: "Correcto : ",
						message: "Ha realizado correctamente su pago!",
						icon: 'fa fa-check' 
					},{
						type: "success"
					});
					$("#tipo_de_servicio").val("").value;
					$("#monto_de_registro").val("").value;
	                $("#fecha_pago").val("").value;
				}
				if (!data) {
					$.notify({
						title: "Error : ",
						message: "Ya ha realizado su pago",
						icon: 'fa fa-times' 
					},{
						type: "danger"
					});
				}
				
			},

			error : function(xhr, status) {
				// alert('Disculpe, existió un problema');
			},

			complete : function(xhr, status) {
				// alert('Petic
				// $.notify({
				// 		title: "Informacion : ",
				// 		message: "Petición realizada!",
				// 		icon: 'fa fa-check' 
				// 	},{
				// 		type: "info"
				// });
	}
      	});
				
		return false;

	});

});