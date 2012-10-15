<?php

/*
 * advInput by Mariush
 * version 1.1.0
 * 
 * Required jQuery!
 * 
 * Usage:
 * 
 * Include or require this file (advInput.class.php)
 * 
 * Make a PHP variable (or variables) with instance of advInput class
 * eg.
 * $input = new AdvInput('name','value',array('some_class'),array('style'->'max-width:200px');
 * 
 * Only the first parameter is required
 * 
 * Include Css and Js files in your HTML file HEAD section
 * 
 * Write simple script
 * <script type="text/javascript">
 * var advInput = new advInput(function(advInput){
 *   //do some ajax stuff to save advInput value
 * });
 * </script>
 * 
 * Replace comment with your code to handle save advInput
 * value using AJAX
 * 
 */

class advInput {
    
    protected $Name;
    protected $ID;
    protected $Value;
    protected static $Counter = 0;
    protected $Class;
    protected $Params;
    
    public function __construct($Name, $Value = null, $Class = null, $Params = null) {
        $this->Name = $Name;
        $this->Value = $Value;
        $this->Class = $Class;
        $this->Params = $Params;
        $this->ID = self::$Counter;
        self::$Counter++;
    }
        
    public function show() {
        $ret = '<div class="advInputDiv" id="advInputDiv'.$this->ID.'"><div class="advInputBackground" id="advInputBackground'.$this->ID.'"></div>';
        $ret .= '<input type="text" class="advInput';
        foreach ($this->Class as $Class) {
            $ret .= ' '.$Class;
        }
        $ret .= '" name="'.$this->Name.'"';
        $ret .= ' id="'.$this->ID.'"';
        $ret .= ($this->Value) ? ' value="'.$this->Value.'"' : '';
        foreach ($this->Params as $Key=>$Param) {
            $ret .= ' '.$Key.'="'.$Param.'"';
        }
        $ret .= '></div>';
        return $ret;
    }
}

?>