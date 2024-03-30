<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Plank\Mediable\Media as MediableMedia;

class Media extends MediableMedia
{
    use HasFactory;

    protected $appends = [
        'image',
        'human_readable_size',
    ];

    public function getImageAttribute()
    {
        if (str_contains($this->mime_type, 'image')) {
            return $this->getUrl();
        }

        return asset(get_logo($this->mime_type));
    }

    public function getHumanReadableSizeAttribute()
    {
        return $this->readableSize(2);
    }
}
