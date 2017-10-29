var model = document.getElementById('SLpopupAdd');
var model4 = document.getElementById('SLpopupRem');

var model2 = document.getElementById('SLclickadd');
var model3 = document.getElementById('SLclickrem');







var model5 = document.getElementById('EpopupAdd');
var model6 = document.getElementById('EpopupRem');

var model7 = document.getElementById('Eclickadd');
var model8 = document.getElementById('Eclickrem');

function popupadd() {
	model.style.display = "block";
	model4.style.display = "none";
	model2.style.display = "none";
	model3.style.display = "none";
}

function popuprem() {
	model4.style.display = "block";
	model2.style.display = "none";
	model3.style.display = "none";
	model.style.display = "none";
}





function popupadd2() {
	model5.style.display = "block";
	model6.style.display = "none";
	model7.style.display = "none";
	model8.style.display = "none";
}

function popuprem2() {
	model6.style.display = "block";
	model7.style.display = "none";
	model8.style.display = "none";
	model5.style.display = "none";
}





function popdown() {
	model.style.display = "none";
	model4.style.display = "none";
	model6.style.display = "none";
	model5.style.display = "none";
	model2.style.display = "inline-block";
	model3.style.display = "inline-block";
	model7.style.display = "inline-block";
	model8.style.display = "inline-block";
}