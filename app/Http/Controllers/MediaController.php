<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use App\Interfaces\ResourceModel;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function upload(UploadRequest $request, ResourceModel $resource, $type)
    {
        if ($request->has('file')) {
            $uploadedFile = $request->file('file');
            $filename = time().$uploadedFile->getClientOriginalName();

            Storage::disk('local')->putFileAs(
                ['files', $resource->resourceType, $type, $filename],
                $uploadedFile,
                $filename
            );

            return response()->json([
                'id' => $filename,
            ]);
        }
    }
}
