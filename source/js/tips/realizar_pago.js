$(document).ready(function () {
	$('#pago').click(function () {
		var nombre_pago=$('#nombre_pago').val();
		var monto_pago=$('#monto_pago').val();
		var fecha_pago=$('#fecha_pago').val();
	

		if (nombre_pago=='') {
			$("#nombre_pago").attr('required',true);
			document.getElementById("nombre_pago").style.border="2px solid #a94442";
			document.getElementById("nombre_pago").focus();
			return false;
		} else {
			$("#nombre_pago").attr('required',false);
			document.getElementById("nombre_pago").style.border="2px solid #3c763d";
		}

		if (monto_pago=='') {
			$("#monto_pago").attr('required',true);
			document.getElementById("monto_pago").style.border="2px solid #a94442";
			document.getElementById("monto_pago").focus();
			return false;
		} else {
			$("#monto_pago").attr('required',false);
			document.getElementById("monto_pago").style.border="2px solid #3c763d";
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

		var array_fecha = fecha_pago.split("-")  
        var day = parseInt(array_fecha[2]); 
		var month = (array_fecha[1]); 
		var year  = parseInt(array_fecha[0]);
	

		
		var data = 'nombre_pago=' + nombre_pago + '&fecha_pago=' + fecha_pago + '&monto_pago=' + monto_pago + '&month=' + month + '&year=' + year;
		//alert(data);
		
		
		$.ajax({
			
			url: "guardar_pago.php",

			data: data,

			type: "POST",			

			dataType: "html",
			
			//cache: false,
			
			//success

			success: function (data) {
				//$("#errores").html(data);
				if (data) {
					$.notify({
						title: "Correcto : ",
						message: "¡Se ha registrado exitosamente el pago!",
						icon: 'fa fa-check' 
					},{
						type: "success"
					});
					$("#nombre_pago").val("").value;
					$("#monto_pago").val("").value;
	                $("#fecha_pago").val("").value;    
				}
				if (!data) {
					$.notify({
						title: "Error : ",
						message: "Ya se realizo pago en este mes",
						icon: 'fa fa-times' 
					},{
						type: "danger"
					});
				}
				
			},

			error : function(xhr, status) {
				//alert('Disculpe, existió un problema');
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
