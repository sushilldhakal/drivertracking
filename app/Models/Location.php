<?php

namespace App\Models;

use App\Interfaces\ResourceModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model implements ResourceModel
{
    use HasFactory;

    public $fillable = [
        'name',
        'address',
        'truck_type_id',
        'supplier_id',
    ];

    public function truck_type()
    {
        return $this->belongsTo(TruckType::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
