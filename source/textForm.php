<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <section>
        <form action="testPHP.php" method="get">
            <input type="text" name="texto" id="texto" value="texto">
            <input type="hidden" id="oculto1" name="oculto1" value="">
            <input type="hidden" id="oculto2" name="oculto2" value="">
            <input type="hidden" id="oculto3" name="oculto3" value="">
            <input type="hidden" id="oculto4" name="oculto4" value="">
            <input type="button" id="cargarDatos" value="CARGAR DATOS">
            <input type="submit" value="ENVIAR">
        </form>
    </section>
    <script src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function (){
            $("#cargarDatos").click(function(){
                $("#oculto1").val('valor1.1,valor1.2,valor1.3').value;
                $("#oculto1").attr('value', "valor1.1,valor1.2,valor1.3");
                $("#oculto2").attr('value', "valor2.1,valor2.2,valor2.3");
                $("#oculto3").attr('value', "valor3.1,valor3.2,valor3.3");
                $("#oculto4").attr('value', "valor4.1,valor4.2,valor4.3");
                // alert();
            });
        });
    </script>
</body>
</html>