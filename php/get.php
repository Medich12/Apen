 <?php
    include '../php/config_data_base.php';

    if (isset($_GET['id_pc'])){
        $connect = connectDB();
        $id = $_GET['id_pc'];
        $string = "SELECT * FROM readypc WHERE article = ('$id')";
        $querys = mysqli_query($connect, $string);
        $filters = mysqli_fetch_array($querys);
        echo ' <div class="product_page_title">
                    <div class="img_product"><img src="' . $filters['img'] . '" alt="Компьютер" class="product_page_img"></div>

                    <div class="product_title">
                        <h2>'.$filters['название'] .'</h2>
                        <h3> Цена: '. number_format($filters['цена'], 0, '', ' ') .' ₽</h3>
                        <a href="http://localhost/html/form.php?price='.$filters['цена'].'&name='.$filters['название'].'&img='.$filters['img'].'"><button class="button_standard button_assemblies" ><p>Оформить</p></button></a>
                        <p>'.$filters['описание'] .'</p>
                    </div>
                </div>
                <hr>
                <div class="accessories center_block_margin">
                    <h3>Комплектующие</h3>
                    <hr>
                    <table>
                        <tr class="polzunok_tr">
                            <td class="first_td">
                                Оперативная память
                            </td>
                            <td>
                                <div class="polzunok-container-1">
                                    <div id="polzunok_1"></div>
                                </div>
                                <script>
                                
                                    var prices = ["16Гб", "32Гб", "64Гб"];
                                    let k = 0;
                                    while (k < prices.length){
                                        if (prices[k] === "' . $filters['озу'] . '"){
                                            var val = k;
                                            
                                        }
                                        k++;
                                    }
                                    $("#polzunok_1").slider({
                                        min: 0,
                                        max: prices.length - 1,
                                        value: val,
                                        range: "min",
                                        animate: "fast",
                                    });
                                    var opt = $("#polzunok_1").data().uiSlider.options,
                                        min = opt.min,
                                        raz = opt.max - min;
                                    for (var i = 0; i <= raz; i++) {
                                        $("#polzunok_1").append($("<b>"+"</b>").css("left",(i/raz*100)+"%"));
                                        $("#polzunok_1").append($("<p>"+(prices[min++])+"</p>").css("left",(i/raz*100)+"%"));
                                    }
                                </script>
                            </td>
                        </tr>
                        <tr class="polzunok_tr">
                            <td class="first_td">
                                SSD
                            </td>
                            <td>
                                <div class="polzunok-container-1">
                                    <div class="polzunok-1" id="polzunok_2"></div>
                                </div>
                                <script>
                                
                                    var prices = ["256Гб", "512Гб", "1024Гб","2048Гб"];
                                    let k = 0;
                                    while (k < prices.length){
                                        if (prices[k] === "' . $filters['ссд'] . '"){
                                            var val = k;
                                            
                                        }
                                        k++;
                                    }
                                    $("#polzunok_2").slider({
                                        min: 0,
                                        max: prices.length - 1,
                                        value: val,
                                        range: "min",
                                        animate: "fast",
                                    });
                                    var opt = $("#polzunok_2").data().uiSlider.options,
                                        min = opt.min,
                                        raz = opt.max - min;
                                    for (var i = 0; i <= raz; i++) {
                                        $("#polzunok_2").append($("<b>"+"</b>").css("left",(i/raz*100)+"%"));
                                        $("#polzunok_2").append($("<p>"+(prices[min++])+"</p>").css("left",(i/raz*100)+"%"));
                                    }
                                </script>
                            </td>
                        </tr>
                        <tr>
                            <td class="first_td">
                                Процессор
                            </td>
                            <td>
                                ' . $filters['cpu'] . '
                            </td>
                        </tr>
                        <tr>
                            <td class="first_td">
                                Видеокарта
                            </td>
                            <td>
                                ' . $filters['gpu'] . '
                            </td>
                        </tr>
                        <tr>
                            <td class="first_td">
                                Материнская плата
                            </td>
                            <td>
                                ' . $filters['мп'] . '
                            </td>
                        </tr>
                        <tr>
                            <td class="first_td">
                                Блок питания
                            </td>
                            <td>
                                ' . $filters['бп'] . '
                            </td>
                        </tr>
                        <tr>
                            <td class="first_td">
                                Операционная система
                            </td>
                            <td>
                               Windows 11
                            </td>
                        </tr>
                    </table>
                    <a href="http://localhost/html/form.php?price='.$filters['цена'].'&name='.$filters['название'].'&img='.$filters['img'].'"><button class="button_standard button_assemblies center_block_margin" ><p>Оформить</p></button></a>
                </div>';
    }
    if (isset($_GET['formData'])) {
        $decode = urldecode($_GET['formData']);
        $array = explode('&', $decode);
        $connect = connectDB();

        $string = "SELECT * FROM readypc";
        if(!empty($_GET['formData']))
        {
            $string .= ' WHERE';


            foreach ($array as $key => $val) {
                if (!next($array)) {
                    $arr = explode('=', $val);
                    $string .= ' ' . $arr[0] . ' = ' . '"' . $arr[1] . '"';
                }
                else {
                    $arr = explode('=', $val);
                    $string .= ' ' . $arr[0] . ' = ' . '"' . $arr[1] . '" OR';
                }

            }
        }

        $querys = mysqli_query($connect, $string);
        while($filters = mysqli_fetch_array($querys)){

            echo '<a href="http://localhost/html/product_page.php?id_pc='.$filters['article'].'"> <div class="assemblies">

                                 <img class="img_preview" src="' . $filters['img'] . '" alt="Фото компьютера">
                                 <h3 class="assemb_title">' . $filters['название'] . ' </h3>
                                 <hr>

                                 <div class="configuration">
                                     <img src="../img/processor.png" alt="Иконка процессора">
                                     <div class="configuration_subtitle"> <p>Процессор:</p><p>' . $filters['cpu'] . '</p></div>
                                 </div>

                                 <div class="configuration">
                                     <img src="../img/processor.png" alt="Иконка процессора">
                                     <div class="configuration_subtitle"> <p>Видеокарта:</p><p>' . $filters['gpu'] . '</p></div>
                                 </div>

                                 <div class="configuration">
                                     <img src="../img/processor.png" alt="Иконка процессора">
                                     <div class="configuration_subtitle"> <p>Материнская плата:</p><p>' . $filters['мп'] . '</p></div>
                                 </div>

                                 <div class="configuration">
                                     <img src="../img/processor.png" alt="Иконка процессора">
                                     <div class="configuration_subtitle"> <p>Оперативная память:</p><p>' . $filters['озу'] . '</p></div>
                                 </div>

                                 <div class="configuration">
                                     <img src="../img/processor.png" alt="Иконка процессора">
                                     <div class="configuration_subtitle"> <p>SSD накопитель:</p><p>' . $filters['ссд'] . '</p></div>
                                 </div>

                                 <div class="configuration">
                                     <img src="../img/processor.png" alt="Иконка процессора">
                                     <div class="configuration_subtitle"> <p>Блок питания:</p><p>' . $filters['бп'] . '</p></div>
                                 </div>
                                 <div class="configuration">
                                     <img src="../img/processor.png" alt="Иконка процессора">
                                     <div class="configuration_subtitle"> <p>Операционная система:</p><p>Windows 11</p></div>
                                 </div>
                                 <hr>
                                 <h4 class="color_white">Цена: ' . number_format($filters['цена'], 0, '', ' ') . ' ₽</h4>
                                 <a href="http://localhost/html/form.php?price='.$filters['цена'].'&name='.$filters['название'].'&img='.$filters['img'].'"><button class="button_standard button_assemblies center_block_margin" ><p>Купить</p></button></a>

                             </div></a>';
        }




    }



