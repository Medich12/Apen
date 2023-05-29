<!DOCTYPE html>
<html lang="en">
<head>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="../jquery/jquery.maskedinput.min.js"></script>
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
  <title>Услуги</title>
</head>
<body>
<div id="header"></div>

<div class="service_container bg">

  <div class="service fixed_width_standard center_block_margin">

    <h2 class="color_white">Оформление заказа</h2>
    <hr>
    <table>
      <tr>
        <th class="product" width="580">Товар</th>
        <th width="300">Наличие</th>
        <th width="300">Цена</th>
      </tr>
      <tr>
        <td>
          <div class="product_data border">
            <img src="<?php echo  $_GET['img'];?>" alt="">
            <p class="color_orange center_block_margin"><?php echo  $_GET['name'];?></p>
          </div>
        </td>
        <td class="border">Под заказ</td>
        <td><?php echo  number_format($_GET['price'], 0, '', ' ');?> ₽</td>
      </tr>
    </table>

    <form id="order">
<!--      action="../php/order_for_computer.php"-->
      <label>
        <input class="input_style" type="text" name="name" placeholder="Как к вам обращаться*" onkeydown="if(event.keyCode==13){event.preventDefault();event.target.blur();}">
      </label>
      <label>
        <input class="input_style" type="text" name="phone" placeholder="Телефон*" onkeydown="if(event.keyCode==13){event.preventDefault();event.target.blur();}">
        <script>
          //Код jQuery, установливающий маску для ввода телефона элементу input
          //1. После загрузки страницы,  когда все элементы будут доступны выполнить...
          $(function(){
            //2. Получить элемент, к которому необходимо добавить маску
            $(`input[name="phone"]`).mask("+7(999) 999-99-99");
          });
        </script>
      </label>
      <label>
        <input class="input_style" type="text" name="massage" placeholder="Ссылка на мессенджер" onkeydown="if(event.keyCode==13){event.preventDefault();event.target.blur();}">
      </label>
      <label>
        <textarea class="input_style" name="comment" placeholder="Комментарий к заказу" onkeydown="if(event.keyCode==13){event.preventDefault();event.target.blur();}"></textarea>
      </label>
      <input type="submit" value="Оформить заказ">

    </form>
      <script>
          $('#order').submit(function(){
              var form = $("#order").serialize() + '&name_pc=<?php echo  $_GET['name'];?>';

              console.log(form);
              $.post(
                  '../php/order_for_computer.php', // адрес обработчика
                  form, // отправляемые данные

                  function(msg) { // получен ответ сервера
                      $('#order').hide('slow');
                      $('#message_server').html(msg);
                  }
              );


              return false;
          });
      </script>
    <div id="message_server"></div>

  </div>

</div>

<div id="footer"></div>
</body>
</html>