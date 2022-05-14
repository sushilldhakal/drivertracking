<?php

namespace App\Models;

use App\Interfaces\ResourceModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TruckType extends Model implements ResourceModel
{
    use HasFactory;
    
    public $fillable = [
        'name'
    ];
}
