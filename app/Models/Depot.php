<?php

namespace App\Models;

use App\Interfaces\ResourceModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depot extends Model implements ResourceModel
{
    use HasFactory;

    public $fillable = [
        'name',
        'location_id',
        'number_of_cage',
        'number_of_pallet',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
