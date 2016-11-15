<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/comite.css',
    	'plugins/animsition/css/animsition.min.css',
    	'plugins/ionicons/css/ionicons.min.css',
    	'plugins/flexboxgrid/css/flexboxgrid.min.css'
    ];
    public $js = [
    	'js/comite.js',
    	'plugins/modernizr/js/modernizr-custom.js',
    	'plugins/jquery/js/jquery.min.js',
    	'plugins/animsition/js/animsition.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset'
        
    ];
}
