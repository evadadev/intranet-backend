<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use App\Http\Requests\ProfileRequest;
use App\Repositories\ProfileRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    protected ProfileRepository $profileRepository;

    public function __construct(ProfileRepository $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }
    /**
     * Get the authenticated user's profile.
     */
    public function show(Request $request): JsonResponse
    {
        $profile = $this->profileRepository->getByUserId($request->user()->id);

        if (!$profile) {
            return response()->json([
                'message' => 'Profile not found',
            ], 404);
        }

        return response()->json($profile, 200);
    }

    /**
     * Update the authenticated user's profile.
     */
    public function update(ProfileRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $profile = $this->profileRepository->updateByUserId($request->user()->id, $validated);

        return response()->json($profile, 200);
    }

    /**
     * Get a specific user's profile (admin).
     */
    public function getUserProfile(User $user): JsonResponse
    {
        $profile = $this->profileRepository->getByUserId($user->id);

        if (!$profile) {
            return response()->json([
                'message' => 'Profile not found',
            ], 404);
        }

        return response()->json($profile, 200);
    }

    /**
     * Delete the authenticated user's profile.
     */
    public function destroy(Request $request): JsonResponse
    {
        $deleted = $this->profileRepository->deleteByUserId($request->user()->id);

        if (!$deleted) {
            return response()->json([
                'message' => 'Profile not found',
            ], 404);
        }

        return response()->json([
            'message' => 'Profile deleted successfully',
        ], 200);
    }
}
