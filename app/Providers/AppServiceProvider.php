<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use App\Services\Newsletter;
use App\Services\MailchimpNewsletter;
use \MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Newsletter::class,function(){
            $client = new ApiClient();
            $client->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us6',
            ]);
            return new MailchimpNewsletter($client,'foobar');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        //Paginator::useBootstrap();
        Paginator::useTailwind();
        Model::unguard();
    }
}
