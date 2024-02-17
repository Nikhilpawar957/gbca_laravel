var alpha = /^[a-zA-Z\s]+$/;
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
var alphanum = /^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/;

function validate_clear(form) {
    $(form).find("span.error-text").text("");
}

function valid(form, fieldname, eror_msg) {
    validate_clear(form);
    $(form).find("span." + fieldname + "_error").text(eror_msg);
    $(form).find("[name='" + fieldname + "']").focus();
}

function validate_FileExtension(fileobject, ftype) {
    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + ftype.join('|') + ")$");
    if (!regex.test(fileobject.value.toLowerCase())) {
        return true;
    }
    else {
        return false;
    }
}

function phone_validate(key) {
    var keycode = (key.which) ? key.which : key.keyCode;
    if (!(keycode == 8 || keycode == 43 || keycode == 13) && (keycode < 48 || keycode > 57)) {
        return false;
    }
}

function price_validate(key) {
    var keycode = (key.which) ? key.which : key.keyCode;
    if (!(keycode == 8 || keycode == 46 || keycode == 13) && (keycode < 48 || keycode > 57)) {
        return false;
    }
}

function alpha_only(e) {
    var regex = new RegExp("^[a-zA-Z ]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    else {
        e.preventDefault();
        return false;
    }
}

function show_messageModal(message, seconds)    // Modal Structure Found in Footer
{
    $("#messageModal_content").html('<span style="font-size:15px;"><b>' + message + '</b></span>');
    $('.modal').modal('hide');
    $(".messageModal_popup").trigger('click');
    setTimeout(function () {
        $('.modal').modal('hide');
        $("#messageModal_content").html("");
    }, seconds);
}

//Validate that the key pressed is a number or backspace only
function validate_key(key) {
    // getting key code of pressed key
    var keycode = (key.which) ? key.which : key.keyCode;
    // comparing pressed keycodes
    if (!(keycode == 8) && (keycode < 48 || keycode > 57)) {
        return false;
    }
}

function validate_key1(key) {
    // getting key code of pressed key
    var keycode = (key.which) ? key.which : key.keyCode;
    // comparing pressed keycodes
    if (!(keycode == 8) && (keycode < 48 || keycode > 57)) {
        return false;
    }
}

function validate_value(element, key) {
    // getting key code of pressed key
    var keycode = (key.which) ? key.which : key.keyCode;
    var number = element.value.split('.');
    // comparing pressed keycodes and checking whether the key pressed is a number,decimal or not
    if (!(keycode == 8 || keycode == 46) && (keycode < 48 || keycode > 57)) {
        return false;
    }
    //To check if only one decimal is entered
    if (number.length > 1 && keycode == 46) {
        return false;
    }
}
