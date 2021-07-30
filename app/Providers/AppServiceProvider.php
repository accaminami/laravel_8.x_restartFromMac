<?php

namespace App\Providers;

use App\DataProvider\PublisherRepositoryInterface;
use App\Domain\Repository\PublisherRepository;
use Illuminate\Support\ServiceProvider;
use Knp\Snappy\Pdf;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            PublisherRepositoryInterface::class,
            PublisherRepository::class
        );

        $this->app->bind(Pdf::class, function() {
            return new Pdf('/usr/bin/wkhtmltopdf');

            //return new Pdf('/usr/bin/wkhtmltopdf');

            //return new Pdf([
            //    'binary' =>'/usr/bin/wkhtmltopdf',
            //    'encoding' => 'utf-8',
            //]);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
