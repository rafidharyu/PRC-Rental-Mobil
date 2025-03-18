<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileService
{
    // Proses upload satu file
    public function upload($file, $path)
    {
        $fileName = $file->hashName();
        return $file->storeAs($path, $fileName, 'public');
    }

    // Proses delete file
    public function delete($file)
    {
        return Storage::disk('public')->delete($file);
    }

    // Menangani multiple file uploads sekaligus
    public function handleUploads(Request $request, array $data, array $fileFields)
    {
        foreach ($fileFields as $field => $folder) {
            if ($request->hasFile($field)) {
                $data[$field] = $this->upload($request->file($field), $folder);
            } else {
                $data[$field] = null;
            }
        }

        return $data;
    }
}
