$(document).ready(function () {
	$('#agregar').click(function () {
		var Id_categoria=$('#codigo_categoria').val();
		var Nombre=$('#nombre_categoria').val();
		var Descripcion=$('#descripcion_categoria').val();


		
		

		if (Id_categoria=='') {
			$("#codigo_categoria").attr('required',true);
			document.getElementById("codigo_categoria").style.border="2px solid #a94442";
			document.getElementById("codigo_categoria").focus();
			return false;
		} else {
			$("#codigo_categoria").attr('required',false);
			document.getElementById("codigo_categoria").style.border="2px solid #3c763d";
		}

		if (Nombre=='') {
			$("#nombre_categoria").attr('required',true);
			document.getElementById("nombre_categoria").style.border="2px solid #a94442";
			document.getElementById("nombre_categoria").focus();
			return false;
		} else {
			$("#nombre_categoria").attr('required',false);
			document.getElementById("nombre_categoria").style.border="2px solid #3c763d";
		}

		if (Descripcion=='') {
			$("#descripcion_categoria").attr('required',true);
			document.getElementById("descripcion_categoria").style.border="2px solid #a94442";
			document.getElementById("descripcion_categoria").focus();
			return false;
		} else {
			$("#descripcion_categoria").attr('required',false);
			document.getElementById("descripcion_categoria").style.border="2px solid #3c763d";
		}

		
		

		
		var data = 'codigo_categoria=' + Id_categoria + '&nombre_categoria=' + Nombre + '&descripcion_categoria=' + Descripcion;
		//alert(data);
		
		$.ajax({
			
			url: "guardar_categoria.php",

			data: data,

			type: "POST",			

			dataType: "html",
			
			//cache: false,
			
			//success

			success: function (data) {
				//alert(data);
				
				if (data) {
					alert(data);
					$.notify({
						title: "Correcto : ",
						message: "¡Datos de categoria guardado exitosamente!",
						icon: 'fa fa-check' 
					},{
						type: "success"
					});
					$("#codigo_categoria").val("").value;
					$("#nombre_categoria").val("").value;
	                $("#descripcion_categoria").val("").value;
	               
	                
				}
				if (!data) {
					$.notify({
						title: "Error : ",
						message: "Ya existe una categoria con este codigo",
						icon: 'fa fa-times' 
					},{
						type: "danger"
					});
				}
				
			},

			error : function(xhr, status) {
				 alert('Disculpe, existió un problema');
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












