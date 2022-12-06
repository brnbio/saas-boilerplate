<?php

declare(strict_types=1);

namespace App\Models;

use App\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 *
 * @package App\Models
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property Carbon|null $email_verified_at
 */
class User extends Model implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract,
    MustVerifyEmailContract
{
    use Authenticatable;
    use Authorizable;
    use CanResetPassword;
    use HasApiTokens;
    use HasFactory;
    use MustVerifyEmail;
    use Notifiable;

    public const TABLE = 'users';

    public const ATTRIBUTE_NAME = 'name';
    public const ATTRIBUTE_EMAIL = 'email';
    public const ATTRIBUTE_PASSWORD = 'password';
    public const ATTRIBUTE_REMEMBER_TOKEN = 'remember_token';
    public const ATTRIBUTE_EMAIL_VERIFIED_AT = 'email_verified_at';

    /**
     * @var string[]
     */
    protected $fillable = [
        self::ATTRIBUTE_NAME,
        self::ATTRIBUTE_EMAIL,
        self::ATTRIBUTE_PASSWORD,
    ];

    /**
     * @var string[]
     */
    protected $hidden = [
        self::ATTRIBUTE_PASSWORD,
        self::ATTRIBUTE_REMEMBER_TOKEN,
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        self::ATTRIBUTE_EMAIL_VERIFIED_AT => 'datetime',
    ];

    /**
     * @return Attribute
     */
    public function password(): Attribute
    {
        return new Attribute(
            set: function(string $value) {
                return Hash::make($value);
            }
        );
    }
}
