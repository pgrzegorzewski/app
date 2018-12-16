window.onload = function()
{
	
	$.ajax({
		type: "POST",
		url: "../php/test_ajax/user_question_answer_statistics.php",

		success: function(data){
			
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
	});
	
	
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
	});

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
	});
	
	$.ajax({
		type: "POST",
		url: "../php/test_ajax/user_activity_summary.php",

		success: function(data){
			
			var obj = JSON.parse(data);
			var ctx = document.getElementById("user_activity_summary").getContext('2d');
			console.log(data);
			var data = {
							labels: ["Zalogowano", "Niezalogowano"],
							datasets: [{
								  data: [obj[0].days_logged, obj[0].days_not_logged],
								  backgroundColor: [ 'rgb(204, 255, 153, 0.6)', 'rgba(204, 0, 102, 0.6)']
							}]
						};
			var myDoughnutChart = new Chart(ctx,{
			    type: 'doughnut',
			    data: data
			});
			
		}
	});
	
	
	$.ajax({
		type: "POST",
		url: "../php/test_ajax/user_category_question_per_level_summary.php",

		success: function(data){
			console.log(data);
			
			var statistics = {
				count : [],
				category_name : [],
				level : []					
			};
			
			data_json = JSON.parse(data);
			
			data_json_inner = data_json[0];
			console.log(data_json_inner.summary);
			
			//var len = (JSON.parse(data_json_inner.summary)).length;
						
			statistics.category_name = Object.keys(JSON.parse(data_json_inner.summary));
			
			var innerKeys = [];
			var len = statistics.category_name.length;
			
			
			for(var i = 0; i < len; i++)
			{
				console.log(statistics.category_name[i]);
				console.log(Object(JSON.parse(data_json_inner.summary))[statistics.category_name[i]]);
				console.logs
				innerKeys +=  Object.keys(Object(JSON.parse(data_json_inner.summary))[statistics.category_name[i]]);
			}
			console.log(innerKeys);
			
			var ctx = document.getElementById("user_category_question_per_level_summary").getContext('2d');
			var barChart = new Chart(ctx, {
			    type: 'bar',
			    data: {
			        labels: statistics.category_name,
			        datasets: [{
						      backgroundColor: '#00ff00',
			            label: '# of Votes 2016',
			            data: [12, 19]
			            }]
					}
			});

			/*function addData(chart, label, color, data) {
					chart.data.datasets.push({
				    label: label,
			      backgroundColor: color,
			      data: data
			    });
			    chart.update();
			}

			// inserting the new dataset after 3 seconds
			setTimeout(function() {
				addData(barChart, '# of Votes 2017', '#ff0000', [16, 14, 8]);
			}, 3000);
			*/

			
		}
	})

}