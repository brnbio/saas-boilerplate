<?php

declare(strict_types=1);

namespace App\Http\Controllers\Users;

use App\Controller;
use Inertia\Response;

/**
 * Class BillingController
 *
 * @package App\Http\Controllers\Users
 */
class BillingController extends Controller
{
    /**
     * @return Response
     */
    public function __invoke(): Response
    {
        return inertia('users/billing', [
            'intent' => user()->createSetupIntent(),
        ]);
    }
}