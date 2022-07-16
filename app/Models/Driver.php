<?php

namespace App\Models;

use App\Interfaces\ResourceModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model implements ResourceModel
{
    use HasFactory;

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
