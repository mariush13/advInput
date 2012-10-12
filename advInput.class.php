<?php

/*
 * advInput by Mariush
 * version 0.1.0
 * 
 * Usage:
 * In your PHP file make an variable with ne instance
 * of this class. Make sure that you put a valid paths
 * to CSS and JS files.
 * 
 * From one of instances fire getCss or getCssFile methods for CSS
 * and getJs or getJsFile for JS
 * 
 * Fire the show method from each instances in place where you
 * want to put advInputs
 * 
 * TODO ajax saving handler
 * 
 */

class advInput {
    
    protected $Name;
    protected $ID;
    protected $Value;
    protected $Css;
    protected $Js;
    protected static $Counter = 0;
    
    public function __construct($Name, $Value = null, $CssFile = null, $JsFile = null) {
        $this->Name = $Name;
        $this->Value = $Value;
        $this->DefaultValue = $DefaultValue;
        $this->Css = ($CssFile)? $CssFile : 'advInput.css';
        $this->Js = ($JsFile)? $JsFile : 'advInput.js';         
        $this->ID = self::$Counter;
        self::$Counter++;
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
        $ret = '<div class="advInputDiv" id="advInputDiv'.$this->ID.'"><div class="advInputBackground" id="advInputBackground'.$this->ID.'"></div>';
        $ret .= '<input type="text" class="advInput" name="'.$this->Name.'"';
        $ret .= ' id="'.$this->ID.'"';
        $ret .= ($this->Value) ? ' value="'.$this->Value.'"' : '';
        $ret .= '></div>';
        return $ret;
    }
}

?>