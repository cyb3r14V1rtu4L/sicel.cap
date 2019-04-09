<?php   
if(count($this->templates)>0)
{
    foreach($this->templates as $template )
    {
        require_once $template;
    }
}