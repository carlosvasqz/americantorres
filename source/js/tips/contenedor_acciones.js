$(document).ready(function () {
	$('#agregar').click(function () {
		var codigo_contenedor=$('#codigo_contenedor').val();
		var descripcion_contenedor=$('#descripcion_contenedor').val();
		var costo_contenedor=$('#costo_contenedor').val();
		var FI_contenedor=$('#FI_contenedor').val();
		var procedencia_contenedor=$('#procedencia_contenedor').val();
		

		if (codigo_contenedor=='') {
			$("#codigo_contenedor").attr('required',true);
			document.getElementById("codigo_contenedor").style.border="2px solid #a94442";
			document.getElementById("codigo_contenedor").focus();
			return false;
		} else {
			$("#codigo_contenedor").attr('required',false);
			document.getElementById("codigo_contenedor").style.border="2px solid #3c763d";
		}

		if (descripcion_contenedor=='') {
			$("#descripcion_contenedor").attr('required',true);
			document.getElementById("descripcion_contenedor").style.border="2px solid #a94442";
			document.getElementById("descripcion_contenedor").focus();
			return false;
		} else {
			$("#descripcion_contenedor").attr('required',false);
			document.getElementById("descripcion_contenedor").style.border="2px solid #3c763d";
		}

		if (costo_contenedor=='') {
			$("#costo_contenedor").attr('required',true);
			document.getElementById("costo_contenedor").style.border="2px solid #a94442";
			document.getElementById("costo_contenedor").focus();
			return false;
		} else {
			$("#costo_contenedor").attr('required',false);
			document.getElementById("costo_contenedor").style.border="2px solid #3c763d";
		}

		if (FI_contenedor=='') {
			$("#FI_contenedor").attr('required',true);
			document.getElementById("FI_contenedor").style.border="2px solid #a94442";
			document.getElementById("FI_contenedor").focus();
			return false;
		} else {
			$("#FI_contenedor").attr('required',false);
			document.getElementById("FI_contenedor").style.border="2px solid #3c763d";
		}

		if (procedencia_contenedor=='') {
			$("#contenedor_articulo").attr('required',true);
			document.getElementById("procedencia_contenedor").style.border="2px solid #a94442";
			document.getElementById("procedencia_contenedor").focus();
			return false;
		} else {
			$("#procedencia_contenedor").attr('required',false);
			document.getElementById("procedencia_contenedor").style.border="2px solid #3c763d";
		}

		
		var data = 'codigo_contenedor=' + codigo_contenedor + '&descripcion_contenedor=' + descripcion_contenedor + '&costo_contenedor=' + costo_contenedor + '&FI_contenedor=' + FI_contenedor + '&procedencia_contenedor=' + procedencia_contenedor;
		//alert(data);
		
		$.ajax({
			
			url: "guardar_contenedor.php",

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
						message: "¡Datos de contenedor guardado exitosamente!",
						icon: 'fa fa-check' 
					},{
						type: "success"
					});
					$("#codigo_contenedor").val("").value;
					$("#descripcion_contenedor").val("").value;
	                $("#costo_contenedor").val("").value;
	                $("#FI_contenedor").val("").value;
		            $("#procedencia_contenedor").val("").value;
		          
	                
				}
				if (!data) {
					$.notify({
						title: "Error : ",
						message: "Ya existe un contenedor con este codigo",
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












