<?php

declare(strict_types=1);

namespace App\Http\Controllers\Users;

use App\Controller;
use App\Http\Requests\Users\VerifyRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;

/**
 * Class VerificationController
 *
 * @package App\Http\Controllers\Users
 */
class VerificationController extends Controller
{
    /**
     * @return void
     */
    public function __construct()
    {
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    /**
     * @return Response
     */
    public function __invoke(): Response
    {
        return inertia('users/verify');
    }

    /**
     * @param VerifyRequest $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function verify(VerifyRequest $request): RedirectResponse
    {
        if ($request->isInvalid()) {
            throw new AuthorizationException;
        }

        if (user()->hasVerifiedEmail()) {
            return redirect(RouteServiceProvider::HOME);
        }

        if (user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function resend(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect(RouteServiceProvider::HOME);
        }
        $request->user()->sendEmailVerificationNotification();
        flash()->success(__('Mail resent.'));

        return back();
    }
}