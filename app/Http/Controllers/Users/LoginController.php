<?php

declare(strict_types=1);

namespace App\Http\Controllers\Users;

use App\Controller;
use App\Http\Requests\Users\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

/**
 * Class LoginController
 *
 * @package App\Http\Controllers\Users
 */
class LoginController extends Controller
{
    /**
     * @return Responsable
     */
    public function __invoke(): Responsable
    {
        return inertia('users/login');
    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        if (Auth::guard()->attempt($request->validated(), $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended();
        }
        flash()->error(__('Invalid login.'));

        return back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('home');
    }
}