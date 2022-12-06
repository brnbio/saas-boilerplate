<?php

declare(strict_types=1);

namespace App\Http\Controllers\Users;

use App\Controller;
use App\Http\Requests\Users\AccountRequest;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;

/**
 * Class AccountController
 *
 * @package App\Http\Controllers\Users
 */
class AccountController extends Controller
{
    /**
     * @return Response
     */
    public function __invoke(): Response
    {
        return inertia('users/account');
    }

    /**
     * @param AccountRequest $request
     * @return RedirectResponse
     */
    public function update(AccountRequest $request): RedirectResponse
    {
        $data = $request->validated();
        if ( !empty($data['new_password'])) {
            $data['password'] = $data['new_password'];
        }
        unset($data['new_password']);
        user()->update($data);
        flash()->success('Account saved.');

        return back();
    }
}