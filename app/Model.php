<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Support\Carbon;
use Ramsey\Uuid\Uuid;

/**
 * Class Model
 *
 * @package App
 * @property int $id
 * @property string $uuid
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @method static static create(array $attributes = [])
 * @method static static find($id, $columns = ['*'])
 * @method static static findOrFail($id, $columns = ['*'])
 * @method static static first($columns = ['*'])
 * @method static Builder withCount($relations)
 */
class Model extends BaseModel
{
    public const TABLE = '';

    public const ATTRIBUTE_ID = 'id';
    public const ATTRIBUTE_CREATED_AT = 'created_at';
    public const ATTRIBUTE_UPDATED_AT = 'updated_at';
    public const ATTRIBUTE_DELETED_AT = 'deleted_at';

    /**
     * @return string
     */
    public function getTable(): string
    {
        return static::TABLE ?: parent::getTable();
    }

    /**
     * @param array $options
     * @return bool
     */
    public function save(array $options = []): bool
    {
        if ($this->exists === false) {
            $this->uuid = Uuid::uuid4()->toString();
        }

        return parent::save($options);
    }
}
