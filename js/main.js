// Клик по названию магазина - открывается подсказка.
$('.scheme-item').on('mouseover', function(){
    $('.scheme-popup').hide();
    var polygon_css = $('.scheme polygon')
    $(polygon_css).attr('class', '');

    var popup = $(this).find('.scheme-popup');

    $(popup).css('top', + ( $(polygon_css).outerHeight) + 'px');
    $(popup).css('left', + (( $(polygon_css).outerWidth)) + 'px');
    $(popup).css('width', + (( $(polygon_css).outerWidth)) + 'px');
    $('.scheme polygon[data-id=' + $(this).data('id') + ']').attr('class', 'active');
    $(popup).show();
});

// Клик по полигону магазина - также открывается подсказка.
$('.scheme polygon').mouseover(function(){
    $('.scheme-popup').hide();
    $('.scheme-item[data-id=' + $(this).data('id') + ']').trigger('mouseover');

});

// Клик вне магазинов все закрывает.
$("body").mouseover(function(e) {
    if ($(e.target).closest(".scheme polygon, .scheme-item").length === 0) {
        $(".scheme-popup").hide(250);
    }
});

