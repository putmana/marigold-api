<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlaylistRequest;
use App\Http\Requests\UpdatePlaylistRequest;
use App\Http\Resources\PlaylistResource;
use App\Http\Resources\PlaylistTracksResource;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PlaylistController extends Controller
{
    public function index(Request $request)
    {
        $query = Auth::user()->playlists();

        if ($request->input('sort')) {
            $cols = explode(',', $request->input('sort'));

            foreach($cols as $col) {
                if (substr($col, 0, 1) == "-") {
                    $query = $query->orderBy(ltrim($col, '-'), 'desc');
                } else {
                    $query = $query->orderBy(ltrim($col), 'asc');
                }
            }
        }

        if ($request->input('page')) {
            return PlaylistResource::collection($query->paginate(2));
        }

        return PlaylistResource::collection($query->get());
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlaylistRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Playlist $playlist)
    {
        if (Gate::allows('access-playlist', $playlist)) {
            return new PlaylistTracksResource($playlist);
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlaylistRequest $request, Playlist $playlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Playlist $playlist)
    {
        //
    }
}
