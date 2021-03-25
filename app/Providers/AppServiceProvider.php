<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\indexModel;

use Session;

class AppServiceProvider extends ServiceProvider
{
    protected $DB;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //強制使用https請求
        $this->app['request']->server->set('HTTPS', true);
        //取得nav資料
        $this->DB = new indexModel();
        $nav = $this->DB->get_nav();
        //视图Composer
        view()->composer('layout.nav',function($view){
            //取得nav資料
            $this->DB = new indexModel();
            $nav = $this->DB->get_nav();
            // yes代表需要有PK題
            $being_********* =  $this->DB->get_being_*********('carousel', 0, '', '', 'yes');
            $view->with('nav', $nav)
                    ->with('being_*********', $being_*********);
        });
    }
}
