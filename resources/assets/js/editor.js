// Require specific files
import Dialog		from './dialog';

$(function() {
	// Based on: https://code.tutsplus.com/tutorials/create-a-wysiwyg-editor-with-the-contenteditable-attribute--cms-25657
	$('.editor__button').on('click', function(e) {
		e.preventDefault();

		var command = $(this).data('command');

		switch(command) {
			case 'h1':
			case 'h2':
			case 'h3':
			case 'h4':
			case 'h5':
			case 'h6':
			case 'p':
				document.execCommand('formatBlock', false, command);
				break;
			case 'forecolor':
			case 'backcolor':
				document.execCommand(command, false, $(this).data('value'));
				break;
			case 'insertimage':
				document.execCommand('insertHTML', false, '<img src="#" class="tmpimg" alt="">')
				Dialog.imageOverview(function(image) {
					if(image) {
						$('.tmpimg')
							.attr('src', 	image.image)
							.attr('width', 	image.width)
							.attr('height', image.height)
							.attr('alt', 	image.alt)
							.removeClass('tmpimg');
					} else {
						$('.tmpimg').remove();
					}
				});
				break;
			case 'createLink':
				document.execCommand('insertHTML', false, '<a href="#" class="tmplink">test</a>');
				
				Dialog.enterURL(function(link) {
					if(link) {
						$('.tmplink').attr('href', link.url)
						.text(link.text)
						.removeClass('tmplink');
					} else {
						$('.tmplink').remove();
					}
				});
				break;
			default:
				document.execCommand(command, false, null);
			
		}
	});

	$('.editor__button[data-toggle=editor-info]')
	.on('mouseover', function() {
		$('.editor__help').text($(this).data('info'));
		$(this).parentsUntil('[data-editor]').children('.editor__info').addClass('editor__info--active');
	}).on('mouseout', function() {
		$(this).parentsUntil('[data-editor]').children('.editor__info').removeClass('editor__info--active');
	});

	// Handle submission of forms that use these textfields
	$('.btn[data-editor=true]').on('click', function(e) {
		e.preventDefault();

		var form = $('form[data-editor=true]');

		$('.editor__textarea').each(function() {
			console.log($('[name='+ $(this).attr('id') +']').val($(this).html()));
		});

		form.submit();
	});
});

