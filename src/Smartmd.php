<?php
namespace NoisyWind\Smartmd;
use Illuminate\Config\Repository;
use Illuminate\Routing\Route;
class Smartmd
{
    protected $config;
    public function __construct(Repository $config)
    {
        $this->config = $config;
    }
//    public static function registerRoutes(){
//        $attr = [
//            'prefix' => config('smartmd.route.prefix'),
//            'middleware' => config('smartmd.route.middleware'),
//        ];
//        Route::group($attr,function () {
//            if(config('smartmd.route.show')){
//                Route::get('show',function(){
//                    return view(config('smartmd.route.show'));
//                });
//            }
//            if(config('smartmd.route.upload')){
//                Route::post('upload',config('smartmd.route.upload'));
//            }
//        });
//    }
}