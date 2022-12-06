<?php

declare(strict_types=1);

namespace App\Http\Controllers\Users;

use App\Controller;
use App\Http\Requests\Users\ForgotPasswordRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Inertia\Response;

/**
 * Class ForgotPasswordController
 *
 * @package App\Http\Controllers\Users
 */
class ForgotPasswordController extends Controller
{
    /**
     * @return Response
     */
    public function __invoke(): Response
    {
        return inertia('users/forgot-password');
    }

    /**
     * @param ForgotPasswordRequest $request
     * @return RedirectResponse
     */
    public function sendResetLinkEmail(ForgotPasswordRequest $request): RedirectResponse
    {
        $response = Password::broker()->sendResetLink($request->validated());
        if ($response == Password::RESET_LINK_SENT) {
            flash()->success(__($response));
            return back();
        }
        flash()->error(__($response));

        return back();
    }
}