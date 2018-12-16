window.onload = function()
{
	
	$.ajax({
		type: "POST",
		url: "../php/test_ajax/user_question_answer_statistics.php",

		success: function(data){
			console.log(data);
			
			var statistics = {
				true_cnt : [],
				false_cnt : [],
				day : []					
			}
			
			var len = JSON.parse(data).length;
			data = JSON.parse(data);
			
			for(var i = 0; i < len; i++)
			{
				statistics.day.push(data[i].created_date);
				statistics.true_cnt.push(data[i].true_cnt);
				statistics.false_cnt.push(data[i].false_cnt);
			}
			
			var ctx = document.getElementById("user_answer_statistics").getContext('2d');

			var data = {
					  labels: statistics.day,
					  datasets: [{
					    label: 'Poprawne',
					    backgroundColor: 'rgba(75, 192, 192, 0.4)',
					    data: statistics.true_cnt
					  }, {
					    label: "Niepoprawne",
					    backgroundColor: 'rgba(255, 99, 132, 0.4)',
					    data: statistics.false_cnt
					  }]
					};

					var myBarChart = new Chart(ctx, {
					  type: 'bar',
					  data: data,
					  options: {
					    barValueSpacing: 20,
					    scales: {
					      yAxes: [{
					        ticks: {
					          min: 0,
					        }
					      }]
					    }
					  }
				});
			
		}
	})
	
	
	$.ajax({
		type: "POST",
		url: "../php/test_ajax/user_question_answer_current_month_statistics.php",

		success: function(data){
			
			var obj = JSON.parse(data);
			var ctx = document.getElementById("user_answer_current_month_statistics").getContext('2d');

			var data = {
							labels:  ["Poprawne", "Niepoprawne"],
							datasets: [{
								  data: [obj[0].true_cnt, obj[0].false_cnt],
								  backgroundColor: [ 'rgb(51, 204, 51, 0.6)', 'rgba(255, 99, 132, 0.6)']
							}]
						};
			var myPieChart = new Chart(ctx,{
			    type: 'pie',
			    data: data
			});
			
		}
	})

	$.ajax({
		type: "POST",
		url: "../php/test_ajax/user_question_answer_last_month_statistics.php",

		success: function(data){
			
			var obj = JSON.parse(data);
			var ctx = document.getElementById("user_answer_last_month_statistics").getContext('2d');

			var data = {
							labels: ["Poprawne", "Niepoprawne"],
							datasets: [{
								  data: [obj[0].true_cnt, obj[0].false_cnt],
								  backgroundColor: [ 'rgb(51, 204, 51, 0.6)', 'rgba(255, 99, 132, 0.6)']
							}]
						};
			var myPieChart = new Chart(ctx,{
			    type: 'pie',
			    data: data
			});
			
		}
	})

}