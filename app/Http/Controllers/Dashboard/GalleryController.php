<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\MediaService;

class GalleryController extends Controller
{
    public function getMedias(MediaService $mediaService)
    {
        return $mediaService->getMedias();
    }
}
