// Require specific files
import Dialog		from './dialog';

$(function() {
	// Delete
	$('[data-action=delete]').on('click', function() {
		var confirmation = $(this).data('confirmation');

		var id = $(this).data('id');

		Dialog.confirm(confirmation, function(confirm) {
			if(confirm) {
				Delete(id);
			}
		});

	});

	// Admin to top scroller
	$(document).on('scroll', function() {
		if($('body').scrollTop() > 100) {
			$('.admin-page__to-top').show('slow');
		} else {
			$('.admin-page__to-top').hide('slow');
		}
	});
});

function Delete(id) {
	$('#delete_' + id ).submit();
}
