<?php

namespace App\Http\Controllers;

use App\Interfaces\MusicRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MusicController extends Controller
{
    private MusicRepositoryInterface $musicRepository;

    public function __construct(MusicRepositoryInterface $musicRepository)
    {
        $this->musicRepository = $musicRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        return response()->json([
            'data' => $this->musicRepository->getAllUsersMusic($request),
        ]);
    }

    public function show(Request $request): JsonResponse
    {
        $user = $request->route('user');

        return response()->json([
            'data' => $this->musicRepository->getMusicByUser($user),
        ]);
    }

    public function update(Request $request)
    {
        $music = $request->route('music');
        $newInformation = request()->only([
            'artist',
            'album',
            'year'
        ]);

        return response()->json([
           'data' => $this->musicRepository->updateMusic($music, $newInformation),
        ]);
    }


    public function destroy(Request $request): JsonResponse
    {
        $music = $request->route('music');
        $this->musicRepository->deleteMusic($music);

        return response()->json('Data was deleted', Response::HTTP_NO_CONTENT);
    }

}
