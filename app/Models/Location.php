<?php

namespace App\Models;

class Location extends Base
{
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
