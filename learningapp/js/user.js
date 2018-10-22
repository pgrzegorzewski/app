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
		classElements[i].classList.add('userClassElement');
		
	}
}

function getUserClass()
{
	var classNumber =  document.getElementsByName('user');
	return  classNumber[0].getAttribute('id');
}