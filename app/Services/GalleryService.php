<?php

namespace App\Services;

use App\DTO\PreviewImageDTO;
use App\Models\Media;
use Illuminate\Database\Eloquent\Collection;
use Plank\Mediable\Media as MediableMedia;

class GalleryService
{
    public function getSingleMedia(Media|MediableMedia|null $media)
    {
        $mediaContent = [];

        if ($media) {
            $mediaContent[] =
                new PreviewImageDTO(
                    $media->id,
                    $media->filename,
                    $media->getUrl(),
                    $media->alt,
                    $media->human_size_readable
                );
        }

        return collect($mediaContent);
    }

    /**
     * @param  Collection|Media[]|MediableMedia[]  $mediaCollection
     */
    public function getMultipleMedia(Collection $medias)
    {
        $mediaCollection = [];
        foreach ($medias as $media) {
            $mediaCollection[] =
                new PreviewImageDTO(
                    $media->id,
                    $media->filename,
                    $media->getUrl(),
                    $media->alt,
                    $media->human_size_readable
                );
        }

        return collect($mediaCollection);
    }
}
