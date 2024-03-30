<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\SaveProfileRequest;
use App\Models\Profile;
use App\Services\GalleryService;

class ProfileController extends Controller
{
    public function edit(GalleryService $galleryService)
    {
        $profile = Profile::first();
        $media = $profile->firstMedia('profiles');
        $galleries = $galleryService->getSingleMedia($media);

        return view('dashboard.profile.edit', compact('profile', 'galleries'));
    }

    public function save(SaveProfileRequest $request)
    {
        $profile = Profile::first();

        if ($request->get('profile_photo')) {
            $profile->syncMedia($request->get('profile_photo'), 'profiles');
        }

        $profile->update($request->only([
            'firstname',
            'name',
            'email',
            'address',
            'phone_1',
            'phone_2',
        ]));

        return redirect()->route('dashboard.profile')
            ->with('message', __('Updated with success'));
    }
}
