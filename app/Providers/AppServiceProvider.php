<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Folder; // ★ 追加
use App\Policies\FolderPolicy; // ★ 追加

class AppServiceProvider extends ServiceProvider
{

    protected $policies = [
        Folder::class => FolderPolicy::class,
    ];

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
        // 本番環境(Heroku)でhttpsを強制する
       if (\App::environment('production')) {
           \URL::forceScheme('https');
       }
    }
}
