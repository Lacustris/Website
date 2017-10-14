import Core from './core';

$(function() {
	Init();

	$('[data-action=carousel-goto').on('click', function() {
		window.location.href = $(this).data('carousel-target');
	});
});

function Init()
{
	var carousels = $('[data-carousel]');
	if(carousels.length == 1) {
		var origin = carousels.data('carousel-origin');
		GetUrls(origin, carousels);
	} else {
		// maybe soon
	}

}

function GetUrls(origin, elem)
{
	$.get('/media/' + origin, null, function(result) {
		if(result) {
			SetImage(elem, result);

			setInterval(SetImage, 5000, elem, result);
		}
	});

	return null;
}

function SetImage(elem, images)
{
	var target = elem.find('.carousel__image');

	target.addClass('carousel__image--changing');

	setTimeout(function() {
		var index = Core.randomInt(0, images.length);

		target.attr('src', '/storage/' + images[index]['file']);
		target.attr('alt', images[index]['alt']);
		target.data('carousel-target', images[index]['url']);

		target.removeClass('carousel__image--changing');
	}, 1000);
	
}

