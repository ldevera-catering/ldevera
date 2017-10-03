$(document).ready(function(){
	$.ajax({
		url : "http://localhost/samples/followersdata.php",
		type : "GET",
		success : function(data){
			console.log(data);

			var reference_id = [];
			var event_date = [];
		

			for(var i in data) {
				event_date.push("event_date " + data[i].event_date);


				reference_id.push(data[i].Client);
			
			}

			var chartdata = {
				labels: event_date,

				datasets: [
					{
						label: "Client",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(59, 89, 152, 0.75)",
						borderColor: "rgba(59, 89, 152, 1)",
						pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
						pointHoverBorderColor: "rgba(59, 89, 152, 1)",

						data: reference_id
					}
				]
			};

			var ctx = $("#mycanvas");

			var LineGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata
			});
		},
		error : function(data) {

		}
	});
});