/*jslint browser: true*/
/*global $, jQuery, alert*/
$('.masonry').imagesLoaded(function () {
    "use strict";
    $('.masonry').masonry({
        itemSelector: '.item'
    });
});
