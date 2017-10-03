
$(document).ready(function(){
	$.ajax({
		url: "http://localhost/samples/data.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var status = [];
			var client = [];

			for(var i in data) {
				status.push("Status " + data[i].reservation_status);
				client.push(data[i].reference_id);
			}

			var chartdata = {
				labels: status,
				datasets : [
					{
						label: 'Client',
						backgroundColor: 'rgba(200, 200, 200, 0.75)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: client
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});