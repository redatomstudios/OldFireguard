// JavaScript Document

$(document).ready(function(){
	$("#hider").fadeOut(0);
	$(".dialog").fadeOut(0);
});

function triggerFunction(index) {
	switch(index) {
		case 1: $("#hider").fadeIn();
				$("#newStation").fadeIn();
				break;
		case 2: $("#hider").fadeIn();
				$("#joinStation").fadeIn();
				break;
		case 3: $("#hider").fadeIn();
				$("#confirmation").fadeIn();
				break;
		default:break;	
	}
}

function decline() {
	$("#hider").fadeOut();
	$(".dialog").fadeOut();	
}