<?php

namespace App\Models;

use App\Interfaces\ResourceModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

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
        return strtolower(class_basename($this));
    }

    public function storeImage($image)
    {
        $uuid = implode('/', ['images', $this->resource_type, uniqid('image_').'.png']);

        $base64_image = $image;

        [, $file_data] = explode(';', $base64_image);
        [, $file_data] = explode(',', $file_data);

        Storage::disk('local')->put($uuid, base64_decode($file_data));

        return $uuid;
    }
}
