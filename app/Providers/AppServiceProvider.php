<?php

declare(strict_types=1);

namespace App\Providers;

use App\Model;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 *
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * @return void
     */
    public function boot(): void
    {
        Model::shouldBeStrict(!app()->isProduction());
    }
}
