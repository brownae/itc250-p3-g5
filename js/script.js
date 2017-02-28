window.onload = function () {
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
