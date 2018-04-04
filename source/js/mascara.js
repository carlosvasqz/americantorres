        jQuery(function($){

            $("#codigo_articulo").mask("9,99", {

 

                // Generamos un evento en el momento que se rellena

                completed:function(){

                    $("#codigo_articulo").addClass("ok")

                }

            });

 

            // Definimos las mascaras para cada input

            $("#date").mask("99/99/9999");

            $("#movil").mask("999 99 99 99");

            $("#codigo_articulo").mask("aaa");

            $("#comodines").mask("?");

        });