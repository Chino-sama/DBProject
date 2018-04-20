$(document).ready(function() {
	$('.modal').modal();
	$('#goToOptative').click(function() {
		window.location = '/DBProject/optative.php';
	});
	$('select').formSelect();
	$( "#wa" ).change(function() {
		alert('wa');
	});
});