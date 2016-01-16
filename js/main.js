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


});