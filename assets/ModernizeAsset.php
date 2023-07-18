<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ModernizeAsset extends AssetBundle
{
    public $sourcePath = '@webroot/modernize/assets ';
    // public $baseUrl = '@web';
    public $css = [
        // 'css/site.css',
        'css/styles.css',
        'css/styles.min.css',
        'css/*.css'
    ];
    public $js = [
        'js/*.js',
        'libs/*.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}
