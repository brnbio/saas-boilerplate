<?php

declare(strict_types=1);

namespace App\Http\Requests\Users;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ConfirmRequest
 *
 * @package App\Http\Requests\Users
 */
class ConfirmRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            User::ATTRIBUTE_PASSWORD => [
                'required',
                'current_password:web',
            ],
        ];
    }
}