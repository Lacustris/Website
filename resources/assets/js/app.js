// Require vendor dependencies
require('./bootstrap');

// Require custom JS
require('./menu');
require('./admin');
require('./editor');
require('./carousel');
require('./notification');
require('./events');

$(function () { // Check if we want this everywhere or only on the pages where it's used
  $('[data-toggle="tooltip"]').tooltip()
})
