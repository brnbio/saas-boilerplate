<?php

declare(strict_types=1);

namespace App\Http\Requests\Users;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class AccountRequest
 *
 * @package App\Http\Requests\Users
 */
class AccountRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            User::ATTRIBUTE_NAME  => [
                'required',
                'string',
            ],
            User::ATTRIBUTE_EMAIL => [
                'required',
                'email',
                Rule::unique(User::TABLE)->ignoreModel(user()),
            ],
            'new_password'        => [
                'nullable',
                'string',
                'between:8,48',
                'confirmed',
            ],
        ];
    }
}