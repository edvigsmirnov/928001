<?php

namespace App\Repositories;

use App\Interfaces\MusicRepositoryInterface;
use App\Models\User;
use App\Models\Music;
use Illuminate\Http\Request;

class MusicRepository implements MusicRepositoryInterface
{
    public function getAllUsersMusic(Request $request)
    {
        $search = $request->input('user_search');
        $sort = $request->input('sort');
        $sortedColumnName = $request->input('sort_by');

        return User::query()
            ->where('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->with('music')
            ->orderBy($sortedColumnName, $sort)
            ->get();
    }

    public function getMusicByUser($user)
    {
        $userModel = User::query()->findOrFail($user);

        return $userModel->music;
    }

    public function updateMusic($music, array $newInformation)
    {
        return Music::query()->where('id', $music)->update($newInformation);
    }

    public function deleteMusic($music)
    {
        $musicModel = Music::query()->findOrFail($music);
        $musicModel->users()->detach();
        Music::destroy($music);
    }

}
