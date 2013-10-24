<?php

$this->widget('ext.niceditor.nicEditorWidget',array(
    "model"=>$model,                // Data-Model
    "attribute"=>$attribute,        // Attribute in the Data-Model
    "defaultValue"=>'defaultValue text here',
    "config"=>array("maxHeight"=>"200px"),
    "width"=>"400px",       // Optional default to 100%
    "height"=>"200px",      // Optional default to 150px
));
?>
