<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function birthDate(): BelongsTo
    {
        return $this->belongsTo(BirthDate::class);
    }

    public function birthPlace(): BelongsTo
    {
        return $this->belongsTo(Place::class, 'birth_place_id');
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Place::class, 'address_id');
    }

    public function workPlace(): BelongsTo
    {
        return $this->belongsTo(Place::class, 'work_place_id');
    }

    public function eselon(): BelongsTo
    {
        return $this->belongsTo(Eselon::class);
    }

    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    public function golongan(): BelongsTo
    {
        return $this->belongsTo(Golongan::class);
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function religion(): BelongsTo
    {
        return $this->belongsTo(Religion::class);
    }

    public function workUnit(): BelongsTo
    {
        return $this->belongsTo(WorkUnit::class);
    }
}
