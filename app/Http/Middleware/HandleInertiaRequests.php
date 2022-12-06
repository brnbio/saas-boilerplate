<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

/**
 * Class HandleInertiaRequests
 *
 * @package App\Http\Middleware
 */
class HandleInertiaRequests extends Middleware
{
    /**
     * @var string
     */
    protected $rootView = 'app';

    /**
     * @param Request $request
     * @return array
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'appName' => config('app.name'),
            'user'    => fn() => user()?->only('name', 'email'),
            'flash'   => fn() => session('flash_notification', collect())->toArray(),
        ]);
    }
}
