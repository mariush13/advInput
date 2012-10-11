$(document).ready(function(){
   
    $('.advInput').blur(function(){
        advInputBlur($(this)[0]);
        saveAdvInput($(this)[0]); 
    }); 
    
    $('.advInput').focus(function(){
       advInputFocus($(this)[0]); 
    });
});

function saveAdvInput(advInput){  
    if (advInput.value != advInput.defaultValue){
      //do some ajax stuff
    }   
}

function advInputFocus(advInput){    
    if (advInput.value == advInput.defaultValue){
        advInput.value = '';
    }
}

function advInputBlur(advInput){
    if (advInput.value == ''){
        advInput.value = advInput.defaultValue;
    }
}
