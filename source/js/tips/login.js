jQuery(document).ready(
    function (){

        $('#acceder').click(
             function () {
                var $usuario = $('input[name=usuario]');
                var $pass = $('input[name=password]');
                //alert($usuario.val() + "-" + $pass.val());
                //----//
                if ($usuario.val()=='') {
                    $('#usuario').attr('required', true);

                    document.getElementById("usuario").style.border="2px solid red";
                    document.getElementById("usuario").focus();

                    return false;
                } else {
                    $('#usuario').attr('required', false);
                    document.getElementById("usuario").style.border="2px solid green";
                }
                //----//
                if ($pass.val()=='') {
                    $("#password").attr('undefined', true);

                    document.getElementById("password").style.border="2px solid red";
                    document.getElementById("password").focus();

                    return false;
                } else {
                    $("#password").attr('required', false);
                    document.getElementById("password").style.border="2px solid green";
                }
                //----//
                
                var data = "usuario=" + $usuario.val() + "&pass=" + $pass.val();
                
                $.ajax(
                    {
                        type: "POST",
                        url: "validar-login.php",
                        data: data,
                        dataType: "html",
                        cache: false,

                        success: function (data) {
                            $('#tip').fadeIn(1000);
                            $('#tip').fadeOut(4000);
                            $('#tip').html(data);
                        }
                    }
                );
                return false;
            }

        );

        $('#desbloquear').click(
            function () {
               var $usuario = $('input[name=usuario]');
               var $pass = $('input[name=password]');
               //alert($usuario.val() + "-" + $pass.val());
               //----//
               
               var data = "usuario=" + $usuario.val() + "&pass=" + $pass.val();
               
               $.ajax(
                   {
                       type: "POST",
                       url: "validar-bloqueo.php",
                       data: data,
                       dataType: "html",
                       cache: false,

                       
                       success: function (data) {
                           $('#password').html(data);
                       }
                   }
               );
               return false;
           }

       );
    }
);