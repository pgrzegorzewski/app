function addNewQuestion(button)
{
	button.hidden = true;
	var id = Number(button.id) + 1;
	
	document.getElementById("testSubmit").hidden = true;
	
	var questionTemplate = $("#questionTemplate").html();
	
	$("#question_container").append(questionTemplate.replace(/{{id}}/g, id));
}

function addAnswers(select)
{
	select.disabled = true;
	
	var id = select.id.slice(-1);
	console.log(id);
	
	var answearContainer = '#question_answers_container_' + id;
	console.log(answearContainer);
	
	var questionAnswearTemplate = $("#questionAnswersTemplate").html();
	$(answearContainer).append(questionAnswearTemplate.replace(/{{id}}/g, id));
	
	var activeAnswears = select.options[select.selectedIndex].value;
	
	showAnswears(activeAnswears, id);
	
	
}

function showAnswears(activeAnswears, id)
{
	var classString = "questionAnswer" + id;
	
	var answears = document.getElementsByClassName("questionAnswer" + id);
	
	console.log(answears.length);
	for (i = 0; i < activeAnswears; i++) {
	    answears[i].hidden = false;
	}
}

function add()
{
	var testName = document.getElementById("testName").value;
	var testClass =  $('input[type="radio"][name="testClassChoose"]:checked').val();
	var testCategory = $('input[type="radio"][name="testCategoryChoose"]:checked').val();

	var testQuestionCnt = document.getElementsByClassName("new_question_div");
	console.log(testQuestionCnt.length);
	
	var questions = new Array();
	var questionAnswers = new Array();
	var iterator = 0;
	var answerIterator = 0;
	$('.newQuestion').each(function(){
		questions[iterator] = $('#'+(iterator+1)+' input[class="testQuestion"]').val();
		var answerInnerIterator = 0;
		$('#question_answers_container_'+(iterator+1)+ ' .questionAnswer' + (iterator+1)+':visible').each(function(){
			questionAnswers[answerIterator] = new Array();
			questionAnswers[answerIterator][0] = iterator+1;
			questionAnswers[answerIterator][1] = $('#answer' +(iterator+1)+ '_' +(answerInnerIterator+1)+ '>  input[class="question_answer_input"]').val();
			questionAnswers[answerIterator][2] = $('#answer' +(iterator+1)+ '_' +(answerInnerIterator+1)+ '>  input[type="radio"]').is(':checked');
			questionAnswers[answerIterator][3] = answerInnerIterator+1;
			answerIterator++;
			answerInnerIterator++;
		});
		iterator++;

	 });
	console.log(questionAnswers);
	console.log(questions);
	//questionAnswers = json_encode(questionAnswers);
	//questions = json_encode(questions);
	$.ajax({
		type: "POST",
		url: "../php/test_ajax/add_new_test.php",
		data:{
			questionAnswers: questionAnswers,
			questions: questions,
			testName: testName,
			testCategory: testCategory,
			testClass: testClass
			
		},
		success: function(data){
			console.log(data);
		}
	})
}

