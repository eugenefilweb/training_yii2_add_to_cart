<?php 
use yii\web\View;
use yii\helpers\Url;

$cart = Yii::$app->session->get('cart') ?? '';

$cart_url = Url::to(['cart/ajax']);

$script = <<<JS

    // LOAD AJAX CART
    $('#load-cart').load('{$cart_url}');

    // ADD TO CART BUTTON ACTION
    $('.item').on('click', function(event) {	
        event.preventDefault();

        var amount = $(this).data('amount');
        var id = $(this).data('id');
        var qty = $(this).data('qty');
        var item = $(this).data('item');
        var data = { amount: amount, id: id, qty: qty, item: item };

        $.ajax({
            url: '{$cart_url}',
            method: 'POST',
            data: data,
            success: function(response) {
                $('#load-cart').html(response);
            }
        });
    });

JS;

$this->registerJs($script);

?>

<div id="load-cart"></div>

Item 1 - P100
<a class="item" data-amount="100" data-qty="1" data-id="1" data-item="item 1" href=""> Add to cart</a>
<br/>
Item 2 - P200
<a class="item" data-amount="200" data-qty="1" data-id="2" data-item="item 2" href=""> Add to cart</a>














<?php /*
session_start();

//unset($_SESSION['cart']);
//print_r($_SESSION['cart']);

$cart = $_SESSION['cart'] ?? "";


?>


<script  src="https://code.jquery.com/jquery-3.7.0.min.js"integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>


<script>


 $(function() {



$( "#load-cart" ).load( "http://localhost/training/Add_to_Cart_using_Ajax-Jquery_in_PHP/server.php" );


$(".item").on( "click", function(event) {	

event.preventDefault();
// alert();

  var amount = $(this).data('amount');
  var id = $(this).data('id');
  var qty = $(this).data('qty');
  var item = $(this).data('item');
  
  
  //alert(item);

  var data={amount:amount, id:id, qty:qty, item:qty };
 $.ajax({
  type: "POST",
  url: "http://localhost/training/Add_to_Cart_using_Ajax-Jquery_in_PHP/server.php",
  data: data,
  dataType: 'html',
  success: function(response) {
        //console.log(response);
	    $('#load-cart').html(response);
      }
   });

});


});




</script>




<div id="load-cart"></div>

Item 1 - P100
<a  class="item" data-amount="100" data-qty="1" data-id="1" data-item="item 1"  href=""> Add to cart </a> 
<br/>
Item 2 - P200
<a class="item" data-amount="200" data-qty="1" data-id="2"  data-item="item 2"   href=""> Add to cart</a>

*/?>