<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface MusicRepositoryInterface
{
    public function getAllUsersMusic(Request $request);
    public function getMusicByUser($user);
    public function updateMusic($music, array $newInformation);
    public function deleteMusic($music);
}
