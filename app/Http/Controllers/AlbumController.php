<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Track;

class AlbumController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlbumRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        //
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
                'user_id' => $request->user()->id,
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
            $track->user()->associate($request->user()->id);

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
