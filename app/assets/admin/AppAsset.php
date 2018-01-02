<?php
/**
 *
 */

namespace app\assets\admin;

use yii\web\AssetBundle;

/**
 * Class AppAsset
 * @package app\assets\admin
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        /*
        'vendor/bower/bootstrap/dist/css/bootstrap.min.css',
        'vendor/bower/font-awesome/css/font-awesome.min.css',
        'vendor/bower/nprogress/nprogress.css',
        'vendor/bower/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css',
        'vendor/bower/jquery-confirm2/css/jquery-confirm.css',
        'vendor/bower/iCheck/skins/flat/green.css',

        //Select2
        'vendor/bower/select2/dist/css/select2.min.css',
        //Fullcalendar
        'vendor/bower/fullcalendar/dist/fullcalendar.min.css',

        //eonasdan-bootstrap-datetimepicker
        'vendor/bower/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',

        'web/build/css/custom.min.css',
        */
        'web/less/admin/widget-chat.css',
        'web/css/all.css?v=tn-1.0',
    ];
    public $js = [

        /*// Bootstrap
        'vendor/bower/bootstrap/dist/js/bootstrap.min.js',
        //FastClick
        'vendor/bower/fastclick/lib/fastclick.js',
        //NProgress
        'vendor/bower/nprogress/nprogress.js',
        //Chart
//        'vendor/bower/Chart.js/dist/Chart.min.js',
        //gauge
//        'vendor/bower/gauge.js/dist/gauge.min.js',
        //bootstrap-progressbar
        'vendor/bower/bootstrap-progressbar/bootstrap-progressbar.min.js',
        //iCheck
        'vendor/bower/iCheck/icheck.min.js',
        //Skycons
        'vendor/bower/skycons/skycons.js',
        //Flot
        'vendor/bower/flot/jquery.flot.js',
        'vendor/bower/flot/jquery.flot.pie.js',
        'vendor/bower/flot/jquery.flot.time.js',
        'vendor/bower/flot/jquery.flot.stack.js',
        'vendor/bower/flot/jquery.flot.resize.js',
        //Flot plugins
        'vendor/bower/flot.orderbars/js/jquery.flot.orderBars.js',
        'vendor/bower/flot-spline/js/jquery.flot.spline.min.js',
        'vendor/bower/flot.curvedlines/curvedLines.js',
        //DateJS
        'vendor/bower/DateJS/build/date.js',
        //JQVMap
//        'vendor/bower/jqvmap/dist/jquery.vmap.js',
//        'vendor/bower/jqvmap/dist/maps/jquery.vmap.world.js',
        'vendor/bower/jqvmap/examples/js/jquery.vmap.sampledata.js',

        //bootstrap-daterangepicker
        'web/js/moment/moment.min.js',
        'web/js/datepicker/daterangepicker.js',
        //Scroll
        'vendor/bower/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js',
        //Custom Theme Scripts
        'web/build/js/custom.min.js',
        //Select2
        'vendor/bower/select2/dist/js/select2.full.min.js',

        'vendor/bower/jquery-confirm2/js/jquery-confirm.js',
        'vendor/bower/underscore/underscore.js',

        //eonasdan-bootstrap-datetimepicker
        'vendor/bower/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',

        //Fullcalendar
        '/vendor/bower/fullcalendar/dist/fullcalendar.min.js',
        '/vendor/bower/fullcalendar/dist/locale-all.js',
        '/web/js/admin/event.js',

        'web/js/common.js',
        'web/js/service.js',
        'web/js/admin/admin-ajax.js',
        'web/js/admin/admin.js',
        'web/js/admin/admin-tona.js',*/

        'https://cdn.firebase.com/js/client/2.2.1/firebase.js',
        'https://www.gstatic.com/firebasejs/4.1.2/firebase.js',

        'web/js/admin/widget/chat.js',
        'web/js/all.js',
//        'web/js/admin/spend-managementindex-index.js',

        //CkEditor
        'vendor/bower/ckeditors/ckeditor/ckeditor.js',
        //CkFinder
        'vendor/bower/ckeditors/ckfinder/ckfinder.js?type=Images',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
//    public $jsOptions = ['position' => \yii\web\View::POS_END];
}
