// Script para mostrar sombra bajo el menú principal de la página cuando se hace scroll.
let page_top = 100;
window.onscroll = function() {
	let desplazamiento_Actual = window.pageYOffset;
	if (page_top >= desplazamiento_Actual) {
		// document.getElementById('navbar').style.boxShadow = '0 0 0 #ffffff';
		// document.getElementById('navbar').style.zIndex = '10';
		document.getElementById('navbar1').style.opacity = '1';
		document.getElementById('navbar1').style.visibility = 'visible';
		document.getElementById('navbar2').style.opacity = '0';
		document.getElementById('navbar2').style.visibility = 'hidden';
	}
	else {
		document.getElementById('navbar2').style.boxShadow = '0 0 10px rgba(0,0,0,.5)';
		document.getElementById('navbar1').style.transition = '.2s';
		document.getElementById('navbar2').style.transition = '.2s';
		document.getElementById('navbar2').style.opacity = '1';
		document.getElementById('navbar2').style.visibility = 'visible';
	}
}
