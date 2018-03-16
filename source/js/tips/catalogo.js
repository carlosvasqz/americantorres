jQuery(document).ready(function (){

        $('#campo').on('change', function() {
            var data = "campo=" + $('#campo').val() + "&texto=" + this.value;
            //alert(data);
            $.ajax({
                type: "POST",
                url: "ci_catalogo_cantidad.php",
                data: data,
                dataType: "json",
            })
             .done(function( data, textStatus, jqXHR ){
                if (data) {
                    for (var index = 1; index <= data.Cantidad; index++) {
                        var data2 = "campo=" + data.Campo + "&texto=" + data.Texto + "&row=" + (index-1);
                        $.ajax({
                            type: "POST",
                            url: "ci_catalogo_datos.php",
                            data: data2,
                            dataType: "json",
                        })
                         .done(function( data, textStatus, jqXHR ){
                            if (data2) {
                                
                                $('#tip_cargo').val(data.Nom_Cargo).value;
                                $('#cod_dep').val(data.Cod_Dep).value;
                                $('#departamento').val(data.Nom_Dep).value;
                                $('#cod_cargo').val(data.Cod_Cargo).value;
                                $('#cargo').val(data.Nom_Cargo).value;
                                $('#id_empleado').val(data.Id_Empleado).value;
                                $('#empleado').val(data.Nom_Empleado).value;
                                $('#sueldo_base').val(data.Sueldo_Base).value;
                                $('#dedIHSSPorc').html('Deduccion IHSS (' + data.Ded_IHSS + ')');
                                $('#dedEspPorc').html('Deduccion Especial (' + data.Ded_Especiales + ')');
                                var sueldo_base = data.Sueldo_Base;
                                var ded_IHSS = data.Ded_IHSS;
                                var ded_Esp = data.Ded_Especiales;
                                calculo(sueldo_base, ded_IHSS, ded_Esp);
                                $('#sueldo_neto').val(data.Sueldo_Neto).value;
                            }
                         });

                    }
                }
             });
            //return false;
        });
    
        $('#codigo_historial_modificar').on('change', function() {
            var data = "Id_Pago=" + this.value;
            //alert(data);
            $.ajax({
                type: "POST",
                url: "pagos_ver_datos_modificar.php",
                data: data,
                dataType: "json",
            })
             .done(function( data, textStatus, jqXHR ){
                if (data) {
                    //alert(data);
                    $('#tip_emp').val(data.Nom_Empleado).value;
                    $('#cod_dep').val(data.Cod_Dep).value;
                    $('#departamento').val(data.Nom_Dep).value;
                    $('#cod_cargo').val(data.Cod_Cargo).value;
                    $('#cargo').val(data.Nom_Cargo).value;
                    $('#id_empleado').val(data.Id_Empleado).value;
                    $('#empleado').val(data.Nom_Empleado).value;
                    $('#sueldo_base').val(data.Sueldo_Base).value;
                    $('#dedIHSSPorc').html('Deduccion IHSS (' + (data.Ded_IHSS*(100/data.Sueldo_Base)) + ')');
                    $('#dedEspPorc').html('Deduccion Especial (' + (data.Ded_Especiales*(100/data.Sueldo_Base)) + ')');
                    $('#ded_IHSS').val(data.Ded_IHSS).value;
                    $('#ded_Esp').val(data.Ded_Especiales).value;
                    $('#sueldo_neto').val(data.Sueldo_Neto).value;
                    $('#fecha').val(data.Fecha).value;
                    $('#pago_extra').val(data.Pago_Extra).value;
                    $('#inputWarning').html(''+data.Descripcion_Pago_Extra);
                }
             });
            //return false;
        });
    
        $('#limpiarTodo').click(function (){
            $('#tip_cargo').val("").value;
            $('#cod_dep').val("").value;
            $('#departamento').val("").value;
            $('#cod_cargo').val("").value;
            $('#cargo').val("").value;
            $('#id_empleado').val("").value;
            $('#empleado').val("").value;
            $('#dedIHSSPorc').html('Deduccion IHSS');
            $('#dedEspPorc').html('Deduccion Especial');
            $('#sueldo_base').val("").value;
            $('#ded_IHSS').val("").value;
            $('#ded_Esp').val("").value;
            $('#sueldo_neto').val("").value;
        });
    
        $('#limpiarTodoModificar').click(function (){
            $('#tip_emp').val("").value;
            $('#cod_dep').val("").value;
            $('#departamento').val("").value;
            $('#cod_cargo').val("").value;
            $('#cargo').val("").value;
            $('#id_empleado').val("").value;
            $('#empleado').val("").value;
            $('#dedIHSSPorc').html('Deduccion IHSS');
            $('#dedEspPorc').html('Deduccion Especial');
            $('#sueldo_base').val("").value;
            $('#ded_IHSS').val("").value;
            $('#ded_Esp').val("").value;
            $('#sueldo_neto').val("").value;
            $('#fecha').val("").value;
            $('#inputError').val("").value;
            $('#inputSuccess').val("").value;
            $('#pago_extra').val("").value;
            $('#inputWarning').val("").value;
        });
    
        function limpiarTodoModificar(){
            $('#tip_emp').val("").value;
            $('#cod_dep').val("").value;
            $('#departamento').val("").value;
            $('#cod_cargo').val("").value;
            $('#cargo').val("").value;
            $('#id_empleado').val("").value;
            $('#empleado').val("").value;
            $('#dedIHSSPorc').html('Deduccion IHSS');
            $('#dedEspPorc').html('Deduccion Especial');
            $('#sueldo_base').val("").value;
            $('#ded_IHSS').val("").value;
            $('#ded_Esp').val("").value;
            $('#sueldo_neto').val("").value;
            $('#fecha').val("").value;
            $('#inputError').val("").value;
            $('#inputSuccess').val("").value;
            $('#pago_extra').val("").value;
            $('#inputWarning').val("").value;
        }
    
        function limpiarTodo(){
            $('#tip_cargo').val("").value;
            $('#cod_dep').val("").value;
            $('#departamento').val("").value;
            $('#cod_cargo').val("").value;
            $('#cargo').val("").value;
            $('#id_empleado').val("").value;
            $('#empleado').val("").value;
            $('#dedIHSSPorc').html('Deduccion IHSS');
            $('#dedEspPorc').html('Deduccion Especial');
            $('#sueldo_base').val("").value;
            $('#ded_IHSS').val("").value;
            $('#ded_Esp').val("").value;
            $('#sueldo_neto').val("").value;
        }
    
        function calculo(sueldo_base, ded_IHSS, ded_Esp) {
            var sueldoBaseFloat = parseFloat(sueldo_base);
            var dedIHSSFloat = parseFloat(ded_IHSS);
            var dedEspFloat = parseFloat(ded_Esp);
    
            var dedIHSSFloat = sueldoBaseFloat*(dedIHSSFloat/100);
            var dedEspFloat = sueldoBaseFloat*(dedEspFloat/100);
    
            $("#ded_IHSS").val(dedIHSSFloat.toFixed(2)).value;
            $("#ded_Esp").val(dedEspFloat.toFixed(2)).value;
        }
    
        $('#guardar').click(function () {
            var id_pago = $('#id_pago').val();
            var cod_dep = $('#cod_dep').val();
            var departamento = $('#departamento').val();
            var cod_cargo = $('#cod_cargo').val();
            var cargo = $('#cargo').val();
            var id_empleado = $('#id_empleado').val();
            var empleado = $('#empleado').val();
            var sueldo_base = $('#sueldo_base').val();
            var ded_IHSS = $('#ded_IHSS').val();
            var ded_Esp = $('#ded_Esp').val();
            var sueldo_neto = $('#sueldo_neto').val();
            var fecha = $('#fecha').val();
    
            // Validaciones de objetos vacios
            // if (id_pago=='') {
            // 	$("#id_pago").attr('required',true);
            // 	document.getElementById("id_pago").style.border="2px solid #a94442";
            // 	document.getElementById("id_pago").focus();
            // 	return false;
            // } else {
            // 	$("#id_pago").attr('required',false);
            // 	document.getElementById("id_pago").style.border="2px solid #3c763d";
            // }
            //------------------------
            if (departamento=='') {
                $("#departamento").attr('required',true);
                document.getElementById("departamento").style.border="2px solid #a94442";
                return false;
            } else {
                $("#departamento").attr('required',false);
                document.getElementById("departamento").style.border="2px solid #3c763d";
            }
            //------------------------
            if (cargo=='') {
                $("#cargo").attr('required',true);
                document.getElementById("cargo").style.border="2px solid #a94442";
                return false;
            } else {
                $("#cargo").attr('required',false);
                document.getElementById("cargo").style.border="2px solid #3c763d";
            }
            //------------------------
            if (empleado=='') {
                $("#empleado").attr('required',true);
                document.getElementById("empleado").style.border="2px solid #a94442";
                return false;
            } else {
                $("#empleado").attr('required',false);
                document.getElementById("empleado").style.border="2px solid #3c763d";
            }
            //------------------------
            if (sueldo_base=='') {
                $("#sueldo_base").attr('required',true);
                document.getElementById("sueldo_base").style.border="2px solid #a94442";
                document.getElementById("sueldo_base").focus();
                return false;
            } else {
                $("#sueldo_base").attr('required',false);
                document.getElementById("sueldo_base").style.border="2px solid #3c763d";
            }
            //------------------------
            if (ded_IHSS=='') {
                $("#ded_IHSS").attr('required',true);
                document.getElementById("ded_IHSS").style.border="2px solid #a94442";
                document.getElementById("ded_IHSS").focus();
                return false;
            } else {
                $("#ded_IHSS").attr('required',false);
                document.getElementById("ded_IHSS").style.border="2px solid #3c763d";
            }
            //------------------------
            if (ded_Esp=='') {
                $("#ded_Esp").attr('required',true);
                document.getElementById("ded_Esp").style.border="2px solid #a94442";
                document.getElementById("ded_Esp").focus();
                return false;
            } else {
                $("#ded_Esp").attr('required',false);
                document.getElementById("ded_Esp").style.border="2px solid #3c763d";
            }
            //------------------------
            if (sueldo_neto=='') {
                $("#sueldo_neto").attr('required',true);
                document.getElementById("sueldo_neto").style.border="2px solid #a94442";
                document.getElementById("sueldo_neto").focus();
                return false;
            } else {
                $("#sueldo_neto").attr('required',false);
                document.getElementById("sueldo_neto").style.border="2px solid #3c763d";
            }
            //------------------------
            if (fecha=='') {
                $("#fecha").attr('required',true);
                document.getElementById("fecha").style.border="2px solid #a94442";
                document.getElementById("fecha").focus();
                return false;
            } else {
                $("#fecha").attr('required',false);
                document.getElementById("fecha").style.border="2px solid #3c763d";
            }
            //------------------------
            // Fin de las Validaciones
    
            var data = 'id_pago=' + id_pago + '&cod_dep=' + cod_dep + '&cod_cargo=' + cod_cargo + '&id_empleado=' + id_empleado + '&sueldo_base=' + sueldo_base + '&ded_IHSS=' + ded_IHSS + '&ded_Esp=' + ded_Esp + '&sueldo_neto=' + sueldo_neto + '&fecha=' + fecha;
            //alert(data);
    
            $.ajax({
                //Direccion destino
                url: "pagos_guardar.php",
    
                // Variable con los datos necesarios
                data: data,
    
                // Metodo de envio de datos
                type: "POST",			
    
                // Formato de los datos que se espera recibir del servidor
                dataType: "html",
                
                //cache: false,
                
                // funcion a ejecutar cuando la consulta se realizo con exito
                success: function (data) {
                    //alert(data);
                    
                    // Si el servidor mando informacion
                    if (data) {
                        //Funcion que Notifica que todo correcto
                        $.notify({
                            title: "Correcto : ",
                            message: "El pago se ha registrado existosamente!",
                            icon: 'fa fa-check' 
                        },{
                            type: "success"
                        });
                        // Metodo par limpiar todos los campos
                        limpiarTodo();
                    }
                    // Si el servidor no mando informacion
                    if (!data) {
                        //Funcion que Notifica que hubo un error
                        $.notify({
                            title: "Error : ",
                            message: "Ya se realizo el pago de este mes al empleado seleccionado",
                            icon: 'fa fa-times' 
                        },{
                            type: "danger"
                        });
                    }
                    
                },
    
                // Funcion a realizar si la consulta no se realizo y hubo un error interno
                error : function(xhr, status) {
                    // alert('Disculpe, existió un problema');
                },
    
                // funcion a ejecutar siempre, aunque haya o no un error
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
    
        $('#modificar').click(function () {
            var id_pago = $('#codigo_historial_modificar').val();
            var cod_dep = $('#cod_dep').val();
            var departamento = $('#departamento').val();
            var cod_cargo = $('#cod_cargo').val();
            var cargo = $('#cargo').val();
            var id_empleado = $('#id_empleado').val();
            var empleado = $('#empleado').val();
            var sueldo_base = $('#sueldo_base').val();
            var ded_IHSS = $('#ded_IHSS').val();
            var ded_Esp = $('#ded_Esp').val();
            var sueldo_neto = $('#sueldo_neto').val();
            var fecha = $('#fecha').val();
            var valor_restar = $('#inputError').val();
            var valor_sumar = $('#inputSuccess').val();
            // var pago_extra = Math.abs($('#pago_extra').val());
            var pago_extra = $('#pago_extra').val();
            var descripcion_extra = $('#inputWarning').val();
    
            // Validaciones de objetos vacios
            // if (id_pago=='') {
            // 	$("#id_pago").attr('required',true);
            // 	document.getElementById("id_pago").style.border="2px solid #a94442";
            // 	document.getElementById("id_pago").focus();
            // 	return false;
            // } else {
            // 	$("#id_pago").attr('required',false);
            // 	document.getElementById("id_pago").style.border="2px solid #3c763d";
            // }
            //------------------------
            if (departamento=='') {
                $("#departamento").attr('required',true);
                document.getElementById("departamento").style.border="2px solid #a94442";
                return false;
            } else {
                $("#departamento").attr('required',false);
                document.getElementById("departamento").style.border="2px solid #3c763d";
            }
            //------------------------
            if (cargo=='') {
                $("#cargo").attr('required',true);
                document.getElementById("cargo").style.border="2px solid #a94442";
                return false;
            } else {
                $("#cargo").attr('required',false);
                document.getElementById("cargo").style.border="2px solid #3c763d";
            }
            //------------------------
            if (empleado=='') {
                $("#empleado").attr('required',true);
                document.getElementById("empleado").style.border="2px solid #a94442";
                return false;
            } else {
                $("#empleado").attr('required',false);
                document.getElementById("empleado").style.border="2px solid #3c763d";
            }
            //------------------------
            if (sueldo_base=='') {
                $("#sueldo_base").attr('required',true);
                document.getElementById("sueldo_base").style.border="2px solid #a94442";
                document.getElementById("sueldo_base").focus();
                return false;
            } else {
                $("#sueldo_base").attr('required',false);
                document.getElementById("sueldo_base").style.border="2px solid #3c763d";
            }
            //------------------------
            if (ded_IHSS=='') {
                $("#ded_IHSS").attr('required',true);
                document.getElementById("ded_IHSS").style.border="2px solid #a94442";
                document.getElementById("ded_IHSS").focus();
                return false;
            } else {
                $("#ded_IHSS").attr('required',false);
                document.getElementById("ded_IHSS").style.border="2px solid #3c763d";
            }
            //------------------------
            if (ded_Esp=='') {
                $("#ded_Esp").attr('required',true);
                document.getElementById("ded_Esp").style.border="2px solid #a94442";
                document.getElementById("ded_Esp").focus();
                return false;
            } else {
                $("#ded_Esp").attr('required',false);
                document.getElementById("ded_Esp").style.border="2px solid #3c763d";
            }
            //------------------------
            if (sueldo_neto=='') {
                $("#sueldo_neto").attr('required',true);
                document.getElementById("sueldo_neto").style.border="2px solid #a94442";
                document.getElementById("sueldo_neto").focus();
                return false;
            } else {
                $("#sueldo_neto").attr('required',false);
                document.getElementById("sueldo_neto").style.border="2px solid #3c763d";
            }
            //------------------------
            if (fecha=='') {
                $("#fecha").attr('required',true);
                document.getElementById("fecha").style.border="2px solid #a94442";
                document.getElementById("fecha").focus();
                return false;
            } else {
                $("#fecha").attr('required',false);
                document.getElementById("fecha").style.border="2px solid #3c763d";
            }
            //------------------------
            if (inputError==''||inputError==null) {
                $("#inputError").attr('required',true);
                document.getElementById("inputError").style.border="2px solid #a94442";
                document.getElementById("inputError").focus();
                return false;
            } else {
                $("#inputError").attr('required',false);
                document.getElementById("inputError").style.border="2px solid #3c763d";
            }
            //------------------------
            if (inputSuccess==''||inputSuccess==null) {
                $("#inputSuccess").attr('required',true);
                document.getElementById("inputSuccess").style.border="2px solid #a94442";
                document.getElementById("inputSuccess").focus();
                return false;
            } else {
                $("#inputSuccess").attr('required',false);
                document.getElementById("inputSuccess").style.border="2px solid #3c763d";
            }
            //------------------------
            if (inputWarning=='') {
                $("#inputWarning").attr('required',true);
                document.getElementById("inputWarning").style.border="2px solid #a94442";
                document.getElementById("inputWarning").focus();
                return false;
            } else {
                $("#inputWarning").attr('required',false);
                document.getElementById("inputWarning").style.border="2px solid #3c763d";
            }
            //------------------------
            // Fin de las Validaciones
    
            var data = 'id_pago=' + id_pago + '&cod_dep=' + cod_dep + '&cod_cargo=' + cod_cargo + '&id_empleado=' + id_empleado + '&sueldo_base=' + sueldo_base + '&ded_IHSS=' + ded_IHSS + '&ded_Esp=' + ded_Esp + '&sueldo_neto=' + sueldo_neto + '&fecha=' + fecha + '&pago_extra=' + pago_extra + '&descripcion_extra=' + descripcion_extra;
            //alert(data);
    
            $.ajax({
                //Direccion destino
                url: "pagos_cambiar.php",
    
                // Variable con los datos necesarios
                data: data,
    
                // Metodo de envio de datos
                type: "POST",			
    
                // Formato de los datos que se espera recibir del servidor
                dataType: "html",
                
                //cache: false,
                
                // funcion a ejecutar cuando la consulta se realizo con exito
                success: function (data) {
                    //alert(data);
                    
                    // Si el servidor mando informacion
                    if (data) {
                        //Funcion que Notifica que todo correcto
                        $.notify({
                            title: "Correcto : ",
                            message: "El pago se ha modificado existosamente!",
                            icon: 'fa fa-check' 
                        },{
                            type: "success"
                        });
                        // Metodo par limpiar todos los campos
                        limpiarTodoModificar();
                    }
                    // Si el servidor no mando informacion
                    if (!data) {
                        //Funcion que Notifica que hubo un error
                        $.notify({
                            title: "Error : ",
                            message: "Ha ocurrido un error interno, contacte al administrador",
                            icon: 'fa fa-times' 
                        },{
                            type: "danger"
                        });
                    }
                    
                },
    
                // Funcion a realizar si la consulta no se realizo y hubo un error interno
                error : function(xhr, status) {
                    // alert('Disculpe, existió un problema');
                },
    
                // funcion a ejecutar siempre, aunque haya o no un error
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
    
    function calculoExtra() {
        var restarString = $('#inputError').val();
        var sumarString = $('#inputSuccess').val();
        var dedIHSSString = $('#ded_IHSS').val();
        var dedEspString = $('#ded_Esp').val();
        var sueldo_baseString = $('#sueldo_base').val();
        var restar, sumar, sueldo_neto;
    
    
        if(restarString==''){
            restar = 0;
        }
        if(restarString!==''){
            restar = parseFloat(restarString);
        } 
    
    
        if (sumarString=='') {
            sumar = 0;
        } 
        if (sumarString!=='') {
            sumar = parseFloat(sumarString);
        } 
    
    
        if (dedIHSSString=='') {
            dedIHSS = 0;
        } 
        if (dedIHSSString!=='') {
            dedIHSS = parseFloat(dedIHSSString);
        } 
    
    
        if (dedEspString=='') {
            dedEsp = 0;
        } 
        if (dedEspString!=='') {
            dedEsp = parseFloat(dedEspString);
        } 
    
    
        if (sueldo_baseString=='') {
            sueldo_base = 0;
        } 
        if (sueldo_baseString!=='') {
            sueldo_base = parseFloat(sueldo_baseString);
        } 
        
        var pago_extra = sumar-restar;
        $("#pago_extra").val(pago_extra.toFixed(2)).value;
    
        var sueldo_neto_nuevo = (sueldo_base - dedIHSS - dedEsp ) + pago_extra;
        $("#sueldo_neto").val(sueldo_neto_nuevo.toFixed(2)).value;
    }