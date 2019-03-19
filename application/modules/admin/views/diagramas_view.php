
<link rel="stylesheet" type="text/css" href="static/main/datapicker/bootstrap-datetimepicker.css">
 
<script type="text/javascript" charset="utf8" src="static/main/datapicker/moment-with-locales.js"></script>
<script type="text/javascript" charset="utf8" src="static/main/datapicker/bootstrap-datetimepicker.js"></script>


<script type="text/javascript" charset="utf8" src="static/main/chart.js"></script>


<script>
	function actualizar () {
		
		$('#modal_cargando').modal();
		$.ajax({
			type: "post",
			url: "admin/diagramas/get_resultados",
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(jqXHR, textStatus, errorThrown);
				$('#myModalLabel').text('Carga demorada...');
				actualizar();
			},
			dataType: "json",
			//data : {fecha:$('#tiempoInicioDate').val()},
			success: function(response) {
				console.log(response);
				$('.div_reporte').css('display','block');
				$('#myModalLabel').text('Cargando datos...');
				$('#modal_cargando').modal('hide');

				/////////////////////////////////////////////////////////////////////////////
				$("#canvas-holder2").html('<canvas id="barTraza" width="300" height="300"/>');
				var barChartData = response.barChartData;
				var ctx2 = document.getElementById("barTraza").getContext("2d");


		
				window.myBar = new Chart(ctx2).Line(response.barChartData, {
					responsive : true,
					bezierCurve : true,
					scaleSteps: 8,
					scaleStartValue: 21,
					scaleStepWidth: 1,
					scaleOverride: true,
					pointDotRadius : 6
				});

				/*var tabla_trazabilidad = '<table class="table table-bordered"><tr><th>Día</th><th style="background:#79B9DE">Entradas</th><th style="background:#D8D4D4">Salidas</th></tr>';
				var cont1=0,cont2=0;
				for(var ind in barChartData['datasets'][0]['data']){
					tabla_trazabilidad+='<tr><td>'+barChartData['labels'][ind].toUpperCase()+'</td><td style="background:#79B9DE">'+barChartData['datasets'][0]['data'][ind].toUpperCase() +'</td><td style="background:#D8D4D4">'+barChartData['datasets'][1]['data'][ind].toUpperCase() +'</td></tr>';
					cont1+=parseInt(barChartData['datasets'][0]['data'][ind]);
					cont2+=parseInt(barChartData['datasets'][1]['data'][ind]);
				}
				tabla_trazabilidad +='<tr class="warning"><td>SubTotal</td><td>'+cont1+'</td><td>'+cont2+'</td></tr><tr class="danger"><td></td><td>Total</td><td>'+(cont1+cont2)+'</td></tr></table>';
				$('#tabla_trazabilidad').html(tabla_trazabilidad);*/
			}
				//////////////////////////////////////////////////////////////////////////////
		});
			

	}

	$(function() {
		$('#tiempoInicio').datetimepicker({
            locale: 'es',
            viewMode: 'days',
        	format: 'DD/MM/YYYY'
        });

        $('#tiempoInicioDate').click(function  () {
        	$('#boton_calendar').click();
        });
	});
</script>

<style type="text/css">
	h4{text-decoration: underline; }
	div.div_reporte{display: none; }
	td, th{border-color:black !important }
	.tabla_datos{padding-top: 10px; }
</style>


<div class="container">

	<h3>Reportes 14/05/2016</h3>

	<div class="row">
		<!-- <div class="col-md-3">
			<div class="form-group">
                <div class='input-group date' id='tiempoInicio'>
                    <input name="datos_a_enviar" type='text' class="form-control" id="tiempoInicioDate" value="<?php echo date('d/m/Y') ?>"/>
                    <span class="input-group-addon" id="boton_calendar">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
		</div> -->

		<div class="col-md-3">
			<button class="btn btn-success" onclick="actualizar()">Mostrar</button>
		</div>
	</div>

	<div class="row div_reporte">
		<div class="col-md-8">
			<h3>Temperatura</h3>
			<div id="canvas-holder2">
				<canvas id="barTraza" width="300" height="300"/>
			</div>
			<hr>
		</div>
		<div class="col-md-4 tabla_datos" id="tabla_trazabilidad" style="border: 1px solid black; overflow-x: hidden; height: 777px; overflow-y: scroll;"></div>
	</div>

	<br>
	<br>

	<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="modal_cargando">
	  <div class="modal-dialog">
	    <div class="modal-content">
	    	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Cargando datos...</h4>
		    </div>
	
	    </div>
	  </div>
	</div>


</div>
	