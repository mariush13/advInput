function advInput(saveFunction) {

    $(document).ready(function() {

        $('.advInput').blur(function() {
            advInputBlur($(this)[0]);
        });

        $('.advInput').focus(function() {
            advInputFocus($(this)[0]);
        });

        $('.advInput').keydown(function() {
            advInputChange($(this)[0]);
        });

        $('.advInput').keyup(function(event) {

            switch (event.which) {
            case 13:
                saveAdvInput($(this)[0]);
                break;
            case 27:
                advInputReset($(this)[0]);
                break;
            }
            advInputChange($(this)[0])
        });

        $('.advInput').keypress(function() {
            advInputChange($(this)[0]);
        });

        advInputSetMinSize();
    });

    function advInputFocus(advInput) {
        if (advInput.value == advInput.defaultValue) {
            $('#advInputBackground' + advInput.id).html(advInput.defaultValue);
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
            $('#advInputBackground' + advInput.id).html(advInput.defaultValue);
            width = advInput.defaultValue.length * (8) + 20 + 'px';
            $('#advInputDiv' + advInput.id).css('width', width);
        } else {
            $('#advInputBackground' + advInput.id).html('');
            width = advInput.value.length * (8) + 20 + 'px';
            $('#advInputDiv' + advInput.id).css('width', width);
        }
    }

    function advInputReset(advInput) {
        advInput.value = '';
        advInput.blur();
    }

    function advInputSetMinSize() {
        $('.advInputDiv').css(
                'width',
                function() {
                    return $(this).children('.advInput')[0].defaultValue.length
                            * 8 + 20 + 'px';
                });
        $('.advInputDiv').css(
                'min-width',
                function() {
                    return $(this).children('.advInput')[0].defaultValue.length
                            * 8 + 20 + 'px';
                });

    }

    function saveAdvInput(advInput) {
        if (advInput.value != advInput.defaultValue) {
            advInput.defaultValue = advInput.value;
            advInputSetMinSize();
            saveFunction(advInput);
        }
        advInput.blur();
    }
}