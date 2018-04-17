$(document).ready(function () {
	$('#agregar').click(function () {
		var codigo_articulo=$('#codigo_articulo').val();
		var descripcion_articulo=$('#descripcion_articulo').val();
		var precio_articulo=$('#precio_articulo').val();
		var cantidad_articulo=$('#cantidad_articulo').val();
		var contenedor_articulo=$('#contenedor_articulo').val();
		var categoria_articulo=$('#categoria_articulo').val();
		var valor=$('#disponible').val();
		var estado=$('#estado').val();

		var activo_disponible = $('input[name="disponible"]:checked').val();
		

		
	

		if (codigo_articulo=='') {
			$("#codigo_articulo").attr('required',true);
			document.getElementById("codigo_articulo").style.border="2px solid #a94442";
			document.getElementById("codigo_articulo").focus();
			return false;
		} else {
			$("#codigo_articulo").attr('required',false);
			document.getElementById("codigo_articulo").style.border="2px solid #3c763d";
		}

		if (descripcion_articulo=='') {
			$("#descripcion_articulo").attr('required',true);
			document.getElementById("descripcion_articulo").style.border="2px solid #a94442";
			document.getElementById("descripcion_articulo").focus();
			return false;
		} else {
			$("#descripcion_articulo").attr('required',false);
			document.getElementById("descripcion_articulo").style.border="2px solid #3c763d";
		}

		if (precio_articulo=='') {
			$("#precio_articulo").attr('required',true);
			document.getElementById("precio_articulo").style.border="2px solid #a94442";
			document.getElementById("precio_articulo").focus();
			return false;
		} else {
			$("#precio_articulo").attr('required',false);
			document.getElementById("precio_articulo").style.border="2px solid #3c763d";
		}

		if (cantidad_articulo=='') {
			$("#cantidad_articulo").attr('required',true);
			document.getElementById("cantidad_articulo").style.border="2px solid #a94442";
			document.getElementById("cantidad_articulo").focus();
			return false;
		} else {
			$("#cantidad_articulo").attr('required',false);
			document.getElementById("cantidad_articulo").style.border="2px solid #3c763d";
		}

		if (contenedor_articulo=='') {
			$("#contenedor_articulo").attr('required',true);
			document.getElementById("contenedor_articulo").style.border="2px solid #a94442";
			document.getElementById("contenedor_articulo").focus();
			return false;
		} else {
			$("#contenedor_articulo").attr('required',false);
			document.getElementById("contenedor_articulo").style.border="2px solid #3c763d";
		}

	

		if (categoria_articulo=='') {
			$("#categoria_articulo").attr('required',true);
			document.getElementById("categoria_articulo").style.border="2px solid #a94442";
			document.getElementById("categoria_articulo").focus();
			return false;
		} else {
			$("#categoria_articulo").attr('required',false);
			document.getElementById("categoria_articulo").style.border="2px solid #3c763d";
		}


		
		var data = 'codigo_articulo=' + codigo_articulo + '&descripcion_articulo=' + descripcion_articulo + '&precio_articulo=' + precio_articulo + '&cantidad_articulo=' + cantidad_articulo + '&contenedor_articulo=' + contenedor_articulo + '&categoria_articulo=' + categoria_articulo +  '&activo_disponible=' + activo_disponible + '&estado=' + estado;
		//alert(data);
		
		$.ajax({
			
			url: "guardar_articulo.php",

			data: data,

			type: "POST",			

			dataType: "html",
			
			//cache: false,
			
			//success

			success: function (data) {
				//alert(data);
				
				if (data) {
					$.notify({
						title: "Correcto : ",
						message: "Datos de articulo guardado exitosamente!",
						icon: 'fa fa-check' 
					},{
						type: "success"
					});
					$("#codigo_articulo").val("").value;
					$("#descripcion_articulo").val("").value;
	                $("#precio_articulo").val("").value;
	                $("#cantidad_articulo").val("").value;
		            $("#contenedor_articulo").val("").value;
		            $("#categoria_articulo").val("").value;
	                
				}
				if (!data) {
					$.notify({
						title: "Error : ",
						message: "Ya existe un articulo con este codigo",
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

		// Obtener los valores de los objetos a traves de su id 
var codigo_articulo=$('#codigo_articulo').val();
		var descripcion_articulo=$('#descripcion_articulo').val();
		var precio_articulo=$('#precio_articulo').val();
		var cantidad_articulo=$('#cantidad_articulo').val();
		var contenedor_articulo=$('#contenedor_articulo').val();
		var categoria_articulo=$('#categoria_articulo').val();
		var valor=$('#disponible').val();
		var estado=$('#estado').val();
		var activo_disponible = $('input[name="disponible"]:checked').val();
		
	if (codigo_articulo=='') {
			$("#codigo_articulo").attr('required',true);
			document.getElementById("codigo_articulo").style.border="2px solid #a94442";
			document.getElementById("codigo_articulo").focus();
			return false;
		} else {
			$("#codigo_articulo").attr('required',false);
			document.getElementById("codigo_articulo").style.border="2px solid #3c763d";
		}

		if (descripcion_articulo=='') {
			$("#descripcion_articulo").attr('required',true);
			document.getElementById("descripcion_articulo").style.border="2px solid #a94442";
			document.getElementById("descripcion_articulo").focus();
			return false;
		} else {
			$("#descripcion_articulo").attr('required',false);
			document.getElementById("descripcion_articulo").style.border="2px solid #3c763d";
		}

		if (precio_articulo=='') {
			$("#precio_articulo").attr('required',true);
			document.getElementById("precio_articulo").style.border="2px solid #a94442";
			document.getElementById("precio_articulo").focus();
			return false;
		} else {
			$("#precio_articulo").attr('required',false);
			document.getElementById("precio_articulo").style.border="2px solid #3c763d";
		}

		if (cantidad_articulo=='') {
			$("#cantidad_articulo").attr('required',true);
			document.getElementById("cantidad_articulo").style.border="2px solid #a94442";
			document.getElementById("cantidad_articulo").focus();
			return false;
		} else {
			$("#cantidad_articulo").attr('required',false);
			document.getElementById("cantidad_articulo").style.border="2px solid #3c763d";
		}

		if (contenedor_articulo=='') {
			$("#contenedor_articulo").attr('required',true);
			document.getElementById("contenedor_articulo").style.border="2px solid #a94442";
			document.getElementById("contenedor_articulo").focus();
			return false;
		} else {
			$("#contenedor_articulo").attr('required',false);
			document.getElementById("contenedor_articulo").style.border="2px solid #3c763d";
		}

	

		if (categoria_articulo=='') {
			$("#categoria_articulo").attr('required',true);
			document.getElementById("categoria_articulo").style.border="2px solid #a94442";
			document.getElementById("categoria_articulo").focus();
			return false;
		} else {
			$("#categoria_articulo").attr('required',false);
			document.getElementById("categoria_articulo").style.border="2px solid #3c763d";
		}
		// Fin de las Validaciones
		
		// Variable con todos los valores necesarios para la consulta
		var data = 'codigo_articulo=' + codigo_articulo + '&descripcion_articulo=' + descripcion_articulo + '&precio_articulo=' + precio_articulo + '&cantidad_articulo=' + cantidad_articulo + '&contenedor_articulo=' + contenedor_articulo + '&categoria_articulo=' + categoria_articulo +  '&activo_disponible=' + activo_disponible + '&estado=' + estado;

		//alert(data);
		$.ajax({
			
			//Direccion destino
			url: "articulo_modificar.php",

			// Variable con los datos necesarios
			data: data,

			type: "POST",			

			dataType: "html",
			
			//cache: false,
			
			//success
			success: function (data) {
				//alert(data);
				
				if (data) {
					

					$.notify({

						title: "Correcto : ",
						message: "!Los datos de articulo se modificaron exitosamennte¡",
						icon: 'fa fa-check' 
					},{
						type: "success"
					});
					$("#codigo_articulo").val("").value;
					$("#descripcion_articulo").val("").value;
	                $("#precio_articulo").val("").value;
	                $("#cantidad_articulo").val("").value;
		            $("#contenedor_articulo").val("").value;
		            $("#categoria_articulo").val("").value;
		            $("#estado").val("").value;
				}
				if (!data) {
					$.notify({
						title: "Error : ",
						message: "!codigo ingresado no existe!",
						icon: 'fa fa-times' 
					},{
						type: "danger"
					});
				}
				
			},

			error : function(xhr, status) {
				//  alert('Disculpe, existió un problema');
			},

			complete : function(xhr, status) {
				// alert('Petición realizada');
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
$('#limpiarTodo').click(function (){
 	
		

		 $('#codigo_articulo').val("").value;
		 $('#descripcion_articulo').val("").value;
		 $('#precio_articulo').val("").value;
		 $('#cantidad_articulo').val("").value;
		 $('#contenedor_articulo').val("").value;
		 $('#categoria_articulo').val("").value;
	     $('#disponible').val("").value;
		 $('#estado').val("").value;
           
	});

	function limpiarTodo(){
		 $('#codigo_articulo').val("").value;
		 $('#descripcion_articulo').val("").value;
		 $('#precio_articulo').val("").value;
		 $('#cantidad_articulo').val("").value;
		 $('#contenedor_articulo').val("").value;
		 $('#categoria_articulo').val("").value;
	     $('#disponible').val("").value;
		 $('#estado').val("").value;
	}


 $('#limpiarBuscar').click(function (){
 	 $("#codigo_buscar").val("").value;
	
	});

	function limpiarBuscar(){
		 $("#codigo_buscar").val("").value;
		
	}













