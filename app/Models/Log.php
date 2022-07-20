<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;

class Log extends Base
{
    public $fillable = [
        'type',
        'load_type',
        'location_id',
        'cage',
        'pallet',
    ];

    public function storeImage($image)
    {
        $uuid = uniqid('image_').'.png';

        Storage::disk('local')->put($uuid, base64_decode($image));

        $this->image_id = $uuid;

        $base64_image = $image;

        [$type, $file_data] = explode(';', $base64_image);
        [, $file_data] = explode(',', $file_data);

        Storage::disk('local')->put($uuid, base64_decode($file_data));

        return $uuid;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
