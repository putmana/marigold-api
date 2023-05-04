<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Http\Resources\AlbumResource;
use App\Http\Resources\AlbumTracksResource;
use App\Models\Album;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AlbumController extends Controller
{
    public function index(Request $request) {
        $query = Auth::user()->albums();

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
            return AlbumResource::collection($query->paginate(2));
        }

        return AlbumResource::collection($query->get());
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlbumRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        if (Gate::allows('access-album', $album)) {
            return new AlbumTracksResource($album);
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlbumRequest $request, Album $album)
    {   
        $decoded = json_decode($request->getContent(), true);
        $albumInfo = $decoded['info'];
        $albumTracks = $decoded['tracks'];
        $newTracks = $decoded['newTracks'];
        
        
        $album->title = $albumInfo['title'];
        foreach ($albumTracks as $albumTrack) {
            $track = Track::find($albumTrack['id']);
            $track->title = $albumTrack['title'];
            $track->save();
        }

        foreach ($newTracks as $new) {
            $track = Track::create([
                'user_id' => Auth::user()->id,
                'album_id'=> $album->id,
                'album_index' => 5,
                'title' => $new['title'],
                'duration' => 20,
                'path' => '/public/audio/test/tracks/'.$new['path'],
            ]);
            
            foreach ($albumInfo['artists'] as $artist) {
                $track->artists()->attach([
                    $artist['id'] => ['priority' => 1]
                ]);
            }

            $track->album()->associate($album->id);
            $track->user()->associate(Auth::user()->id);

            $track->save();
        }

        $album->save();

        return response()->json([
            'message' => 'SUCCESS',
        ]);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        //
    }
}
