<!DOCTYPE html>
<html lang="en">
    <head>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <link rel="stylesheet" href="/css/jquery-ui.css">
        <script src="../jquery/jquery-ui.min.js"></script>

        <script src="../js/filter.js"></script>
        <script>
            $(function(){
                $("#header").load("header.html");
            });
            $(function(){
                $("#footer").load("footer.html");
            });
        </script>
        <link rel="stylesheet" href="/css/main.css">
        <meta charset="UTF-8">
        <title>Готовые сборки</title>
    </head>
    <body>
        <div id="header"></div>

        <script>
            $(document).ready(function() {



                $.ajax({
                    url: '../php/get.php',         /* Куда пойдет запрос */
                    method: 'GET',             /* Метод передачи (post или get) */
                    dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
                    data: {id_pc : <?php echo  $_GET['id_pc'];?>},     /* Параметры передаваемые в запросе. */
                    success: function(response){
                        $(".product_page").html(response);
                        //alert(response);
                    }
                });

            });

        </script>
        <div class="bg">
            <div class="fixed_width_standard center_block_margin product_page">







<!---->
<!--                <div class="polzunok-container-1">-->
<!--                    <div class="polzunok-1"></div>-->
<!--                </div>-->
<!--                <script>-->
<!--                    var prices = ['16ГБ', '32ГБ', '64ГБ'];-->
<!--                    $(".polzunok-1").slider({-->
<!--                        min: 0,-->
<!--                        max: prices.length - 1,-->
<!--                        value: 1,-->
<!--                        range: "min",-->
<!--                        animate: "fast",-->
<!--                    });-->
<!--                    var opt = $(".polzunok-1").data().uiSlider.options,-->
<!--                        min = opt.min,-->
<!--                        raz = opt.max - min;-->
<!--                    for (var i = 0; i <= raz; i++) {-->
<!--                        $(".polzunok-1").append($('<b>'+(prices[min++])+'</b>').css('left',(i/raz*100)+'%'));-->
<!--                    }-->
<!--                </script>-->
            </div>



        </div>


        <div id="footer"></div>
    </body>
</html>