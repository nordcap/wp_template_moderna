/**
 * Created by alex on 16.01.2016.
 */

jQuery(document).ready(function ($) {
    "use strict";
    $('.dropdown > a').addClass('dropdown-toggle')
        .attr({
            "data-toggle": "dropdown",
            "data-hover": "dropdown",
            "data-delay": "0",
            "data-close-others": "false"
        });

    //изменение визуального оформления пагинации
    var nav = $('.wp-pagenavi');
    nav.attr('id','pagination');
    nav.find('span.pages').removeClass('pages').addClass('all');
    nav.find('a').addClass('inactive');

});