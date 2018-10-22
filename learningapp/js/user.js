window.onload = function()
{
	getUserClass();
}

function highlightUserClass()
{
	var classNumber = getUserClass();
	
}

function getUserClass()
{
	var classNumber =  document.getElementsByName('user');
	return  classNumber[0].getAttribute('id');
}