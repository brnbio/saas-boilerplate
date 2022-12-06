<?php

declare(strict_types=1);

namespace App\Http\Controllers\Users;

use App\Controller;
use App\Http\Requests\Users\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Inertia\Response;

/**
 * Class ResetPasswordController
 *
 * @package App\Http\Controllers\Users
 */
class ResetPasswordController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        $token = $request->route()->parameter('token');

        return inertia('users/reset-password', [
            'token' => $token,
            'email' => $request->email,
        ]);
    }

    /**
     * @param ResetPasswordRequest $request
     * @return RedirectResponse
     */
    public function reset(ResetPasswordRequest $request): RedirectResponse
    {
        $response = Password::broker()->reset(
            $request->validated(),
            function (User $user, string $password) {
                $user->password = $password;
                $user->remember_token = Str::random(100);
                $user->save();
                event(new PasswordReset($user));
                Auth::guard()->login($user);
            }
        );

        if ($response == Password::PASSWORD_RESET) {
            flash()->success(__($response));
            return back();
        }
        flash()->error(__($response));

        return back()->withInput($request->only(User::ATTRIBUTE_EMAIL));
    }
}
