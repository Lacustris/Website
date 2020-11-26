var selectImagePreview = function() {
	$('.dialog__image-preview').removeClass('dialog__image-preview--selected');
	$(this).addClass('dialog__image-preview--selected');

	$('.dialog__image-size--width').val($('.dialog__image-preview--selected img').prop('naturalWidth'));
	$('.dialog__image-size--height').val($('.dialog__image-preview--selected img').prop('naturalHeight'));
};

/**
 * Ask to confirm an action
 */
function Confirm(message, callback)
{
	if(!CountDialogs('confirmation')) {
		return;
	}
	
	var dialog = $('.dialog--confirmation');
	dialog.show('slow');

	$('.dialog--confirmation .dialog__body').text(message);

	$('.dialog__button').on('click', function()
	{
		$('.dialog__button').unbind('click');

		var confirm = $(this).data('confirm');

		dialog.hide('slow');
		
		callback(confirm);
	});
}

/**
 * Display information
 */
function DisplayInformation(title,body)
{
	if(!CountDialogs('display-information')) {
		return;
	}

	var dialog = $('.dialog--display-information');

	$('.dialog--display-information .dialog__title').html(title);
	$('.dialog--display-information .dialog__body').html(body);

	$('.dialog__button').on('click', function()
	{
		$('.dialog__button').unbind('click');

		dialog.hide('slow');
	});

	dialog.show('slow');
}

function ImageOverview(callback)
{
	if(!CountDialogs('images')) {
		return;
	}

	// Prepare dialog
	var dialog = $('.dialog--images');
	var pageIndex = 1;
	$('.dialog__image-size').val('');
	$('.dialog__alt-text').val('');

	ImageFormUpload();
	
	FetchPreviewImages(dialog, pageIndex, callback);

	dialog.show('slow');
}

function EnterURL(callback)
{
	CountDialogs('url');

	var dialog = $('.dialog--url');
	$('.dialog__link').val('');
	
	$('.dialog__button').on('click', function()
	{
		$('.dialog__button').unbind('click');

		var confirm = $(this).data('confirm');

		dialog.hide('slow');

		if(confirm) {
			var link = {
				url: 	$('.dialog__link--link').val(),
				text:	$('.dialog__link--text').val()
			}

			callback(link);
			return;
		}

		// If all else fails, trigger the callback with false
		callback(false);
	});

	dialog.show('slow');
}

//////////////////////////
// NON-EXPORTED METHODS //
//////////////////////////

function CountDialogs(type)
{
	var dialogs = $('.dialog--' + type);

	if(dialogs.length !== 1) {
		console.error('Could not find a dialog of type "' + type + '"!');
		return false;
	}

	return true;
}

function BuildPagination(page, pages, element, callback)
{
	$.get('/media/pagination?page=' + page + '&pages=' + pages, null, function(result) {
		element.html(result);

		$('[data-action=pagination]').on('click', function() {
			var target = $(this).data('target-page');
			if(target == page) {
				return;
			}

			FetchPreviewImages($('.dialog--images'), target, callback);
		});
	});
	
}

function ImageFormUpload()
{
	$('.dialog__upload-form').on('submit', function(e) {
		e.preventDefault();

		var input = {
			_token: $('[name=_token]').val(),
			image: 	$('.dialog__upload-field').val()
		};

		$.ajax({
			url: 			'/media/upload',
			type: 			'POST',
			data: 			new FormData(this),
			processData: 	false,
			cache:			false,
			contentType: 	false
		}).done(function(response) {
			if(response.type == 'success' && response.path) {
				$('.dialog__image-previews .dialog__image-preview:last-child').hide();
				$('.dialog__image-previews').prepend('<div class="dialog__image-preview" data-image="' + response.path + '"><img src="' + response.path + '" alt=""></div>');
				$('.dialog__image-preview').on('click', selectImagePreview);
			} else {
				console.log(response);
			}
		}).fail(function() {
			console.error('An error occurred!');
		});
	});
}

function FetchPreviewImages(dialog, pageIndex, callback)
{
	$.get('/media/index?page=' + pageIndex, null, function(result) {
		$('.dialog__image-previews').html('');
		result.images.forEach(function(elem) {
			$('.dialog__image-previews').append('<div class="dialog__image-preview" data-image="/uploads/' + elem + '"><img src="/uploads/' + elem + '" alt=""></div>');
		});

		BuildPagination(pageIndex, result.pages, $('.dialog__image-previews-pages'), callback);

		$('.dialog__image-preview').on('click', selectImagePreview);

		$('.dialog__button').on('click', function()
		{
			$('.dialog__button').unbind('click');

			var confirm = $(this).data('confirm');

			dialog.hide('slow');

			if(confirm) {
				var selected = {
					image:	$('.dialog__image-preview--selected').data('image'),
					width:	$('.dialog__image-size--width').val(),
					height:	$('.dialog__image-size--height').val(),
					alt:	$('.dialog__alt-text').val()
				};

				callback(selected);
				return;
			}

			// If all else fails, trigger the callback with false
			callback(false);
		});

	});	
}

export default {
	confirm: 			Confirm,
	enterURL:			EnterURL,
	imageOverview: 		ImageOverview,
	displayInformation: DisplayInformation 
};
