$(document).ready(function() {
    'use strict';

    $('h1').each(function() {
        var sublinks = $(this).parent('.wrapper').find('.well');
        var submenu = null;
        var link = $('<a></a>').text($(this).text()).attr('href', '#' + $(this).attr('id'));
        var parent = $('<li>' + link[0].outerHTML + '</li>');

        if (sublinks.length > 0) {
            var submenu = $('<ul></ul>');

            sublinks.each(function() {
                var title = $(this).find('> h2')
                var link = $('<a></a>').text(title.text()).attr('href', '#' + title.attr('id'));
                submenu.append($('<li>' + link[0].outerHTML + '</li>'));
            });

            parent.append(submenu);
        }

        $('.nav').append(parent)
    })
});
