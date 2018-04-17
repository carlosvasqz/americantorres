<br>
<div class="row">
    <div class="col-md-12">
    <div class="card col-md-5">
        <!-- <h3 class="card-title">Bar Chart</h3> -->
        <div class="embed-responsive embed-responsive-16by9">
        <canvas class="embed-responsive-item" id="graficoContenedores"></canvas>
        </div>
    </div>
    
    </div>
</div>
<script type="text/javascript">
    function datosContenedores() {
        $.ajax({
          type: "POST",
          url: "of_reporte_general_inversiones.php",
          data: "data",
          dataType: "json",
        }).done(function( inversion, textStatus, jqXHR ){
          console.log("Total en inversiones = " + inversion);

            $.ajax({
              type: "POST",
              url: "of_reporte_general_ganancias.php",
              data: "data",
              dataType: "json",
            }).done(function( ganancias, textStatus, jqXHR ){
              console.log("Total en ganancias = " + ganancias);

              var data = {
                labels: ["Inversiones - Ganancias"],
                datasets: [
                  {
                    label: "Inversiones",
                    fillColor: "rgba(105, 154, 187, 0.685)",
                    strokeColor: "rgba(105, 154, 187, 0.685)",
                    pointColor: "rgba(105, 154, 187, 0.685)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(105, 154, 187, 0.685)",
                    data: [inversion]
                  },
                  {
                    label: "Ganancias",
                    fillColor: "rgba(151, 205, 151, 0.705)",
                    strokeColor: "rgba(151, 205, 151, 0.705)",
                    pointColor: "rgba(151, 205, 151, 0.705)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgb(151, 205, 156)",
                    data: [ganancias]
                  }
                ]
              };
              var ctxb = $("#graficoContenedores").get(0).getContext("2d");
              var barChart = new Chart(ctxb).Bar(data);
              
            }).fail(function( json, textStatus, jqXHR ){
              console.log(json);
              alert(".fail");
            });

        }).fail(function( json, textStatus, jqXHR ){
          console.log(json);
          alert(".fail");
        });
      }
    datosContenedores();
</script>