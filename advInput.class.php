<?php

/*
 * advInput by Mariush
 * version 1.0.1
 * 
 * Required jQuery!
 * 
 * Usage:
 * 
 * Include or require this file (advInput.class.php)
 * 
 * Make variable eg. $advInit with instance of advInputInit class;
 * In HEAD section write:
 * <?=$advInit->getCssTag()?> or <?=$advInit->getCss()?> for CSS
 * and
 * <?=$advInit->getJsTag()?> or <?=$advInit->getJs()?> for JS
 * 
 * Make sure that you inserted right paths to advInputInit constructor
 * 
 * Now make variable (or variables) with instances of advInput
 * In place where you wat to place advInput write
 * <?=$advInput->show()?>
 * 
 * Where $advInput is variable with advInput class instance
 * 
 * If you want to save advInput value you can use 2 ways:
 * - make form submit
 * - write some ajax code in saveAdvInput function in file AdvInput.js
 * 
 * 
 */

class advInputInit {
    
    protected $Css;
    protected $Js;
    
    public function __construct($CssFile = null, $JsFile = null) {
        $this->Css = ($CssFile)? $CssFile : './advInput/advInput.css';
        $this->Js = ($JsFile)? $JsFile : './advInput/advInput.js';          
    }
    
    public function getCss() {
        return '<style type="text/css">'.file_get_contents($this->Css).'</style>';
    }
    
    public function getCssTag() {
        return '<link rel="stylesheet" type="text/css" href="'.$this->Css.'">';
    }
    
    public function getJs() {
        return '<script type="text/javascript">'.file_get_contents($this->Js).'</script>';
    }
    
    public function getJsTag() {
        return '<script type="text/javascript" src="'.$this->Js.'"></script>';
    }    
    
}

class advInput {
    
    protected $Name;
    protected $ID;
    protected $Value;
    protected static $Counter = 0;
    
    public function __construct($Name, $Value = null, $CssFile = null, $JsFile = null) {
        $this->Name = $Name;
        $this->Value = $Value;
        $this->DefaultValue = $DefaultValue;
        $this->ID = self::$Counter;
        self::$Counter++;
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