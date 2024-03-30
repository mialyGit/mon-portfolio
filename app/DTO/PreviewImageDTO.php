<?php

namespace App\DTO;

class PreviewImageDTO
{
    public string $src;

    public function __construct(
        public readonly string $key = '',
        public readonly string $filename = 'no-image.png',
        string $src = '',
        public readonly ?string $alt = '',
        public readonly ?string $size = '0 KB'
    ) {
        $this->src = $src ?: asset('assets/images/no-image.png');
    }

    public function toArray(): array
    {
        return [
            'key' => $this->key,
            'filename' => $this->filename,
            'src' => $this->src,
            'size' => $this->size,
            'alt' => $this->alt,
        ];
    }
}
