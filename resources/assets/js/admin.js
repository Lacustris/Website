// Require specific files
import Dialog		from './dialog';

// Event handling
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

	// Validate URLs
	$('[data-action=validate-url]').on('blur', function() {
		var url = $(this).val();

		if(url.substring(0, 3) != 'http') {
			$(this).val('http://' + url);
		}
	});

	// Admin to top scroller
	$(document).on('scroll', function() {
		if($('body').scrollTop() > 100) {
			$('.admin-page__to-top').show('slow');
		} else {
			$('.admin-page__to-top').hide('slow');
		}
	});

	// Handling forms with required select fields
	$('[data-needs]').on('submit', function(e) {
		var needs = $(this).data('needs');

		if($('#' + needs).val() == "false") {
			e.preventDefault();
		}
	});

	// Selection of menu types
	$('[data-action=select-menu-type]').on('change', function() {
		$('[data-menu-type]').hide('fast');

		var value = $(this).val();
		
		$('[data-menu-type='+value+']').show('fast');

	});
});

function Delete(id) {
	$('#delete_' + id ).submit();
}
