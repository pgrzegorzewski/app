var subject;
var classNumber;
var isClassSet = 0;
var isSubjectSet = 0;


function setClass(classNumber)
{
    this.classNumber = classNumber; 
    this.isClassSet = 1; 
    if(this.subject)
    {
    	$.post('http://localhost:90/app/learningapp/php/class_material.php', {subject : this.subject, classNumber: this.classNumber}, function(data){
    		$("#material").html(data);
    	})
    }
}
    
function setSubject(subject)
{      
    this.subject = subject;
    this.isSubjectSet = 1; 
    if(this.subject)
    {
    	$.post('http://localhost:90/app/learningapp/php/class_material.php', {subject : this.subject, classNumber: this.classNumber}, function(data){
    		$("#material").html(data);
    	})
    }
}

