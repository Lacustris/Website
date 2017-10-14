webpackJsonp([0],{

/***/ "./resources/assets/js/admin.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function($) {Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__dialog__ = __webpack_require__("./resources/assets/js/dialog.js");
// Require specific files


// Event handling
$(function () {
	// Delete
	$('[data-action=delete]').on('click', function () {
		var confirmation = $(this).data('confirmation');

		var id = $(this).data('id');

		__WEBPACK_IMPORTED_MODULE_0__dialog__["a" /* default */].confirm(confirmation, function (confirm) {
			if (confirm) {
				Delete(id);
			}
		});
	});

	// Validate URLs
	$('[data-action=validate-url]').on('blur', function () {
		var url = $(this).val();

		if (url.substring(0, 3) != 'http') {
			$(this).val('http://' + url);
		}
	});

	// Admin to top scroller
	$(document).on('scroll', function () {
		if ($('body').scrollTop() > 100) {
			$('.admin-page__to-top').show('slow');
		} else {
			$('.admin-page__to-top').hide('slow');
		}
	});

	// Handling forms with required select fields
	$('[data-needs]').on('submit', function (e) {
		var needs = $(this).data('needs');

		if ($('#' + needs).val() == "false") {
			e.preventDefault();
		}
	});

	// Selection of menu types
	$('[data-action=select-menu-type]').on('change', function () {
		$('[data-menu-type]').hide('fast');

		var value = $(this).val();

		$('[data-menu-type=' + value + ']').show('fast');
	});
});

function Delete(id) {
	$('#delete_' + id).submit();
}
/* WEBPACK VAR INJECTION */}.call(__webpack_exports__, __webpack_require__("./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/app.js":
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function($) {// Require vendor dependencies
__webpack_require__("./resources/assets/js/bootstrap.js");

// Require custom JS
__webpack_require__("./resources/assets/js/menu.js");
__webpack_require__("./resources/assets/js/admin.js");
__webpack_require__("./resources/assets/js/editor.js");
__webpack_require__("./resources/assets/js/carousel.js");

$(function () {
  // Check if we want this everywhere or only on the pages where it's used
  $('[data-toggle="tooltip"]').tooltip();
});
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__("./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/bootstrap.js":
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(__webpack_provided_window_dot_jQuery) {
//window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

window.$ = __webpack_provided_window_dot_jQuery = __webpack_require__("./node_modules/jquery/dist/jquery.js");

__webpack_require__("./node_modules/bootstrap-sass/assets/javascripts/bootstrap.js");

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

//window.axios = require('axios');

//window.axios.defaults.headers.common['X-CSRF-TOKEN'] = window.Laravel.csrfToken;
//window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__("./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/carousel.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function($) {Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__core__ = __webpack_require__("./resources/assets/js/core.js");


$(function () {
	Init();

	$('[data-action=carousel-goto').on('click', function () {
		window.location.href = $(this).data('carousel-target');
	});
});

function Init() {
	var carousels = $('[data-carousel]');
	if (carousels.length == 1) {
		var origin = carousels.data('carousel-origin');
		GetUrls(origin, carousels);
	} else {
		// maybe soon
	}
}

function GetUrls(origin, elem) {
	$.get('/media/' + origin, null, function (result) {
		if (result) {
			SetImage(elem, result);

			setInterval(SetImage, 5000, elem, result);
		}
	});

	return null;
}

function SetImage(elem, images) {
	var target = elem.find('.carousel__image');

	target.addClass('carousel__image--changing');

	setTimeout(function () {
		var index = __WEBPACK_IMPORTED_MODULE_0__core__["a" /* default */].randomInt(0, images.length);

		target.attr('src', '/storage/' + images[index]['file']);
		target.attr('alt', images[index]['alt']);
		target.data('carousel-target', images[index]['url']);

		target.removeClass('carousel__image--changing');
	}, 1000);
}
/* WEBPACK VAR INJECTION */}.call(__webpack_exports__, __webpack_require__("./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/core.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/**
 * Returns the width of the window
 */
function WindowWidth() {
  var w = window,
      d = document,
      e = d.documentElement,
      g = d.getElementsByTagName('body')[0],
      res = w.innerWidth || e.clientWidth || g.clientWidth;

  return res;
}

/**
 * Returns the height of the window
 */
function WindowHeight() {
  var w = window,
      d = document,
      e = d.documentElement,
      g = d.getElementsByTagName('body')[0],
      res = w.innerHeight || e.clientHeight || g.clientHeight;

  return res;
}

function RandomInt(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min)) + min; //The maximum is exclusive and the minimum is inclusive
}

/* harmony default export */ __webpack_exports__["a"] = ({
  windowWidth: WindowWidth,
  windowHeight: WindowHeight,
  randomInt: RandomInt
});

/***/ }),

/***/ "./resources/assets/js/dialog.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function($) {var selectImagePreview = function selectImagePreview() {
	$('.dialog__image-preview').removeClass('dialog__image-preview--selected');
	$(this).addClass('dialog__image-preview--selected');

	$('.dialog__image-size--width').val($('.dialog__image-preview--selected img').prop('naturalWidth'));
	$('.dialog__image-size--height').val($('.dialog__image-preview--selected img').prop('naturalHeight'));
};

/**
 * Ask to confirm an action
 */
function Confirm(message, callback) {
	if (!CountDialogs('confirmation')) {
		return;
	}

	var dialog = $('.dialog--confirmation');
	dialog.show('slow');

	$('.dialog--confirmation .dialog__body').text(message);

	$('.dialog__button').on('click', function () {
		$('.dialog__button').unbind('click');

		var confirm = $(this).data('confirm');

		dialog.hide('slow');

		callback(confirm);
	});
}

function ImageOverview(callback) {
	if (!CountDialogs('images')) {
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

function EnterURL(callback) {
	CountDialogs('url');

	var dialog = $('.dialog--url');
	$('.dialog__link').val('');

	$('.dialog__button').on('click', function () {
		$('.dialog__button').unbind('click');

		var confirm = $(this).data('confirm');

		dialog.hide('slow');

		if (confirm) {
			var link = {
				url: $('.dialog__link--link').val(),
				text: $('.dialog__link--text').val()
			};

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

function CountDialogs(type) {
	var dialogs = $('.dialog--' + type);

	if (dialogs.length !== 1) {
		console.error('Could not find a dialog of type "' + type + '"!');
		return false;
	}

	return true;
}

function BuildPagination(page, pages, element, callback) {
	$.get('/media/pagination?page=' + page + '&pages=' + pages, null, function (result) {
		element.html(result);

		$('[data-action=pagination]').on('click', function () {
			var target = $(this).data('target-page');
			if (target == page) {
				return;
			}

			FetchPreviewImages($('.dialog--images'), target, callback);
		});
	});
}

function ImageFormUpload() {
	$('.dialog__upload-form').on('submit', function (e) {
		e.preventDefault();

		var input = {
			_token: $('[name=_token]').val(),
			image: $('.dialog__upload-field').val()
		};

		$.ajax({
			url: '/media/upload',
			type: 'POST',
			data: new FormData(this),
			processData: false,
			cache: false,
			contentType: false
		}).done(function (response) {
			if (response.type == 'success' && response.path) {
				$('.dialog__image-previews .dialog__image-preview:last-child').hide();
				$('.dialog__image-previews').prepend('<div class="dialog__image-preview" data-image="' + response.path + '"><img src="' + response.path + '" alt=""></div>');
				$('.dialog__image-preview').on('click', selectImagePreview);
			} else {
				console.log(response);
			}
		}).fail(function () {
			console.error('An error occurred!');
		});
	});
}

function FetchPreviewImages(dialog, pageIndex, callback) {
	$.get('/media/index?page=' + pageIndex, null, function (result) {
		$('.dialog__image-previews').html('');
		result.images.forEach(function (elem) {
			$('.dialog__image-previews').append('<div class="dialog__image-preview" data-image="/storage/' + elem + '"><img src="/storage/' + elem + '" alt=""></div>');
		});

		BuildPagination(pageIndex, result.pages, $('.dialog__image-previews-pages'), callback);

		$('.dialog__image-preview').on('click', selectImagePreview);

		$('.dialog__button').on('click', function () {
			$('.dialog__button').unbind('click');

			var confirm = $(this).data('confirm');

			dialog.hide('slow');

			if (confirm) {
				var selected = {
					image: $('.dialog__image-preview--selected').data('image'),
					width: $('.dialog__image-size--width').val(),
					height: $('.dialog__image-size--height').val(),
					alt: $('.dialog__alt-text').val()
				};

				callback(selected);
				return;
			}

			// If all else fails, trigger the callback with false
			callback(false);
		});
	});
}

/* harmony default export */ __webpack_exports__["a"] = ({
	confirm: Confirm,
	enterURL: EnterURL,
	imageOverview: ImageOverview
});
/* WEBPACK VAR INJECTION */}.call(__webpack_exports__, __webpack_require__("./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/editor.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function($) {Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__dialog__ = __webpack_require__("./resources/assets/js/dialog.js");
// Require specific files


$(function () {
	// Based on: https://code.tutsplus.com/tutorials/create-a-wysiwyg-editor-with-the-contenteditable-attribute--cms-25657
	$('.editor__button').on('click', function (e) {
		e.preventDefault();

		var command = $(this).data('command');

		switch (command) {
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
				document.execCommand('insertHTML', false, '<img src="#" class="tmpimg" alt="">');
				__WEBPACK_IMPORTED_MODULE_0__dialog__["a" /* default */].imageOverview(function (image) {
					if (image) {
						$('.tmpimg').attr('src', image.image).attr('width', image.width).attr('height', image.height).attr('alt', image.alt).removeClass('tmpimg');
					} else {
						$('.tmpimg').remove();
					}
				});
				break;
			case 'createLink':
				document.execCommand('insertHTML', false, '<a href="#" class="tmplink">test</a>');

				__WEBPACK_IMPORTED_MODULE_0__dialog__["a" /* default */].enterURL(function (link) {
					if (link) {
						$('.tmplink').attr('href', link.url).text(link.text).removeClass('tmplink');
					} else {
						$('.tmplink').remove();
					}
				});
				break;
			default:
				document.execCommand(command, false, null);

		}
	});

	$('.editor__button[data-toggle=editor-info]').on('mouseover', function () {
		$('.editor__help').text($(this).data('info'));
		$(this).parentsUntil('[data-editor]').children('.editor__info').addClass('editor__info--active');
	}).on('mouseout', function () {
		$(this).parentsUntil('[data-editor]').children('.editor__info').removeClass('editor__info--active');
	});

	// Handle submission of forms that use these textfields
	$('.btn[data-editor=true]').on('click', function (e) {
		e.preventDefault();

		var form = $('form[data-editor=true]');

		$('.editor__textarea').each(function () {
			console.log($('[name=' + $(this).attr('id') + ']').val($(this).html()));
		});

		form.submit();
	});
});
/* WEBPACK VAR INJECTION */}.call(__webpack_exports__, __webpack_require__("./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/menu.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function($) {Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__core__ = __webpack_require__("./resources/assets/js/core.js");
// Load dependencies


$(function () {
	// Allow for opening and closing the dropdownmenus on hover
	// This should only happen when the menu is not collapsed, which occurs at >767px screen width
	$('a.dropdown-toggle').on('mouseenter', function () {
		if (__WEBPACK_IMPORTED_MODULE_0__core__["a" /* default */].windowWidth() > 767) {
			closeMenus();

			$(this).parent().addClass('open');
			$(this).attr("aria-expanded", "true");
		}
	});

	$('.navbar').on('mouseleave', function () {
		if (__WEBPACK_IMPORTED_MODULE_0__core__["a" /* default */].windowWidth() > 767) {
			closeMenus();
		}
	});

	// Allow for the root of a dropdown menu to be a functioning link as well
	$('.dropdown-toggle').on('click', function (event) {
		if ($(this).parent().hasClass('open') && __WEBPACK_IMPORTED_MODULE_0__core__["a" /* default */].windowWidth() > 767) {
			var href = $(this)[0].href; // Retrieve the url of the a element
			window.location.href = href; // assign it to the current window
		}
	});

	$('.navbar').on('show.bs.collapse', function () {
		$('.fa.fa-bars').removeClass('fa-bars').addClass('fa-times');
	}).on('hide.bs.collapse', function () {
		$('.fa.fa-times').addClass('fa-bars').removeClass('fa-times');
	});
});

/**
 * Function to close all menus, setting all the properties to the right values.
 */
function closeMenus() {
	$('li').removeClass('open');
	$('a[aria-expanded=true]').attr('aria-expanded', 'false');
}
/* WEBPACK VAR INJECTION */}.call(__webpack_exports__, __webpack_require__("./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/sass/app.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/sass/fontawesome/font-awesome.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__("./resources/assets/js/app.js");
__webpack_require__("./resources/assets/sass/app.scss");
module.exports = __webpack_require__("./resources/assets/sass/fontawesome/font-awesome.scss");


/***/ })

},[0]);