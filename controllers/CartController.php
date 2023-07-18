<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

class CartController extends Controller
{
  public function actionIndex()
  {
    return $this->render('index', []);
  }
  public function actionAjax()
  {
    if ($post = Yii::$app->request->post()) { //$_POST['cart']
      $_SESSION['cart'][]=$post;	
    }

    $cart =  $_SESSION['cart'];
    return $this->renderAjax('server', ['cart' => $cart]);
  }

}

?>