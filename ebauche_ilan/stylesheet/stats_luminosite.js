$(document).ready(function(){
	$.ajax({
		url: "http://localhost/APP_INFO_G1D/ebauche_ilan/Vue/data_luminosite.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var date = [];
			var donnee = [];

			for(var i in data) {
				date.push(data[i].date_donnees);
				donnee.push(data[i].valeur);
			}

			var chartdata = {
				labels: date,
				datasets : [
					{
						label: 'Luminosite de la maison : ',
						backgroundColor: 'rgba(200, 200, 200, 0.75)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: donnee
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