<?php

class advInput {
    
    protected $Name;
    protected $ID;
    protected $Value;
    protected $Css;
    protected $Js;
    
    public function __construct($Name, $ID = null, $Value = null, $CssFile = null, $JsFile = null) {
        $this->Name = $Name;
        $this->ID = $ID;
        $this->Value = $Value;
        $this->DefaultValue = $DefaultValue;
        $this->Css = ($CssFile)? $CssFile : 'advInput.css';
        $this->Js = ($JsFile)? $JsFile : 'advInput.js';   
    }
    
    public function getCss() {
        return file_get_contents($this->Css);
    }
    
    public function getCssTag() {
        return '<link rel="stylesheet" type="text/css" href="'.$this->Css.'">';
    }
    
    public function getJs() {
        return file_get_contents($this->Js);
    }
    
    public function getJsTag() {
        return '<script type="text/javascript" src="'.$this->Js.'"></script>';
    }
    
    public function show() {
        $ret = '<div class="advInputDiv">';
        $ret .= '<input type="text" class="advInput" name="'.$this->Name.'"';
        $ret .= ($this->ID) ? ' id="'.$this->ID.'"' : '';
        $ret .= ($this->Value) ? ' value="'.$this->Value.'"' : '';
        $ret .= '></div>';
        return $ret;
    }
}

?>