<?php

namespace app\controllers;

use app\models\Product;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class CartController extends Controller
{
  public function actionIndex()
  {
    $model = Product::find()->all();

    return $this->render('index', ['model'=>$model]);
  }
  public function actionAjax()
  {
    // $session = (Yii::$app->session);
    // $session->removeAll();
    if ($post = Yii::$app->request->post()) { //$_POST['cart']
      $_SESSION['cart'][]=$post;	
    }

    $cart =  $_SESSION['cart'];
    return $this->renderAjax('server', ['cart' => $cart]);
  }

}

?>