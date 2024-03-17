<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\MediaDataTable;
use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Services\MediaService;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index(Request $request, MediaDataTable $dataTable)
    {
        if ($request->ajax()) {
            return $dataTable->ajax();
        }

        return view('dashboard.medias.index');
    }

    public function create(MediaService $mediaService)
    {
        $mediaService->deleteTempFolder();

        return view('dashboard.medias.create');
    }

    public function store(Request $request, MediaService $mediaService)
    {
        $mediaService->addMedias($request->get('dropzoneFiles', []));

        return redirect()->route('dashboard.medias.index')->with('message', __('Added with success'));
    }

    public function update(Request $request, Media $media, MediaService $mediaService)
    {
        $mediaService->updateMedias($request->only(['filename', 'alt']), $media);

        return redirect()->route('dashboard.medias.index')->with('message', __('Updated with success'));
    }

    public function edit(Media $media)
    {
        return view('dashboard.medias.edit', compact('media'));
    }

    public function destroy(Media $media)
    {
        $media->delete();

        return response()->json([
            'message' => __('Deleted successfully'),
        ]);
    }
}
