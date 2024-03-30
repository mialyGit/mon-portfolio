<?php

namespace App\Services;

use App\Models\Media;
use Illuminate\Support\Facades\Storage;
use Plank\Mediable\Facades\MediaUploader;
use Plank\Mediable\Helpers\File;
use Plank\Mediable\Media as MediableMedia;

class MediaService
{
    public function getMedias()
    {
        return Media::all();
    }

    public function addMedias(array $files): array
    {
        $medias = [];
        foreach ($files as $file) {
            $array_name = explode('|', $file);
            $path = $array_name[0];
            $original_name = $array_name[1] ?? $path;
            $source = Storage::disk('public')->path($path);
            $medias[] = MediaUploader::fromSource($source)
                ->useFilename(pathinfo($original_name, PATHINFO_FILENAME))
                ->beforeSave(function (MediableMedia $media) {
                    $media->setAttribute('alt', $media->filename);
                })
                ->upload();

            Storage::disk('public')->delete($path);
        }

        return $medias;
    }

    public function updateMedias(array $data, Media $media): void
    {
        if ($data['filename'] && $data['filename'] != $media->filename) {
            $media->rename($data['filename']);
        }
        $media->update([
            'alt' => $data['alt'],
        ]);
    }

    public function deleteTempFolder(): void
    {
        Storage::disk('public')->deleteDirectory('temp');
    }

    public function readableHumanSize($sizeInBytes, $precision = 2): string
    {
        return File::readableSize($sizeInBytes, $precision);
    }

    public function getUrlFilePreview($filePath, $mimeType = null): string
    {
        if (! $mimeType || str_contains($mimeType, 'image')) {
            return Storage::url($filePath);
        }

        return '/'.get_logo($mimeType);
    }
}
