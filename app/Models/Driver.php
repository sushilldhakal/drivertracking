<?php

namespace App\Models;

class Driver extends Base
{
    public $casts = [
        'is_admin' => 'bool',
        'break' => 'bool',
    ];

    public $fillable = [
        'name',
        'email',
        'pin',
        'phone',
        'date_of_birth',
        'comments',
        'depo_id',
        'image_url',
    ];

    public $table = 'users';

    protected static function booted()
    {
        static::addGlobalScope('driver', function (\Illuminate\Database\Eloquent\Builder $builder) {
            $builder->where('role', 'driver');
        });
    }

    public function depot()
    {
        return $this->belongsTo(Depot::class, 'depo_id', 'id')->withDefault(new Depot);
    }
}
