// Import dependencies
import Dialog from './dialog';

$(function() {
	$('[data-action=participants]').on('click', function() {
		var id = $(this).data('eventid');
		$.get('/event/participants/'+id,'', function(result) {
			console.log(result);
			if(!result.title || !result.participants) {
				console.error('Incorrect dataset from API!'); // TODO: replace this with proper error loging!
			}
			var participants = "";
			$.each(result.participants, function(id, participant) {
				participants += participant + "<br>";
			});
			Dialog.displayInformation(result.title, participants);
		});
	});
});
