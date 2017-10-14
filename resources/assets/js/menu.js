// Load dependencies
import Core from './core';

$(function() {
	// Allow for opening and closing the dropdownmenus on hover
	// This should only happen when the menu is not collapsed, which occurs at >767px screen width
	$('a.dropdown-toggle').on('mouseenter', function() {
		if(Core.windowWidth() > 767) {
			closeMenus();

			$(this).parent().addClass('open');
			$(this).attr("aria-expanded","true");
		}
		
	});

	$('.navbar').on('mouseleave', function() {
		if(Core.windowWidth() > 767) {
			closeMenus();
		}
	});

	// Allow for the root of a dropdown menu to be a functioning link as well
	$('.dropdown-toggle').on('click', function(event) {
		if($(this).parent().hasClass('open') && Core.windowWidth() > 767) {
			var href = $(this)[0].href; // Retrieve the url of the a element
			window.location.href = href; // assign it to the current window
		}
	});

	$('.navbar').on('show.bs.collapse', function() {
		$('.fa.fa-bars').removeClass('fa-bars').addClass('fa-times')
	}).on('hide.bs.collapse', function() {
		$('.fa.fa-times').addClass('fa-bars').removeClass('fa-times')
	});
});

/**
 * Function to close all menus, setting all the properties to the right values.
 */
function closeMenus()
{
	$('li').removeClass('open');
	$('a[aria-expanded=true]').attr('aria-expanded', 'false');
}
