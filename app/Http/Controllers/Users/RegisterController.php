<?php

declare(strict_types=1);

namespace App\Http\Controllers\Users;

use App\Controller;
use App\Http\Requests\Users\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Response;

/**
 * Class RegisterController
 *
 * @package App\Http\Controllers\Users
 */
class RegisterController extends Controller
{
    /**
     * @return Response
     */
    public function __invoke(): Response
    {
        return inertia('users/register');
    }

    /**
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    public function register(RegisterRequest $request): RedirectResponse
    {
        $user = User::create($request->validated());
        event(new Registered($user));
        Auth::guard()->login($user);

        return to_route('home');
    }
}