window.onload = function () {

//To send alert if divice is mobile.
var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};

if( isMobile.any()) {
// alert('Mobile');
if ( session == false) {
$( function() {
    $( "#dialog" ).dialog({
      resizable: false,
      height: "auto",
      width: 500,
      modal: true,
      autoOpen: true,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 1000
      }
    });
  });
}
}



// I need to set so that it only does the css transitions on index.php
const panels = document.querySelectorAll('.panel');

if(document.getElementById('index')) {//if an index id exists on page then do this.

  function toggleOpen() {
    this.classList.toggle('open');
  }//toggleActive closing bracket

  function toggleActive(e) {
    if (e.propertyName.includes('flex')){
        this.classList.toggle('open-active');
    }//if closing bracket
  }//toggleActive closing bracket

  panels.forEach(panel => panel.addEventListener('click',toggleOpen));
  panels.forEach(panel => panel.addEventListener('transitionend',toggleActive));

}else{//if there is no index id on page then do this
  panels.forEach(panel => panel.classList.add('open','open-active'));
}//else closing bracket
}//Window on load function
