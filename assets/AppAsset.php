<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
		'css/font-awesome.min.css',
        'css/adminlte.min.css',
       'css/font-awesome/css/font-awesome.min.css',
       'css/bootstrap.css',


    ];
    public $js = [
	     //'js/plugins/jquery/jquery.min.js',
         'js/plugins/bootstrap/js/bootstrap.bundle.min.js',

        'js/adminlte.min.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
