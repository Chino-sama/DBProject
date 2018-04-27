selectedOpt = '';

$(document).ready(function() {
	$('.modal').modal();
	$('#goToOptative').click(function() {
		window.location = '/DBProject/optative.php';
	});
	$('select').formSelect();
	$('.fixed-action-btn').floatingActionButton({
		direction:'left',
		hoverEnabled: false
	});
	$('#optativeReqs').on('change', function() {
		var reqId = document.querySelectorAll('#reqId');
		var reqOptId = document.querySelectorAll('#reqOptId');
		var checkReq = document.querySelectorAll('#checkReq');
		selectedOpt = this.value.slice(1);
		var reqOptIds = [];
		for (i = 0; i < reqOptId.length; i++) {
			reqOptIds.push(reqOptId[i].value);
		}
		for (i = 0; i < reqOptIds.length; i++) {
			if (reqOptIds[i] != selectedOpt) {
				reqId[i].style.display = 'none';
				checkReq[i].style.display = 'none';
			} else {
				reqId[i].style.display = 'block';
				checkReq[i].style.display = 'block';
				$('#reqBtn').addClass('disabled');
			}
		}
		if (!reqOptIds.includes(selectedOpt)) {
			$('#reqBtn').removeClass('disabled');
		}
	});
});

function checkReqs () {
	var checkInput = document.querySelectorAll('#' + selectedOpt);
	for (i = 0; i < checkInput.length; i++) {
		if (!checkInput[i].checked) {
			$('#reqBtn').addClass('disabled');
			break;
		}
		if (i == checkInput.length - 1)
			$('#reqBtn').removeClass('disabled');
	}
}