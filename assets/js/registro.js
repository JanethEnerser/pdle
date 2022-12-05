	
function init() {
 
}

function next(target) {
  var input = target.previousElementSibling;
  
  // Check if input is empty
  if (input.value === '') {
    body.classList.add('error');
  } else {
    body.classList.remove('error');
   
    var enable = document.querySelector('form fieldset.enable'),
        nextEnable = enable.nextElementSibling;
    enable.classList.remove('enable');
    enable.classList.add('disable');
    nextEnable.classList.remove('disable');
    nextEnable.classList.add('enable');
	
   
  }
}

function prev(target) {
  
   
       
    var enable = document.querySelector('form fieldset.enable'),
        prevEnable = enable.previousElementSibling;
	enable.classList.remove('enable');
	enable.classList.add('disable');
	prevEnable.classList.remove('disable');
	prevEnable.classList.add('enable');
	 
	
}



var body = document.querySelector('body'),
    form = document.querySelector('form'),
    count = form.querySelectorAll('fieldset').length;

window.onload = init;

document.body.onmouseup = function (event) {
    var target = event.target || event.toElement;
    if (target.classList.contains("down")) next(target);
    if (target.classList.contains("up")) prev(target);
};


document.addEventListener("keydown", keyDown, false);
//document.addEventListener("keyup", keyUp, false);

function numberOnly(id) {
    // Get element by id which passed as parameter within HTML element event
    var element = document.getElementById(id);
    // This removes any other character but numbers as entered by user
    element.value = element.value.replace(/[^0-9]/gi, "");
}
$("#phonenumber").mask("(999) 999-9999");
