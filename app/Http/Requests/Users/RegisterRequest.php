<?php

declare(strict_types=1);

namespace App\Http\Requests\Users;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class RegisterRequest
 *
 * @package App\Http\Requests\Users
 */
class RegisterRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            User::ATTRIBUTE_NAME     => [
                'required',
                'string',
            ],
            User::ATTRIBUTE_EMAIL    => [
                'required',
                'email',
                Rule::unique(User::TABLE),
            ],
            User::ATTRIBUTE_PASSWORD => [
                'required',
                'string',
                'between:8,48',
                'confirmed',
            ],
        ];
    }
}