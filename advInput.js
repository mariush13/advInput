$(document).ready(function(){
   
    $('.advInput').blur(function(){
        advInputBlur($(this)[0]);
        saveAdvInput($(this)[0]); 
    }); 
    
    $('.advInput').focus(function(){
       advInputFocus($(this)[0]); 
    });
    
    $('.advInput').keyup(function(){
       advInputChange($(this)[0]); 
       advInputChangeSize($(this));
    });
    advInputChangeSize($('.advInput'));
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
    } else {
        $('#advInputBackground'+advInput.id).html('');  
    }
}

function advInputChangeSize(advInput) {
    l = advInput.length
    for (input = 0; input < l; input++) {
        var text = $('#'+input).prop('value');
        var def = $('#'+input).prop('defaultValue');
        if (text.length == 0 && def.length > 0){
            text = def;
            var width = text.length*(5)+20+'px';
            $('#advInputDiv'+input).css('min-width',width);
        }
        var width = text.length*(5)+20+'px';
        console.log(width);
        $('#advInputDiv'+input).css('width',width);
    }
    
}
