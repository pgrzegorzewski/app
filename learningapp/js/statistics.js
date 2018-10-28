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
					    label: 'Right',
					    backgroundColor: 'rgba(75, 192, 192, 0.4)',
					    data: statistics.true_cnt
					  }, {
					    label: "Wrong",
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
	

}