function teclado(e){
  var isCtrl = false;
  var isShift = false;
  var isI = false;

  tecla = (document.all) ? e.keyCode : e.which;
  
  if(tecla == 123){
    return false;
  }

  // action on key up
  $(document).keyup(function(e) {
    
    if(tecla == 16) {
      isShift = false;
      isCtrl = false;
      isI = false;
    }

    if(tecla == 17) {
      isCtrl = false;
      isShift = false;
      isI = false;
    }

    if(tecla == 73){
      isI = false;
      isShift = false;
      isCtrl = false;
    }

  });

  // action on key down
  $(document).keydown(function(e) {
    
    if(tecla == 16) {
      isShift = true; 
    }

    if(tecla == 17) {
      isCtrl = true; 
    }

    if(tecla == 73){
      isI = true;
    }

    if(isCtrl && isShift && isI) { 
      return false;
    }

  });

  return true;
}