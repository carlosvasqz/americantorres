$(document).ready(function () {
	$('#agregar').click(function () {
		var codigo_categoria=$('#codigo_categoria').val();
		var nombre_categoria=$('#nombre_categoria').val();
		var descripcion_categoria=$('#descripcion_categoria').val();


		
		

		if (codigo_categoria=='') {
			$("#codigo_categoria").attr('required',true);
			document.getElementById("codigo_categoria").style.border="2px solid #a94442";
			document.getElementById("codigo_categoria").focus();
			return false;
		} else {
			$("#codigo_categoria").attr('required',false);
			document.getElementById("codigo_categoria").style.border="2px solid #3c763d";
		}

		if (nombre_categoria=='') {
			$("#nombre_categoria").attr('required',true);
			document.getElementById("nombre_categoria").style.border="2px solid #a94442";
			document.getElementById("nombre_categoria").focus();
			return false;
		} else {
			$("#nombre_categoria").attr('required',false);
			document.getElementById("nombre_categoria").style.border="2px solid #3c763d";
		}

		if (descripcion_categoria=='') {
			$("#descripcion_categoria").attr('required',true);
			document.getElementById("descripcion_categoria").style.border="2px solid #a94442";
			document.getElementById("descripcion_categoria").focus();
			return false;
		} else {
			$("#descripcion_categoria").attr('required',false);
			document.getElementById("descripcion_categoria").style.border="2px solid #3c763d";
		}

		
		

		
		var data = 'codigo_categoria=' + codigo_categoria + '&nombre_categoria=' + nombre_categoria + '&descripcion_categoria=' + descripcion_categoria;
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
					//alert(data);
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

	$('#modificar').click(function () {
		var codigo_categoria=$('#codigo_categoria').val();
		var nombre_categoria=$('#nombre_categoria').val();
		var descripcion_categoria=$('#descripcion_categoria').val();


		
		

		if (codigo_categoria=='') {
			$("#codigo_categoria").attr('required',true);
			document.getElementById("codigo_categoria").style.border="2px solid #a94442";
			document.getElementById("codigo_categoria").focus();
			return false;
		} else {
			$("#codigo_categoria").attr('required',false);
			document.getElementById("codigo_categoria").style.border="2px solid #3c763d";
		}

		if (nombre_categoria=='') {
			$("#nombre_categoria").attr('required',true);
			document.getElementById("nombre_categoria").style.border="2px solid #a94442";
			document.getElementById("nombre_categoria").focus();
			return false;
		} else {
			$("#nombre_categoria").attr('required',false);
			document.getElementById("nombre_categoria").style.border="2px solid #3c763d";
		}

		if (descripcion_categoria=='') {
			$("#descripcion_categoria").attr('required',true);
			document.getElementById("descripcion_categoria").style.border="2px solid #a94442";
			document.getElementById("descripcion_categoria").focus();
			return false;
		} else {
			$("#descripcion_categoria").attr('required',false);
			document.getElementById("descripcion_categoria").style.border="2px solid #3c763d";
		}

		
		

		
		var data = 'codigo_categoria=' + codigo_categoria + '&nombre_categoria=' + nombre_categoria + '&descripcion_categoria=' + descripcion_categoria;
		//alert(data);
		
		$.ajax({
			
			url: "modificar_categoria.php",

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












