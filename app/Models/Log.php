<?php

namespace App\Models;

use App\Interfaces\ResourceModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Log extends Model implements ResourceModel
{
    use HasFactory;

    protected $fillable = [
        'type',
        'load_type',
        'location_id',
        'cage',
        'pallet'
    ];

    public function storeImage($image)
    {
        $uuid = uniqid('image_') . '.png';

        Storage::disk('local')->put($uuid, base64_decode($image));

        $this->image_id = $uuid;

        $base64_image = $image;

        list($type, $file_data) = explode(';', $base64_image);
        list(, $file_data) = explode(',', $file_data);

        Storage::disk('local')->put($uuid, base64_decode($file_data));

        return $uuid;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
