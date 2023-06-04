<!DOCTYPE html>
<html lang="en">
  <head>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../js/main.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../js/filter.js"></script>
    <script>
      $(function(){
        $("#header").load("header.html");
      });
      $(function(){
        $("#footer").load("footer.html");
      });
    </script>
    <link rel="stylesheet" href="/css/assemb.css">
    <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Готовые сборки</title>
  </head>
  <body>
    <?php
     include '../php/filter.php';
    ?>
    <div id="header"></div>
    <div class="bg">
      <div class="assemblies_grid container_nav center_block_margin">
        <div class="filers">
            <input type="checkbox" name="" id="">
          <h3>Фильтры</h3>
            <div class="filters_container">
          <hr class="select_filters">


          <?php
              while($result = mysqli_fetch_array($query)){
          ?>
          <div class="inc">
            <div class="inc_title">
              <p class=""><?php echo $result['name']?></p>
              <img class="" src="../img/plus.png" alt="Раскрыть">
            </div>
            <section class="inc_sec">
              <?php
                                          $test = $result['id'];
                                          $connect = connectDB();
                                          $querys = mysqli_query($connect, /** @lang text */ "select * from(
                                                                                                    select distinct cpu as фильтр, 2 as id, 'cpu' as input_value FROM readypc
                                                                                                    UNION (SELECT gpu, 3 as id, 'gpu' as input_value FROM readypc)
                                                                                                    UNION (SELECT task, 1 as id, 'task' as input_value FROM readypc)
                                                                                                    UNION (SELECT gpumem, 4 as id, 'gpumem' as input_value FROM readypc)
                                                                                                    ) as Query1
                                                                                                    where Query1.id = ('$test')");
                                            while($filters = mysqli_fetch_array($querys)){
                                          ?>
              <div class="checkbox">
                <label class="custom-checkbox">
                  <input type="checkbox" name="<?php echo $result['input_name']?>" value="<?php echo $filters['фильтр']?>">
                  <span><?php echo $filters['фильтр']?></span>
                </label>
              </div>
              <?php
                                            }
                                          ?>
            </section>
            <hr>
          </div>

          <?php
              }
          ?>
          <button  id="btn_refresh" class="button_standard button_assemblies center_block_margin select_filters">Применить</button>
            </div>
        </div>
          <div class="assemb" id="responsecontainer">

          </div>
      </div>
    </div>


  </body>
</html>