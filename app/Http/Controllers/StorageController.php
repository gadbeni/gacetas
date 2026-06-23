<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StorageController extends Controller
{
    public function file(UploadedFile $file, string $folder, string $disk = 'public'): string
    {
        $ext         = $file->getClientOriginalExtension();
        $newFileName = Str::random(20) . time() . '.' . $ext;
        $directory   = $folder . '/' . date('FY');
        $path        = $directory . '/' . $newFileName;

        $isS3        = env('FILESYSTEM_DRIVER') == 's3';
        $activeDisk  = $isS3 ? 's3' : $disk;

        Storage::disk($activeDisk)->makeDirectory($directory);
        Storage::disk($activeDisk)->put($path, file_get_contents($file), 'public');

        if ($isS3) {
            $root = env('AWS_ROOT') ? env('AWS_ROOT') . '/' : '';
            return env('AWS_ENDPOINT') . '/' . env('AWS_BUCKET') . '/' . $root . $path;
        }

        return $path;
    }

    /**
     * Resolve the public URL for a stored value.
     *
     * The stored value tells us where the file lives:
     *  - a full URL (new uploads on S3)        -> use as-is
     *  - a relative key (legacy files on disk) -> serve from the local /storage
     */
    public static function url(?string $key): ?string
    {
        if (empty($key) || $key === '[]') {
            return null;
        }

        if (Str::startsWith($key, 'http')) {
            return $key;
        }

        return asset('storage/' . $key);
    }
}
