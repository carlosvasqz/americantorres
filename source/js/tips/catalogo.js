jQuery(document).ready(function (){

    function obtenerDatos() {
        var campo = $('#campo').val();
        var texto = $('#texto').val();
        var data = "campo=" + campo + "&texto=" + texto;
        //alert(data);
        $('div').remove('.col-md-3');
        $('div').remove('.modal');
        $('div').remove('#cardSinResultados');
        if (seleccionarConsulta(campo, texto)==1) {
            //alert(data);
                $.ajax({
                    type: "POST",
                    url: "ci_catalogo_datos_full.php",
                    data: data,
                    dataType: "json",
                })
                .done(function( data, textStatus, jqXHR ){
                    //alert(".done - data.exito=" + data.exito + " mensaje="+data.datos.mensaje+" articulo="+data.datos.articulo.Id_Articulo);
                    if (data.exito) {
                        //console.log(data);
                        var card = "";
                        var modal = "";
                        $.each(data.datos.articulo, function( key, value ) {
                            //alert(data.datos.articulo.id);
                            card += "<div class='col-md-3'>" +
                                "<div class='card'>" +
                                    "<div class='card-title-w-btn'>" +
                                        "<h3 class='title'>" + value['Id_Articulo'] + "</h3>" +
                                        "<p><a class='btn btn-primary icon-btn' data-toggle='modal' data-target='#" + value['Id_Articulo'] + "'><i class='fa fa-plus'></i>Ver</a></p>" +
                                    "</div>" +
                                    "<div class='card-body'>" +
                                        value['Descripcion_Art'] + "<br />" +
                                        "<b>Precio:</b> L." + value['Precio_Art'] + "<br>" +
                                        "<b>Cantidad:</b> " + value['Cantidad_Art']+"<br>" +
                                        "<b>Estado:</b> " + value['Estado_Art'] +
                                    "</div>"+
                                "</div>"+
                            "</div>";
                            var Disponible_Art = "";
                            if (value['Disponible_Art']=='S') {
                                Disponible_Art = 'Si';
                            } else {
                                Disponible_Art = 'No';
                            }
                            modal += "" +
                            //"<!-- Modal Dialog ====================================================================================================================== -->" +
                            //"<!-- Default Size -->" +
                            "<div class='modal fade' id=" + value['Id_Articulo'] + " tabindex='-1' role='dialog'>" +
                                "<div class='modal-dialog' role='document'>" +
                                    "<div class='modal-content'>" +
                                        "<div class='modal-header'>" +
                                            "<h4 class='modal-title' id='defaultModalLabel'>Detalles de articulo</h4>" +
                                        "</div>" +
                                        "<div class='modal-body'>" +
                                        "<table class='table table-hover'>"+
                                            "<thead>" +
                                            "<tr>" +
                                                "<th>Campo</th>" +
                                                "<th>Detalle</th>" +
                                            "</tr>" +
                                            "</thead>" +
                                            "<tbody>" +
                                            "<tr>" +
                                                "<td><b>Codigo de articulo:</b></td>" +
                                                "<td>" + value['Id_Articulo'] + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                                "<td><b>Descripcion:</b></td>" +
                                                "<td>" + value['Descripcion_Art'] + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                                "<td><b>Precio:</b></td>" +
                                                "<td>L. " + value['Precio_Art'] + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                                "<td><b>Cantidad:</b></td>" +
                                                "<td>" + value['Cantidad_Art'] + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                                "<td><b>Disponible:</b></td>" +
                                                "<td>" + Disponible_Art + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                                "<td><b>Contenedor:</b></td>" +
                                                "<td>" + value['Id_Contenedor'] + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                                "<td><b>Categoria:</b></td>" +
                                                "<td>" + value['Nombre_Cat'] + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                                "<td><b>Estado:</b></td>" +
                                                "<td>" + value['Estado_Art'] + "</td>" +
                                            "</tr>" +
                                            "</tbody>" +
                                        "</table>" +
                                        "</div>" +
                                        "<div class='modal-footer'>" +
                                            "<button type='button' class='btn btn-link waves-effect' data-dismiss='modal'>CERRAR</button>" +
                                        "</div>" +
                                    "</div>" +
                                "</div>" +
                            "</div>";
                        });
    
                        $( "#row" ).append(card+modal);
    
                    }else{
                        //alert(data.exito);
                        var sinResultados = ""+
                        "<div class='col-md-12' id='cardSinResultados'>" +
                            "<div class='card'>" +
                                "<div class='card-body text-center text-primary'>" +
                                    "<h4>No se han encontrado resultados</h4>"
                                "</div>" +
                            "</div>" +
                        "</div>";
    
                        $( "#row" ).append(sinResultados);
                    }
                })
                .fail(function( data, textStatus, jqXHR ){
                    alert(".fail - data.exito=" + data.exito + " query=1");
                });
        }
        if (seleccionarConsulta(campo, texto)==2) {
            //alert(data);
                $.ajax({
                    type: "POST",
                    url: "ci_catalogo_datos_query.php",
                    data: data,
                    dataType: "json",
                })
                .done(function( data, textStatus, jqXHR ){
                    //alert(".done - data.exito=" + data.exito);
                    if (data.exito==true) {
                        //console.log(data);
                        var card = "";
                        var modal = "";
                        $.each(data.datos.articulo, function( key, value ) {
                            //alert(data.datos.articulo.id);
                            card += "<div class='col-md-3'>" +
                                "<div class='card'>" +
                                    "<div class='card-title-w-btn'>" +
                                        "<h3 class='title'>" + value['Id_Articulo'] + "</h3>" +
                                        "<p><a class='btn btn-primary icon-btn' data-toggle='modal' data-target='#" + value['Id_Articulo'] + "'><i class='fa fa-plus'></i>Ver</a></p>" +
                                    "</div>" +
                                    "<div class='card-body'>" +
                                        value['Descripcion_Art'] + "<br />" +
                                        "<b>Precio:</b> L." + value['Precio_Art'] + "<br>" +
                                        "<b>Cantidad:</b> " + value['Cantidad_Art']+"<br>" +
                                        "<b>Estado:</b> " + value['Estado_Art'] +
                                    "</div>"+
                                "</div>"+
                            "</div>";
                            var Disponible_Art = "";
                            if (value['Disponible_Art']=='S') {
                                Disponible_Art = 'Si';
                            } else {
                                Disponible_Art = 'No';
                            }
                            modal += "" +
                            //"<!-- Modal Dialog ====================================================================================================================== -->" +
                            //"<!-- Default Size -->" +
                            "<div class='modal fade' id=" + value['Id_Articulo'] + " tabindex='-1' role='dialog'>" +
                                "<div class='modal-dialog' role='document'>" +
                                    "<div class='modal-content'>" +
                                        "<div class='modal-header'>" +
                                            "<h4 class='modal-title' id='defaultModalLabel'>Detalles de articulo</h4>" +
                                        "</div>" +
                                        "<div class='modal-body'>" +
                                        "<table class='table table-hover'>"+
                                            "<thead>" +
                                            "<tr>" +
                                                "<th>Campo</th>" +
                                                "<th>Detalle</th>" +
                                            "</tr>" +
                                            "</thead>" +
                                            "<tbody>" +
                                            "<tr>" +
                                                "<td><b>Codigo de articulo:</b></td>" +
                                                "<td>" + value['Id_Articulo'] + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                                "<td><b>Descripcion:</b></td>" +
                                                "<td>" + value['Descripcion_Art'] + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                                "<td><b>Precio:</b></td>" +
                                                "<td>L. " + value['Precio_Art'] + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                                "<td><b>Cantidad:</b></td>" +
                                                "<td>" + value['Cantidad_Art'] + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                                "<td><b>Disponible:</b></td>" +
                                                "<td>" + Disponible_Art + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                                "<td><b>Contenedor:</b></td>" +
                                                "<td>" + value['Id_Contenedor'] + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                                "<td><b>Categoria:</b></td>" +
                                                "<td>" + value['Nombre_Cat'] + "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                                "<td><b>Estado:</b></td>" +
                                                "<td>" + value['Estado_Art'] + "</td>" +
                                            "</tr>" +
                                            "</tbody>" +
                                        "</table>" +
                                        "</div>" +
                                        "<div class='modal-footer'>" +
                                            "<button type='button' class='btn btn-link waves-effect' data-dismiss='modal'>CERRAR</button>" +
                                        "</div>" +
                                    "</div>" +
                                "</div>" +
                            "</div>";
                        });
    
                        $( "#row" ).append(card+modal);
    
                    }else{
                        //alert(data.exito);
                        var sinResultados = ""+
                        "<div class='col-md-12' id='cardSinResultados'>" +
                            "<div class='card'>" +
                                "<div class='card-body text-center text-primary'>" +
                                    "<h4>No se han encontrado resultados</h4>"
                                "</div>" +
                            "</div>" +
                        "</div>";
    
                        $( "#row" ).append(sinResultados);
                    }
                })
                .fail(function( data, textStatus, jqXHR ){
                    alert(".fail - data.exito=" + data.exito + " query=2");
                });
        }
        
         //return false;
    }
    
    function seleccionarConsulta(campo, texto) {
        if (campo!=='Ninguno') {
            if (texto!=='') {
                return 2;
            } else {
                return 1;
            }
        } else {
            return 1;
        }
    }

    obtenerDatos();

    $("#campo").on('change', function(){
        if (this.value=="Ninguno") {
            $("#texto").val("").value;
            obtenerDatos();
        }else{
            $("#texto").val("").value;
        }
    });

    $("#texto").keyup( function(){
        if ($("#campo").val()!=="Ninguno") {
            obtenerDatos();
        }
    });

        // $('#texto').on('change', function() {
        //     //this.preventDefault();
        //     var campo = $('#campo').val();
        //     var texto = this.value;
        //     if (campo!=='Ninguno') {
        //         if (texto!=='') {
        //             recuperarDatos(campo, texto, 2);   
        //         }
        //     }
        //     else {
        //         recuperarDatos(campo, texto, 1);
        //     }    
        //     //return false;
        // });
    
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

    