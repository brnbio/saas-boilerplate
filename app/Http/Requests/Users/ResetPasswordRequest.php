<?php

declare(strict_types=1);

namespace App\Http\Requests\Users;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ResetPasswordRequest
 *
 * @package App\Http\Requests\Users
 */
class ResetPasswordRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'token'                  => [
                'required',
            ],
            User::ATTRIBUTE_EMAIL    => [
                'required',
                'email',
            ],
            User::ATTRIBUTE_PASSWORD => [
                'required',
                'string',
                'confirmed',
                'between:8,48',
            ],
        ];
    }
}