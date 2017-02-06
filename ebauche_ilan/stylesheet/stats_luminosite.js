$(document).ready(function(){
	$.ajax({
		url: "http://localhost/APP_INFO_G1D/ebauche_ilan/Vue/data_luminosite.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var player = [];
			var score = [];

			for(var i in data) {
				player.push(data[i].date_donnees);
				score.push(data[i].valeur);
			}

			var chartdata = {
				labels: player,
				datasets : [
					{
						label: 'Temperature de la maison : ',
						backgroundColor: 'rgba(200, 200, 200, 0.75)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: score
					}
				]
			};

			var ctx = $("#mycanvas_luminosite");

			var barGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});