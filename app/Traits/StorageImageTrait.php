<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait StorageImageTrait
{
    public function storageTraitUpload(Request $request, $fieldName, $folderName)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $filePath = $request->file($fieldName)->storeAs('public/' . $folderName . '/', $fileNameHash);

            $dataUploadTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath)
            ];

            return $dataUploadTrait;
        }
        return null;
    }
}
