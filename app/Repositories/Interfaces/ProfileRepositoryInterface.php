<?php

namespace App\Repositories\Interfaces;

interface ProfileRepositoryInterface
{
    public function getByUserId(int $userId);
    public function findOrCreateByUserId(int $userId, array $data = []);
    public function updateByUserId(int $userId, array $data);
    public function deleteByUserId(int $userId);
    public function getByUser($user);
}
