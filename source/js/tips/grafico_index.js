jQuery(document).ready(function (){
    var data="value=x";
    $.ajax({
        type: "POST",
        url: "index_datos_grafico.php",
        data: data,
        dataType: "json",
    }).done(function( json, textStatus, jqXHR ){
        console.log(json);
        //alert(".done");
        data = {
            labels: [json.dia0.Nom, json.dia1.Nom, json.dia2.Nom, json.dia3.Nom, json.dia4.Nom, json.dia5.Nom, json.dia6.Nom],
            datasets: [      	
                {
                    label: "Ventas de la semana",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [json.dia0.Ventas, json.dia1.Ventas, json.dia2.Ventas, json.dia3.Ventas, json.dia4.Ventas, json.dia5.Ventas, json.dia6.Ventas]
                }
            ]
        };
        
        var ctxl = $("#lineChartDemo").get(0).getContext("2d");
        var lineChart = new Chart(ctxl).Line(data);
    }).fail(function( json, textStatus, jqXHR ){
        console.log(json);
        alert(".fail");
    });
});