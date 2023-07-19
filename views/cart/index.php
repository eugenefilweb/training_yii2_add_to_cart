<?php 
use yii\bootstrap5\Html;
use yii\web\View;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

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

<!-- <div id="load-cart"></div>

Item 1 - P100
<a class="item" data-amount="100" data-qty="1" data-id="1" data-item="item 1" href=""> Add to cart</a>
<br/>
Item 2 - P200
<a class="item" data-amount="200" data-qty="1" data-id="2" data-item="item 2" href=""> Add to cart</a> -->

<?php 
    $model= [
        'item 1'=>['amount'=>100, 'qty'=>1, 'item'=>1, 'id'=>1],
        'item 2'=>['amount'=>200, 'qty'=>1, 'item'=>2, 'id'=>2],
        'item 3'=>['amount'=>300, 'qty'=>1, 'item'=>3, 'id'=>3],
        'item 4'=>['amount'=>400, 'qty'=>1, 'item'=>4, 'id'=>4],
        'item 5'=>['amount'=>500, 'qty'=>1, 'item'=>5, 'id'=>5],
        'item 6'=>['amount'=>600, 'qty'=>1, 'item'=>6, 'id'=>6],
        'item 7'=>['amount'=>700, 'qty'=>1, 'item'=>7, 'id'=>7],
        'item 8'=>['amount'=>800, 'qty'=>1, 'item'=>8, 'id'=>8],
        'item 9'=>['amount'=>900, 'qty'=>1, 'item'=>9, 'id'=>9],
        'item 10'=>['amount'=>1000, 'qty'=>1, 'item'=>10, 'id'=>10],
    ];
?>

<div class="container d-flex justify-content-between mt-5">
    <div class="row w-60">
        <?php  foreach($model as $index => $product): ?>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h4><?= $index ." - P". $product['amount'] ?></h4>
                        </div>
                    </div>
                    <div class="card-body">
                            <div class='w-100 h-100'>
                                <img src="../modernize/assets/images/products/dg-1.jpg" class="card-img-top"></img>
                            </div>
                    </div>
                    <div class="card-footer">
                        <div class="input-group d-flex justify-content-end">
                            <a class='item btn btn-sm btn-primary' data-amount='<?= json_encode($product['amount']) ?>' data-qty='<?= json_encode($product['qty']) ?>' data-item='<?= json_encode($product['item']) ?>' data-id='<?= json_encode($product['id']) ?>'  href="">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
        <div class="col-md-4" style="position: fixed; right: 1px; top: 0">
            <div class='card'>
                <div class='card-header'>
                    <div class='card-title'>
                        <h4>Cart</h4>
                    </div>
                </div>
                <div class='card-body'>
                    <div id="load-cart"></div>
                </div>
            </div>
        </div>
</div>













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