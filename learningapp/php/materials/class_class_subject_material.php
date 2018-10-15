<?php 
 
class ClassSubjectMaterial
{
    public $materialText;
    function __construct($class, $subject)
    {
        if($class == '7' && $subject == 'english')
        {
            $this->printMaterialEnglishClass7();
        }
        else {
           $this->materialText = "unfortunately there are no materials for this section";
        }
    }
    
    function printMaterialEnglishClass7()
    {
        $this->materialText = '
                                   <iframe width="560" height="315" 
                                   src="https://www.youtube.com/embed/kXiMDpQzHV0" 
                                   frameborder="0" allow="autoplay;
                                   encrypted-media" allowfullscreen> 
                                   </iframe>

                                ';
    }
    
    function getMaterialText()
    {
        return $this->materialText;
    }
    
}



?>