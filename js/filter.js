//Реализация скрытия и
$(document).ready(function() {
    $('.inc_title').on('click', function() {


        if($(this).siblings('section').is(':hidden')){
            $(this).siblings('section').show(300);
            $(this).siblings('section').css('display: block;');
            $(this).children('img').replaceWith('<img class="" src="../img/minus.png" alt="Закрыть">');
        } else if ($(this).is(':visible')) {
            $(this).siblings('section').hide(300);
            $(this).siblings('section').css('display: block;');
            $(this).children('img').replaceWith('<img class="" src="../img/plus.png" alt="Закрыть">');
        }
    });
});

$(document).ready(function() {


    formData ='';
    $.ajax({
        url: '../php/get.php',         /* Куда пойдет запрос */
        method: 'GET',             /* Метод передачи (post или get) */
        dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
        data: {formData : formData},     /* Параметры передаваемые в запросе. */
        success: function(response){
            $("#responsecontainer").html(response);
            //alert(response);
        }
    });

    $("#btn_refresh").click(function() {
        var formData = $('input').serialize();
        encodeURI(formData);
        console.log(formData);
        $.ajax({
            url: '../php/get.php',         /* Куда пойдет запрос */
            method: 'GET',             /* Метод передачи (post или get) */
            dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
            data: {formData},     /* Параметры передаваемые в запросе. */
            success: function(response){
                $("#responsecontainer").html(response);
                //alert(response);
            }
        });

    });
});
// $(document).ready(function() {
//     const breakpoint = window.matchMedia("(max-width: 768px)");
//     if (breakpoint.matches) {
//         $('.filers').on('click', function () {
//             $(this).siblings('.filers section').hide(300);
//             $(this).siblings('section').css('display: block!important;')
//             console.log('Все ок');
//         })
//     }
//
//
// });

