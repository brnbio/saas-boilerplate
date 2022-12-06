<?php

declare(strict_types=1);

namespace App\Http\Requests\Users;

use Illuminate\Http\Request;

/**
 * Class VerifyRequest
 *
 * @package App\Http\Requests\Users
 */
class VerifyRequest extends Request
{
    /**
     * @return bool
     */
    public function isInvalid(): bool
    {
        return !hash_equals((string)request()->route('id'), (string)user()->getKey())
            || !hash_equals((string)request()->route('hash'), sha1(user()->getEmailForVerification()));
    }
}