<?php

namespace App\Models;

use App\Interfaces\ResourceModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class Base extends Model implements ResourceModel
{
    use HasFactory;

    public $fillable;

    protected $keyType = 'string';

    public $incrementing = false;

    public function getUrl()
    {
        return route('resource.view', [$this->resource_type, 'view', $this->id]);
    }

    public function getResourceTypeAttribute()
    {
        return class_basename($this);
    }
}
