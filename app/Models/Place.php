<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Place extends Model
{
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function birthEmployees(): HasMany
    {
        return $this->hasMany(Employee::class, 'birth_place_id');
    }

    public function addressEmployees(): HasMany
    {
        return $this->hasMany(Employee::class, 'address_id');
    }

    public function workEmployees(): HasMany
    {
        return $this->hasMany(Employee::class, 'work_place_id');
    }
}
