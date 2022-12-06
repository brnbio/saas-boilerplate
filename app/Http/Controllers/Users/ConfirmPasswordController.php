<?php

declare(strict_types=1);

namespace App\Http\Controllers\Users;

use App\Controller;
use App\Http\Requests\Users\ConfirmRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ConfirmsPasswords;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;

/**
 * Class ConfirmPasswordController
 *
 * @package App\Http\Controllers\Users
 */
class ConfirmPasswordController extends Controller
{
    /**
     * @return Response
     */
    public function __invoke(): Response
    {
        return inertia('users/confirm-password');
    }

    /**
     * @param ConfirmRequest $request
     * @return RedirectResponse
     */
    public function confirm(ConfirmRequest $request): RedirectResponse
    {
        return redirect()->intended();
    }
}