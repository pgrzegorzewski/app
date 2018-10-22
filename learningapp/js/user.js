window.onload = function()
{
	highlightUserClass();
}

function highlightUserClass()
{
	var classNumber = getUserClass();
	var classElements = document.getElementsByClassName('class_' + classNumber);
	for(i = 0; i < classElements.length; i++)
	{	
		if(classElements[i].getElementsByTagName('a')[0])
		{
			classElements[i].getElementsByTagName('a')[0].style.color = "#AFC2D1";
		}
		classElements[i].style.backgroundColor = "#4D658D";
		classElements[i].style.color = "#AFC2D1";
		
	}
}

function getUserClass()
{
	var classNumber =  document.getElementsByName('user');
	return  classNumber[0].getAttribute('id');
}