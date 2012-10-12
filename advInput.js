$(document).ready(function(){
   
    $('.advInput').blur(function(){
        advInputBlur($(this)[0]);
        saveAdvInput($(this)[0]); 
    }); 
    
    $('.advInput').focus(function(){
       advInputFocus($(this)[0]); 
    });
    
    $('.advInput').keydown(function(){
       advInputChange($(this)[0]); 
    });
   // advInputChangeSize($('.advInput'));
    advInputSetMinSize();
});

function saveAdvInput(advInput) {  
    if (advInput.value != advInput.defaultValue){
      //do some ajax stuff
    }   
}

function advInputFocus(advInput) {    
    if (advInput.value == advInput.defaultValue) {
        $('#advInputBackground'+advInput.id).html(advInput.defaultValue);
        advInput.value = '';     
    }
}

function advInputBlur(advInput) {
    if (advInput.value == '') {
        advInput.value = advInput.defaultValue;
    }
}

function advInputChange(advInput) {
    if (advInput.value == '') {
        $('#advInputBackground'+advInput.id).html(advInput.defaultValue);
        width = advInput.defaultValue.length*(8)+20+'px';
        $('#advInputDiv'+advInput.id).css('width',width);
    } else {
        $('#advInputBackground'+advInput.id).html('');  
        width = advInput.value.length*(8)+20+'px';
        console.log(width);
        $('#advInputDiv'+advInput.id).css('width',width);
    }
    
}

function advInputSetMinSize() {
    $('.advInputDiv').css('width',function(){   
        console.log($(this).children('.advInput')[0]);
       return $(this).children('.advInput')[0].defaultValue.length*8+20+'px'; 
    });
    $('.advInputDiv').css('min-width',function(){
        return $(this).children('.advInput')[0].defaultValue.length*8+20+'px'; 
    });
}
