<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'key',
    'value',
    'group',
])]
class HospitalSetting extends Model
{
    /**
     * @return \Illuminate\Support\Collection<string, string|null>
     */
    public static function map(): \Illuminate\Support\Collection
    {
        return static::query()->pluck('value', 'key');
    }
}
