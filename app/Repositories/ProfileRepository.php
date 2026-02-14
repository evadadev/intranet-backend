<?php

namespace App\Repositories;

use App\Models\Profile;
use App\Repositories\Interfaces\ProfileRepositoryInterface;

class ProfileRepository implements ProfileRepositoryInterface
{
    /**
     * Get a user's profile by user ID.
     */
    public function getByUserId(int $userId)
    {
        return Profile::with('user')->where('user_id', $userId)->first();
    }

    /**
     * Find or create a profile for a user.
     */
    public function findOrCreateByUserId(int $userId, array $data = [])
    {
        $profile = Profile::firstOrCreate(
            ['user_id' => $userId],
            array_merge(['user_id' => $userId], $data)
        );
        
        return $profile->load('user');
    }

    /**
     * Update a user's profile.
     */
    public function updateByUserId(int $userId, array $data)
    {
        $profile = $this->getByUserId($userId);

        if (!$profile) {
            return $this->findOrCreateByUserId($userId, $data);
        }

        $profile->update($data);
        return $profile->load('user');
    }

    /**
     * Delete a user's profile.
     */
    public function deleteByUserId(int $userId): bool
    {
        $profile = $this->getByUserId($userId);

        if (!$profile) {
            return false;
        }

        return $profile->delete();
    }

    /**
     * Get a profile from a user model instance.
     */
    public function getByUser($user)
    {
        return $user->load('profile.user')->profile;
    }
}
